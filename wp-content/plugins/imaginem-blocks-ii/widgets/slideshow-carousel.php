<?php
namespace ImaginemBlocks\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor icon box widget.
 *
 * Elementor widget that displays an icon, a headline and a text.
 *
 * @since 1.0.0
 */
class Slideshow_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'slideshow-carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Slideshow Carousel', 'imaginem-blocks-ii' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slideshow';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'imaginem-media' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'owlcarousel'];
		//return [ 'jarallax', 'parallaxi' ];
	}

	/**
	 * Get style dependencies.
	 *
	 * Retrieve the list of style dependencies the element requires.
	 *
	 * @since 1.9.0
	 * @access public
	 *
	 * @return array Element styles dependencies.
	 */
	public function get_style_depends() {
		return [ 'owlcarousel'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Slideshow Carousel', 'imaginem-blocks-ii' ),
			]
		);


		$this->add_control(
			'wp_gallery',
			[
				'label' => __( 'Add Images', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::GALLERY,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
		'slideshowtype',
		[
			'type' => 'select',
			'group_title' => 'Type',
			'label' => __('Slideshow type', 'imaginem-blocks-ii'),
			'desc' => __('Slideshow type', 'imaginem-blocks-ii'),
			'options' => [
				'slideshow' => __('Slideshow','imaginem-blocks-ii'),
				'flatcarousel' => __('2D Center Carousel','imaginem-blocks-ii'),
				'centercarousel' => __('3D Center Carousel','imaginem-blocks-ii')
			],
			'default'=>'slideshow',
		]
		);

		$this->add_control(
		'imagesize',
		[
			'type' => 'select',
			'label' => __('Slideshow image type', 'imaginem-blocks-ii'),
			'desc' => __('Slideshow image type', 'imaginem-blocks-ii'),
			'options' => [
				'landscape' => __('Landscape','imaginem-blocks-ii'),
				'portrait' => __('Portrait','imaginem-blocks-ii'),
				'full' => __('Full','imaginem-blocks-ii')
			],
			'default'=>'landscape',
		]
		);

		$this->add_control(
		'lazyload',
		[
			'type' => 'select',
			'group_title' => 'Properties',
			'label' => __('Lazy Load', 'imaginem-blocks-ii'),
			'desc' => __('Lazy Load', 'imaginem-blocks-ii'),
			'options' => [
				'false' => __('No','imaginem-blocks-ii'),
				'true' => __('Yes','imaginem-blocks-ii')
			],
			'default'=>'false',
		]
		);

		$this->add_control(
		'autoplay',
		[
			'type' => 'select',
			'std' => 'false',
			'label' => __('Autoplay slideshow', 'imaginem-blocks-ii'),
			'desc' => __('Autoplay slideshow', 'imaginem-blocks-ii'),
			'options' => [
				'false' => __('No','imaginem-blocks-ii'),
				'true' => __('Yes','imaginem-blocks-ii')
			],
			'default'=>'false',
		]
		);

		$this->add_control(
		'autoplayinterval',
		[
			'default' => '5000',
			'type' => 'text',
			'label' => __('Autoplay Interval', 'imaginem-blocks-ii'),
			'desc' => __('Autoplay Interval ( 5000 default)', 'imaginem-blocks-ii'),
		]
		);

		$this->add_control(
		'smartspeed',
		[
			'default' => '1000',
			'type' => 'text',
			'label' => __('Slide Transition', 'imaginem-blocks-ii'),
			'desc' => __('Slide Transition ( 1000 default)', 'imaginem-blocks-ii'),
		]
		);

		$this->add_control(
		'lightbox',
		[
			'type' => 'select',
			'label' => __('Lightbox Activate', 'imaginem-blocks-ii'),
			'desc' => __('Lightbox Activate', 'imaginem-blocks-ii'),
			'options' => [
				'false' => __('No','imaginem-blocks-ii'),
				'true' => __('Yes','imaginem-blocks-ii')
			],
			'default'=>'false',
		]
		);

		$this->add_control(
		'displaytitle',
		[
			'type' => 'select',
			'label' => __('Dispay title', 'imaginem-blocks-ii'),
			'desc' => __('Display thumbnails', 'imaginem-blocks-ii'),
			'options' => [
				'true' => __('Yes','imaginem-blocks-ii'),
				'false' => __('No','imaginem-blocks-ii')
			],
			'default'=>'true',
		]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'imaginem-blocks-ii' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'carouselpagination',
			[
				'label' => __( 'Pagination Dots', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'yes' => __( 'Yes', 'imaginem-blocks-ii' ),
					'no' => __( 'No', 'imaginem-blocks-ii' ),
				],
				'default' => 'yes',
				'prefix_class' => 'carousel-dots-',
			]
		);

		$this->add_control(
			'paginationcolor',
			[
				'label' => __( 'Pagination Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-dot span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'paginationcoloractive',
			[
				'label' => __( 'Pagination Active Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-dot.active span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrowshape',
			[
				'label' => __( 'Arrow', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'imaginem-blocks-ii' ),
					'circle' => __( 'Circle', 'imaginem-blocks-ii' ),
					'square' => __( 'Square', 'imaginem-blocks-ii' ),
				],
				'default' => 'default',
				'separator' => 'before',
				'prefix_class' => 'carousel-arrow-shape-',
			]
		);

		$this->add_control(
			'arrowbackground',
			[
				'label' => __( 'Arrow Background Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-next,{{WRAPPER}} .owl-prev' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'arrow',
			[
				'label' => __( 'Arrow Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-next,{{WRAPPER}} .owl-prev' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slideshow-owl-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'imaginem-blocks-ii' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .slideshow-owl-title',
			]
		);

		$this->add_control(
			'title_backgroundcolor',
			[
				'label' => __( 'Title Background Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slideshow-owl-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['wp_gallery'] ) {
			return;
		}

		$ids = wp_list_pluck( $settings['wp_gallery'], 'id' );
		$pb_image_ids = implode( ',', $ids );

		$shortcode = '[slideshowcarousel imagesize="'.$settings['imagesize'].'" smartspeed="'.$settings['smartspeed'].'" lazyload="'.$settings['lazyload'].'" autoplayinterval="'.$settings['autoplayinterval'].'" slideshowtype="'.$settings['slideshowtype'].'" lightbox="'.$settings['lightbox'].'" autoplay="'.$settings['autoplay'].'" displaytitle="'.$settings['displaytitle'].'" pb_image_ids="'.$pb_image_ids.'"]';

		echo do_shortcode($shortcode);
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {}
}