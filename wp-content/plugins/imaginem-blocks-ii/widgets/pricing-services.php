<?php
namespace ImaginemBlocks\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Imaginem Blocks
 *
 * Elementor widget for Imaginem Blocks.
 *
 * @since 1.0.0
 */
class Pricing_Services extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pricing-services';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Pricing Services', 'imaginem-blocks-ii' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		return [ 'imaginem-elements' ];
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
			'section_title',
			[
				'label' => __( 'Pricing Services', 'imaginem-blocks-ii' ),
			]
		);

		$this->add_control(
		    'title',
			[
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'label' => __('Title', 'imaginem-blocks-ii'),
				'default' => __( 'Standard', 'imaginem-blocks-ii' ),
				'placeholder' => __( 'Standard', 'imaginem-blocks-ii' ),
				'label_block' => true,
				'separator' => 'before',
		    ]
		);

		$this->add_control(
			'featured',
			[
				'label' => __( 'Featured', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'imaginem-blocks-ii' ),
				'label_off' => __( 'No', 'imaginem-blocks-ii' ),
				'return_value' => 'yes',
				'default' => 'no',
				'prefix_class' => 'featured-pricing-',
			]
		);


		$this->add_control(
			'pricesymbol',
			[
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'label' => __('Symbol', 'imaginem-blocks-ii'),
				'default' => __( '$', 'imaginem-blocks-ii' ),
				'placeholder' => __( '$', 'imaginem-blocks-ii' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'symbolshift',
			[
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label' => __('Symbol align Right', 'imaginem-blocks-ii'),
				'label_on' => __( 'Right', 'your-plugin' ),
				'label_off' => __( 'Left', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price ( Main Unit )', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 9999999,
				'step' => 5,
				'default' => 10,
			]
		);


		$this->add_control(
			'fraction',
			[
				'label' => __( 'Fraction ( Cents )', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99,
				'step' => 1,
				'default' => 10,
			]
		);

		$this->add_control(
		    'duration',
			[
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'label' => __('Duration', 'imaginem-blocks-ii'),
				'default' => __( 'Monthly', 'imaginem-blocks-ii' ),
				'placeholder' => __( 'Monthly', 'imaginem-blocks-ii' ),
				'label_block' => true,
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'link',
			[
		        'type' => \Elementor\Controls_Manager::URL,
		        'label' => __('Button Link', 'imaginem-blocks-ii'),
		        'placeholder' => __( 'https://your-link.com', 'imaginem-blocks-ii' ),
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'button_text',
			[
		        'type' => \Elementor\Controls_Manager::TEXT,
		        'label' => __('Button Text', 'imaginem-blocks-ii'),
				'default' => __( 'Button', 'imaginem-blocks-ii' ),
				'placeholder' => __( 'Enter link text', 'imaginem-blocks-ii' ),
				'label_block' => true,
				'separator' => 'after',
		    ]
		);

		$this->add_control(
			'contentrichtext',
			[
				'label' => __( 'Services', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter your services', 'imaginem-blocks-ii' ),
				'default' => __( 'Add services text', 'imaginem-blocks-ii' ),
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'imaginem-blocks-ii' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'headerbackground',
			[
				'label' => __( 'Header Background Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .pricing-header' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featuredborder',
			[
				'label' => __( 'Featured Border Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}}.featured-pricing-yes .pricing-table' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .pricing-table .pricing-title h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .pricing-table .pricing-title h2',
			]
		);

		$this->add_control(
			'pricing_color',
			[
				'label' => __( 'Pricing Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .pricing-cell' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricingtypography',
				'selector' => '{{WRAPPER}} .pricing-cell',
			]
		);

		$this->add_responsive_control(
			'curradjust',
			[
				'label' => __( 'Currency Symbol and Fraction Adjuster', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-cell .pricing-currency' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pricing-cell .pricing-suffix' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'duration_color',
			[
				'label' => __( 'Duration Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .pricing-duration' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'duration_typography',
				'selector' => '{{WRAPPER}} .pricing-duration',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Content Background Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .pricing-table .pricing-column-target' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'.entry-content {{WRAPPER}} .pricing-table .pricing-service' => 'color: {{VALUE}};',
					'.entry-content {{WRAPPER}} .pricing-table .pricing-service p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '.entry-content {{WRAPPER}} .pricing-table .pricing-service p',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .mtheme-button' => 'border-color: {{VALUE}};color: {{VALUE}};',
					'{{WRAPPER}} .mtheme-button:hover' => 'background-color: {{VALUE}};color: #fff;',
				],
			]
		);

		$this->add_control(
			'button_htextcolor',
			[
				'label' => __( 'Button Hover Text Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .mtheme-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => __( 'Button Typography', 'imaginem-blocks-ii' ),
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .mtheme-button',
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

		$url = $settings['link']['url'];
		$url_target = $settings['link']['is_external'];
		$url_nofollow = $settings['link']['nofollow'];

		$service_shortcode = '[pricing_service]'.$settings['contentrichtext'].'[/pricing_service] ';

		$shortcode = '[pricing_table service="true" columns="1"][pricing_column symbolshift="'.$settings['symbolshift'].'" link="'.$url.'" link_target="'.$url_target.'" button_text="'.htmlspecialchars($settings['button_text']).'" title="'.htmlspecialchars($settings['title']).'" featured="'.$settings['featured'].'" currency="'.htmlspecialchars($settings['pricesymbol']).'" price="'.$settings['price'].'" fraction="'.$settings['fraction'].'" duration="'.htmlspecialchars($settings['duration']).'"]'.$service_shortcode.'[/pricing_column][/pricing_table]';

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

	public function add_wpml_support() {
		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );
	}

	public function wpml_widgets_to_translate_filter( $widgets ) {
		$widgets[ $this->get_name() ] = [
			'conditions' => [ 'widgetType' => $this->get_name() ],
			'fields'     => [
				[
					'field'       => 'title',
					'type'        => __( 'Title', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'pricesymbol',
					'type'        => __( 'Price Symbol', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'price',
					'type'        => __( 'Price', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'fraction',
					'type'        => __( 'Faction', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'duration',
					'type'        => __( 'Duration', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'button_text',
					'type'        => __( 'Button Text', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
				[
					'field'       => 'contentrichtext',
					'type'        => __( 'Services', 'imaginem-blocks-ii' ),
					'editor_type' => 'VISUAL'
				],
			],
		];
		return $widgets;
	}
}
