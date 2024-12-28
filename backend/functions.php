<?php

define( 'OS_API_NAMESPACE', 'opencore/v1' );

register_nav_menus( [
	'header' => 'Верхнее',
] );

add_theme_support( 'post-thumbnails' );

function dd( $array ) {
	echo '<pre>';
	var_dump( $array );
	echo '</pre>';
}

add_action( 'rest_api_init', function () {

	// Contacts
	require_once __DIR__ . '/api/global/contacts.php';
	require_once __DIR__ . '/api/global/festival.php';

	// Text content pages
	require_once __DIR__ . '/api/pages/slug.php';

	// Menu
	require_once __DIR__ . '/api/menu/header.php';

	// Pages
	require_once __DIR__ . '/api/home/page.php';
	require_once __DIR__ . '/api/contacts/page.php';
	require_once __DIR__ . '/api/career/page.php';
	require_once __DIR__ . '/api/methodology/page.php';

	// Partners
	require_once __DIR__ . '/api/partners/page.php';
	require_once __DIR__ . '/api/partners/collaborate.php';
	require_once __DIR__ . '/api/partners/slug.php';

	// Blog
	require_once __DIR__ . '/api/blog/categories.php';
	require_once __DIR__ . '/api/blog/list.php';
	require_once __DIR__ . '/api/blog/slug.php';

	// Reviews
	require_once __DIR__ . '/api/reviews/page.php';

	// Learning
	require_once __DIR__ . '/api/learning/page.php';

	// Cases
	require_once __DIR__ . '/api/cases/slug.php';

	// Services
	require_once __DIR__ . '/api/services/slug.php';
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

function on_filter_post_objects( $field, $keys, $fields = [] ) {
	foreach ( $keys as $key => $value ) {
		$find = array_search( $key, array_column( $field, 'acf_fc_layout' ) );
		if ( $find !== false && ! empty( $field[ $find ][ $value ] ) ) {
			$new = $field[ $find ][ $value ];

			foreach ( $new as $item_key => $item ) {
				$data = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
				];

				if ( ! empty( $fields[ $key ] ) ) {
					foreach ( $fields[ $key ] as $field_key => $default ) {
						$data[ $field_key ] = on_get_field( $field_key, $item->ID, $default );
					}
				}

				$new[ $item_key ] = $data;
			}

			$field[ $find ][ $value ] = $new;
		}
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

	// Options page for reviews
	acf_add_options_sub_page( [
		'page_title'  => 'Настройки: Отзывы',
		'menu_title'  => 'Настройки: Отзывы',
		'parent_slug' => 'edit.php?post_type=reviews',
	] );

//	acf_add_options_sub_page( [
//		'page_title' => 'Настройки партнеров',
//		'menu_title' => 'Настройки партнеров',
//		'menu_slug'  => 'partners-settings',
//		'capability' => 'edit.php?post_type=partners',
//		'redirect'   => false
//	] );
}