<?php
/**
 * Hooks for importer
 *
 * @package CreamPoint
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function creampoint_importer() {
	return array(
		array(
			'name'       => 'Ice Cream',
			'preview'    => get_template_directory_uri().'/inc/backend/data/ice/home1.jpg',
			'content'    => get_template_directory_uri().'/inc/backend/data/ice/demo-content.xml',
			'customizer' => get_template_directory_uri().'/inc/backend/data/ice/customizer.dat',
			'widgets'    => get_template_directory_uri().'/inc/backend/data/ice/widgets.wie',
			//'sliders'    => '://dpsample.com/sliders-ice.zip',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
	);
}

add_filter( 'soo_demo_packages', 'creampoint_importer', 30 );