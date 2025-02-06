<?php

register_rest_route( OS_API_NAMESPACE, '/cases/(?P<slug>\S+)', [
    'methods'  => 'GET',
    'callback' => function ( WP_REST_Request $request ) {
	    $slug = $request->get_param( 'slug' );
	    if ( empty( $slug ) ) {
		    return get_wp_error();
	    }

	    global $post;

	    $get = get_posts( [
		    'name'           => $slug,
		    'post_type'      => 'cases',
		    'posts_per_page' => 1
	    ] );

	    if ( empty( $get ) ) {
		    return get_wp_error();
	    }

	    $post = $get[0];

	    $categories = get_term_format_data( wp_get_post_terms( $get[0]->ID, 'cases_cats' ) );

	    $get_next_post = get_adjacent_post( false, '', true );
	    $next_case     = [];

	    if ( ! empty( $get_next_post ) ){
		    $next_case = [
		    	'image' => on_get_field( 'image', $get_next_post->ID, '' ),
		    	'title' => $get_next_post->post_title,
			    'link'  => $get_next_post->post_name,
		    ];
	    }

	    return get_format_data( [
		    'post_id'    => $get[0]->ID,
		    'post_title' => $get[0]->post_title,
		    'categories' => $categories,
		    'content'    => on_get_field( 'content', $get[0]->ID, [] ),
		    'next'       => $next_case
	    ] );
    },

    'permission_callback' => '__return_true'
] );