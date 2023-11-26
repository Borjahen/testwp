<?php
add_action('after_setup_theme', 'uncode_language_setup');
function uncode_language_setup()
{
	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles()
{
	$production_mode = function_exists('ot_get_option') ? ot_get_option('_uncode_production') : 'on';
	$resources_version = ($production_mode === 'on') ? null : rand();
	if ( function_exists('get_rocket_option') && ( get_rocket_option( 'remove_query_strings' ) || get_rocket_option( 'minify_css' ) || get_rocket_option( 'minify_js' ) ) ) {
		$resources_version = null;
	}
	$parent_style = 'uncode-style';
	$child_style = array('uncode-style');
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 100);

function agregar_elemento_pruebaza_a_post_list($opciones) {
    $opciones['options'][] = array(
        'pruebaza',
        esc_html__('Pruebaza', 'uncode-core')
    );

    return $opciones;
}

add_filter('uncode_sorted_list_post_options', 'agregar_elemento_pruebaza_a_post_list');

function mi_funcion_personalizada( $key, $value, $block_data, $layout, $is_default_product_content ) {
		echo $key;
}
add_action( 'uncode_inner_entry', 'mi_funcion_personalizada', 10, 5 );