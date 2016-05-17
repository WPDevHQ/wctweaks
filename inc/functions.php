<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * WooCommerce Shop based category page helper
 */

add_filter( 'rewrite_rules_array', function( $rules ) {
    $new_rules = array(
        'shop/([^/]*?)/page/([0-9]{1,})/?$' => 'index.php?product_cat=$matches[1]&paged=$matches[2]',
        'shop/([^/]*?)/?$' => 'index.php?product_cat=$matches[1]',
    );
    return $new_rules + $rules;
} );