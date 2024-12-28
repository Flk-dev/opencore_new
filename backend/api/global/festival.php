<?php

register_rest_route( OS_API_NAMESPACE, '/festival', [
	'methods'  => 'GET',
	'callback' => function () {
		return [
			'title' => on_get_field( 'awards_title', 'option', '' ),
			'logo'  => on_get_field( 'awards_logo', 'option', '' ),
			'list'  => on_get_field( 'awards_row', 'option', [] ),
		];
	},

	'permission_callback' => '__return_true'
] );
