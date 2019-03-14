<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_topshop_options() {

	// Theme defaults
	$primary_color = '#29a6e5';
	$secondary_color = '#266ee4';
    
    $nav_bg_color = '#FFFFFF';
    $footer_bg_color = '#FFFFFF';
    
    $body_font_color = '#4F4F4F';
    $heading_font_color = '#5E5E5E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();
    
    // Stores all the panels to be added
    $panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
    $section = 'header_image';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Logo', 'topshop' ),
        'priority' => '25'
    );
    $options['topshop-header-image-logo-max-width'] = array(
        'id' => 'topshop-header-image-logo-max-width',
        'label'   => __( 'Set a max-width for the logo', 'topshop' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'This only applies if a logo image is uploaded', 'topshop' )
    );
    
    
    $panel = 'topshop-panel-layout';
    
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Layout Settings', 'topshop' ),
        'priority' => '30'
    );
    
    $section = 'topshop-panel-layout-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'topshop' ),
        'priority' => '10',
        'panel' => $panel
    );
    
    $options['topshop-show-header-top-bar'] = array(
        'id' => 'topshop-show-header-top-bar',
        'label'   => __( 'Show Top Bar', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['topshop-header-search'] = array(
        'id' => 'topshop-header-search',
        'label'   => __( 'Show Search', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['topshop-sticky-header'] = array(
        'id' => 'topshop-sticky-header',
        'label'   => __( 'Sticky Header', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $options['topshop-header-remove-acc'] = array(
        'id' => 'topshop-header-remove-acc',
        'label'   => __( 'Remove "Sign In/Account" link', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['topshop-header-remove-cart'] = array(
        'id' => 'topshop-header-remove-cart',
        'label'   => __( 'Remove WooCommerce Cart', 'topshop' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $options['topshop-upsell-layout'] = array(
        'id' => 'topshop-upsell-layout',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Enable WooCommerce Drop Down Cart/Basket<br />- Set custom website width<br />- Set custom sidebar width<br />- Change the site layout to boxed or full width<br />- Select between 3 header layouts<br />- Remove Page Titles<br />- Change WooCommerce cart icon', 'topshop' )
    );
    
    
    // Slider Settings
    $section = 'topshop-panel-layout-section-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'topshop' ),
        'priority' => '20',
        'panel' => $panel
    );
    
    $choices = array(
        'topshop-slider-default' => __( 'Default Slider', 'topshop' ),
        'topshop-meta-slider' => __( 'Meta Slider', 'topshop' ),
        'topshop-no-slider' => __( 'None', 'topshop' )
    );
    $options['topshop-slider-type'] = array(
        'id' => 'topshop-slider-type',
        'label'   => __( 'Choose a Slider', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'topshop-slider-default'
    );
    $options['topshop-slider-cats'] = array(
        'id' => 'topshop-slider-cats',
        'label'   => __( 'Slider Categories', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><br />Get the ID at <b>Posts -> Categories</b>.<br /><br />Or <a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><b>See more instructions here</b></a>', 'topshop' )
    );
    $options['topshop-meta-slider-shortcode'] = array(
        'id' => 'topshop-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'For a more advanced slider we recommend <a href="https://getdpd.com/cart/hoplink/15318?referrer=9jtzbgs34v8k4c0gs" target="_blank">Meta Slider</a><br /><br />Enter the slider shortcode here', 'topshop' )
    );
    
    $options['topshop-upsell-slider'] = array(
        'id' => 'topshop-upsell-slider',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change Slider scroll effect<br />- Link slide to single post<br />- Remove slider text<br />- Stop slider auto scroll', 'topshop' )
    );
    
    // Slider Settings
    $section = 'topshop-panel-layout-section-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog', 'topshop' ),
        'priority' => '30',
        'panel' => $panel
    );
    
    $options['topshop-blog-cats'] = array(
        'id' => 'topshop-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br /><br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.<br /><br />Get the ID at <b>Posts -> Categories</b>.', 'topshop' )
    );
    $choices = array(
        'blog-use-images-loop' => __( 'Post Images Carousel', 'topshop' ),
        'blog-use-featured-image' => __( 'Use only the featured image', 'topshop' )
    );
    $options['topshop-blog-list-image-type'] = array(
        'id' => 'topshop-blog-list-image-type',
        'label'   => __( 'Blog List Image', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-use-featured-image'
    );
    $choices = array(
        'blog-display-full-text' => __( 'Full Text', 'topshop' ),
        'blog-display-summary' => __( 'Summary', 'topshop' )
    );
    $options['topshop-article-content-display'] = array(
        'id' => 'topshop-article-content-display',
        'label'   => __( 'For each article display:', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-display-full-text'
    );
    $options['topshop-article-content-word-count'] = array(
        'id' => 'topshop-article-content-word-count',
        'label'   => __( 'Amount of words displayed', 'topshop' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 40
    );
    $options['topshop-article-content-readmore'] = array(
        'id' => 'topshop-article-content-readmore',
        'label'   => __( 'Read More Text', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '...Read More'
    );
    
    $options['topshop-upsell-blog'] = array(
        'id' => 'topshop-upsell-blog',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Select between blog side or top layouts<br />- Set Blog, Archive & Single pages to Left Sidebar<br />- Set Blog, Archive & Single pages to full width<br />- Set WooCommerce Shop, Archive & Product pages to Left Sidebar<br />- Set WooCommerce Shop, Archive & Product pages to Full Width', 'topshop' )
    );
    
    // Slider Settings
    $section = 'topshop-panel-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'topshop' ),
        'priority' => '40',
        'panel' => $panel
    );
    
    $options['topshop-upsell-footer'] = array(
        'id' => 'topshop-upsell-footer',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Premium offers 3 different footer layouts<br />- Advanced Custom Footer layout to specify columns and column widths', 'topshop' )
    );
    

	// Colors
	$section = 'topshop-styling';
    $font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Style Settings', 'topshop' ),
		'priority' => '40'
	);

    
    $options['topshop-body-font'] = array(
        'id' => 'topshop-body-font',
        'label'   => __( 'Body Font', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['topshop-body-font-color'] = array(
        'id' => 'topshop-body-font-color',
        'label'   => __( 'Body Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['topshop-heading-font'] = array(
        'id' => 'topshop-heading-font',
        'label'   => __( 'Headings Font', 'topshop' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Raleway'
    );
    $options['topshop-heading-font-color'] = array(
        'id' => 'topshop-heading-font-color',
        'label'   => __( 'Heading Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    
    $options['topshop-custom-css'] = array(
        'id' => 'topshop-custom-css',
        'label'   => __( 'Custom CSS', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'description' => __( 'Add custom CSS to your theme', 'topshop' )
    );
    
    $panel = 'topshop-panel-layout-colors';
    
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Layout Colors', 'topshop' ),
        'priority' => '40'
    );
    
    $section = 'topshop-panel-layout-colors-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'topshop' ),
        'priority' => '10',
        'panel' => $panel
    );
    
    $options['topshop-header-bg-color'] = array(
        'id' => 'topshop-header-bg-color',
        'label'   => __( 'Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['topshop-header-font-color'] = array(
        'id' => 'topshop-header-font-color',
        'label'   => __( 'Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#777777',
    );
    $options['topshop-topbar-bg-color'] = array(
        'id' => 'topshop-topbar-bg-color',
        'label'   => __( 'Top Bar Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['topshop-topbar-font-color'] = array(
        'id' => 'topshop-topbar-font-color',
        'label'   => __( 'Top Bar Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#777777',
    );
    $options['topshop-nav-color'] = array(
        'id' => 'topshop-nav-color',
        'label'   => __( 'Navigation Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $nav_bg_color,
    );
    $options['topshop-nav-font-color'] = array(
        'id' => 'topshop-nav-font-color',
        'label'   => __( 'Navigation Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#626262',
    );
    
    $section = 'topshop-panel-layout-colors-section-pages';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Page', 'topshop' ),
        'priority' => '20',
        'panel' => $panel
    );
    
    $options['topshop-sidebar-head-color'] = array(
        'id' => 'topshop-sidebar-head-color',
        'label'   => __( 'Sidebar Headings Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#4D4D4D',
    );
    
    $section = 'topshop-panel-layout-colors-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'topshop' ),
        'priority' => '20',
        'panel' => $panel
    );
    
    $options['topshop-footer-color'] = array(
        'id' => 'topshop-footer-color',
        'label'   => __( 'Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $footer_bg_color,
    );
    $options['topshop-footer-head-font-color'] = array(
        'id' => 'topshop-footer-head-font-color',
        'label'   => __( 'Heading Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#4D4D4D',
    );
    $options['topshop-footer-font-color'] = array(
        'id' => 'topshop-footer-font-color',
        'label'   => __( 'Footer Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#4F4F4F',
    );
    
    $options['topshop-footer-bottombar-bg-color'] = array(
        'id' => 'topshop-footer-bottombar-bg-color',
        'label'   => __( 'Bottom Bar Background Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $footer_bg_color,
    );
    $options['topshop-footer-bottombar-font-color'] = array(
        'id' => 'topshop-footer-bottombar-font-color',
        'label'   => __( 'Bottom Bar Font Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#777777',
    );
    
    // Colors
    $section = 'colors';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Colors', 'topshop' ),
        'priority' => '50'
    );
    
    $options['topshop-main-color'] = array(
        'id' => 'topshop-main-color',
        'label'   => __( 'Main Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
    $options['topshop-main-color-hover'] = array(
        'id' => 'topshop-main-color-hover',
        'label'   => __( 'Secondary Color', 'topshop' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $secondary_color,
    );
    
    $options['topshop-upsell-colors'] = array(
        'id' => 'topshop-upsell-colors',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />Premium offers a bunch of custom color settings to change colors for the Header, Top Bar, Navigation & Footer', 'topshop' )
    );
    
    
    // Social Settings
    $section = 'topshop-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'topshop' ),
        'priority' => '50'
    );
    
    $options['topshop-upsell-social'] = array(
        'id' => 'topshop-upsell-social',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />Premium offers over 20 different social icons to add to your site, as well as the setting to add any custom icon you may need.', 'topshop' )
    );
    
    
    // Site Text Settings
    $section = 'topshop-website';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'topshop' ),
        'priority' => '50'
    );
    
    $options['topshop-header-info-text'] = array(
        'id' => 'topshop-header-info-text',
        'label'   => __( 'Header Info Text', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Позвонить нам', 'topshop'),
        'description' => __( 'This is the text in the header', 'topshop' )
    );
    $options['topshop-website-error-head'] = array(
        'id' => 'topshop-website-error-head',
        'label'   => __( '404 Error Page Heading', 'topshop' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'topshop'),
        'description' => __( 'Enter the heading for the 404 Error page', 'topshop' )
    );
    $options['topshop-website-error-msg'] = array(
        'id' => 'topshop-website-error-msg',
        'label'   => __( 'Error 404 Message', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'topshop'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'topshop' )
    );
    $options['topshop-website-nosearch-msg'] = array(
        'id' => 'topshop-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'topshop' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'topshop'),
        'description' => __( 'Enter the default text for when no search results are found', 'topshop' )
    );
    
    $options['topshop-upsell-website'] = array(
        'id' => 'topshop-upsell-website',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change the site attribution text to your own', 'topshop' )
    );
    

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
    // Adds the panels to the $options array
    $options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_topshop_options' );
