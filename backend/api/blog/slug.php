<?php

register_rest_route( OS_API_NAMESPACE, '/blog/(?P<slug>\S+)', [
	'methods'  => 'GET',
	'callback' => function ( WP_REST_Request $request ) {
		$slug = $request->get_param( 'slug' );
		if ( empty( $slug ) ) {
			return get_wp_error();
		}

		$post = get_posts( [
			'name'           => $slug,
			'post_type'      => 'blog',
			'posts_per_page' => 1
		] );

		if ( empty( $post ) ) {
			return get_wp_error();
		}

		$content = on_filter_post_objects(
			on_get_field( 'content', $post[0]->ID, [] ),
			[
				'cases'    => 'select'
			],
			[
				'cases'    => [
					'image'    => '',
					'subtitle'  => '',
					'taxonomy' => 'cases_cats',
				]
			]
		);

		return get_format_data( [
			'ID'         => $post[0]->ID,
			'title'      => $post[0]->post_title,
			'image'      => on_get_field( 'image', $post[0]->ID ),
			'content'    => $content,
			'time_read'  => on_get_field( 'time_read', $post[0]->ID ),
			'categories' => get_term_format_data( wp_get_post_terms( $post[0]->ID, 'blog_cats' ) )
		] );
	},

	'permission_callback' => '__return_true'
] );