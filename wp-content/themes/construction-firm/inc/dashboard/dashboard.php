<?php

add_action( 'admin_menu', 'construction_firm_gettingstarted' );
function construction_firm_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Documentation', 'construction-firm'), esc_html__('Theme Documentation', 'construction-firm'), 'edit_theme_options', 'construction-firm-guide-page', 'construction_firm_guide');   
}

function construction_firm_admin_theme_style() {
   wp_enqueue_style('construction-firm-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'construction_firm_admin_theme_style');

define('CONSTRUCTION_FIRM_SUPPORT',__('https://wordpress.org/support/theme/construction-firm/','construction-firm'));
define('CONSTRUCTION_FIRM_REVIEW',__('https://wordpress.org/support/theme/construction-firm/reviews/','construction-firm'));
define('CONSTRUCTION_FIRM_LIVE_DEMO',__('https://www.ovationthemes.com/demos/construction-firm/','construction-firm'));
define('CONSTRUCTION_FIRM_BUY_PRO',__('https://www.ovationthemes.com/wordpress/construction-wordpress-theme/','construction-firm'));
define('CONSTRUCTION_FIRM_PRO_DOC',__('https://ovationthemes.com/docs/ot-construction-firm-pro-doc/','construction-firm'));

/**
 * Theme Info Page
 */
function construction_firm_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'construction-firm' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'construction-firm'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( CONSTRUCTION_FIRM_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'construction-firm'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( CONSTRUCTION_FIRM_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'construction-firm'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','construction-firm'); ?></h3>
					<p><?php esc_html_e('To setup the construction theme follow the below steps.','construction-firm'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','construction-firm'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','construction-firm'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','construction-firm'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','construction-firm'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','construction-firm'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','construction-firm'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','construction-firm'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','construction-firm'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates. >> Publish it.','construction-firm'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','construction-firm'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','construction-firm'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','construction-firm'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','construction-firm'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select post','construction-firm'); ?></p>			
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_middle_section') ); ?>" target="_blank"><?php esc_html_e('Add Services','construction-firm'); ?></a>

					<h4><?php esc_html_e('4. Setup Projects','construction-firm'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post Category >> Add New Post >> Add title, content, select post category and featured image >> Publish it.','construction-firm'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Project Settings >> Add section heading and select post category.','construction-firm'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=construction_firm_project_box_section') ); ?>" target="_blank"><?php esc_html_e('Add Projects','construction-firm'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php esc_html_e('Premium Construction Theme','construction-firm'); ?></h3>
				<img class="construction_firm_img_responsive" style="width: 100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div class="pro-links">
					<hr>
					<a class="button-primary buynow" href="<?php echo esc_url( CONSTRUCTION_FIRM_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'construction-firm'); ?></a>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( CONSTRUCTION_FIRM_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'construction-firm'); ?></a>					
					<a class="button-primary docs" href="<?php echo esc_url( CONSTRUCTION_FIRM_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'construction-firm'); ?></a>
					<hr>
				</div>
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
		</div>
	</div>

<?php }?>
