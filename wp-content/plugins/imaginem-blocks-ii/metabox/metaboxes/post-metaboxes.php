<?php
function themecore_post_metadata() {
	$mtheme_sidebar_options = themecore_generate_sidebarlist('post');

	$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';

	$mtheme_post_metapack=array();

	$mtheme_post_metapack['main'] = array(
		'id' => 'common-pagemeta-box',
		'title' => esc_html__('General Page Metabox','imaginem-blocks-ii'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'core',
		'fields' => array(
			array(
				'name' => esc_html__('Page Options','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
				'class' => 'condition-only-with-core',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Options','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Options','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'class' => 'condition-only-with-core',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Attach Images','imaginem-blocks-ii'),
				'id' => 'pagemeta_image_attachments',
				'class' => 'condition-only-with-core',
				'std' => esc_html__('Upload Images','imaginem-blocks-ii'),
				'type' => 'image_gallery',
				'desc' => esc_html__('Used with Gallery post type to display slideshow.','imaginem-blocks-ii')
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

$mtheme_post_metapack['video'] = array(
	'id' => 'video-meta-box',
	'title' => esc_html__('Video Metabox','imaginem-blocks-ii'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__('HTML5 Video','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_meta_section1_id',
			'type' => 'break',
			'sectiontitle' => esc_html__('HTML5 Video','imaginem-blocks-ii'),
			'std' => ''
			),
		array(
			'name' => esc_html__('M4V File URL','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_m4v_file',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Enter M4V File URL ( Required )','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('OGV File URL','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_ogv_file',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Enter OGV File URL','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Poster Image','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_poster_file',
			'type' => 'upload',
			'target' => 'image',
			'std' => '',
			'desc' => esc_html__('Poster Image','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Video Hosts','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_meta_section2_id',
			'type' => 'break',
			'std' => '',
			'sectiontitle' => esc_html__('Video Hosts','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Youtube Video ID','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_youtube_id',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Youtube video ID','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Vimeo Video ID','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_vimeo_id',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Vimeo video ID','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Daily Motion Video ID','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_dailymotion_id',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Daily Motion video ID','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Google Video ID','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_google_id',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Google video ID','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Video Embed Code','imaginem-blocks-ii'),
			'id' => 'pagemeta_video_embed_code',
			'type' => 'textarea',
			'std' => '',
			'desc' => esc_html__('Video Embed code. You can grab embed codes from hosted video sites.','imaginem-blocks-ii')
			)
		)
	);

$mtheme_post_metapack['audio'] = array(
	'id' => 'audio-meta-box',
	'title' => esc_html__('Audio Metabox','imaginem-blocks-ii'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__('Audio Embed code','imaginem-blocks-ii'),
			'id' => 'pagemeta_audio_meta_section1_id',
			'type' => 'break',
			'sectiontitle' => esc_html__('Audio Embed code','imaginem-blocks-ii'),
			'std' => ''
			),
		array(
			'name' => esc_html__('Audio Embed code','imaginem-blocks-ii'),
			'id' => 'pagemeta_audio_embed',
			'type' => 'textarea',
			'std' => '',
			'desc' => esc_html__('eg. Soundcloud embed code','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('HTML5 Audio','imaginem-blocks-ii'),
			'id' => 'pagemeta_audio_meta_section2_id',
			'type' => 'break',
			'sectiontitle' => esc_html__('HTML5 Audio','imaginem-blocks-ii'),
			'std' => ''
			),
		array(
			'name' => esc_html__('MP3 file','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_audio_mp3',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Please provide full url. eg. http://www.domain.com/path/audiofile.mp3','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('M4A file','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_audio_m4a',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Please provide full url. eg. <code>http://www.domain.com/path/audiofile.m4a','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('OGA file','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_audio_ogg',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Please provide full url. eg. http://www.domain.com/path/audiofile.ogg','imaginem-blocks-ii')
			)
		)
	);

$mtheme_post_metapack['link'] = array(
	'id' => 'link-meta-box',
	'title' => esc_html__('Link Metabox','imaginem-blocks-ii'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__('Link URL','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_link',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Please provide full url. eg. http://www.domain.com/path/','imaginem-blocks-ii')
			)
		)
	);

$mtheme_post_metapack['image'] = array(
	'id' => 'image-meta-box',
	'title' => esc_html__('Image Metabox','imaginem-blocks-ii'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__('Enable Lightbox','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_lightbox',
			'type' => 'select',
			'options' => array(
				'enabled_lightbox' => esc_html__('Enable Lightbox','imaginem-blocks-ii'),
				'disable_lightbox' => esc_html__('Disable Lighbox','imaginem-blocks-ii')
				)
			)
		)
	);

$mtheme_post_metapack['quote'] = array(
	'id' => 'quote-meta-box',
	'title' => esc_html__('Quote Metabox','imaginem-blocks-ii'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__('Quote','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_quote',
			'type' => 'textarea',
			'std' => '',
			'desc' => esc_html__('Enter quote here','imaginem-blocks-ii')
			),
		array(
			'name' => esc_html__('Author','imaginem-blocks-ii'),
			'id' => 'pagemeta_meta_quote_author',
			'type' => 'text',
			'std' => '',
			'desc' => esc_html__('Author','imaginem-blocks-ii')
			)
		)
	);
return $mtheme_post_metapack;
}

// Callback function to show fields in meta box
function themecore_video_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_video_meta_box = $mtheme_post_metapack['video'];
	themecore_generate_metaboxes($mtheme_video_meta_box, get_the_id() );
}

function themecore_audio_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_audio_meta_box = $mtheme_post_metapack['audio'];
	themecore_generate_metaboxes($mtheme_audio_meta_box, get_the_id() );
}

function themecore_common_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_common_meta_box = $mtheme_post_metapack['main'];
	themecore_generate_metaboxes($mtheme_common_meta_box,get_the_id());
}

function themecore_link_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_link_meta_box = $mtheme_post_metapack['link'];
	themecore_generate_metaboxes($mtheme_link_meta_box, get_the_id() );
}

function themecore_image_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_image_meta_box = $mtheme_post_metapack['image'];
	themecore_generate_metaboxes($mtheme_image_meta_box, get_the_id() );
}

function themecore_quote_show_box() {
	$mtheme_post_metapack = themecore_post_metadata();
	$mtheme_quote_meta_box = $mtheme_post_metapack['quote'];
	themecore_generate_metaboxes($mtheme_quote_meta_box, get_the_id() );
}
?>