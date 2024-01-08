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
class Em_Works_Carousel extends Widget_Base {

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
		return 'em-works-carousel';
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
		return __( 'Works Carousel', 'imaginem-blocks-ii' );
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
		return 'eicon-slider-push';
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
		return [ 'imaginem-portfolio' ];
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
				'label' => __( 'Works Carousel', 'imaginem-blocks-ii' ),
			]
		);

		$this->add_control(
		'format',
		[
			'type' => 'select',
			'label' => __('Carousel image type', 'imaginem-blocks-ii'),
			'desc' => __('Carousel image type', 'imaginem-blocks-ii'),
			'options' => [
				'landscape' => __('Landscape','imaginem-blocks-ii'),
				'square' => __('Square','imaginem-blocks-ii'),
				'portrait' => __('Portrait','imaginem-blocks-ii')
			],
			'default'=>'landscape',
		]
		);

		$this->add_control(
			'columns',
			[
				'label' => __( 'Columns', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'4' => __( '4', 'imaginem-blocks-ii' ),
					'3' => __( '3', 'imaginem-blocks-ii' ),
					'2' => __( '2', 'imaginem-blocks-ii' ),
					'1' => __( '1', 'imaginem-blocks-ii' ),
				],
				'default' => '3',
			]
		);

		$this->add_control(
		    'worktype_slugs',
		    [
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'label' => __('Choose Work types to list', 'imaginem-blocks-ii'),
		        'options' => themecore_elementor_categories('types'),
		        'multiple' => true,
		        'default' => '',
		        'label_block' => true,
		    ]
		);

		$this->add_control(
			'limit',
			[
				'std' => '-1',
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => __('Limit. -1 for unlimited', 'imaginem-blocks-ii'),
				'desc' => __('Limit items. -1 for unlimited', 'imaginem-blocks-ii'),
				'default' => '-1',
				]
		);

		$this->add_control(
			'directlink',
			[
				'type' => 'select',
				'label' => __('Direct Link', 'imaginem-blocks-ii'),
				'desc' => __('Direct link to portfolio items', 'imaginem-blocks-ii'),
				'options' => [
					'false' => __('No','imaginem-blocks-ii'),
					'true' => __('Yes','imaginem-blocks-ii')
				],
				'default'=>'false',
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
		'displaytitle',
		[
			'type' => 'select',
			'label' => __('Dispay title', 'imaginem-blocks-ii'),
			'desc' => __('Display title', 'imaginem-blocks-ii'),
			'options' => [
				'true' => __('Yes','imaginem-blocks-ii'),
				'false' => __('No','imaginem-blocks-ii')
			],
			'default'=>'true',
		]
		);

		$this->add_control(
		'category_display',
		[
			'type' => 'select',
			'label' => __('Dispay category', 'imaginem-blocks-ii'),
			'desc' => __('Display category', 'imaginem-blocks-ii'),
			'options' => [
				'true' => __('Yes','imaginem-blocks-ii'),
				'false' => __('No','imaginem-blocks-ii')
			],
			'default'=>'false',
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
					'{{WRAPPER}} .gridblock-grid-element .boxtitle-hover a' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'imaginem-blocks-ii' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gridblock-grid-element .boxtitle-hover a',
			]
		);

		$this->add_control(
			'category_color',
			[
				'label' => __( 'Category Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gridblock-grid-element .boxtitle-worktype' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Category Typography', 'imaginem-blocks-ii' ),
				'name' => 'category_typography',
				'selector' => '{{WRAPPER}} .gridblock-grid-element .boxtitle-worktype',
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

		$worktype_slugs = '';
		if ( is_array($settings['worktype_slugs']) ) {
			$worktype_slugs = implode (",", $settings['worktype_slugs']);
		}

		//$shortcode = '[lightboxcarousel pagination="'.$settings['carouselpagination'].'" columns="'.$settings['columns'].'" format="'.$settings['format'].'" smartspeed="'.$settings['smartspeed'].'" lazyload="'.$settings['lazyload'].'" autoplayinterval="'.$settings['autoplayinterval'].'" lightbox="'.$settings['lightbox'].'" autoplay="'.$settings['autoplay'].'" displaytitle="'.$settings['displaytitle'].'" pb_image_ids="'.$pb_image_ids.'"]';
		$shortcode = '[workscarousel limit="'.$settings['limit'].'" directlink="'.$settings['directlink'].'" category_display="'.$settings['category_display'].'" worktype_slugs="'.$worktype_slugs.'" boxtitle="'.$settings['displaytitle'].'" pagination="'.$settings['carouselpagination'].'" format="'.$settings['format'].'" autoplayinterval="'.$settings['autoplayinterval'].'" lazyload="'.$settings['lazyload'].'" autoplay="'.$settings['autoplay'].'" columns="'.$settings['columns'].'"]';

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