<?php


define( 'OS_API_NAMESPACE', 'opencore/v1' );

function dd( $array ) {
	echo '<pre>';
	var_dump( $array );
	echo '</pre>';
}

add_action( 'rest_api_init', function () {
	//require_once __DIR__ . '/api/blog/list.php';
	require_once __DIR__ . '/api/pages/slug.php';
} );