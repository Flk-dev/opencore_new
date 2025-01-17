<?php

register_rest_route( OS_API_NAMESPACE, '/blog', [
	'methods'  => 'GET',
	'callback' => function ( WP_REST_Request $request ) {
        $page     = $request->get_param( 'page' );
        $category = $request->get_param( 'category' );

        $args = [
            'post_type'      => 'blog',
            'posts_per_page' => 8,
        ];

        if ( ! empty( $category ) && $category !== 'all' ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'blog_cats',
                    'terms'    => [ $category ]
                ]
            ];
        }

        if ( ! empty( $page ) ) {
            $args['paged'] = $page;
        }

		$blog = get_posts( $args );

		if ( ! empty( $blog ) ) {
			foreach ( $blog as $key => $item ) {
				$blog[ $key ] = [
					'post_id'    => $item->ID,
					'post_title' => $item->post_title,
					'post_slug'  => $item->post_name,
					'image'      => on_get_field( 'image', $item->ID ),
					'time_read'  => on_get_field( 'time_read', $item->ID ),
					'categories' => get_term_format_data( wp_get_post_terms( $item->ID, 'blog_cats' ) )
				];
			}
		}

		return get_format_data( $blog );
	},

	'permission_callback' => '__return_true'
] );