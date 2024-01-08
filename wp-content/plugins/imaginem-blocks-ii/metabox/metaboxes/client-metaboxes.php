<?php
function themecore_client_metadata() {

	$mtheme_sidebar_options = themecore_generate_sidebarlist('client');

	$options_fonts = themecore_google_fonts();

// Pull all the Featured into an array
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

	$mtheme_client_box = array(
		'id' => 'clientmeta-box',
		'title' => esc_html__('Client Metabox','imaginem-blocks-ii'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => esc_html__('Client Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Client Notice','imaginem-blocks-ii'),
				'id' => 'pagemeta_client_notice',
				'type' => 'notice',
				'std' => '',
				'desc' => esc_html__('Add a Password to this client page to password protect all proofing galleries associated with the client.','imaginem-blocks-ii')
				),
			array(
				'name' => esc_html__('Client Name','imaginem-blocks-ii'),
				'id' => 'pagemeta_client_name',
				'type' => 'text',
				'desc' => esc_html__('Client Name.','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Description for client','imaginem-blocks-ii'),
				'id' => 'pagemeta_client_desc',
				'type' => 'textarea',
				'desc' => esc_html__('This description is displayed for client.','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Client proofing gallery title','imaginem-blocks-ii'),
				'id' => 'pagemeta_client_gallery_title',
				'type' => 'text',
				'desc' => esc_html__('Client proofing gallery title','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Header Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_title',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Background Image for Client Password Page','imaginem-blocks-ii'),
				'id' => 'pagemeta_client_background_image',
				'type' => 'upload',
				'target' => 'image',
				'std' => '',
				'desc' => esc_html__('Upload or provide full url of background. eg. http://www.domain.com/path/image.jpg','imaginem-blocks-ii')
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
				'name' => esc_html__('Page Color','imaginem-blocks-ii'),
				'id' => 'pagemeta_pagebackground_color',
				'type' => 'color',
				'desc' => esc_html__('Page color','imaginem-blocks-ii'),
				'std' => ''
				),
			)
		);
	return $mtheme_client_box;
}
/*
* Meta options for client post type
*/
function themecore_clientitem_metaoptions(){
	$mtheme_client_box = themecore_client_metadata();
	themecore_generate_metaboxes( $mtheme_client_box,get_the_id() );
}
?>