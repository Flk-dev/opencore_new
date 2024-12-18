<?php

register_rest_route( OS_API_NAMESPACE, '/partners/(?P<slug>\S+)', [
    'methods'  => 'GET',
    'callback' => function ( WP_REST_Request $request ) {
        $slug = $request->get_param( 'slug' );
        if ( empty( $slug ) ) {
            return get_wp_error();
        }

        $post = get_posts( [
            'name'           => $slug,
            'post_type'      => 'partners',
            'posts_per_page' => 1
        ] );

        if ( empty( $post ) ) {
            return get_wp_error();
        }

	    $content = on_get_field( 'content', $post[0]->ID, [] );
	    $content = on_filter_post_objects(
		    $content,
		    [ 'speakers' => 'select' ],
		    [
			    'image'      => '',
			    'post'       => '',
			    'experience' => ''
		    ]
	    );

        $categories = get_term_format_data( wp_get_post_terms( $post[0]->ID, 'partners_cats' ) );

	    return get_format_data( [
		    'ID'         => $post[0]->ID,
		    'title'      => $post[0]->post_title,
		    'content'    => $content,
		    'subtitle'   => on_get_field( 'subtitle', $post[0]->ID ),
		    'categories' => $categories
	    ] );
    },

    'permission_callback' => '__return_true'
] );