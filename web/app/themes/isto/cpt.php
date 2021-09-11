<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Manufacturers.
	 */

	$labels = [
		"name" => __( "Manufacturers", "isto" ),
		"singular_name" => __( "Manufacturer", "isto" ),
	];

	$args = [
		"label" => __( "Manufacturers", "isto" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "manufacturers", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "manufacturers", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
