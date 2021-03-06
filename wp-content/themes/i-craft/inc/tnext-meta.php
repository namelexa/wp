<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'icraft_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function icraft_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'icraft_';
	
	$icraft_template_url = get_template_directory_uri();

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'heading',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Page Heading Options', 'i-craft' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Hide Title
			array(
				'name' => __( 'Hide Title', 'i-craft' ),
				'id'   => "{$prefix}hidetitle",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'hide-ttl',
			),
			array(
				'name' => __( 'Show Default i-craft Slider', 'i-craft' ),
				'id'   => "{$prefix}show_slider",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'show-slider',
			),			
					
			// Custom Title
			array(
				// Field name - Will be used as label
				'name'  => __( 'Custom title', 'i-craft' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}customtitle",
				// Field description (optional)
				'desc'  => __( 'Enter custom title for the page', 'i-craft' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'i-craft' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),
			
			// hide breadcrum
			array(
				'name' => __( 'Hide breadcrumb', 'i-craft' ),
				'id'   => "{$prefix}hide_breadcrumb",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),
			
			// Custom Title
			array(
				// Field name - Will be used as label
				'name'  => __( 'Other Slider Plugin Shortcode', 'i-craft' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}other_slider",
				// Field description (optional)
				'desc'  => __( 'Enter a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'i-craft' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => __( '', 'i-craft' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),			
			

		)
	);
	
	
	
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'portfoliometa',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Portfolio Meta', 'i-craft' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Side bar

			// ITEM DETAILS OPTIONS SECTION
			array(
				'type' => 'heading',
				'name' => __( 'Portfolio Additinal Details', 'i-craft' ),
				'id'   => 'fake_id_pf1', // Not used but needed for plugin
			),
			// Slide duration
			array(
				'name'  => __( 'Subtitle', 'i-craft' ),
				'id'    => "{$prefix}portfolio_subtitle",
				'desc'  => __( 'Enter a subtitle for use within the portfolio item index (optional).', 'i-craft' ),				
				'type'  => 'text',
			),
			
			array(
				'name'  => __( 'Portfolio Link(External)', 'i-craft' ),
				'id'    => "{$prefix}portfolio_url",
				'desc'  => __( 'Enter an external link for the item (optional) (NOTE: INCLUDE HTTP://).', 'i-craft' ),				
				'type'  => 'text',
			),
		)
	);		
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'miscellaneous',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Miscellaneous Meta', 'i-craft' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page', 'portfolio', 'team', 'product' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'low',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			/*
			// Show Alternate main navigation
			array(
				'name' => __( 'Show Alternate Main Navigation', 'i-craft' ),
				'id'   => "{$prefix}alt_navigation",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Turn on the alternate main navigation', 'i-craft'),
			),
			*/
			
			// Remove top and bottom page padding/margin
			array(
				'name' => __( 'Remove Top and Bottom Padding/Margin', 'i-craft' ),
				'id'   => "{$prefix}page_nopad",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Remove the spaces/padding from top and bottom of the page/post', 'i-craft'),
			),							
			
			// additional page class			
			array(
				'name'  => __( 'Additional Page Class', 'i-craft' ),
				'id'    => "{$prefix}page_class",
				'type'  => 'text',
				'std'   => __( '', 'i-craft' ),
				'desc' => __('Enter an additional page class, will be added to body. "hide-page-header" for no header, "boxed" for boxed page for wide layout.', 'i-craft'),
			),
						
		)
	);			
		
	
	return $meta_boxes;
}

	function nx_get_category_list_key_array($category_name) {
			
		$get_category = get_categories( array( 'taxonomy' => $category_name	));
		$category_list = array( 'all' => 'Select Category');
		
		foreach( $get_category as $category ){
			if (isset($category->slug)) {
			$category_list[$category->slug] = $category->cat_name;
			}
		}
			
		return $category_list;
	}	

