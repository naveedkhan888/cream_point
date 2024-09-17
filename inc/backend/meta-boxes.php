<?php
/**
 * Registering meta boxes
 *
 * Using Meta Box plugin: http://www.deluxeblogtips.com/meta-box/
 *
 * @see https://docs.metabox.io/
 *
 * @param array $meta_boxes Default meta boxes. By default, there are no meta boxes.
 *
 * @return array All registered meta boxes
 */
function creampoint_register_meta_boxes( $meta_boxes ) {
	
	// Post format's meta box
	$meta_boxes[] = array(
		'id'       => 'format_detail',
		'title'    => esc_html__( 'Format Details', 'creampoint' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => esc_html__( 'Image', 'creampoint' ),
				'id'               => 'post_image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
				// Image size that displays in the edit page. Possible sizes small,medium,large,original
    			'image_size'       => 'thumbnail',
			),
			array(
				'name'  => esc_html__( 'Gallery', 'creampoint' ),
				'id'    => 'post_gallery',
				'type'  => 'image_advanced',
				'class' => 'gallery',
				// Image size that displays in the edit page. Possible sizes small,medium,large,original
    			'image_size'       => 'thumbnail',
			),			
			array(
				'name'  => esc_html__( 'Audio', 'creampoint' ),
				'id'    => 'post_audio',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
				'desc'  => 'Example: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
			),
			array(
				'name'  => esc_html__( 'Video', 'creampoint' ),
				'id'    => 'post_video',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
				'desc'  => 'Example: https://vimeo.com/87959439',
			),
			array(
				'name'  => esc_html__( 'Background Video', 'creampoint' ),
				'id'    => 'bg_video',
				'type'  => 'image_advanced',
				'class' => 'video',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => esc_html__( 'Link', 'creampoint' ),
				'id'    => 'post_link',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'link',
			),
			array(
				'name'  => esc_html__( 'Text Link', 'creampoint' ),
				'id'    => 'text_link',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'link',
			),
			array(
				'name'  => esc_html__( 'Quote', 'creampoint' ),
				'id'    => 'post_quote',
				'type'  => 'textarea',
				'class' => 'quote',
			),
			array(
				'name'  => esc_html__( 'Quote Name', 'creampoint' ),
				'id'    => 'quote_name',
				'type'  => 'text',
				'class' => 'quote',
			)		
		),
	);

	// Page Settings
	$meta_boxes[] = array(
		'id'       => 'page-settings',
		'title'    => esc_html__( 'Page Header Settings', 'creampoint' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
            array(
                'id'        => 'page_layout',
                'name'      => esc_html__( 'Page Layout', 'creampoint' ),
                'type'      => 'image_select',
                'options'   => array(
                    'full-content'    => get_template_directory_uri() . '/inc/backend/images/full.png',
                    'content-sidebar' => get_template_directory_uri() . '/inc/backend/images/right.png',
                    'sidebar-content' => get_template_directory_uri() . '/inc/backend/images/left.png',
                ),
                'std'       => 'full-content'
            ),
            array(
                'name'             => esc_html__( 'Page Header On/Off', 'creampoint' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Page Header', 'creampoint' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
		),
	);
    
	$meta_boxes[] = array (
      	'id' => 'select-header-footer',
      	'title' => 'Header/Footer Settings',
      	'pages' =>   array ('page'),
      	'context' => 'normal',
      	'priority' => 'high',
      	'autosave' => false,
      	'fields' =>   array (  
        	array(
        		'name' 	=> 'Header Layout',
				'id' 	=> 'select_header',
				'type'  => 'post',
		    	'post_type'   => 'xp_header_builders',
		    	'field_type'  => 'select_advanced',
		    	'placeholder' => 'Select a header',
		    	'query_args'  => array(
		        	'post_status'    => 'publish',
		        	'posts_per_page' => - 1,
		        	'orderby' 		 => 'date',
		        	'order' 		 => 'ASC',
		    	),
			),
			array(
                'name'             => esc_html__( 'Header Transparent?', 'creampoint' ),
                'id'               => 'is_trans',
				'type'             => 'select',
				'options'   => array(
                    'default'   => 'Default',
                    'yes' 		=> 'Yes',
                    'no' 		=> 'No',
                ),
                'std'       => 'default'
            ),
			array(
        		'name' 	=> 'Header Mobile Layout',
				'id' 	=> 'select_header_mobile',
				'type'  => 'post',
		    	'post_type'   => 'xp_header_builders',
		    	'field_type'  => 'select_advanced',
		    	'placeholder' => 'Select a header mobile',
		    	'query_args'  => array(
		        	'post_status'    => 'publish',
		        	'posts_per_page' => - 1,
		        	'orderby' 		 => 'date',
		        	'order' 		 => 'ASC',
		    	),
			),
			array (
        		'name' 	=> 'Footer Layout',
				'id' 	=> 'select_footer',
				'type'  => 'post',
		    	'post_type'   => 'xp_footer_builders',
		    	'field_type'  => 'select_advanced',
		    	'placeholder' => 'Select a footer',
		    	'query_args'  => array(
		        	'post_status'    => 'publish',
		        	'posts_per_page' => - 1,
		        	'orderby' 		 => 'date',
		        	'order' 		 => 'ASC',
		    	),
        	),
      	),
	);

	$meta_boxes[] = array(
        'id'       => 'ppheader-settings',
        'title'    => esc_html__( 'Page Header Settings', 'creampoint' ),
        'pages'    => array( 'xp_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'name'             => esc_html__( 'Page Header On/Off', 'creampoint' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Page Header', 'creampoint' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
			),
        ),
	);
	$meta_boxes[] = array(
        'id'       => 'case-settings',
        'title'    => esc_html__( 'Project Settings', 'creampoint' ),
        'pages'    => array( 'xp_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'name'             => esc_html__( 'Carousel Image', 'creampoint' ),
                'id'               => 'slide_img',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            ),
        ),
    );

    $meta_boxes[] = array(
        'id'       => 'pthumb-settings',
        'title'    => esc_html__( 'Thumbnail Image Settings', 'creampoint' ),
        'pages'    => array( 'xp_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'id'        => 'thumb_size',
                'name'      => esc_html__( 'Select Size', 'creampoint' ),
                'type'      => 'select',
                'options'   => array(
                    'normal' 	=> 'Normal Width',
                    'double_w'    => 'Double Width',
                    'double_wh'    => 'Double Width Height',
                ),
                'std'       => 'normal'
            ),
        ),
    );

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'creampoint_register_meta_boxes' );