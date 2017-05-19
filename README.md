# Gemini

A boilerplate built for decoupled development using Wordpress as a CMS.


## Gemini Intent

Gemini is a boilerplate to be used as a foundation for developing an application that decouples Wordpress from the front end. Wordpress will only be used as a CMS, and the front end framework, such as React, Angular or Ember, is left up to you.

The Wordpress CMS and the application live within the same directory tree. Wordpress lives at `/cms`, the front-end lives at `/app`. This means that, if used in production, they will both operate on the same server, and access points will be available through the parent domain (with a login living at `example.com/cms/wp/wp-login.php`).

The boilerplace includes a theme, *Skylab*, which a barest of barebone theme that only displays a 404 style page. The purpose of the theme is only to inject functions you need to build and change the Wordpress backend and the API.


### "Cool, its a ready to use REST API theme."

**Nope.**

Gemini is *not* a framework. Gemini is *not* a typical, useful Wordpress theme out of the box. Gemini is *not* a javascript REST API anything out of the box.

To be honest, there are tons of js framework options available, and a lot of boilerplates from people who have done some pretty good work. And one might be better suited than another depending on the project. Gemini is, at its most basic, an opinionated way of arranging files to keep Wordpress and your future app together in one primary folder. Nothing fancy.


## Usage

- Clone this repo. Edit `composer.json` to add plugins that you require, there's a few recommended in there already. 
- Run `composer install`. 
- Setup two virtual hosts: one that points to `/cms` and one that points to `/app`. We recommend `cms.example.dev` and `app.example.dev`, but do whatever floats your boat. We will use these in the examples below, 
- Open `cms/wp-config.php` and change the definitions to match your database.
- Go to `cms.example.dev/wp/wp-admin` to set everything up, then change the theme to `Skylab` in `Appearance -> Themes`
- All front end architecture should be housed within `/app`. All backend functionality related to Wordpress should be done in the Skylab theme, located in `/cms/content/themes/skylab`.


