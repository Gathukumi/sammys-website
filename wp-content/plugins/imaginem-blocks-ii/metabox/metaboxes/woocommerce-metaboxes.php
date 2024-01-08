<?php
function themecore_woocommerce_metadata() {
$mtheme_sidebar_options = themecore_generate_sidebarlist('portfolio');

$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';

$mtheme_woocommerce_box = array(
	'id' => 'woocommercemeta-box',
	'title' => esc_html__('Woocommerce Metabox','imaginem-blocks-ii'),
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
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
				'name' => esc_html__('Page Background','imaginem-blocks-ii'),
				'id' => 'pagemeta_background_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Background','imaginem-blocks-ii'),
				'std' => ''
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
return $mtheme_woocommerce_box;
}
/*
* Meta options for Portfolio post type
*/
function themecore_woocommerceitem_metaoptions(){
	$mtheme_woocommerce_box = themecore_woocommerce_metadata();
	themecore_generate_metaboxes($mtheme_woocommerce_box,get_the_id());
}
?>