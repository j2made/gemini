<?php

/**
 *
 * Plugin Name: Gemini Init
 * Plugin URI:  https://github.com/j2made/gemini
 * Description: Runs plugin functions essential to Gemini
 * Version:     1.0.0
 * Author:      J2Made
 * Author URI:  http://j2made.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 *
 * @package Gemini
 * @author  Shaun Baer <sbaer@j2made.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version 1.0.0
 *
 */

/**
 * It's a Trap
 * -----------
 *
 * Abort if called directly or by a script
 *
 * @since  1.0.0
 */
defined( 'ABSPATH' ) or die( "You didn't say the magic word" );

if ( ! function_exists( 'add_filter' ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  echo esc_html( "Oopsies" );
  exit();
}





/**
 * Register Default Theme Directory
 * --------------------------------
 * Add default WP themes directory so default themes are available
 *
 * @since  1.0.0
 */
register_theme_directory(ABSPATH . 'wp-content/themes');





/**
 * Determine SE Indexing
 * ---------------------
 * Set Search Engine indexing to all enviornments except production
 *
 * @since  1.0.0
 */
class Gemini_Determine_Indexing {

  private static $single;
  private static $indexing;

  /**
   * Turn indexing off if any env except production
   */
  public function __construct() {

    if (isset(self::$_single)) { return; }

    self::$single = $this;

    add_action( 'wp_loaded', array($this, 'set_indexing') );

  }

  public function set_indexing() {
    self::$indexing = '';

    if( defined( "GEMINI_ENV" ) ) {
      if ( GEMINI_ENV !== 'production') add_filter( 'pre_option_blog_public', '__return_false' );
    } else {
      add_filter( 'pre_option_blog_public', '__return_true' );
    }


  }

}

new Gemini_Determine_Indexing;




/**
 * Autoload MU-Plugins
 * -------------------
 * Brilliant plugin by the roots.io team. Autoloads MU-plugins
 * that are loaded in directories.
 *
 * Original plugin: Bedrock Autoloader v1.0.0
 * @link (https://github.com/roots/bedrock/)
 * @link (https://github.com/roots/bedrock/blob/master/web/app/mu-plugins/bedrock-autoloader.php)
 *
 * @since  1.0.0
 */

class Bedrock_Autoloader {
  private static $cache; // Stores our plugin cache and site option.
  private static $auto_plugins; // Contains the autoloaded plugins (only when needed).
  private static $mu_plugins; // Contains the mu plugins (only when needed).
  private static $count; // Contains the plugin count.
  private static $activated; // Newly activated plugins.
  private static $relative_path; // Relative path to the mu-plugins dir.
  private static $_single; // Let's make this a singleton.

  public function __construct() {
    if (isset(self::$_single)) { return; }

    self::$_single       = $this; // Singleton set.
    self::$relative_path = '/../' . basename(__DIR__); // Rel path set.

    if (is_admin()) {
      add_filter('show_advanced_plugins', array($this, 'showInAdmin'), 0, 2); // Admin only filter.
    }

    $this->loadPlugins();
  }

  /**
   * Run some checks then autoload our plugins.
   */
  public function loadPlugins() {
    $this->checkCache();
    $this->validatePlugins();
    $this->countPlugins();

    foreach (self::$cache['plugins'] as $plugin_file => $plugin_info) {
      include_once(WPMU_PLUGIN_DIR . '/' . $plugin_file);
    }

    $this->pluginHooks();
  }

  /**
   * Filter show_advanced_plugins to display the autoloaded plugins.
   */
  public function showInAdmin($bool, $type) {
    $screen = get_current_screen();
    $current = is_multisite() ? 'plugins-network' : 'plugins';

    if ($screen->{'base'} != $current || $type != 'mustuse' || !current_user_can('activate_plugins')) {
      return $bool;
    }

    $this->updateCache(); // May as well update the transient cache whilst here.

    self::$auto_plugins = array_map(function ($auto_plugin) {
      $auto_plugin['Name'] .= ' *';
      return $auto_plugin;
    }, self::$auto_plugins);

    $GLOBALS['plugins']['mustuse'] = array_unique(array_merge(self::$auto_plugins, self::$mu_plugins), SORT_REGULAR);

    return false; // Prevent WordPress overriding our work.
  }

  /**
   * This sets the cache or calls for an update
   */
  private function checkCache() {
    $cache = get_site_option('bedrock_autoloader');

    if ($cache === false) {
      return $this->updateCache();
    }

    self::$cache = $cache;
  }

  /**
   * Get the plugins and mu-plugins from the mu-plugin path and remove duplicates.
   * Check cache against current plugins for newly activated plugins.
   * After that, we can update the cache.
   */
  private function updateCache() {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');

    self::$auto_plugins = get_plugins(self::$relative_path);
    self::$mu_plugins   = get_mu_plugins(self::$relative_path);
    $plugins            = array_diff_key(self::$auto_plugins, self::$mu_plugins);
    $rebuild            = !is_array(self::$cache['plugins']);
    self::$activated    = ($rebuild) ? $plugins : array_diff_key($plugins, self::$cache['plugins']);
    self::$cache        = array('plugins' => $plugins, 'count' => $this->countPlugins());

    update_site_option('bedrock_autoloader', self::$cache);
  }

  /**
   * This accounts for the plugin hooks that would run if the plugins were
   * loaded as usual. Plugins are removed by deletion, so there's no way
   * to deactivate or uninstall.
   */
  private function pluginHooks() {
    if (!is_array(self::$activated)) { return; }

    foreach (self::$activated as $plugin_file => $plugin_info) {
      do_action('activate_' . $plugin_file);
    }
  }

  /**
   * Check that the plugin file exists, if it doesn't update the cache.
   */
  private function validatePlugins() {
    foreach (self::$cache['plugins'] as $plugin_file => $plugin_info) {
      if (!file_exists(WPMU_PLUGIN_DIR . '/' . $plugin_file)) {
        $this->updateCache();
        break;
      }
    }
  }

  /**
   * Count our plugins (but only once) by counting the top level folders in the
   * mu-plugins dir. If it's more or less than last time, update the cache.
   */
  private function countPlugins() {
    if (isset(self::$count)) { return self::$count; }

    $count = count(glob(WPMU_PLUGIN_DIR . '/*/', GLOB_ONLYDIR | GLOB_NOSORT));

    if (!isset(self::$cache['count']) || $count != self::$cache['count']) {
      self::$count = $count;
      $this->updateCache();
    }

    return self::$count;
  }
}

new Bedrock_Autoloader();
