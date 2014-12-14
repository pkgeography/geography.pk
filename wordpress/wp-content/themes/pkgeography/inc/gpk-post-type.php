<?php


/**
 * Custom Post Type
 */

function gpk_add_post_type( $name, $args = array() ) {

	/**
	 * Set default values
	 */
	$args['public'] = true;
	$args['has_archive'] = true;


	/**
	 * Add Post Type using init action hook
	 */
	add_action('init', function() use($name, $args)	{

		/**
		 * Register Post Type with given arguments
		 */
		register_post_type($name, $args);
	});
}


/**
 * Custom taxonomies
 */

function gpk_add_taxonomy( $name, $object = array(), $args = array() ) {

	/**
	 * Set default arguments
	 */
	$args['public'] = true;


	/**
	 * Add taxanomy using init action hook
	 */
	add_action('init', function() use($name, $object, $args)	{

		/**
		 * Register taxanomy for specific Post Type
		 */
		register_taxonomy_for_object_type($name, $object);

		/**
		 * Register taxanomy in WordPress
		 */
		register_taxonomy($name, $object, $args);
	});
}


/**
 * Custom metaboxes
 */
function gpk_add_meta_boxes( $id, $title, $post_type, $context = 'advanced', $priority = 'default', $callback_args = array() ) {

	/**
	 * Add meta boxes action hook
	 */
	add_action('add_meta_boxes_' . $post_type, function() use($id, $title, $post_type, $context, $priority, $callback_args)	{

		/**
		 * Add meta box
		 */
		add_meta_box($id, $title, function($post, $metabox) use($id, $title, $post_type)	{

			/**
			 * Set wp nonce
			 */
			wp_nonce_field($id, $id . '_nonce');

			/**
			 * Get existing value
			 */
			$value = get_post_meta($post->ID, $metabox['args']['name'], true);

			/**
			 * Render metabox
			 */
			echo '<p><label for="' . $metabox['args']['id'] . '">';
			_e($metabox['args']['label'], 'pkgeography');
			echo '</label></p>';
			echo '<input type="text" size="' . $metabox['args']['size'] . '" name="' . $metabox['args']['name'] . '" id="' . $metabox['args']['id'] . '" value="' . $value . '">';

		},

		/**
		 * Set Post Type
		 */
		$post_type,

		/**
		 * Set metabox context (normal, advanced, side)
		 */
		$context,

		/**
		 * Set metabox priority (high, core, default, low)
		 */
		$priority,

		/**
		 * Callback arguments
		 */
		$callback_args);
	});

}


/**
 * Save post custom metadata
 */
function gpk_save_meta_box( $metabox = array() ) {

	/**
	 * Save metadata using save_post action hook
	 */
	add_action('save_post', function( $post_id ) use($metabox)	{

		/**
		 * Return if no nonce
		 */
		if ( ! isset( $_POST[$metabox['id'] . '_nonce'] ) ) return;

		/**
		 * Return if nonce not verified
		 */
		if ( ! wp_verify_nonce( $_POST[$metabox['id'] . '_nonce'], $metabox['id'] ) ) return;

		/**
		 * Return on autosave
		 */
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

		/**
		 * Return if user capabilities are limited
		 */
		if ( isset($_POST['post_type']) && $metabox['post_type'] === $_POST['post_type'] ) {
			if ( ! current_user_can('edit_post', $post_id) ) return;
		}

		/**
		 * Return if no metabox is set in POST request
		 */
		if ( ! isset( $_POST[$metabox['field']] ) ) return;

		/**
		 * Get metabox value and sanitize data
		 */
		$metadata = sanitize_text_field( $_POST[$metabox['field']] );

		/**
		 * Update metabox data
		 */
		update_post_meta($post_id, $metabox['field'], $metadata);

	});
}

