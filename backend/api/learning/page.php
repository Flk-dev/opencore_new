<?php

register_rest_route( OS_API_NAMESPACE, '/template/learning', [
	'methods'  => 'GET',
	'callback' => function () {
		$page = get_posts( [
			'name'      => 'learning',
			'post_type' => 'page'
		] );

		if ( empty( $page ) ) {
			return get_wp_error();
		}

		$content = on_filter_post_objects(
			on_get_field( 'content', $page[0]->ID ),
			[
				'teachers' => 'select',
			],
			[
				'teachers' => [
					'image'    => '',
					'subtitle' => '',
					'post'     => '',
				],
			]
		);

		return get_format_data( [
			'content' => $content
		] );
	},

	'permission_callback' => '__return_true'
] );
