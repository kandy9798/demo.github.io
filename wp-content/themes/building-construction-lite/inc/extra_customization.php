<?php 

	$construction_firm_sticky_header = get_theme_mod('construction_firm_sticky_header');

	$construction_firm_custom_style= "";

	if($construction_firm_sticky_header != true){

		$construction_firm_custom_style .='.menu_header.fixed{';

			$construction_firm_custom_style .='position: static;';
			
		$construction_firm_custom_style .='}';
	}

	$construction_firm_logo_max_height = get_theme_mod('construction_firm_logo_max_height');

	if($construction_firm_logo_max_height != false){

		$construction_firm_custom_style .='.custom-logo-link img{';

			$construction_firm_custom_style .='max-height: '.esc_html($construction_firm_logo_max_height).'px;';
			
		$construction_firm_custom_style .='}';
	}

	/*---------------------------Width -------------------*/
	
	$construction_firm_theme_width = get_theme_mod( 'construction_firm_width_options','full_width');

    if($construction_firm_theme_width == 'full_width'){

		$construction_firm_custom_style .='body{';

			$construction_firm_custom_style .='max-width: 100%;';

		$construction_firm_custom_style .='}';

	}else if($construction_firm_theme_width == 'Container'){

		$construction_firm_custom_style .='body{';

			$construction_firm_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$construction_firm_custom_style .='}';

	}else if($construction_firm_theme_width == 'container_fluid'){

		$construction_firm_custom_style .='body{';

			$construction_firm_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$construction_firm_custom_style .='}';
	}