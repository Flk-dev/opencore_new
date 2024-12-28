<?php

register_rest_route( OS_API_NAMESPACE, '/template/home', [
    'methods'  => 'GET',
    'callback' => function () {
	    $page_id = get_option( 'page_on_front' );

        if ( empty( $page_id ) ) {
            return get_wp_error();
        }

	    $content = on_filter_post_objects(
		    on_get_field( 'content', $page_id ),
		    [
			    'advantages' => 'select',
			    'reviews'    => 'select',
		    ],
		    [
			    'advantages' => [
				    'icon'  => '',
				    'title' => '',
				    'text'  => '',
			    ],
			    'reviews'    => [
				    'logo'      => '',
				    'title'     => '',
				    'post'      => '',
				    'text_home' => '',
			    ]
		    ]
	    );

        return get_format_data( [
            'content' => $content
        ] );
    },

    'permission_callback' => '__return_true'
] );
