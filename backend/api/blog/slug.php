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

		$categories = get_term_format_data( wp_get_post_terms( $post[0]->ID, 'blog_cats' ) );

		return get_format_data( [
			'ID'         => $post[0]->ID,
			'title'      => $post[0]->post_title,
			'image'      => get_field( 'image', $post[0]->ID ) ?? '',
			'content'    => get_field( 'content', $post[0]->ID ) ?? [],
			'time_read'  => get_field( 'time_read', $post[0]->ID ) ?? '',
			'categories' => $categories
		] );
	},

	'permission_callback' => '__return_true'
] );