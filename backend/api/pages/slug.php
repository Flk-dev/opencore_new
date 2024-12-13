<?php

register_rest_route( OS_API_NAMESPACE, '/pages/(?P<slug>.+)', [
    'methods'  => 'GET',
    'callback' => function ( WP_REST_Request $request ) {

    },

    'permission_callback' => '__return_true'
] );