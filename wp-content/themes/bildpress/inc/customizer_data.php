<?php
/** 
 * bildpress Customizer data
 */
function _customizer_data( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'bildpress',
			'name' => esc_html__('BildPress Customizer','bildpress'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'bildpress' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'bildpress' ),
							'id' => 'bildpress_topbar_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),	
						array(
							'name' => esc_html__( 'Show Language', 'bildpress' ),
							'id' => 'bildpress_header_lang',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Mobile Info On/Off', 'bildpress' ),
							'id' => 'bildpress_side_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Mobile Logo On/Off', 'bildpress' ),
							'id' => 'bildpress_mobile_logo_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Sticky On/Off', 'bildpress' ),
							'id' => 'bildpress_sticky_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Preloader On/Off', 'bildpress' ),
							'id' => 'bildpress_preloader',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// topbar left
						array(
							'name' => esc_html__( 'Address', 'bildpress' ),
							'id' => 'bildpress_address',
							'default' => esc_html__('12/A, Mirnada City Tower, NYC','bildpress'),
							'type' => 'textarea',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Mail ID', 'bildpress' ),
							'id' => 'bildpress_mail_id',
							'default' => esc_html__('info@webmail.com','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Mail URL', 'bildpress' ),
							'id' => 'bildpress_mail_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Social Text
						array(
							'name' => esc_html__( 'Social Text', 'bildpress' ),
							'id' => 'bildpress_social_text',
							'default' => esc_html__('FB','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Social URL', 'bildpress' ),
							'id' => 'bildpress_social_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Comments URL', 'bildpress' ),
							'id' => 'bildpress_comments_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Phone 
						array(
							'name' => esc_html__( 'Phone Number', 'bildpress' ),
							'id' => 'bildpress_phone',
							'default' => esc_html__('+876 864 764 764','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						// Phone url
						array(
							'name' => esc_html__( 'Phone Number URL', 'bildpress' ),
							'id' => 'bildpress_phone_number_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// cta
						array(
							'name' => esc_html__( 'Header Right', 'bildpress' ),
							'id' => 'bildpress_header_right',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						// cta
						array(
							'name' => esc_html__( 'Header Search', 'bildpress' ),
							'id' => 'bildpress_header_search',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Show Button						
						array(
							'name' => esc_html__( 'Show Button', 'bildpress' ),
							'id' => 'bildpress_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'BTN Text', 'bildpress' ),
							'id' => 'bildpress_top_btn',
							'default' => esc_html__('Get Job Feeds','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Top Bar BTN Text RTL', 'bildpress' ),
							'id' => 'bildpress_top_btn_rtl',
							'default' => esc_html__('Get Job Feeds','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'BTN Link', 'bildpress' ),
							'id' => 'bildpress_top_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),


						array(
							'name' => esc_html__( 'Button Text', 'bildpress' ),
							'id' => 'bildpress_button_text',
							'default' => esc_html__('Get A Quote','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text RTL', 'bildpress' ),
							'id' => 'bildpress_button_text_rtl',
							'default' => esc_html__('Get A Quote','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'bildpress' ),
							'id' => 'bildpress_button_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						// Side Info Title
						array(
							'name' => esc_html__( 'Side Info Title', 'bildpress' ),
							'id' => 'bildpress_side_info_title',
							'default' => esc_html__('Contact Info','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
					) 
				),
				'header_social_setting'=> array(
					'name'=> esc_html__('Header Social','bildpress'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'bildpress'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'bildpress' ),
							'id' => 'bildpress_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'bildpress' ),
							'id' => 'bildpress_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'bildpress' ),
							'id' => 'bildpress_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'bildpress' ),
							'id' => 'bildpress_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'bildpress' ),
							'id' => 'bildpress_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'bildpress' ),
					'priority' => 12,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'bildpress' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => esc_html__( 'Header Style 1', 'bildpress' ),
								'header-style-2' => esc_html__( 'Header Style 2', 'bildpress' ),
								'header-style-3' => esc_html__( 'Header Style 3', 'bildpress' ),
								'header-style-4' => esc_html__( 'Header Style 4', 'bildpress' ),
								'header-style-5' => esc_html__( 'Header Style 5', 'bildpress' ),
								'header-style-6' => esc_html__( 'Header Style 6', 'bildpress' ),
							),
							'default' => 'header-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Logo', 'bildpress' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header White Logo', 'bildpress' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'bildpress' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/assets/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),							
					) 
				),	
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','bildpress'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name'=>esc_html__('Breadcrumb BG Color','bildpress'),
							'id'=>'bildpress_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','bildpress'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','bildpress'),
							'id'=>'bildpress_breadcrumb_spacing',
							'default'=> esc_html__('160px','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','bildpress'),
							'id'=>'bildpress_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'bildpress' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'bildpress' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','bildpress'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog User', 'bildpress' ),
							'id' => 'bildpress_blog_user_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Blog Date', 'bildpress' ),
							'id' => 'bildpress_blog_date_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Blog Comment', 'bildpress' ),
							'id' => 'bildpress_blog_comments_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Blog BTN', 'bildpress' ),
							'id' => 'bildpress_blog_btn_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'bildpress' ),
							'id' => 'bildpress_blog_btn',
							'default' => esc_html__('Read More','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text RTL', 'bildpress' ),
							'id' => 'bildpress_blog_btn_rtl',
							'default' => esc_html__('Read More','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),													
						array(
							'name' => esc_html__( 'Blog Title', 'bildpress' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'bildpress' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','bildpress'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'bildpress_footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','bildpress'),
					'priority'=> 16,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Footer Style', 'bildpress' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => esc_html__( 'Footer Style 1', 'bildpress' ),
								'footer-style-2' => esc_html__( 'Footer Style 2', 'bildpress' ),
							),
							'default' => 'footer-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Widget Number', 'bildpress' ),
							'id' => 'footer_widget_number',
							'type'     => 'select',
							'choices'  => array(
								'4' => esc_html__( 'Widget Number 4', 'bildpress' ),
								'3' => esc_html__( 'Widget Number 3', 'bildpress' ),
								'2' => esc_html__( 'Widget Number 2', 'bildpress' ),
							),
							'default' => '4',
							'transport'	=> 'refresh'
						),

						array(
							'name'=>esc_html__('Footer Style 2 On/Off','bildpress'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						
						array(
							'name' => esc_html__( 'Footer Background Image', 'bildpress' ),
							'id' => 'bildpress_footer_bg',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Footer Logo White', 'bildpress' ),
							'id' => 'bildpress_footer_logo',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Footer Logo Black', 'bildpress' ),
							'id' => 'bildpress_footer_logo_black',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),					
						array(
							'name'=>esc_html__('Footer BG Color','bildpress'),
							'id'=>'bildpress_footer_bg_color',
							'default'=> esc_html__('#f4f9fc','bildpress'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right','bildpress'),
							'id'=>'bildpress_copyright',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme. All Rights Reserved','bildpress'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),                                
						array(
							'name'=>esc_html__('Footer Style 2 Switch','bildpress'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 3 Switch','bildpress'),
							'id'=>'footer_style_3_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),	
						array(
							'name'=>esc_html__('Back To Top Switch','bildpress'),
							'id'=>'bildpress_back_to_top',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','bildpress'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','bildpress'),
							'id'=>'bildpress_color_option',
							'default'=> esc_html__('#ff5e14','bildpress'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Header BG Color','bildpress'),
							'id'=>'bildpress_header_bg_color',
							'default'=> esc_html__('#00235A','bildpress'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Secondary Color','bildpress'),
							'id'=>'bildpress_secondary_color',
							'default'=> esc_html__('#00235A','bildpress'),
							'transport'	=> 'refresh'  
						)													
					)
				),
				'typography_setting'=> array(
					'name'=> esc_html__('Typography Setting','bildpress'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('Google Font URL','bildpress'),
							'id'=>'bildpress_fonts_url',
							'description' => esc_html__( 'Example: Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap', 'bildpress' ),
							'default'=> esc_html__("Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body Font','bildpress'),
							'id'=>'bildpress_body_font',
							'default'=> esc_html__("'Roboto', sans-serif",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading Font','bildpress'),
							'id'=>'bildpress_heading_font',
							'default'=> esc_html__("'Exo', sans-serif",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),	

						array(
							'name'=>esc_html__('Google Font RTL URL ','bildpress'),
							'id'=>'bildpress_fonts_url_rtl',
							'description' => esc_html__( 'Example: Exo:300,400,400i,500,500i,600,700|Roboto:300,400,500,700,900', 'bildpress' ),
							'default'=> esc_html__("Exo:300,400,400i,500,500i,600,700|Roboto:300,400,500,700,900",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body RTL Font','bildpress'),
							'id'=>'bildpress_body_font_rtl',
							'default'=> esc_html__("'Exo', sans-serif",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading RTL Font','bildpress'),
							'id'=>'bildpress_heading_font_rtl',
							'default'=> esc_html__("'Roboto', sans-serif",'bildpress'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','bildpress'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','bildpress'),
							'id'=>'bildpress_error_404_text',
							'default'=> esc_html__('404','bildpress'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','bildpress'),
							'id'=>'bildpress_error_title',
							'default'=> esc_html__('Page not found','bildpress'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','bildpress'),
							'id'=>'bildpress_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','bildpress'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','bildpress'),
							'id'=>'bildpress_error_link_text',
							'default'=> esc_html__('Back To Home','bildpress'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'slug_setting'=> array(
					'name'=> esc_html__('Post Type Slug','bildpress'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Service Name','bildpress'),
							'id'=>'bildpress_sv_name',
							'default'=> esc_html__('Services','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Service Slug','bildpress'),
							'id'=>'bildpress_sv_slug',
							'default'=> esc_html__('ourservices','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),

						array(
							'name'=>esc_html__('Cases Name','bildpress'),
							'id'=>'bildpress_cases_name',
							'default'=> esc_html__('Cases','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Cases Slug','bildpress'),
							'id'=>'bildpress_cases_slug',
							'default'=> esc_html__('ourcases','bildpress'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
					)
				),
			),
		)
	);

}

add_filter('_customizer_data', '_customizer_data');