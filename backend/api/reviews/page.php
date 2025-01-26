<?php

register_rest_route( OS_API_NAMESPACE, '/template/reviews', [
	'methods'  => 'GET',
	'callback' => function () {
		$reviews = get_posts( [
			'post_type'      => 'reviews',
			'posts_per_page' => - 1
		] );

		if ( ! empty( $reviews ) ) {
			foreach ( $reviews as $key => $review ) {
				$reviews[ $key ] = [
					'post_id'    => $review->ID,
					'post_title' => $review->post_title,
					'logo'       => on_get_field( 'logo', $review->ID, '' ),
					'title'      => on_get_field( 'title', $review->ID, '' ),
					'post'       => on_get_field( 'post', $review->ID, '' ),
					'full'       => on_get_field( 'full', $review->ID, '' ),
				];
			}
		}

		return get_format_data( [
			'title' => on_get_field( 'reviews_title', 'option' ),
			'list'  => $reviews,
		] );
	},

	'permission_callback' => '__return_true'
] );
