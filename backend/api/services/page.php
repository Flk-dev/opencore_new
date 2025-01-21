<?php

register_rest_route( OS_API_NAMESPACE, '/services', [
	'methods'  => 'GET',
	'callback' => function () {
		$types = get_term_format_data( get_terms( [
			'taxonomy'   => 'services_type',
			'hide_empty' => true
		] ) );

		$categories = get_terms( [
			'taxonomy'   => 'services_cat',
			'hide_empty' => true
		] );

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $key => $category ) {
				$posts = get_posts( [
					'post_type'      => 'services',
					'posts_per_page' => - 1,
					'tax_query'      => [
						[
							'taxonomy' => 'services_cat',
							'terms'    => [ $category->term_id ]
						]
					]
				] );

				if ( ! empty( $posts ) ) {
					foreach ( $posts as $post_key => $post ) {
						$posts[ $post_key ] = [
							'post_id'    => $post->ID,
							'post_title' => $post->post_title,
							'post_slug'  => $post->post_name,
							'is_fire'    => on_get_field( 'is_fire', $post->ID, false ),
						];
					}
				}

				$categories[ $key ] = [
					'term_id'     => $category->term_id,
					'name'        => $category->name,
					'description' => $category->description,
					'posts'       => $posts
				];
			}
		}

		return get_format_data( [
			'title'      => on_get_field( 'services_title', 'option' ),
			'subtitle'   => on_get_field( 'services_subtitle', 'option' ),
			'video'      => [
				'preview' => on_get_field( 'services_video_preview', 'option' ),
				'link'    => on_get_field( 'services_video_link', 'option' ),
			],
			'types'      => $types,
			'categories' => $categories
		] );

//		$services = get_posts( [
//			'post_type'      => 'services',
//			'posts_per_page' => - 1
//		] );
//
//		if ( ! empty( $services ) ) {
//			foreach ( $services as $key => $item ) {
//				$services[ $key ] = [
//					'post_id'    => $item->ID,
//					'post_title' => $item->post_title,
//					'post_slug'  => $item->post_name,
//					'text'       => on_get_field( 'mini_text', $item->ID ),
//					'list'       => get_field( 'mini_list', $item->ID ),
//				];
//			}
//		}
//
//		return get_format_data( [
//			'title'      => on_get_field( 'services_title', 'option' ),
//			'subtitle'   => on_get_field( 'services_subtitle', 'option' ),
//			'video'      => [
//				'preview' => on_get_field( 'services_video_preview', 'option' ),
//				'link'    => on_get_field( 'services_video_link', 'option' ),
//			],
//			'categories' => get_term_format_data( get_terms( [
//				'taxonomy'   => 'services_cat',
//				'hide_empty' => false
//			] ) ),
//			'list'       => $services,
//		] );
	},

	'permission_callback' => '__return_true'
] );