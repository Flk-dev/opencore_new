<?php

register_rest_route( OS_API_NAMESPACE, '/menu/header', [
	'methods'  => 'GET',
	'callback' => function () {
		$menu = wp_get_nav_menu_items( 'header' );
		if ( empty( $menu ) ) {
			return get_wp_error();
		}

		foreach ( $menu as $key => $item ) {
			$menu[ $key ] = [
				'id'      => $item->ID,
				'title'   => $item->title,
				'content' => $item->post_content,
				'url'     => $item->url,
			];
		}

		return get_format_data( [
			'menu' => $menu
		] );
	},

	'permission_callback' => '__return_true'
] );
