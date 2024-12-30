<?php

register_rest_route( OS_API_NAMESPACE, '/cases', [
	'methods'  => 'GET',
	'callback' => function () {
		$cases = get_posts( [
			'post_type'      => 'cases',
			'posts_per_page' => - 1
		] );

		if ( ! empty( $cases ) ) {
			foreach ( $cases as $key => $item ) {
				$cases[ $key ] = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
					'post_slug'  => $item->post_name,
					'image'      => on_get_field( 'image', $item->ID ),
					'subtitle'  => on_get_field( 'subtitle', $item->ID ),
					'categories' => get_term_format_data( wp_get_post_terms( $item->ID, 'cases_cats' ) )
				];
			}
		}

		return get_format_data( [
			'categories' => get_term_format_data(
				get_terms( [
					'taxonomy'   => 'cases_cats',
					'hide_empty' => false
				] )
			),
			'list'       => $cases
		] );
	},

	'permission_callback' => '__return_true'
] );