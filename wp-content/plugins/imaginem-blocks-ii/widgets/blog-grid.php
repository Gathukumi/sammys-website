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
class Blog_Grid extends Widget_Base {

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
		return 'blog-grid';
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
		return __( 'Blog Grid', 'imaginem-blocks-ii' );
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
		return 'eicon-posts-grid';
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
			'section_content',
			[
				'label' => __( 'Blog Grid', 'imaginem-blocks-ii' ),
			]
		);


		$this->add_control(
			'columns',
			[
				'label' => __( 'Columns', 'imaginem-blocks-ii' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'5' => __( '5', 'imaginem-blocks-ii' ),
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
		        'label' => __('Choose categories to list', 'imaginem-blocks-ii'),
		        'options' => themecore_elementor_categories('blog'),
		        'multiple' => true,
		        'default' => '',
		        'label_block' => true,
		    ]
		);

		$this->add_control(
		'style',
		    [
		        'type' => \Elementor\Controls_Manager::SELECT,
		        'label' => __('Style of Grid', 'imaginem-blocks-ii'),
		        'desc' => __('Style of Grid', 'imaginem-blocks-ii'),
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
					'{{WRAPPER}} #gridblock-container.portfolio-gutter-nospace .gridblock-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		'category_display',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Display categories', 'imaginem-blocks-ii'),
		    'desc' => __('Display categories', 'imaginem-blocks-ii'),
		    'options' => [
		        'no' => __('No','imaginem-blocks-ii'),
		        'yes' => __('Yes','imaginem-blocks-ii')
		    ],
			'default' => 'no',
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
		$this->add_control(
			'displayreadmore',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Display Readmore', 'imaginem-blocks-ii'),
				'desc' => __('title', 'imaginem-blocks-ii'),
				'options' => [
					'true' => __('Yes','imaginem-blocks-ii'),
					'false' => __('No','imaginem-blocks-ii')
				],
				'condition' => [
					'style' => 'classic',
				],
				'default' => 'true',
				]
			);

		$this->add_control(
			'showcomments',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Display Comment', 'imaginem-blocks-ii'),
				'desc' => __('title', 'imaginem-blocks-ii'),
				'options' => [
					'true' => __('Yes','imaginem-blocks-ii'),
					'false' => __('No','imaginem-blocks-ii')
				],
				'condition' => [
					'style' => 'classic',
				],
				'default' => 'true',
				]
			);

		$this->add_control(
			'showdate',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Display Date', 'imaginem-blocks-ii'),
				'desc' => __('title', 'imaginem-blocks-ii'),
				'options' => [
					'true' => __('Yes','imaginem-blocks-ii'),
					'false' => __('No','imaginem-blocks-ii')
				],
				'condition' => [
					'style' => 'classic',
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
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'align',
							'operator' => '=',
							'value' => 'left',
						],
						[
							'name' => 'align',
							'operator' => '=',
							'value' => 'right',
						],
					],
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
		'pagination',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Generate Pagination', 'imaginem-blocks-ii'),
		    'desc' => __('Generate Pagination', 'imaginem-blocks-ii'),
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
		    'categorycolor',
			[
				'label' => __('Category Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .worktype-categories' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Category Typography', 'imaginem-blocks-ii' ),
				'name' => 'categorytype',
				'selector' => '{{WRAPPER}} .worktype-categories',
			]
		);

		$this->add_control(
		    'summary_iconcolor',
			[
				'label' => __('Date Summary iCon Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .grid-has-blog .summary-info i' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_responsive_control(
			'summary_icon_size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .grid-has-blog .summary-info i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
		    'worktypecolor',
			[
				'label' => __('Date Summary Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .summary-date' => 'color: {{VALUE}};',
					'{{WRAPPER}} .summary-comment' => 'color: {{VALUE}};',
					'{{WRAPPER}} .summary-comment a' => 'color: {{VALUE}};',
				],
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Date Summary Typography', 'imaginem-blocks-ii' ),
				'name' => 'worktypetype',
				'selector' => '{{WRAPPER}} .grid-has-blog .summary-info',
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
		    ]
		);

		$this->add_control(
		    'iconbackgroundcolor',
			[
				'label' => __('Icon Background Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .column-gridblock-icon::after' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .column-gridblock-icon:hover::after' => 'background-color: {{VALUE}};',
				],
		    ]
		);

		$this->add_control(
			'readmorecolor',
			[
				'label' => __( 'Readmore Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-details .theme-hover-arrow' => 'color: {{VALUE}};',
					'{{WRAPPER}} .work-details .theme-hover-arrow::before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .work-details .arrow-link' => 'color: {{VALUE}};',
					'{{WRAPPER}} .work-details svg g' => 'stroke: {{VALUE}};',
					'{{WRAPPER}} .work-details svg path' => 'stroke: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'readmorehovercolor',
			[
				'label' => __( 'Readmore Hover Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .work-details .theme-hover-arrow:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .work-details .theme-hover-arrow:hover:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .work-details .arrow-link' => 'color: {{VALUE}};',
					'{{WRAPPER}} .work-details svg g' => 'stroke: {{VALUE}};',
					'{{WRAPPER}} .work-details svg path' => 'stroke: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Readmore Typography', 'imaginem-blocks-ii' ),
				'name' => 'readmoretypography',
				'selector' => '{{WRAPPER}} .work-details .theme-hover-arrow',
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

		$shortcode = '[gridcreate imagesize="'.$settings['imagesize'].'" grid_post_type="blog" showcomments="'.$settings['showcomments'].'" showdate="'.$settings['showdate'].'" displayreadmore="'.$settings['displayreadmore'].'" category_display="'.$settings['category_display'].'" effect="'.$settings['effect'].'" style="'.$settings['style'].'" columns="'.$settings['columns'].'" format="'.$settings['format'].'" worktype_slugs="'.$worktype_slugs.'" title="'.$settings['title'].'" desc="'.$settings['desc'].'" pagination="'.$settings['pagination'].'" limit="'.$settings['limit'].'"]';
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
