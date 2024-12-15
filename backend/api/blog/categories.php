<?php

register_rest_route( OS_API_NAMESPACE, '/blog/categories', [
	'methods'  => 'GET',
	'callback' => function ( $request ) {
		$categories = get_terms( [
			'taxonomy'   => 'blog_cats',
			'hide_empty' => false
		] );

		if ( empty( $categories ) ) {
			return [];
		}

		return $categories;
	},

	'permission_callback' => '__return_true'
] );