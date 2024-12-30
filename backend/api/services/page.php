<?php

register_rest_route( OS_API_NAMESPACE, '/services', [
	'methods'  => 'GET',
	'callback' => function () {
		$services = get_posts( [
			'post_type'      => 'services',
			'posts_per_page' => - 1
		] );

		if ( ! empty( $services ) ) {
			foreach ( $services as $key => $item ) {
				$services[ $key ] = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
					'post_slug'  => $item->post_name,
					'text'       => on_get_field( 'mini_text', $item->ID ),
					'list'       => get_field( 'mini_list', $item->ID ),
				];
			}
		}

		return get_format_data( [
			'title'      => on_get_field( 'services_title', 'option' ),
			'subtitle'   => on_get_field( 'services_subtitle', 'option' ),
			'video'      => [
				'preview' => on_get_field( 'services_video_preview', 'option' ),
				'link'    => on_get_field( 'services_video_link', 'option' ),
			],
			'categories' => get_term_format_data( get_terms( [
				'taxonomy'   => 'services_cat',
				'hide_empty' => false
			] ) ),
			'list'       => $services,
		] );
	},

	'permission_callback' => '__return_true'
] );