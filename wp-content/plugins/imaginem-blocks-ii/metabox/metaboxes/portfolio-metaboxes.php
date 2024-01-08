<?php
function themecore_portfolio_metadata() {
	$mtheme_sidebar_options = themecore_generate_sidebarlist("portfolio");
	
	$bg_slideshow_pages = get_posts('post_type=fullscreen&orderby=title&numberposts=-1&order=ASC');

	if ($bg_slideshow_pages) {
		$options_bgslideshow['none'] = "Not Selected";
		foreach($bg_slideshow_pages as $key => $list) {
			$custom = get_post_custom($list->ID);
			if ( isset($custom["fullscreen_type"][0]) ) { 
				$slideshow_type=$custom["fullscreen_type"][0]; 
			} else {
				$slideshow_type="";
			}
			if ($slideshow_type<>"Fullscreen-Video") {
				$options_bgslideshow[$list->ID] = $list->post_title;
			}
		}
	} else {
		$options_bgslideshow[0]="Featured pages not found.";
	}

	$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';

	$portfolio_box = array(
		'id' => 'portfoliometa-box',
		'title' => esc_html__('Portfolio Metabox','imaginem-blocks-ii'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'core',
		'fields' => array(
			array(
				'name' => esc_html__('Portfolio Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_portfolio_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Portfolio Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Portfolio Options','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Description for gallery thumbnail ( Portfolio Gallery )','imaginem-blocks-ii'),
				'id' => 'pagemeta_thumbnail_desc',
				'type' => 'textarea',
				'desc' => esc_html__('This description is displayed below each thumbnail.','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Gallery thumbnail options','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Gallery thumbnail link type','imaginem-blocks-ii'),
				'id' => 'pagemeta_thumbnail_linktype',
				'type' => 'image',
				'std' => 'Lightbox',
				'desc' => esc_html__('Link type of portfolio image in portfolio galleries.','imaginem-blocks-ii'),
				'options' => array(
					'Lightbox_DirectURL' => $mtheme_imagepath . 'portfolio-link-direct-lightbox.png',
					'Lightbox' => $mtheme_imagepath . 'portfolio-link-lightbox.png',
					'Customlink' => $mtheme_imagepath . 'portfolio-link-customlink.png',
					'DirectURL' => $mtheme_imagepath . 'portfolio-link-direct.png'
					)
				),
			array(
				'name' => esc_html__('Fill for Lightbox Video','imaginem-blocks-ii'),
				'id' => 'pagemeta_lightbox_video',
				'heading' => 'subhead',
				'class'=> 'portfoliolinktype',
				'type' => 'text',
				'desc' => esc_html__('To display a Lightbox Video. Eg: https://www.youtube.com/watch?v=D78TYCEG4 , https://vimeo.com/172881','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Fill for Custom Link','imaginem-blocks-ii'),
				'id' => 'pagemeta_customlink',
				'heading' => 'subhead',
				'class'=> 'portfoliolinktype',
				'type' => 'text',
				'desc' => esc_html__('For any link with full url','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Custom Thumbnail. (optional)','imaginem-blocks-ii'),
				'id' => 'pagemeta_customthumbnail',
				'type' => 'upload',
				'target' => 'image',
				'desc' => esc_html__('Thumbnail URL.','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Layout','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Page Style','imaginem-blocks-ii'),
				'id' => 'pagemeta_pagestyle',
				'type' => 'image',
				'std' => 'rightsidebar',
				'desc' => esc_html__('Note: Edge to Edge for Elementor Pagebuilder Layout','imaginem-blocks-ii'),
				'options' => array(
					'rightsidebar' => $mtheme_imagepath . 'page-right-sidebar.png',
					'leftsidebar' => $mtheme_imagepath . 'page-left-sidebar.png',
					'nosidebar' => $mtheme_imagepath . 'page-no-sidebar.png',
					'edge-to-edge' => $mtheme_imagepath . 'page-edge-to-edge.png')
				),
			array(
				'name' => esc_html__('Choice of Sidebar','imaginem-blocks-ii'),
				'id' => 'pagemeta_sidebar_choice',
				'type' => 'select',
				'desc' => esc_html__('For Sidebar Active Pages and Posts','imaginem-blocks-ii'),
				'options' => $mtheme_sidebar_options
				),
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_header_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_title_seperator',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Header Type','imaginem-blocks-ii'),
				'id' => 'pagemeta_header_type',
				'class' => 'condition-without-compact-style',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Header Type for Horizontal menu','imaginem-blocks-ii'),
				'options' => array(
					'auto'            => esc_attr__('Default','imaginem-blocks-ii'),
					'inverse'         => esc_attr__('Inverse Opaque','imaginem-blocks-ii'),
					'overlay'         => esc_attr__('Overlay','imaginem-blocks-ii'),
					'inverse-overlay' => esc_attr__('Inverse Overlay','imaginem-blocks-ii'),
					)
				),
			array(
				'name' => esc_html__('Switch Menu','imaginem-blocks-ii'),
				'id' => 'pagemeta_menu_choice',
				'type' => 'select',
				'desc' => esc_html__('Select a different menu for this page','imaginem-blocks-ii'),
				'options' => themecore_generate_menulist()
				),
			array(
				'name' => esc_html__('Page Title','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_title',
				'type' => 'select',
				'desc' => esc_html__('Page Title','imaginem-blocks-ii'),
				'std' => 'default',
				'options' => array(
					'default' => esc_html__('Default','imaginem-blocks-ii'),
					'show' => esc_html__('Show','imaginem-blocks-ii'),
					'hide' => esc_html__('Hide','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Instagram Footer','imaginem-blocks-ii'),
				'id' => 'pagemeta_instagram_footer',
				'type' => 'select',
				'std' => 'disable',
				'desc' => esc_html__('Enable / Disable Instagram Footer','imaginem-blocks-ii'),
				'options' => array(
					'disable' => esc_attr__('Disable','imaginem-blocks-ii'),
					'enable' => esc_attr__('Enable','imaginem-blocks-ii')
				)
			),
			array(
				'name' => esc_html__('Footer','imaginem-blocks-ii'),
				'id' => 'pagemeta_general_footer',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Enable / Disable Footer','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_attr__('Enable','imaginem-blocks-ii'),
					'disable' => esc_attr__('Disable','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Page Background','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep-page_backgrounds',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Page Color','imaginem-blocks-ii'),
				'id' => 'pagemeta_pagebackground_color',
				'type' => 'color',
				'desc' => esc_html__('Page color','imaginem-blocks-ii'),
				'std' => ''
				),
		)
);
return $portfolio_box;
}
/*
* Meta options for Portfolio post type
*/
function themecore_portfolioitem_metaoptions(){
	$portfolio_box = themecore_portfolio_metadata();
	themecore_generate_metaboxes($portfolio_box,get_the_id());
}
?>