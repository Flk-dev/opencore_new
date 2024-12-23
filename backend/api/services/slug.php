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

        $categories = get_term_format_data( wp_get_post_terms( $post[0]->ID, 'services_cats' ) );

        return get_format_data( [
            'post_id'    => $post[0]->ID,
            'post_title' => $post[0]->post_title,
            'categories' => $categories,
            'content'    => on_get_field( 'content', $post[0]->ID, [] )
        ] );
    },

    'permission_callback' => '__return_true'
] );