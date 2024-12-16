<?php

register_rest_route( OS_API_NAMESPACE, '/template/partners', [
	'methods'  => 'GET',
	'callback' => function () {
		$partners = get_posts( [
			'post_type' => 'partners',
			'posts_per_page' - 1
		] );

		if ( ! empty( $partners ) ) {
			foreach ( $partners as $key => $partner ) {
				$partners[ $key ] = [
					'ID'          => $partner->ID,
					'slug'        => $partner->post_name,
					'title'       => $partner->post_title,
					'description' => get_field( 'short_description', $partner->ID ) ?? '',
				];
			}
		}

		return get_format_data( [
			'list' => $partners
		] );
	},

	'permission_callback' => '__return_true'
] );
