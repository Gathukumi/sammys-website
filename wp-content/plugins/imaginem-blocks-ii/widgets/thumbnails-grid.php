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
class Thumbnails_Grid extends Widget_Base {

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
		return 'thumbnails-grid';
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
		return __( 'Thumbnails Grid', 'imaginem-blocks-ii' );
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
			'section_gallery',
			[
				'label' => __( 'Image Gallery', 'imaginem-blocks-ii' ),
			]
		);

		$this->add_control(
			'wp_gallery',
			[
				'label' => __( 'Add Images', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				]
			]
		);


		$this->add_control(
			'style',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Style of Thumbnails', 'imaginem-blocks-ii'),
				'desc' => __('Style of Thumbnails', 'imaginem-blocks-ii'),
				'options' => [
					'classic' => __('Classic', 'imaginem-blocks-ii'),
					'wall-spaced' => __('Box Spaced', 'imaginem-blocks-ii'),
					'wall-grid' => __('Box Grid', 'imaginem-blocks-ii'),
				],
				'default' => 'classic',
			]
		);

		$this->add_control(
			'elementsradius',
			[
				'label' => __( 'Border Radius', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .gridblock-grid-element' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'gutter_space',
			[
				'label' => __( 'Gutter Space', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .thumbnails-grid-container.thumbnail-gutter-nospace .gridblock-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'style' => 'wall-grid',
				],
			]
		);

		$this->add_control(
			'effect',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'group_title' => 'Hover',
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
			'columns',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'group_title' => 'Type',
				'label' => __('Grid Columns', 'imaginem-blocks-ii'),
				'desc' => __('No. of Grid Columns', 'imaginem-blocks-ii'),
				'options' => [
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1'
				],
				'default' => '3',
			]
		);
		$this->add_control(
			'format',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Image Type', 'imaginem-blocks-ii'),
				'desc' => __('Image Type', 'imaginem-blocks-ii'),
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
			'imagesize',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Image Size', 'imaginem-blocks-ii'),
				'desc' => __('Image Size', 'imaginem-blocks-ii'),
				'options' => [
					'defaultsize'  => __('Default','imaginem-blocks-ii'),
					'fullsize' => __('Original','imaginem-blocks-ii')
				],
				'default' => 'defaultsize',
				'condition' => [
					'format' => 'masonary',
				],
			]
		);
		$this->add_control(
			'like',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Display like/heart', 'imaginem-blocks-ii'),
				'desc' => __('Displays like/heart', 'imaginem-blocks-ii'),
				'options' => [
					'no' => __('No','imaginem-blocks-ii'),
					'yes' => __('Yes','imaginem-blocks-ii')
				],
				'default' => 'no',
			]
		);
		$this->add_control(
			'filter',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'group_title' => 'Filter',
				'label' => __('Filter', 'imaginem-blocks-ii'),
				'desc' => __('Filter using image tags.', 'imaginem-blocks-ii'),
				'options' => [
					'none' => __('None','imaginem-blocks-ii'),
					'tags' => __('Filter with Tags','imaginem-blocks-ii')
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'filtersort',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Filter Sort', 'imaginem-blocks-ii'),
				'desc' => __('Filter Sort order', 'imaginem-blocks-ii'),
				'options' => [
					'none' => __('Default','imaginem-blocks-ii'),
					'asc' => __('Ascending','imaginem-blocks-ii'),
					'desc' => __('Descending','imaginem-blocks-ii')
				],
				'default' => 'none',
				'condition' => [
					'filter' => 'tags',
				],
			]
		);
		$this->add_control(
			'filterall',
			[
			    'std' => 'All',
			    'type' => 'text',
			    'label' => __('Filter tag for all filters', 'imaginem-blocks-ii'),
				'desc' => __('Filter tag for all filters', 'imaginem-blocks-ii'),
				'condition' => [
					'filter' => 'tags',
				],
			]
		);
		$this->add_control(
			'linktype',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'group_title' => 'Link',
				'label' => __('Link Type', 'imaginem-blocks-ii'),
				'desc' => __('Link Type. Linked method uses image link field in Media manager image section.', 'imaginem-blocks-ii'),
				'options' => [
					'lightbox' => __('Lightbox','imaginem-blocks-ii'),
					'download' => __('Downloadable','imaginem-blocks-ii'),
					'url' => __('Link using Image link data','imaginem-blocks-ii'),
					'purchase' => __('Link using image data purchase link','imaginem-blocks-ii')
				],
				'default' => 'lightbox',
			]
		);
		$this->add_control(
			'title',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'group_title' => 'Content',
				'label' => __('Dispay image title', 'imaginem-blocks-ii'),
				'desc' => __('Display image title', 'imaginem-blocks-ii'),
				'options' => [
					'true' => __('Yes','imaginem-blocks-ii'),
					'false' => __('No','imaginem-blocks-ii')
				],
				'default' => 'true',
			]
		);
		$this->add_control(
			'description',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Display image description', 'imaginem-blocks-ii'),
				'desc' => __('Display image description', 'imaginem-blocks-ii'),
				'options' => [
					'true' => __('Yes','imaginem-blocks-ii'),
					'false' => __('No','imaginem-blocks-ii')
				],
				'default' => 'true',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'imaginem-blocks-ii' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'imaginem-blocks-ii' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'imaginem-blocks-ii' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'prefix_class' => 'section-align-',
				'selectors' => [
					'{{WRAPPER}} .work-details' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .worktype-categories' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'descriptionwidth',
			[
				'label' => __( 'Description Width', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .work-description' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1400,
					],
				],
			]
		);

		$this->add_responsive_control(
			'textoverlayopacity',
			[
				'label' => __( 'Default text overlay opacity', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'condition' => [
					'style!' => 'classic',
				],
				'selectors' => [
					'{{WRAPPER}} .gridblock-background-hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_responsive_control(
			'hovertextoverlayopacity',
			[
				'label' => __( 'Hover text overlay opacity', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0,
						'step' => 0.01,
					],
				],
				'condition' => [
					'style!' => 'classic',
				],
				'selectors' => [
					'{{WRAPPER}} .gridblock-grid-element:hover .gridblock-background-hover' => 'opacity: {{SIZE}};',
				],
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
				'label' => __('Icon Background Hover Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon:hover::after' => 'border-color: {{VALUE}};background-color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);

		$this->add_control(
		    'filtercolor',
			[
				'label' => __('Filter Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #gridblock-filters li a' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_control(
		    'filterline',
			[
				'label' => __('Filter Line', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #gridblock-filters ul' => 'border-color: {{VALUE}};',
				],
		    ]
		);
		$this->add_control(
		    'filterhover',
			[
				'label' => __('Filter Hover Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #gridblock-filters li a:hover' => 'color: {{VALUE}};',
				],
		    ]
		);
		$this->add_control(
		    'filteractive',
			[
				'label' => __('Filter Active Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #gridblock-filters li a::after' => 'background: {{VALUE}};',
					'{{WRAPPER}} #gridblock-filters li a:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} #gridblock-filters a:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} #gridblock-filters li .is-active' => 'color: {{VALUE}};',
					'{{WRAPPER}} #gridblock-filters li .is-active:hover' => 'color: {{VALUE}};',
				],
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Filter Typography', 'imaginem-blocks-ii' ),
				'name' => 'filtertype',
				'selector' => '{{WRAPPER}} #gridblock-filters li a',
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

		$shortcode = '[thumbnails imagesize="'.$settings['imagesize'].'" filtersort="'.$settings['filtersort'].'" effect="'.$settings['effect'].'" style="'.$settings['style'].'" linktype="'.$settings['linktype'].'" like="'.$settings['like'].'" filterall="'.$settings['filterall'].'" filter="'.$settings['filter'].'" columns="'.$settings['columns'].'" format="'.$settings['format'].'" title="'.$settings['title'].'" pb_image_ids="'.$pb_image_ids.'" description="'.$settings['description'].'"]';
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
					'field'       => 'filterall',
					'type'        => __( 'Filter All text', 'imaginem-blocks-ii' ),
					'editor_type' => 'LINE'
				],
			],
		];
		return $widgets;
	}
}
