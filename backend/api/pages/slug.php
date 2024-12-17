<?php

register_rest_route( OS_API_NAMESPACE, '/pages/(?P<slug>.+)', [
    'methods'  => 'GET',
    'callback' => function ( WP_REST_Request $request ) {
		$slug = $request->get_param( 'slug' );
		if ( ! $slug ) {
			return get_wp_error();
		}

	    $page = get_posts( [
		    'name'      => $slug,
		    'post_type' => 'page'
	    ] );

	    if ( empty( $page ) ) {
		    return get_wp_error();
	    }

	    return get_format_data( [
		    'ID'           => $page[0]->ID,
		    'title'        => $page[0]->post_title,
		    'subtitle'     => on_get_field( 'page_subtitle', $page[0]->ID, '' ),
		    'page_content' => on_get_field( 'page_content', $page[0]->ID, [] )
	    ] );
    },

    'permission_callback' => '__return_true'
] );