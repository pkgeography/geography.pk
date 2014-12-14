<?php

/**
 * Featured Image Post Type
 */


/**
 * Add post type
 */

gpk_add_post_type('gpk_featured', array(
		'label' => __( 'Featured Images' ),
		'labels' => array(
			'name' => __( 'Featured Images' ),
			'singular_name' => __( 'Featured Image' ),
			'add_new_item' => __( 'Add a New Featured Image' ),
			'edit_item' => __( 'Edit Feature Image' ),
			'new_item' => __( 'New Featured Image' ),
			'view_item' => __( 'View Featured Image' ),
			'search_item' => __( 'Search Featured Image' ),
			'not_found' => __( 'Featured image not found' ),
			'not_found_in_trash' => __( 'Featured image not found in Trash.' ),
		),
		'description' => __( 'Featured Image hosts historical facts for famous persons, landmarks and much more. When there is no Featured Image, it may display randomly selected pictures of Pakistani landscape from Flickr.' ),
		'supports' => array(
			'title',
			'author',
			'thumbnail',
			'excerpt',
			'comments'
		),
		'rewrite' => array(
			'slug' => 'featured',
			'with_front' => false
		),
		'menu_position' => 20,
		'taxonomies' => array('gpk_featured_type'),
		'menu_icon' => 'dashicons-smiley'
	)
);


/**
 * Add custom taxonomy for featured image
 */
gpk_add_taxonomy('gpk_featured_category', array('gpk_featured'), array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' ),
			'search_items' => __( 'Search Categories' ),
			'popular_items' => __( 'Popular Categories' ),
			'all_items' => __( 'All Categories' ),
			'parent_item' => __( 'Parent Categories' ),
			'parent_item_colon' => __( 'Parent Categories:' ),
			'edit_item' => __( 'Edit Category' ),
			'update_item' => __( 'Update Category' ),
			'add_new_item' => __( 'Add New Category' ),
			'new_item_name' => __( 'New Category' ),
			'menu_name' => __( 'Categories' )
		),
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'featured-type',
			'with_front' => false
		),
		'update_count_callback' => '_update_post_term_count'
	)
);