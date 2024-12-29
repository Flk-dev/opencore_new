<?php

register_rest_route( OS_API_NAMESPACE, '/template/methodology', [
    'methods'  => 'GET',
    'callback' => function () {
        $page = get_posts( [
            'name'      => 'methodology',
            'post_type' => 'page'
        ] );

        if ( empty( $page ) ) {
            return get_wp_error();
        }

        $content = on_filter_post_objects(
            on_get_field( 'content', $page[0]->ID ),
            [
                'cases' => 'select',
            ],
            [
	            'cases'    => [
		            'image'    => '',
		            'subtitle'  => '',
		            'taxonomy' => 'cases_cats',
	            ]
            ]
        );

        return get_format_data( [
            'content' => $content
        ] );
    },

    'permission_callback' => '__return_true'
] );
