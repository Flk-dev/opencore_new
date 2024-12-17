<?php

register_rest_route( OS_API_NAMESPACE, '/template/partners', [
	'methods'  => 'GET',
	'callback' => function () {
		$partners = get_posts( [
			'post_type'      => 'partners',
			'posts_per_page' => - 1
		] );

		if ( ! empty( $partners ) ) {
			foreach ( $partners as $key => $partner ) {
				$partners[ $key ] = [
					'ID'          => $partner->ID,
					'slug'        => $partner->post_name,
					'title'       => $partner->post_title,
					'description' => on_get_field( 'short_description', $partner->ID ),
					'categories'  => get_term_format_data(
						wp_get_post_terms( $partner->ID, 'partners_cats' )
					)
				];
			}
		}

		return get_format_data( [
			'title' => on_get_field( 'partners_title', 'option' ),
			'list'  => $partners,
		] );
	},

	'permission_callback' => '__return_true'
] );
