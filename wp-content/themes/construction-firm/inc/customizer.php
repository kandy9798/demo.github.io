<?php
/**
 * Construction Firm: Customizer
 *
 * @subpackage Construction Firm
 * @since 1.0
 */

function construction_firm_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Construction_Firm_Toggle_Control' );

	$wp_customize->add_section( 'construction_firm_typography_settings', array(
		'title'       => __( 'Typography', 'construction-firm' ),
		'priority'       => 24,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);


	$wp_customize->add_setting( 'construction_firm_headings_text', array(
		'sanitize_callback' => 'construction_firm_sanitize_fonts',
	));
	$wp_customize->add_control( 'construction_firm_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'construction-firm'),
		'section' => 'construction_firm_typography_settings',
		'choices' => $font_choices		
	));

	$wp_customize->add_setting( 'construction_firm_body_text', array(
		'sanitize_callback' => 'construction_firm_sanitize_fonts'
	));
	$wp_customize->add_control( 'construction_firm_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'construction-firm' ),
		'section' => 'construction_firm_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('construction_firm_pro', array(
        'title'    => __('UPGRADE CONSTRUCTION PREMIUM', 'construction-firm'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('construction_firm_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Construction_Firm_Pro_Control($wp_customize, 'construction_firm_pro', array(
        'label'    => __('CONSTRUCTION PREMIUM', 'construction-firm'),
        'section'  => 'construction_firm_pro',
        'settings' => 'construction_firm_pro',
        'priority' => 1,
    )));

    // Theme General Settings
    $wp_customize->add_section('construction_firm_theme_settings',array(
        'title' => __('Theme General Settings', 'construction-firm'),
    ) );

    $wp_customize->add_setting( 'construction_firm_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'construction-firm' ),
		'section'     => 'construction_firm_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_sticky_header',
	) ) );

    $wp_customize->add_setting( 'construction_firm_theme_loader', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'construction-firm' ),
		'section'     => 'construction_firm_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_theme_loader',
	) ) );

	//theme width

	$wp_customize->add_section('construction_firm_theme_width_settings',array(
        'title' => __('Theme Width Option', 'construction-firm'),
    ) );

	$wp_customize->add_setting('construction_firm_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'construction_firm_sanitize_choices'
	));
	$wp_customize->add_control('construction_firm_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','construction-firm'),
        'section' => 'construction_firm_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','construction-firm'),
            'Container' => __('Container','construction-firm'),
            'container_fluid' => __('Container Fluid','construction-firm'),
        ),
	) );

	// Post Layouts
    $wp_customize->add_section('construction_firm_layout',array(
        'title' => __('Post Layout', 'construction-firm'),
        'description' => __( 'Change the post layout from below options', 'construction-firm' ),
    ) );

	$wp_customize->add_setting( 'construction_firm_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'construction-firm' ),
		'section'     => 'construction_firm_layout',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'construction_firm_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'construction-firm' ),
		'section'     => 'construction_firm_layout',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('construction_firm_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'construction_firm_sanitize_select'
	));
	$wp_customize->add_control('construction_firm_post_option',array(
		'label' => esc_html__('Select Layout','construction-firm'),
		'section' => 'construction_firm_layout',
		'setting' => 'construction_firm_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','construction-firm'),
            'grid_post' => __('Grid Post','construction-firm'),
        ),
	));

    $wp_customize->add_setting('construction_firm_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'construction_firm_sanitize_select'
	));
	$wp_customize->add_control('construction_firm_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','construction-firm'),
		'section' => 'construction_firm_layout',
		'setting' => 'construction_firm_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','construction-firm'),
            '2_column' => __('2','construction-firm'),
            '3_column' => __('3','construction-firm'),
            '4_column' => __('4','construction-firm'),
            '5_column' => __('6','construction-firm'),
        ),
	));

	$wp_customize->add_setting( 'construction_firm_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_date', array(
		'label'       => esc_html__( 'Hide Date', 'construction-firm' ),
		'section'     => 'construction_firm_layout',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_date',
	) ) );

	$wp_customize->add_setting( 'construction_firm_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'construction-firm' ),
		'section'     => 'construction_firm_layout',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_admin',
	) ) );

	$wp_customize->add_setting( 'construction_firm_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'construction-firm' ),
		'section'     => 'construction_firm_layout',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_comment',
	) ) );

	// Top Header
    $wp_customize->add_section('construction_firm_top',array(
        'title' => __('Contact info', 'construction-firm'),
        'description' => __( 'Add contact info in the below feilds', 'construction-firm' ),
    ) );
    
    $wp_customize->add_setting('construction_firm_top_content',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_top_content',array(
		'label' => esc_html__('Add Top Bar Text','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_top_content',
		'type'    => 'text'
	));

	$wp_customize->add_setting('construction_firm_timing_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_timing_text',array(
		'label' => esc_html__('Add Text','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_timing_text',
		'type'    => 'text'
	));
    
	$wp_customize->add_setting('construction_firm_timing',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_timing',array(
		'label' => esc_html__('Add Timing','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_timing',
		'type'    => 'text'
	));

	$wp_customize->add_setting('construction_firm_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_call_text',array(
		'label' => esc_html__('Add Text','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_call_text',
		'type'    => 'text'
	));
    
	$wp_customize->add_setting('construction_firm_call',array(
		'default' => '',
		'sanitize_callback' => 'construction_firm_sanitize_phone_number'
	)); 
	$wp_customize->add_control('construction_firm_call',array(
		'label' => esc_html__('Add Phone Number','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_call',
		'type'    => 'text'
	));

    $wp_customize->add_setting('construction_firm_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_email_text',array(
		'label' => esc_html__('Add Text','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_email_text',
		'type'    => 'text'
	));

	$wp_customize->add_setting('construction_firm_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	)); 
	$wp_customize->add_control('construction_firm_email',array(
		'label' => esc_html__('Add Email Address','construction-firm'),
		'section' => 'construction_firm_top',
		'setting' => 'construction_firm_email',
		'type'    => 'text'
	));

	// Social Media
    $wp_customize->add_section('construction_firm_urls',array(
        'title' => __('Social Media', 'construction-firm'),
        'description' => __( 'Add social media links in the below feilds', 'construction-firm' ),
    ) );
    
	$wp_customize->add_setting('construction_firm_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('construction_firm_facebook',array(
		'label' => esc_html__('Facebook URL','construction-firm'),
		'section' => 'construction_firm_urls',
		'setting' => 'construction_firm_facebook',
		'type'    => 'url'
	));

	$wp_customize->add_setting('construction_firm_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('construction_firm_twitter',array(
		'label' => esc_html__('Twitter URL','construction-firm'),
		'section' => 'construction_firm_urls',
		'setting' => 'construction_firm_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting('construction_firm_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('construction_firm_youtube',array(
		'label' => esc_html__('Youtube URL','construction-firm'),
		'section' => 'construction_firm_urls',
		'setting' => 'construction_firm_youtube',
		'type'    => 'url'
	));

	$wp_customize->add_setting('construction_firm_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('construction_firm_instagram',array(
		'label' => esc_html__('Instagram URL','construction-firm'),
		'section' => 'construction_firm_urls',
		'setting' => 'construction_firm_instagram',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'construction_firm_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'construction-firm' ),
    	'description' => __( 'Image Dimension ( 1400 x 650 ) px', 'construction-firm' ),
		'priority'   => null,
	) );

	$wp_customize->add_setting( 'construction_firm_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_firm_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Firm_Toggle_Control( $wp_customize, 'construction_firm_slider_arrows', array(
		'label'       => esc_html__( 'Check to show slider', 'construction-firm' ),
		'section'     => 'construction_firm_slider_section',
		'type'        => 'toggle',
		'settings'    => 'construction_firm_slider_arrows',
	) ) );

	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','construction-firm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('construction_firm_post_setting'.$i,array(
			'sanitize_callback' => 'construction_firm_sanitize_choices',
		));
		$wp_customize->add_control('construction_firm_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','construction-firm'),
			'section' => 'construction_firm_slider_section',
		));
	}
	wp_reset_postdata();

	//Middle Section
	$wp_customize->add_section( 'construction_firm_middle_section' , array(
    	'title'      => __( 'Services Settings', 'construction-firm' ),
		'priority'   => null,
	) );
	
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$s = 0;	
	$pst_sls[]= __('Select','construction-firm');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 4; $s++ ) {
		$wp_customize->add_setting('construction_firm_middle_sec_settigs'.$s,array(
			'sanitize_callback' => 'construction_firm_sanitize_choices',
		));
		$wp_customize->add_control('construction_firm_middle_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','construction-firm'),
			'section' => 'construction_firm_middle_section',
		));
	}
	wp_reset_postdata();

	// Project Section
	$wp_customize->add_section( 'construction_firm_project_box_section' , array(
    	'title'      => __( 'Project Settings', 'construction-firm' ),
		'priority'   => null,
	) );

	$wp_customize->add_setting('construction_firm_project_section_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('construction_firm_project_section_title',array(
		'label' => esc_html__('Section Second Title','construction-firm'),
		'section' => 'construction_firm_project_box_section',
		'setting' => 'construction_firm_project_section_title',
		'type'    => 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('construction_firm_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'construction_firm_sanitize_select',
	));
	$wp_customize->add_control('construction_firm_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','construction-firm'),
		'section' => 'construction_firm_project_box_section',
	));
    
	//Footer
    $wp_customize->add_section( 'construction_firm_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'construction-firm' ),
	) );

    $wp_customize->add_setting('construction_firm_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('construction_firm_footer_text',array(
		'label'	=> esc_html__('Copyright Text','construction-firm'),
		'section'	=> 'construction_firm_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'construction_firm_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'construction_firm_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'construction_firm_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'construction_firm_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'construction-firm' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'construction-firm' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'construction_firm_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'construction_firm_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'construction_firm_customize_register' );

function construction_firm_customize_partial_blogname() {
	bloginfo( 'name' );
}
function construction_firm_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function construction_firm_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function construction_firm_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('CONSTRUCTION_FIRM_PRO_LINK',__('https://www.ovationthemes.com/wordpress/construction-wordpress-theme/','construction-firm'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Construction_Firm_Pro_Control')):
    class Construction_Firm_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( CONSTRUCTION_FIRM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CONSTRUCTION PREMIUM','construction-firm');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="construction_firm_img_responsive " src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('CONSTRUCTION PREMIUM - Features', 'construction-firm'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'construction-firm');?> </li>
                    <li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'construction-firm');?> </li>
                   	<li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'construction-firm');?> </li>
                   	<li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'construction-firm');?> </li>
                   	<li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'construction-firm');?> </li>
                   	<li class="upsell-construction_firm"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'construction-firm');?> </li>                    
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( CONSTRUCTION_FIRM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CONSTRUCTION PREMIUM','construction-firm');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'construction-firm'), '<a target="blank" href="https://wordpress.org/support/theme/construction-firm/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;