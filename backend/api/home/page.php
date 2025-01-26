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
				'cases'      => 'select',
				'advantages' => 'select',
				'reviews'    => 'select',
				'service'    => 'select',
			],
			[
				'cases'      => [
					'image'    => '',
					'subtitle' => '',
					'taxonomy' => 'cases_cats',
				],
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
					'case'      => '',
					'full'      => '',
				],
				'service'    => [
					'home_text' => ''
				]
			]
		);

		return get_format_data( [
			'content' => $content
		] );
	},

	'permission_callback' => '__return_true'
] );
