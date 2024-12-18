<?php


define( 'OS_API_NAMESPACE', 'opencore/v1' );

add_theme_support( 'post-thumbnails' );

function dd( $array ) {
	echo '<pre>';
	var_dump( $array );
	echo '</pre>';
}

add_action( 'rest_api_init', function () {
	require_once __DIR__ . '/api/pages/slug.php';

	require_once __DIR__ . '/api/contacts/page.php';

	require_once __DIR__ . '/api/partners/page.php';
	require_once __DIR__ . '/api/partners/collaborate.php';
	require_once __DIR__ . '/api/partners/slug.php';

	require_once __DIR__ . '/api/blog/categories.php';
	require_once __DIR__ . '/api/blog/list.php';
	require_once __DIR__ . '/api/blog/slug.php';

	//require_once __DIR__ . '/api/blog/list.php';
	//require_once __DIR__ . '/api/pages/slug.php';
} );

function get_wp_error( $name = '404_error', $message = 'Пост не найден', $status = 404 ) {
	return new WP_Error( $name, $message, [
		'status' => $status
	] );
}

function get_format_data( $data = [], $status = 200 ) {
	return [
		'status' => $status,
		'data'   => $data
	];
}

function get_term_format_data( $terms ) {
	$new = [];
	if ( empty( $terms ) ) {
		return $new;
	}

	foreach ( $terms as $term ) {
		$new[] = [
			'term_id' => $term->term_id,
			'name' => $term->name
		];
	}

	return $new;
}

function on_get_field( $selector, $post_id, $default = '' ) {
	$field = get_field( $selector, $post_id );
	if ( empty( $field ) ) {
		return $default;
	}

	return $field;
}

if ( function_exists( 'acf_add_options_page' ) ) {
	// Options page for theme
	acf_add_options_page( [
		'page_title' => 'Настройки сайта',
		'menu_title' => 'Настройки сайта',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	] );

	// Options page for partners
	acf_add_options_sub_page( [
		'page_title'  => 'Настройки: партнеры',
		'menu_title'  => 'Настройки',
		'parent_slug' => 'edit.php?post_type=partners',
	] );

//	acf_add_options_sub_page( [
//		'page_title' => 'Настройки партнеров',
//		'menu_title' => 'Настройки партнеров',
//		'menu_slug'  => 'partners-settings',
//		'capability' => 'edit.php?post_type=partners',
//		'redirect'   => false
//	] );
}