<?php

/**
 * Add custom functions, methods, options
 */


/**
 * Add Table of Content(TOC) checkbox metabox for pages
 */
function gpk_page_toc_metabox() {
	$screens = array('page');

	foreach ($screens as $screen) {
		add_meta_box(
			'gpk_pageTocId',
			__('Display TOC', 'pkgeography'),
			'gpk_page_toc_metabox_callback',
			$screen,
			'side',
			'core'
		);
	}
}


/**
 * Attach metabox to WP hook
 */
add_action('add_meta_boxes', 'gpk_page_toc_metabox');



/**
 * Print the metabox to admin area
 *
 * @param WP_Post $post
 */
function gpk_page_toc_metabox_callback( $post ) {
	wp_nonce_field('gpk_page_toc_metabox', 'gpk_page_toc_metabox_nonce');

	$value = get_post_meta($post->ID, '_gpk_page_toc', true);
	$checked = ($value === 'on') ? 'checked' : '';

	echo '<label for="gpk_page_toc_field">';
	echo '<input type="checkbox" id="gpk_page_toc_field" name="gpk_page_toc_field" ' . $checked . ' size="25">';
	_e('Display Table of Content (TOC)', 'pkgeography');
	echo '</label>';
}


/**
 * Save data on post save
 *
 * @param int $post_id
 */
function gpk_page_toc_metabox_save( $post_id ) {

	// Nonce check
	if ( ! isset( $_POST['gpk_page_toc_metabox_nonce'] ) ) {
		return;
	}

	// Nonce verification
	if ( ! wp_verify_nonce( $_POST['gpk_page_toc_metabox_nonce'], 'gpk_page_toc_metabox' ) ) {
		return;
	}

	// Autosave check
	if ( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	// User permission check
	if ( isset($_POST['post_type']) && 'page' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	}

	// Data check and action accordingly
	if ( ! isset($_POST['gpk_page_toc_field']) ) {
		delete_post_meta( $post_id, '_gpk_page_toc' );
	}
	else {
		$data = sanitize_text_field( $_POST['gpk_page_toc_field'] );
		update_post_meta( $post_id, '_gpk_page_toc', $data );
	}
}


/**
 * Attach save action to WP hook
 */
add_action('save_post', 'gpk_page_toc_metabox_save');

