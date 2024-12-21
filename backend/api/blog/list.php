<?php

register_rest_route( OS_API_NAMESPACE, '/blog', [
	'methods'  => 'GET',
	'callback' => function () {
		$blog = get_posts( [
			'post_type'      => 'blog',
			'posts_per_page' => - 1
		] );

		if ( ! empty( $blog ) ) {
			foreach ( $blog as $key => $item ) {
				$blog[ $key ] = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
					'post_slug'  => $item->post_name,
					'image'      => get_field( 'image', $item->ID ),
					'time_read'  => get_field( 'time_read', $item->ID ),
					'categories' => get_term_format_data( wp_get_post_terms( $item->ID, 'blog_cats' ) )
				];
			}
		}

		return get_format_data( $blog );
	},

	'permission_callback' => '__return_true'
] );