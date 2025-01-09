<?php

register_rest_route( OS_API_NAMESPACE, '/cases', [
	'methods'  => 'GET',
	'callback' => function ( WP_REST_Request $request ) {
		$page     = $request->get_param( 'page' );
		$category = $request->get_param( 'category' );

		$args = [
			'post_type'      => 'cases',
			'posts_per_page' => 10,
		];

		if ( ! empty( $category ) && $category !== 'all' ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'cases_cats',
					'terms'    => [ $category ]
				]
			];
		}

		if ( ! empty( $page ) ) {
			$args['paged'] = $page;
		}

		$cases = get_posts( $args );

		if ( ! empty( $cases ) ) {
			foreach ( $cases as $key => $item ) {
				$cases[ $key ] = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
					'post_slug'  => $item->post_name,
					'image'      => on_get_field( 'image', $item->ID ),
					'subtitle'   => on_get_field( 'subtitle', $item->ID ),
					'categories' => get_term_format_data( wp_get_post_terms( $item->ID, 'cases_cats' ) )
				];
			}
		}

		return get_format_data( $cases );
	},

	'permission_callback' => '__return_true'
] );