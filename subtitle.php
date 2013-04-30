<?php
/*
Plugin Name: Subtitle
Plugin URI: http://nskw-style.com/2013/wordpress/plugin-downloads/subtitle.html ‎
Description: This plugin adds simple meta field to wp-admin/post-new.php
Author: Shinichi Nishikawa
Version: 0.1
Author URI: http://nskw-style.com
*/

class MetaFieldAfterTitle {

public $meta_key = 'subtitle';
public $meta_label = 'Subtitle';
public $post_type = array( 'attachment' );

// add actions
function __construct()
{
	add_action( 'edit_form_after_title', array( &$this, 'edit_form_after_title' ) );
	add_action( 'save_post', array( &$this, 'save_post' ) );
	add_action( 'init', array( &$this, 'init' ) );
}

public function init() {
	$this->meta_key = apply_filters( 'nskw-fat-meta_key', $this->meta_key );
	$this->post_type = apply_filters( 'nskw-fat_post_type', $this->post_type );
	$this->meta_label = apply_filters( 'nskw-fat-meta_label', $this->meta_label );
}

// フォームの表示
public function edit_form_after_title()
{
	// return if not admin panel
	if ( !is_admin() ) {
		return;
	}
	// return if post type differs
	if ( in_array( get_post_type( $GLOBALS['post'] ), $this->post_type ) ) {
		return;
	}

	$value = $this->get_the_subtitle();
	printf(
		'<p><label for="%1$s_id">%3$s <br /><input size="100" type="text" name="%1$s" id="%1$s_id" value="%2$s" /></label></p>',
		$this->meta_key,
		$value,
		$this->meta_label
	);		
}

// save the value
public function save_post( $post_id )
{
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
    
    if ( isset ( $_POST[ $this->meta_key ] ) ) {
    	return update_post_meta( $post_id, $this->meta_key, $_POST[ $this->meta_key ] );
    }
    delete_post_meta( $post_id, $this->meta_key );

}

public function get_the_subtitle() {
	global $post;
	$the_subtitle = get_post_meta( $post->ID, $this->meta_key, true );
	return esc_html( $the_subtitle );
}

}
$nskwFAT = new MetaFieldAfterTitle();

function get_nskw_subtitle() {
	global $nskwFAT;
	return $nskwFAT->get_the_subtitle();
}

function nskw_subtitle() {
	echo get_nskw_subtitle();
}
