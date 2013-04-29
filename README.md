subtitle
========

Display subtitle text field after the title in WordPress admin panel

## How to use

Once plugin activated, you get a subtitle input field after the title area in admin panel.

### Retriving and displaying in templates

Use `get_nskw_subtitle()` to retrieve and `nskw_subtitle()` to display.

### Change label

By default the label of the input field is "Subtitle".
There's a hook for changing it.

	add_filter( 'nskw-fat-meta_label', 'nskw_changeLabel' );
	function nskw_changeLabel() {
		return 'サブタイトル';
	}

### Hide in specific post types

By default, subtitle field appears in every post type edit pages except for attachment.

To hide in particular post type pages, there's a hook.

	// hide subtitle field in posttype 'attachment', 'page'、''newposttype'
	add_filter( 'nskw-fat_post_type', 'nskw_hide_subtitle' );
	function nskw_hide_subtitle() {
		return array( 'attachment', 'page', 'newposttype' );
	}

