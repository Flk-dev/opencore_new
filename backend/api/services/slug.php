<?php

register_rest_route( OS_API_NAMESPACE, '/services/(?P<slug>\S+)', [
    'methods'  => 'GET',
    'callback' => function ( WP_REST_Request $request ) {
        $slug = $request->get_param( 'slug' );
        if ( empty( $slug ) ) {
            return get_wp_error();
        }

        $post = get_posts( [
            'name'           => $slug,
            'post_type'      => 'services',
            'posts_per_page' => 1
        ] );

        if ( empty( $post ) ) {
            return get_wp_error();
        }

	    $content = on_filter_post_objects(
		    on_get_field( 'content', $post[0]->ID, [] ),
		    [
			    'advatanges'   => 'select',
			    'cases'        => 'select',
			    'with_service' => function () use ( $post ) {
				    $terms = wp_get_post_terms( $post[0]->ID, 'services_cat', [ 'fields' => 'id' ] );
				    $args  = [
					    'post_type'      => 'services',
					    'posts_per_page' => 5,
					    'posts__not_in'  => $post[0]->ID
				    ];

				    if ( ! empty( $terms ) ) {
					    $args['tax_query'] = [
						    [
							    'taxonomy' => 'services_cat',
							    'terms'    => $terms
						    ]
					    ];
				    }

				    $related = get_posts( $args );

				    if ( ! empty( $related ) ) {
					    foreach ( $related as $key => $item ) {
						    $related[ $key ] = [
							    'post_id'    => $item->post_title,
							    'post_title' => $item->post_title,
							    'post_slug'  => $item->post_name,
						    ];
					    }
				    }

				    return $related;
			    }
		    ],
		    [
			    'advatanges' => [
				    'icon'  => '',
				    'title' => '',
				    'text'  => ''
			    ],
			    'cases'      => [
				    'image'    => '',
				    'subtitle' => '',
				    'taxonomy' => 'cases_cats',
			    ]
		    ]
	    );

	    return get_format_data( [
		    'post_id'    => $post[0]->ID,
		    'post_title' => $post[0]->post_title,
		    'subtitle'   => on_get_field( 'subtitle', $post[0]->ID ),
		    'full_text'  => on_get_field( 'full_text', $post[0]->ID ),
		    'video'      => [
			    'preview' => on_get_field( 'preview', $post[0]->ID ),
			    'link'    => on_get_field( 'link', $post[0]->ID ),
		    ],
		    'categories' => get_term_format_data( wp_get_post_terms( $post[0]->ID, 'services_cat' ) ),
		    'content'    => $content
	    ] );
    },

    'permission_callback' => '__return_true'
] );