<?php

register_rest_route( OS_API_NAMESPACE, '/we-work', [
	'methods'  => 'GET',
	'callback' => function () {
		$terms = get_terms( [
			'taxonomy'   => 'leaders_cat',
			'hide_empty' => true,
		] );

		$data = [];

		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$posts = get_posts( [
					'post_type'      => 'leaders',
					'posts_per_page' => - 1,
					'tax_query'      => [
						[
							'taxonomy' => 'leaders_cat',
							'terms'    => [ $term->term_id ]
						]
					]
				] );

				if ( ! empty( $posts ) ) {
					foreach ( $posts as $key => $post ) {
						$posts[ $key ] = [
							'post_id'    => $post->ID,
							'post_title' => $post->post_title
						];
					}
				}

				if ( empty( $posts ) ) {
					continue;
				}

				$data[ $term->term_id ] = [
					'name'  => $term->name,
					'posts' => $posts
				];
			}
		}

		return [
			'list' => on_get_field( 'leader_row', 'option', [] ),
			'data' => $data
		];
	},

	'permission_callback' => '__return_true'
] );
