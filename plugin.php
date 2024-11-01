<?php

/*
  Plugin Name: Title Tagline for Genesis
  Plugin URI: https://wordpress.org/plugins/title-tagline-for-genesis/
  Description: Add extra tagline text below your post title.
  Author: phpbits
  Version: 1.0
  Author URI: https://phpbits.net/

  Text Domain: genesis-title-tagline
 */

//avoid direct calls to this file

if (!function_exists('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

if( !class_exists( 'GENESIS_TITLE_TAGLINE_CORE' ) ){
	class GENESIS_TITLE_TAGLINE_CORE {

		function __construct(){
			add_action( 'genesis_entry_header', array( &$this, 'display_tagline' ), 11 );

			//Metabox
			add_action( 'add_meta_boxes', array( &$this, 'create_metabox' ) );
			add_action( 'save_post', array( &$this, 'save_metabox' ), 10, 2 );
		}

		function display_tagline(){
			global $post;
			$tagline = get_post_meta( $post->ID, 'genesis_title_tagline', true );
			if( empty( $tagline ) ){ return false; } ?>
			<p class="entry-title-tagline"><?php echo $tagline; ?></p>
		<?php }

		function create_metabox(){
			add_meta_box( 'genesis-title-tagline-metabox', __( 'Title Tagline', 'genesis-title-tagline' ), array( &$this, 'metabox_content' ), apply_filters( 'genesis_title_tagline_post_types', array( 'post' ) ), 'normal', 'high' );
		}

		function metabox_content( $post ){
			$tagline = get_post_meta( $post->ID, 'genesis_title_tagline', true ); ?>
			<textarea rows="3" cols="80" name="genesis_title_tagline_fld" id="genesis_title_tagline_fld" class="widefat"><?php echo $tagline;?></textarea>
			<p>
				<?php _e( 'Add Genesis Title Tagline here. HTML codes are not allowed and being stripped on the saving process. <a href="http://phpbits.net/plugins/" target="_blank">For more Genesis Framework compatible plugins, click here</a>.', 'genesis-title-tagline' );?>
			</p>
		<?php }

		function save_metabox( $post_id, $post ){

			if ( !isset( $_POST['genesis_title_tagline_fld'] ) )
				return $post_id;

			/* Get the post type object. */
			$post_type = get_post_type_object( $post->post_type );

			/* Check if the current user has permission to edit the post. */
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			/* Get the posted data and sanitize it for use as an HTML class. */
			$new_meta_value = ( isset( $_POST['genesis_title_tagline_fld'] ) ? sanitize_text_field( $_POST['genesis_title_tagline_fld'] ) : '' );
			update_post_meta( $post_id, 'genesis_title_tagline', $new_meta_value );

		}

	}
	new GENESIS_TITLE_TAGLINE_CORE();
}

// custom filter to allowed other post types
// add_filter( 'genesis_title_tagline_post_types', 'genesis_title_tagline_post_types' );
// function genesis_title_tagline_post_types( $types ){
// 	$types[] = 'page';
// 	return $types;
// }
?>
