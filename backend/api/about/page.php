<?php

register_rest_route( OS_API_NAMESPACE, '/template/about', [
    'methods'  => 'GET',
    'callback' => function () {
        $page = get_posts( [
            'name'      => 'about',
            'post_type' => 'page'
        ] );

        if ( empty( $page ) ) {
            return get_wp_error();
        }

        $content = on_filter_post_objects(
            on_get_field( 'content', $page[0]->ID, [] ),
            [],
            []
        );

        return get_format_data( [
            'content' => $content
        ] );
    },

    'permission_callback' => '__return_true'
] );
