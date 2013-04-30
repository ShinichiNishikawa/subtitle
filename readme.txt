=== Subtitle ===
Contributors: ShinichiN
Tags: Custom Field, subtitle
Requires at least: 3.5.1
Tested up to: 3.5.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays subtitle text field after the title in post, page and other post type edit page.

== Description ==

Displays subtitle text field after the title in post, page and other post type edit page.

* [GitHub](https://github.com/ShinichiNishikawa/subtitle)
* [Plugin Homepage](http://nskw-style.com/2013/wordpress/plugin-downloads/subtitle.html)

= Retriving and displaying in templates =

Use `get_nskw_subtitle()` to retrieve and `nskw_subtitle()` to display.

= Change label =

`By default the label of the input field is "Subtitle". There's a hook for changing it.

add_filter( 'nskw-fat-meta_label', 'nskw_changeLabel' );
function nskw_changeLabel() {
    return 'new label';
}`

= Hide in specific post types =

By default, subtitle field appears in every post type edit pages except for attachment.

To hide in particular post type pages, there's a hook.

`// hide subtitle field in posttype 'attachment', 'page'、''newposttype'
add_filter( 'nskw-fat_post_type', 'nskw_hide_subtitle' );
function nskw_hide_subtitle() {
    return array( 'attachment', 'page', 'newposttype' );
}`

== Installation ==

1. Upload `subtitle` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Screenshots ==

1. Subtitle input field appears!

== Changelog ==

0.1 First Release.

