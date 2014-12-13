<?php


/**
 * Custom post type
 */

function gpk_add_post_type( $name, $args = array() ) {
	$args['public'] = true;
	$args['has_archive'] = true;

	add_action('init', function() use($name, $args)	{
		register_post_type($name, $args);
	});
}


/**
 * Custom taxonomies
 */

function gpk_add_taxonomy( $name, $object = array(), $args = array() ) {
	$args['public'] = true;

	add_action('init', function() use($name, $object, $args)	{
		register_taxonomy_for_object_type($name, $object);
		register_taxonomy($name, $object, $args);
	});
}
