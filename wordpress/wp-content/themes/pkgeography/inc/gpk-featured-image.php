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


/**
 * Add and save credit meta box
 */

gpk_add_meta_boxes('gpk_featured_credit', 'Credits', 'gpk_featured', 'advanced', 'core', array(
		'label' => 'Add credits for featured item',
		'name' => 'gpk_featured_credit_field',
		'id' => 'gpk_featured_credit_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_credit',
		'field' => 'gpk_featured_credit_field',
		'post_type' => 'gpk_featured'
	)
);


/**
 * Add and save link meta box
 */

gpk_add_meta_boxes('gpk_featured_link', 'Link', 'gpk_featured', 'normal', 'low', array(
		'label' => 'Add featured item link',
		'name' => 'gpk_featured_link_field',
		'id' => 'gpk_featured_link_field',
		'size' => '50'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_link',
		'field' => 'gpk_featured_link_field',
		'post_type' => 'gpk_featured'
	)
);


/**
 * Add and save location lat meta box
 */

gpk_add_meta_boxes('gpk_featured_lat', 'Latitude', 'gpk_featured', 'normal', 'low', array(
		'label' => 'Add featured item location latitude',
		'name' => 'gpk_featured_lat_field',
		'id' => 'gpk_featured_lat_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_lat',
		'field' => 'gpk_featured_lat_field',
		'post_type' => 'gpk_featured'
	)
);


/**
 * Add and save location lng meta box
 */

gpk_add_meta_boxes('gpk_featured_lng', 'Longitude', 'gpk_featured', 'normal', 'low', array(
		'label' => 'Add featured item location longitude',
		'name' => 'gpk_featured_lng_field',
		'id' => 'gpk_featured_lng_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_lng',
		'field' => 'gpk_featured_lng_field',
		'post_type' => 'gpk_featured'
	)
);


/**
 * Add and save background-x position meta box
 */

gpk_add_meta_boxes('gpk_featured_bgx', 'Background X Position', 'gpk_featured', 'side', 'low', array(
		'label' => 'Add featured item background horizontal (x) position in px or %',
		'name' => 'gpk_featured_bgx_field',
		'id' => 'gpk_featured_bgx_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_bgx',
		'field' => 'gpk_featured_bgx_field',
		'post_type' => 'gpk_featured'
	)
);



/**
 * Add and save background-y position meta box
 */

gpk_add_meta_boxes('gpk_featured_bgy', 'Background Y Position', 'gpk_featured', 'side', 'low', array(
		'label' => 'Add featured item background vertical (y) position in px or %',
		'name' => 'gpk_featured_bgy_field',
		'id' => 'gpk_featured_bgy_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_bgy',
		'field' => 'gpk_featured_bgy_field',
		'post_type' => 'gpk_featured'
	)
);


/**
 * Add and save from date meta box
 */

gpk_add_meta_boxes('gpk_featured_from_date', 'Available From', 'gpk_featured', 'side', 'low', array(
		'label' => 'Add date/time (yyyy-mm-dd hh:mm:ss) featured item is available from',
		'name' => 'gpk_featured_from_date_field',
		'id' => 'gpk_featured_from_date_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_from_date',
		'field' => 'gpk_featured_from_date_field',
		'post_type' => 'gpk_featured'
	)
);




/**
 * Add and save until date meta box
 */

gpk_add_meta_boxes('gpk_featured_until_date', 'Available Until', 'gpk_featured', 'side', 'low', array(
		'label' => 'Add date/time (yyyy-mm-dd hh:mm:ss) featured item is available until',
		'name' => 'gpk_featured_until_date_field',
		'id' => 'gpk_featured_until_date_field',
		'size' => '25'
	)
);

gpk_save_meta_box( array(
		'id' => 'gpk_featured_until_date',
		'field' => 'gpk_featured_until_date_field',
		'post_type' => 'gpk_featured'
	)
);


