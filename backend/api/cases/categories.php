<?php

register_rest_route( OS_API_NAMESPACE, '/cases/categories', [
	'methods'  => 'GET',
	'callback' => function () {
		return get_format_data( get_term_format_data(
			get_terms( [
				'taxonomy'   => 'cases_cats',
				'hide_empty' => false
			] )
		) );
	},

	'permission_callback' => '__return_true'
] );