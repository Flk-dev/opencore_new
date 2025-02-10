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

		$query     = new WP_Query( $args );
		$posts     = [];
		$max_pages = $query->max_num_pages;

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$post_id = get_the_ID();

				$posts[] = [
					'post_id'    => $post_id,
					'post_title' => get_the_title(),
					'post_slug'  => get_post_field( 'post_name', $post_id ),
					'image'      => on_get_field( 'image', $post_id ),
					'time_read'  => on_get_field( 'time_read', $post_id ),
					'categories' => get_term_format_data( wp_get_post_terms( $post_id, 'blog_cats' ) )
				];
			}
			wp_reset_postdata();
		}

		return get_format_data( [
			'posts'    => $posts,
			'max_page' => $max_pages
		] );
	},

	'permission_callback' => '__return_true'
] );