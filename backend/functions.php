<?php


define( 'OS_API_NAMESPACE', 'opencore/v1' );

function dd( $array ) {
	echo '<pre>';
	var_dump( $array );
	echo '</pre>';
}

add_action( 'rest_api_init', function () {
	require_once __DIR__ . '/api/contacts/page.php';

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

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [
		'page_title' => 'Настройки сайта',
		'menu_title' => 'Настройки сайта',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	] );
}