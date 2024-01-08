<?php
function themecore_events_metadata() {
	$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';

	$mtheme_sidebar_options = themecore_generate_sidebarlist('events');

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

	$events_box = array(
		'id' => 'eventsmeta-box',
		'title' => esc_html__('Events Metabox','imaginem-blocks-ii'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'core',
		'fields' => array(
			array(
				'name' => esc_html__('Event Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_events_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Events Settings','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => esc_html__('Event Options','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Gallery description text','imaginem-blocks-ii'),
				'id' => 'pagemeta_thumbnail_desc',
				'heading' => 'subhead',
				'type' => 'textarea',
				'desc' => esc_html__('Description text to displayed with evernts gallery thumbnail','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => esc_html__('Event Status','imaginem-blocks-ii'),
				'id' => 'pagemeta_event_notice',
				'class' => 'event_notice',
				'type' => 'select',
				'desc' => esc_html__('Event Status','imaginem-blocks-ii'),
				'options' => array(
					'active'    => esc_attr__('Active','imaginem-blocks-ii'),
					'inactive'  => esc_attr__('Hide from Listings','imaginem-blocks-ii'),
					'postponed' => esc_attr__('Display as Postponed','imaginem-blocks-ii'),
					'cancelled' => esc_attr__('Display as Cancelled','imaginem-blocks-ii'),
					'fullevent' => esc_attr__('Event is Full','imaginem-blocks-ii'),
					'pastevent' => esc_attr__('Past Event','imaginem-blocks-ii')
					),
			),
			array(
				'name' => esc_html__('Event Date','imaginem-blocks-ii'),
				'id' => 'pagemeta_event_startdate',
				'type' => 'datepicker',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Start date','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => 'End Date',
				'id' => 'pagemeta_event_enddate',
				'type' => 'datepicker',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('End date','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => esc_html__('Display date in Events Grid','imaginem-blocks-ii'),
				'id' => 'pagemeta_event_dategrid',
				'class' => 'event_notice',
				'type' => 'select',
				'desc' => esc_html__('Display date in Events Grid','imaginem-blocks-ii'),
				'options' => array(
					'show'    => esc_attr__('Show','imaginem-blocks-ii'),
					'disable'  => esc_attr__('Disable','imaginem-blocks-ii'),
					),
			),
			array(
				'name' => esc_html__('Venue','imaginem-blocks-ii'),
				'id' => 'pagemeta_event_venue_name',
				'type' => 'text',
				'heading' => 'subhead',
				'desc' => esc_html__('Venue Name','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_street',
				'type' => 'text',
				'heading' => 'subhead',
				'desc' => esc_html__('Street','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_state',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('State','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_postal',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Zip/Postal Code','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_country',
				'type' => 'country',
				'heading' => 'subhead',
				'desc' => esc_html__('Event country','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_phone',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Phone','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_website',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Website','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_currency',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Cost Currency Symbol','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_cost',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Cost Value','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_capacity',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Capcity ( Audience limit )','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_event_venue_remaining',
				'type' => 'text',
				'class' => 'textsmall',
				'heading' => 'subhead',
				'desc' => esc_html__('Capacity remaining','imaginem-blocks-ii'),
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
					'default' => esc_attr__('Default','imaginem-blocks-ii'),
					'show' => esc_attr__('Show','imaginem-blocks-ii'),
					'hide' => esc_attr__('Hide','imaginem-blocks-ii')
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
	return $events_box;
}
/*
* Meta options for Events post type
*/
function themecore_eventsitem_metaoptions(){
	$events_box = themecore_events_metadata();
	themecore_generate_metaboxes($events_box,get_the_id());
}
?>