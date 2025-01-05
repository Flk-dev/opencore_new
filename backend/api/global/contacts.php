<?php

register_rest_route( OS_API_NAMESPACE, '/contacts', [
	'methods'  => 'GET',
	'callback' => function () {
		return [
			'email'          => on_get_field( 'contacts_email', 'option', '' ),
			'phone'          => on_get_field( 'contacts_phone', 'option', '' ),
			'socials_footer' => on_get_field( 'contacts_socials_footer', 'option', [] ),
			'socials_icon'   => on_get_field( 'contacts_socials_icon', 'option', [] ),
		];
	},

	'permission_callback' => '__return_true'
] );
