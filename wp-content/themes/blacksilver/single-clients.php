<?php
/*
*  Page
*/
?>
<?php get_header(); ?>
<?php
if ( post_password_required() ) {
	blacksilver_display_client_password( get_the_id(), $clienttitle = true, $desc = true, $eventdetails = false, $proofing_id = false, $pagetitle = false );
} else {
	$twocolumn_class  = '';
	$filter_image_ids = blacksilver_get_custom_attachments( get_the_id() );
	$mtheme_pagestyle = 'nosidebar';
	$floatside        = '';
	$sidebar_present  = false;
	if ( 'nosidebar' === $mtheme_pagestyle ) {
		$floatside = '';
	}
	if ( 'rightsidebar' === $mtheme_pagestyle ) {
		$floatside       = 'float-left';
		$sidebar_present = true;
	}
	if ( 'leftsidebar' === $mtheme_pagestyle ) {
		$floatside       = 'float-right';
		$sidebar_present = true;
	}
	$image_size_type = 'blacksilver-gridblock-full-medium';
	if ( 'fullwidth' === $mtheme_pagestyle ) {
		$floatside        = '';
		$image_size_type  = 'blacksilver-gridblock-full';
		$mtheme_pagestyle = 'nosidebar';
	}
	if ( 'nosidebar' !== $mtheme_pagestyle ) {
		$twocolumn_class = 'two-column';
		$sidebar_present = true;
	}
	?>
	<div class="page-contents-wrap <?php echo esc_attr( $floatside ); ?> <?php echo esc_attr( $twocolumn_class ); ?>">
	<?php
	if ( ! post_password_required() ) {
		echo '<div class="entry-content client-gallery-details client-proofing-list">';
		$client_details = blacksilver_display_client_details( get_the_id(), $clienttitle = true, $desc = true );
		echo wp_kses( $client_details, blacksilver_get_allowed_tags() );

		$custom               = get_post_custom( get_the_id() );
		$client_gallery_title = '';
		if ( isset( $custom['pagemeta_client_gallery_title'][0] ) ) {
			$client_gallery_title = $custom['pagemeta_client_gallery_title'][0];
		}

		echo '<div class="entry-title-wrap-client">';
		if ( '' !== $client_gallery_title ) {
			echo '<h1 class="entry-title">' . wp_kses( $client_gallery_title, blacksilver_get_allowed_tags() ) . '</h1>';
		} else {
			echo '<h1 class="entry-title">' . esc_html__( 'Proofing Galleries', 'blacksilver' ) . '</h1>';
		}
		echo '</div>';

		echo '</div>';
		echo do_shortcode( '[clientgrid boxtitle="true" title="false" desc="false" client_id="' . get_the_id() . '" columns="2" padeid=""]' );
	}
	?>
	</div>
	<?php
	if ( ! post_password_required() ) {
		if ( $sidebar_present ) {
			get_sidebar();
		}
	}
}
get_footer();
?>
