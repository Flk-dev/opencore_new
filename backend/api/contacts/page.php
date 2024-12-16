<?php

register_rest_route( OS_API_NAMESPACE, '/template/contacts', [
	'methods'  => 'GET',
	'callback' => function () {
		return get_format_data( [
			'video'          => [
				'preview' => get_field( 'contacts_video_preview', 'option' ) ?? '',
				'link'    => get_field( 'contacts_video_link', 'option' ) ?? '',
			],
			'hello_text'     => get_field( 'contacts_hello_text', 'option' ) ?? '',
			'socials_direct' => get_field( 'contacts_socials_direct', 'option' ) ?? [],
			'socials'        => get_field( 'contacts_socials', 'option' ) ?? [],
			'addresses'      => get_field( 'contacts_address', 'option' ) ?? [],
		] );
	},

	'permission_callback' => '__return_true'
] );
