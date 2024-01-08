<?php
/**
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */

function themecore_attachment_fields_fullscreen_link( $form_fields, $post ) {
	$form_fields['mtheme_attachment_fullscreen_url'] = array(
		'label' => esc_html__('Button Link URL','kinatrix'),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mtheme_attachment_fullscreen_url', true ),
		);

	$form_fields["mtheme_fullscreen_url_target"]["label"] = esc_html__("Button link Target",'kinatrix');
	$form_fields["mtheme_fullscreen_url_target"]["input"] = "html";
	$form_fields['mtheme_fullscreen_url_target']['html'] = "<select name='attachments[{$post->ID}][mtheme_fullscreen_url_target]'>";
	$form_fields['mtheme_fullscreen_url_target']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_fullscreen_url_target", true), 'current',false).' value="current">Default</option>';
	$form_fields['mtheme_fullscreen_url_target']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_fullscreen_url_target", true), 'blank',false).' value="blank">Open New</option>';
	$form_fields['mtheme_fullscreen_url_target']['html'] .= '</select>';

	$form_fields['mtheme_attachment_fullscreen_link'] = array(
		'label' => esc_html__('Button Text','kinatrix'),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mtheme_attachment_fullscreen_link', true ),
		'helps' => esc_html__('Fullscreen Slideshow, Swiper Slide and Thumbnail Gallery','kinatrix'),
		);

	$form_fields['mtheme_attachment_purchase_url'] = array(
		'label' => esc_html__('Purchase URL','kinatrix'),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mtheme_attachment_purchase_url', true ),
		);

	$form_fields["mtheme_purchase_url_target"]["label"] = esc_html__("Purchase link Target",'kinatrix');
	$form_fields["mtheme_purchase_url_target"]["input"] = "html";
	$form_fields['mtheme_purchase_url_target']['html'] = "<select name='attachments[{$post->ID}][mtheme_purchase_url_target]'>";
	$form_fields['mtheme_purchase_url_target']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_purchase_url_target", true), 'current',false).' value="current">Default</option>';
	$form_fields['mtheme_purchase_url_target']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_purchase_url_target", true), 'blank',false).' value="blank">Open New</option>';
	$form_fields['mtheme_purchase_url_target']['html'] .= '</select>';

	$form_fields["mtheme_fullscreen_header_color"]["label"] = esc_html__("Header UI",'kinatrix');
	$form_fields["mtheme_fullscreen_header_color"]["input"] = "html";
	$form_fields['mtheme_fullscreen_header_color']['html'] = "<select name='attachments[{$post->ID}][mtheme_fullscreen_header_color]'>";
	$form_fields['mtheme_fullscreen_header_color']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_fullscreen_header_color", true), 'bright',false).' value="bright">Bright</option>';
	$form_fields['mtheme_fullscreen_header_color']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_fullscreen_header_color", true), 'dark',false).' value="dark">Dark</option>';
	$form_fields['mtheme_fullscreen_header_color']['html'] .= '</select>';

	$form_fields["mtheme_attachment_fullscreen_color"]["label"] = esc_html__("Title color ",'kinatrix');
	$form_fields["mtheme_attachment_fullscreen_color"]["input"] = "html";
	$form_fields['mtheme_attachment_fullscreen_color']['html'] = "<select name='attachments[{$post->ID}][mtheme_attachment_fullscreen_color]'>";
	$form_fields['mtheme_attachment_fullscreen_color']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_attachment_fullscreen_color", true), 'bright',false).' value="bright">Bright</option>';
	$form_fields['mtheme_attachment_fullscreen_color']['html'] .= '<option '.selected(get_post_meta($post->ID, "mtheme_attachment_fullscreen_color", true), 'dark',false).' value="dark">Dark</option>';
	$form_fields['mtheme_attachment_fullscreen_color']['html'] .= '</select>';

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'themecore_attachment_fields_fullscreen_link', 10, 2 );

/**
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function themecore_attachment_fields_fullscreen_link_save( $post, $attachment ) {
	if( isSet( $attachment['mtheme_attachment_fullscreen_link'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_attachment_fullscreen_link', $attachment['mtheme_attachment_fullscreen_link'] );
	}

	if( isSet( $attachment['mtheme_attachment_fullscreen_url'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_attachment_fullscreen_url', esc_url( $attachment['mtheme_attachment_fullscreen_url'] ) );
	}

	if( isSet( $attachment['mtheme_fullscreen_url_target'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_fullscreen_url_target', $attachment['mtheme_fullscreen_url_target'] );
	}

	if( isSet( $attachment['mtheme_attachment_purchase_url'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_attachment_purchase_url', esc_url( $attachment['mtheme_attachment_purchase_url'] ) );
	}

	if( isSet( $attachment['mtheme_purchase_url_target'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_purchase_url_target', $attachment['mtheme_purchase_url_target']);
	}

	if( isSet( $attachment['mtheme_fullscreen_header_color'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_fullscreen_header_color', $attachment['mtheme_fullscreen_header_color'] );
	}

	if( isSet( $attachment['mtheme_attachment_fullscreen_color'] ) ) {
		update_post_meta( $post['ID'], 'mtheme_attachment_fullscreen_color', $attachment['mtheme_attachment_fullscreen_color'] );
	}

	return $post;
}

add_filter( 'attachment_fields_to_save', 'themecore_attachment_fields_fullscreen_link_save', 10, 2 );

function themecore_fullscreen_metadata() {
	// Pull all the Featured into an array
	$bg_slideshow_pages = get_posts('post_type=fullscreen&orderby=title&numberposts=-1&order=ASC');

	$options_fonts = themecore_google_fonts();

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

	$portfolio_worktypes = get_categories('taxonomy=types&title_li=');
	$len = count($portfolio_worktypes);
	$portfolio_list_options='';
	$count=0;
	foreach($portfolio_worktypes as $key => $list) {
		$count++;	
		if (isSet($list->slug)) {
			if ( $len == $count ) {
					$portfolio_list_options .= $list->slug;
			} else {
				$portfolio_list_options .= $list->slug . ',';
			}
		}
	}

	$mtheme_imagepath =  plugin_dir_url( __FILE__ ) . 'assets/images/';
	$mtheme_fullscreen_box = array(
		'id' => 'featuredmeta-box',
		'title' => esc_html__('Fullscreen Metabox','imaginem-blocks-ii'),
		'page' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => esc_html__('Fullscreen Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_page_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Fullscreen Options','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Fullscreen Type','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreen_type',
				'type' => 'image',
				'triggerStatus'=> 'on',
				'std' => 'slideshow',
				'class' => 'page_type',
				'desc' => esc_html__('Fullscreen page type','imaginem-blocks-ii'),
				'options' => array(
					'slideshow' => $mtheme_imagepath . 'fullscreen_slideshow.png',
					'splitslider' => $mtheme_imagepath . 'fullscreen_splitslider.png',
					'kenburns' => $mtheme_imagepath . 'fullscreen_kenburns.png',
					'coverphoto' => $mtheme_imagepath . 'fullscreen_coverphoto.png',
					'carousel' => $mtheme_imagepath . 'fullscreen_carousel.png',
					'particles' => $mtheme_imagepath . 'fullscreen_particles.png',
					'fotorama' => $mtheme_imagepath . 'fullscreen_fotorama.png',
					'swiperslides' => $mtheme_imagepath . 'fullscreen_swipes.png',
					'portfolioslideshow' => $mtheme_imagepath . 'fullscreen_portfolio_slideshow.png',
					'portfoliocarousel' => $mtheme_imagepath . 'fullscreen_portfoliocarousel.png',
					'revslider' => $mtheme_imagepath . 'fullscreen_revslider.png')
				),
			array(
				'name' => esc_html__('Add Images','imaginem-blocks-ii'),
				'id' => 'pagemeta_image_attachments',
				'std' => esc_html__('Upload Images','imaginem-blocks-ii'),
				'type' => 'image_gallery',
				'desc' => esc_html__('Add images from Media Uploader or by uploading new images.','imaginem-blocks-ii')
				),
			array(
				'name' => esc_html__('Carousel Title','imaginem-blocks-ii'),
				'id' => 'pagemeta_carousel_title',
				'class' => 'page_type-carousel page_type-trigger',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Display title','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_html__('Enable','imaginem-blocks-ii'),
					'disable' => esc_html__('Disable','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Carousel Description','imaginem-blocks-ii'),
				'id' => 'pagemeta_carousel_desc',
				'class' => 'page_type-carousel page_type-trigger',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Display description','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_html__('Enable','imaginem-blocks-ii'),
					'disable' => esc_html__('Disable','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Carousel caption background color','imaginem-blocks-ii'),
				'id' => 'pagemeta_carouselbg_color',
				'type' => 'color',
				'class' => 'page_type-carousel page_type-trigger',
				'desc' => esc_html__('Background color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Carousel caption background opacity percent','imaginem-blocks-ii'),
				'id' => 'pagemeta_carouselbg_color_opacity',
				'heading' => 'subhead',
				'type' => 'text',
				'std' => '',
				'class' => 'page_type-carousel page_type-trigger',
				'desc' => esc_html__('1 to 100 . Type "transparent" for none','imaginem-blocks-ii'),
				),
			array(
				'name' => esc_html__('Display Titles & Description','imaginem-blocks-ii'),
				'id' => 'pagemeta_slideshow_titledesc',
				'class' => 'page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-fotorama page_type-particles page_type-coverphoto page_type-trigger',
				'type' => 'select',
				'std' => 'enable',
				'desc' => esc_html__('Display title and description','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_html__('Enable','imaginem-blocks-ii'),
					'disable' => esc_html__('Disable','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Slideshow Fill/Fit','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenslideshow_cover',
				'type' => 'select',
				'std' => 'wave',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-coverphoto page_type-portfolioslideshow page_type-particles page_type-trigger',
				'desc' => esc_html__('Transition type for fullscreen slideshow','imaginem-blocks-ii'),
				'options' => array(
					'cover' => esc_attr__('Cover','imaginem-blocks-ii'),
					'landscape' => esc_attr__('Landscape Fit','imaginem-blocks-ii'),
					'portrait' => esc_attr__('Portrait Fit','imaginem-blocks-ii'),
					'always' => esc_attr__('Fit Always','imaginem-blocks-ii'),
					)
				),
			array(
				'name' => esc_html__('Slideshow Transition','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenslideshow_transition',
				'type' => 'select',
				'std' => 'wave',
				'class' => 'is-part-of-a-set is-set-end page_type-slideshow page_type-coverphoto page_type-portfolioslideshow page_type-particles page_type-trigger',
				'desc' => esc_html__('Transition type for fullscreen slideshow','imaginem-blocks-ii'),
				'options' => array(
					'fade' => esc_attr__('Fade','imaginem-blocks-ii'),
					'wave' => esc_attr__('Wave','imaginem-blocks-ii'),
					'zoom' => esc_attr__('Zoom','imaginem-blocks-ii'),
					)
				),
			array(
				'name' => __('Swiper Columns','imaginem-blocks-ii'),
				'id' => 'pagemeta_swiper_columns',
				'type' => 'select',
				'std' => '4',
				'class' => 'page_type-swiperslides page_type-trigger',
				'desc' => __('Swiper Columns type','imaginem-blocks-ii'),
				'options' => array(
					'4' => 'Four',
					'3' => 'Three',
					'2' => 'Two',
					'1' => 'One')
			),
			array(
				'name' => esc_html__('Portfolio Worktypes ( enter comma seperated slugs )','imaginem-blocks-ii') . '<br/><br/><small>' . $portfolio_list_options . '</small>',
				'id' => 'pagemeta_photowall_workstypes',
				'heading' => 'subhead',
				'type' => 'text',
				'std' => '',
				'class' => 'page_type-portfolioslideshow page_type-portfoliocarousel page_type-trigger',
				'desc' => esc_html__('Enter comma seperated slugs. Leave Blank to list all.','imaginem-blocks-ii'),
				),
			array(
				'name' => __('Particle Type','imaginem-blocks-ii'),
				'id' => 'pagemeta_particle_type',
				'type' => 'select',
				'std' => 'lightbox',
				'class' => 'page_type-particles page_type-trigger',
				'desc' => __('Particle type','imaginem-blocks-ii'),
				'options' => array(
					'default' => 'Default',
					'stars' => 'Stars',
					'snow' => 'Snow',
					'grab' => 'Grab',
					'move' => 'Move')
			),
			array(
				'name' => __('Particles / Cover Text Style','imaginem-blocks-ii'),
				'id' => 'pagemeta_cover_style',
				'type' => 'image',
				'std' => 'plain',
				'class' => 'page_type-coverphoto page_type-particles page_type-trigger',
				'desc' => __('Cover Text Style','imaginem-blocks-ii'),
				'options' => array(
					'plain' => $mtheme_imagepath . 'cover_plain.png',
					'border' => $mtheme_imagepath . 'cover_border.png',
					'fill' => $mtheme_imagepath . 'cover_fill.png',
					'topbottom' => $mtheme_imagepath . 'cover_topbottom.png',
					'underline' => $mtheme_imagepath . 'cover_underline.png')
			),
			array(
				'name' => esc_html__('Coverphoto Text Align','imaginem-blocks-ii'),
				'id' => 'pagemeta_coverphoto_textalign',
				'type' => 'select',
				'std' => 'center',
				'class' => 'page_type-coverphoto page_type-particles page_type-trigger',
				'desc' => esc_html__('Coverphoto text align','imaginem-blocks-ii'),
				'options' => array(
					'center' => esc_attr__('Center','imaginem-blocks-ii'),
					'bottom' => esc_attr__('Bottom','imaginem-blocks-ii'),
					)
				),
			array(
				'name' => esc_html__('Fotorama Fill mode','imaginem-blocks-ii'),
				'id' => 'pagemeta_fotorama_fill',
				'type' => 'select',
				'std' => 'enable',
				'class' => 'page_type-fotorama page_type-trigger',
				'desc' => esc_html__('Fotorama Fill mode','imaginem-blocks-ii'),
				'options' => array(
					'cover' => esc_attr__('Fill','imaginem-blocks-ii'),
					'contain' => esc_attr__('Fit','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Fotorama Thumbnails','imaginem-blocks-ii'),
				'id' => 'pagemeta_fotorama_thumbnails',
				'type' => 'select',
				'std' => 'enable',
				'class' => 'page_type-fotorama page_type-trigger',
				'desc' => esc_html__('Fotorama Thumbnails','imaginem-blocks-ii'),
				'options' => array(
					'enable' => esc_attr__('Enable','imaginem-blocks-ii'),
					'disable' => esc_attr__('Disable','imaginem-blocks-ii')
					)
				),
			array(
				'name' => esc_html__('Revolution Slider','imaginem-blocks-ii'),
				'id' => 'pagemeta_revslider',
				'type' => 'select',
				'class' => 'page_type-revslider page_type-trigger',
				'desc' => esc_html__('Display Revolution Slider','imaginem-blocks-ii'),
				'options' => themecore_rev_slider_selectors()
				),
			array(
				'name' => esc_html__('Fill to activate Static Text','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				'class'=> 'page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				),
			array(
				'name' => esc_html__('For Kenburns & Static Slideshow Text','imaginem-blocks-ii'),
				'id' => 'pagemeta_static_title',
				'class'=> 'is-part-of-a-set page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Static Title','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => '',
				'id' => 'pagemeta_static_description',
				'heading' => 'subhead',
				'class'=> 'is-part-of-a-set page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				'type' => 'textarea',
				'desc' => esc_html__('Static Decription','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => '',
				'id' => 'pagemeta_static_link_text',
				'heading' => 'subhead',
				'class'=> 'is-part-of-a-set page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Static Button Text','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => '',
				'id' => 'pagemeta_static_url',
				'heading' => 'subhead',
				'class'=> 'is-part-of-a-set is-set-end page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Static Button Link','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Font size','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttonsize_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-carousel page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Letter-spacing','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttonspacing_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-carousel page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Font Weight','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttonweight_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-carousel page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 100,30,16','imaginem-blocks-ii'),
				'std' => ''
				),

			array(
				'name' => esc_html__('Title Font','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				),
			array(
				'name' => esc_html__('Title font','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitlefont_meta',
				'type' => 'fontselector',
				'class' => 'page_type-slideshow page_type-portfolioslideshow page_type-carousel page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Slideshow/Static Title Font','imaginem-blocks-ii'),
				'options' => $options_fonts
				),
			array(
				'name' => esc_html__('Title color','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitlecolor_meta',
				'type' => 'color',
				'class' => 'is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Title color','imaginem-blocks-ii'),
				'std' => ''
				),

			array(
				'name' => esc_html__('Font size','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitlesize_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Line-height','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitlelineheight_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Letter-spacing','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitlespacing_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Font Weight','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreentitleweight_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set is-set-end set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 100,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Description Font','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-trigger',
				),
			array(
				'name' => esc_html__('Description font','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendescfont_meta',
				'type' => 'fontselector',
				'class' => 'page_type-slideshow page_type-portfolioslideshow page_type-kenburns page_type-carousel page_type-particles page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Slideshow/Static Title Font','imaginem-blocks-ii'),
				'options' => $options_fonts
				),

			array(
				'name' => esc_html__('Description color','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendesccolor_meta',
				'type' => 'color',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Description color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Font size','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendescsize_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Line-height','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendesclineheight_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Letter-spacing','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendescspacing_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 42,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Font Weight','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendescweight_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set is-set-end set-space-medium page_type-slideshow page_type-carousel page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 100,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Description Width','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreendescwidth_meta',
				'type' => 'text-responsive',
				'class' => 'responsive-data-text is-part-of-a-set is-set-end set-space-medium page_type-slideshow page_type-portfolioslideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Only Numerical. Enter comma seperated values for responsiveness. Eg. 100,30,16','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Cover text Border / Background color','imaginem-blocks-ii'),
				'id' => 'pagemeta_coverphotobordercolor_meta',
				'type' => 'color',
				'class' => 'is-part-of-a-set page_type-coverphoto page_type-trigger',
				'desc' => esc_html__('Border / background color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Button Font','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_options',
				'type' => 'seperator',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-carousel page_type-trigger',
				),
			array(
				'name' => esc_html__('Button font','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttonfont_meta',
				'type' => 'fontselector',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-carousel page_type-trigger',
				'desc' => esc_html__('Slideshow/Static Title Font','imaginem-blocks-ii'),
				'options' => $options_fonts
				),
			array(
				'name' => esc_html__('Button color','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttoncolor_meta',
				'type' => 'color',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-carousel page_type-trigger',
				'desc' => esc_html__('Button color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Button Hover Text Color','imaginem-blocks-ii'),
				'id' => 'pagemeta_fullscreenbuttonhovercolor_meta',
				'type' => 'color',
				'class' => 'is-part-of-a-set page_type-slideshow page_type-kenburns page_type-particles page_type-coverphoto page_type-carousel page_type-trigger',
				'desc' => esc_html__('Button color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_header_section_id',
				'type' => 'break',
				'sectiontitle' => esc_html__('Header Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Page Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_title',
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
				'name' => esc_html__('Page Background color','imaginem-blocks-ii'),
				'id' => 'pagemeta_pagebackground_color',
				'type' => 'color',
				'desc' => esc_html__('Page background color','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Used as Thumbnail gallery description text','imaginem-blocks-ii'),
				'id' => 'pagemeta_thumbnail_desc',
				'heading' => 'subhead',
				'type' => 'textarea',
				'desc' => esc_html__('Description to display in thumbnail gallery.','imaginem-blocks-ii'),
				'std' => ''
			),
			array(
				'name' => '',
				'id' => 'pagemeta_page_section_id',
				'type' => 'nobreak',
				'class'=> 'page_type-slideshow page_type-video page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'sectiontitle' => esc_html__('Audio & Video Settings','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => esc_html__('Media Settings','imaginem-blocks-ii'),
				'id' => 'pagemeta_sep_page_title',
				'class'=> 'page_type-slideshow page_type-video page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'type' => 'seperator',
				),
			array(
				'name' => esc_html__('Slideshow Audio files (optional)','imaginem-blocks-ii'),
				'id' => 'pagemeta_slideshow_mp3',
				'class'=> 'is-part-of-a-set slideshowaudio page_type-slideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Enter MP3 file path for Slideshow. ( full url )','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => '',
				'id' => 'pagemeta_slideshow_oga',
				'heading' => 'subhead',
				'class'=> 'is-part-of-a-set slideshowaudio page_type-slideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Enter OGA file path for Slideshow ( full url )','imaginem-blocks-ii'),
				'std' => ''
				),
			array(
				'name' => '',
				'id' => 'pagemeta_slideshow_m4a',
				'heading' => 'subhead',
				'class'=> 'is-part-of-a-set is-set-end slideshowaudio page_type-slideshow page_type-particles page_type-kenburns page_type-coverphoto page_type-trigger',
				'type' => 'text',
				'desc' => esc_html__('Enter M4A file path for Slideshow ( full url )','imaginem-blocks-ii'),
				'std' => ''
				)
		)
);
return $mtheme_fullscreen_box;
}
/*
* Meta options for Portfolio post type
*/
function themecore_featured_options(){
	$mtheme_fullscreen_box = themecore_fullscreen_metadata();
	themecore_generate_metaboxes($mtheme_fullscreen_box, get_the_id() );
}
?>