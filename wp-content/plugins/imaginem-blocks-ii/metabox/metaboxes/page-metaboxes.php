<?php
function themecore_page_metadata() {
	$mtheme_sidebar_options = themecore_generate_sidebarlist('page');

	$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';

	$mtheme_common_page_box = array(
		'id' => 'common-pagemeta-box',
		'title' => esc_html__('General Page Metabox','imaginem-blocks-ii'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'core',
		'fields' => array(
			array(
				'name' => esc_html__('Page Layout','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
				'class' => 'condition-only-with-core',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Layout','imaginem-blocks-ii'),
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
				'name' => esc_html__('Switch Menu','imaginem-blocks-ii'),
				'id' => 'pagemeta_menu_choice',
				'type' => 'select',
				'desc' => esc_html__('Select a different menu for this page','imaginem-blocks-ii'),
				'options' => themecore_generate_menulist()
				),
			array(
				'name' => esc_html__('Instagram Footer','imaginem-blocks-ii'),
				'id' => 'pagemeta_instagram_footer',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Enable / Disable Instagram Footer','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_attr__('Enable','imaginem-blocks-ii'),
					'disable' => esc_attr__('Disable','imaginem-blocks-ii')
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
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_title_seperator',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Header Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep-header_settings',
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
				'name' => esc_html__('Page Title','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_title',
				'type' => 'select',
				'desc' => esc_html__('Page Title','imaginem-blocks-ii'),
				'std' => 'default',
				'options' => array(
					'default' => esc_attr__('Default','imaginem-blocks-ii'),
					'show' => esc_attr__('Show','imaginem-blocks-ii'),
					'hide' => esc_attr__('Hide','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Page Background','imaginem-blocks-ii'),
				'id' => 'pagemeta_background_section_id',
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
	return $mtheme_common_page_box;
}
function themecore_common_show_pagebox() {
	$mtheme_common_page_box = themecore_page_metadata();
	themecore_generate_metaboxes( $mtheme_common_page_box,get_the_id() );
}
?>