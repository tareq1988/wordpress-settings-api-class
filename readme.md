What is this?
---------------

It's a PHP class wrapper for handling WordPress [Settings API](http://codex.wordpress.org/Settings_API). Gives a very handy way to build theme or plugins option panel.


## Package Installation (via Composer)

To install this package, edit your `composer.json` file:

```js
{
    "require": {
        "tareq1988/wordpress-settings-api-class": "dev-master"
    }
}
```

Now run:

`$ composer install`

Usage Example
---------------

Checkout the [examples](https://github.com/tareq1988/wordpress-settings-api-class/tree/master/example) folder for OOP and procedural example. They were called in [plugin.php](https://github.com/tareq1988/wordpress-settings-api-class/blob/master/plugin.php) file.

A detailed tutorial can be found [here](https://tareq.co/2012/06/wordpress-settings-api-php-class/).

#### Retrieving saved options

```php
/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function prefix_get_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}
```

Screenshot
----------------------

![Option Panel](https://github.com/tareq1988/wordpress-settings-api-class/raw/master/screenshot-1.png "The options panel build on the fly using the PHP Class")



Frequently Asked Questions
---------------

#### What this plugin for?

It's mainly a plugin that demonstrates the Settings API PHP class

#### Whats the facility?

A plugin or theme developer can build their options panel with Settings API easily

#### What is Settings API ?

Settings API is a functionality from WordPress that helps developers to save their options data very easily and securely.
More about [Settings API](http://codex.wordpress.org/Settings_API).


Changelog:
----------------------
```
v1.3 (27 September, 2016)
------------------------
- [new] Placeholder support for text and textarea input
- [new] min, max and step support for number field
- [fix] Empty multicheck saving warning
- [improved] Don't show the navigation if only one section exists

v1.1 (23 April, 2015)
------------------------
- [new] Folder structure updated
- [new] composer support added
- [new] Number field added
- [new] URL field added
- [improved] wysiwyg field responsive support. Allow to pass options to wp_editor
- [new] WP Media uploader added

v1.0 (16 July, 2014)
------------------------
- [new] color, password and wysiwyg example added on plugin settings
- [new] Color Picker added
- [improved] Allow to set description for section
- Some other old fixes ;)
```