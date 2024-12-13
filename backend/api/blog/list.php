<?php

register_rest_route( OS_API_NAMESPACE, '/blog', [
	'methods'  => 'GET',
	'callback' => function ( $request ) {
		$posts = get_posts( [
			'post_type'      => 'blog',
			'posts_per_page' => - 1
		] );

		return $posts;
	},

	'permission_callback' => '__return_true'
] );