<?php

register_rest_route( OS_API_NAMESPACE, '/we-work', [
	'methods'  => 'GET',
	'callback' => function () {
		return [
			'list'  => on_get_field( 'leader_row', 'option', [] ),
		];
	},

	'permission_callback' => '__return_true'
] );
