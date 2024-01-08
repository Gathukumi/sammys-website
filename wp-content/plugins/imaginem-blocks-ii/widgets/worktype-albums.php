<?php
namespace ImaginemBlocks\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Imaginem Blocks
 *
 * Elementor widget for Imaginem Blocks.
 *
 * @since 1.0.0
 */
class Worktype_Albums extends Widget_Base {

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
		return 'worktype-albums';
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
		return __( 'Worktype Albums', 'imaginem-blocks-ii' );
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
		return 'eicon-gallery-grid';
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
		return [ 'isotope' ];
		//return [ 'jarallax', 'parallaxi' ];
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
				'label' => __( 'Worktype Albums', 'imaginem-blocks-ii' ),
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
		'style',
		    [
		        'type' => \Elementor\Controls_Manager::SELECT,
		        'label' => __('Style of Portfolio', 'imaginem-blocks-ii'),
		        'desc' => __('Style of Portfolio', 'imaginem-blocks-ii'),
		        'options' => [
		            'classic' => __('Classic', 'imaginem-blocks-ii'),
		            'wall-spaced' => __('Box Spaced', 'imaginem-blocks-ii'),
		            'wall-grid' => __('Box Grid', 'imaginem-blocks-ii'),
		        ],
		        'default' => 'classic',
		    ]
		);

		$this->add_control(
		    'effect',
		    [
		        'type' => \Elementor\Controls_Manager::SELECT,
		        'label' => __('Hover Effect', 'imaginem-blocks-ii'),
		        'desc' => __('Hover Effect', 'imaginem-blocks-ii'),
		        'options' => [
		            'default' => __('Default', 'imaginem-blocks-ii'),
		            'none' => __('None', 'imaginem-blocks-ii'),
		            'tilt' => __('Tilt', 'imaginem-blocks-ii'),
		            'blur' => __('Blur', 'imaginem-blocks-ii'),
		            'zoom' => __('Zoom', 'imaginem-blocks-ii')
		        ],
		        'default' => 'default',
		    ]
		);

		$this->add_control(
		'format',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Image format', 'imaginem-blocks-ii'),
		    'desc' => __('Image format', 'imaginem-blocks-ii'),
		    'options' => [
		        'landscape' => __('Landscape','imaginem-blocks-ii'),
		        'square' => __('Square','imaginem-blocks-ii'),
		        'portrait' => __('Portrait','imaginem-blocks-ii'),
		        'masonary' => __('Masonry','imaginem-blocks-ii')
		    ],
			'default' => 'landscape',
            ]
        );

		$this->add_control(
			'item_text',
			[
				'label' => __( 'Item text singular referrer', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Item', 'imaginem-blocks-ii' ),
				'default' => __( 'Item', 'imaginem-blocks-ii' ),
			]
		);

		$this->add_control(
			'items_text',
			[
				'label' => __( 'Item text plural referrer', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Items', 'imaginem-blocks-ii' ),
				'default' => __( 'Items', 'imaginem-blocks-ii' ),
			]
		);

		$this->add_control(
			'worktype_icon',
			[
				'label' => __( 'Choose Icon', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::ICON,
				'options' => mtheme_elementor_icons(),
				'default' => 'ion-ios-albums-outline',
			]
		);

		$this->add_control(
		'item_count',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Item Count', 'imaginem-blocks-ii'),
		    'desc' => __('Item Count', 'imaginem-blocks-ii'),
		    'options' => [
		        'true' => __('Yes','imaginem-blocks-ii'),
		        'false' => __('No','imaginem-blocks-ii')
		    ],
			'default' => 'true',
		    ]
		);

		$this->add_control(
		'title',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Title', 'imaginem-blocks-ii'),
		    'desc' => __('title', 'imaginem-blocks-ii'),
		    'options' => [
		        'true' => __('Yes','imaginem-blocks-ii'),
		        'false' => __('No','imaginem-blocks-ii')
		    ],
			'default' => 'true',
            ]
        );
		$this->add_control(
		'desc',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Description', 'imaginem-blocks-ii'),
		    'desc' => __('Description', 'imaginem-blocks-ii'),
		    'options' => [
		        'true' => __('Yes','imaginem-blocks-ii'),
		        'false' => __('No','imaginem-blocks-ii')
		    ],
			'default' => 'true',
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'imaginem-blocks-ii' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
		    'titlecolor',
			[
				'label' => __('Title Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-details h4' => 'color: {{VALUE}};',
					'{{WRAPPER}} .work-details h4 a' => 'color: {{VALUE}};',
				],
		    ]
		);

		$this->add_control(
		    'titlehovercolor',
			[
				'label' => __('Title Hover Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-details h4 a:hover' => 'color: {{VALUE}};',
				],
		    ]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'imaginem-blocks-ii' ),
				'name' => 'titletype',
				'selector' => '{{WRAPPER}} .work-details h4,{{WRAPPER}} .work-details h4 a',
			]
		);

		$this->add_control(
		    'descriptioncolor',
			[
				'label' => __('Description Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-description' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Description Typography', 'imaginem-blocks-ii' ),
				'name' => 'descriptiontype',
				'selector' => '{{WRAPPER}} .work-description',
			]
		);

		$this->add_control(
		    'thumbnailhover',
			[
				'label' => __('Thumbnail Hover Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gridblock-background-hover' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'iconcolor',
			[
				'label' => __('Icon Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon i' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'iconhovercolor',
			[
				'label' => __('Icon Hover Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon:hover i' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'iconbackgroundcolor',
			[
				'label' => __('Icon Border Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon::after' => 'border-color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'iconhoverbackgroundcolor',
			[
				'label' => __('Icon Hover background Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon:hover::after' => 'border-color: {{VALUE}};background-color: {{VALUE}};',
				],
				'separator' => 'before',
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

		$shortcode = '[worktype_albums worktype_icon="'.$settings['worktype_icon'].'" item_count="'.$settings['item_count'].'" item_text="'.$settings['item_text'].'" items_text="'.$settings['items_text'].'" worktype_slugs="'.$worktype_slugs.'" effect="'.$settings['effect'].'" style="'.$settings['style'].'" columns="'.$settings['columns'].'" format="'.$settings['format'].'" title="'.$settings['title'].'" description="'.$settings['desc'].'"]';
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
					'field'       => 'item_text',
					'type'        => __( 'Item text singular referrer', 'imaginem-blocks-ii' ),
					'editor_type' => 'AREA'
				],
				[
					'field'       => 'items_text',
					'type'        => __( 'Item text plural referrer', 'imaginem-blocks-ii' ),
					'editor_type' => 'AREA'
				],
			],
		];
		return $widgets;
	}
}
