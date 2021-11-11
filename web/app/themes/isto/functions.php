<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

use App\Controllers\ContactUsController;

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['helpers', 'setup', 'filters', 'admin'])
    ->each(function ($file) {
        $file = "app/{$file}.php";

        if (! locate_template($file, true, true)) {
            wp_die(
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We are ready to bootstrap the Acorn framework and get it ready for use.
| Acorn will provide us support for Blade templating as well as the ability
| to utilize the Laravel framework and its beautifully written packages.
|
*/

new Roots\Acorn\Bootloader();

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page([
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	]);

}

require_once 'cpt.php';

$config = new \Roots\Acorn\Config();

if (WP_DEBUG) {
	function mailtrap($phpmailer) {
		$phpmailer->isSMTP();
		$phpmailer->Host = 'smtp.mailtrap.io';
		$phpmailer->SMTPAuth = true;
		$phpmailer->Port = 2525;
		$phpmailer->Username = MAILTRAP_USER;
		$phpmailer->Password = MAILTRAP_PASS;
	}

	add_action('phpmailer_init', 'mailtrap');
}

add_action( 'rest_api_init', fn() => (new ContactUsController())->register_routes());

if (!function_exists('woocommerce_template_loop_product_link_open')) {
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link no-hover block group with-arrow">';
	}
}

add_filter( 'show_admin_bar', '__return_false' );

/**
 *  Add in your themes functions.php
 *  Exclude featured product in the main product loop
 */
add_action( 'woocommerce_product_query', function ($query) {

	if ( ! is_admin() && $query->is_main_query() ) {
		// Not a query for an admin page.
		// It's the main query for a front end page of your site.

		if ( is_product_category() ) {
			// It's the main query for a product category archive.

			$tax_query = (array) $query->get( 'tax_query' );

			// Tax query to exclude featured product
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'NOT IN',
			);


			$query->set( 'tax_query', $tax_query );
		}

	}

} );

add_action('pre_get_posts', function($query) {
	if ( is_home() && $query->is_main_query() ) {

		// exclude sticky posts from main news page
		$stickies = get_option("sticky_posts");
		$query->set( 'post__not_in', $stickies );

	}
});

add_filter('manage_inquiries_posts_columns', function($columns) {
	unset( $columns['title'] );
	unset( $columns['date'] );
	$columns['type'] = __('Inquiry type', 'isto');
	$columns['name'] = __('Client name', 'isto');
	$columns['email'] = __('Client email', 'isto');
	$columns['phone'] = __('Client phone', 'isto');
	$columns['message'] = __('Message', 'isto');
	$columns['products'] = __('Products', 'isto');
	$columns['date'] = __('Date', 'isto');

	return $columns;
});

add_action('manage_inquiries_posts_custom_column' , function($column, $post_id) {
	switch ($column) {
		case 'type':
			echo ucfirst(get_field('type', $post_id) ?? 'Contacts');
			break;
		case 'name':
			echo get_field('name', $post_id);
			break;
		case 'email':
			$email = get_field('email', $post_id);
			printf(
				'<strong><a href="mailto:%s" target="_blank">%s</a></strong>',
				$email,
				$email
			);
			break;
		case 'phone':
			echo get_field('phone', $post_id);
			break;
		case 'message':
			echo get_field('message', $post_id);
			break;
		case 'products':
			$products = get_field('products', $post_id);
			echo implode("<br>", array_map(function($product) {
				return sprintf('<a href="%s" target="_blank">%s</a>', get_permalink($product), $product->post_title);
			}, $products));
			break;
	}
}, 10, 2);

add_filter('woocommerce_breadcrumb_defaults', function($defaults) {
	$defaults['home'] = __('Pradinis', 'isto');

	return $defaults;
});
