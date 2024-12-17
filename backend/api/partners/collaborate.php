<?php

register_rest_route( OS_API_NAMESPACE, '/template/partners/collaborate', [
	'methods'  => 'GET',
	'callback' => function () {
		return get_format_data( [
			'title' => on_get_field( 'partners_also_title', 'option' ),
			'list'  => on_get_field( 'partners_also_list', 'option', [] ),
		] );
	},

	'permission_callback' => '__return_true'
] );