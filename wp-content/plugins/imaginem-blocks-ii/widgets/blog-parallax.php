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
class Blog_Parallax extends Widget_Base {

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
		return 'blog-parallax';
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
		return __( 'Blog Parallax', 'imaginem-blocks-ii' );
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
		return 'eicon-parallax';
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
				'label' => __( 'Blog Parallax', 'imaginem-blocks-ii' ),
			]
		);


		$this->add_control(
		    'cat_slugs',
		    [
		        'type' => \Elementor\Controls_Manager::SELECT2,
		        'label' => __('Choose categories to list', 'imaginem-blocks-ii'),
		        'options' => themecore_elementor_categories('blog'),
		        'multiple' => true,
		        'default' => '',
		        'label_block' => true,
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
				'default' => 'center',
				'prefix_class' => 'blog-parallax-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
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
		'date',
		[
		    'type' => \Elementor\Controls_Manager::SELECT,
		    'label' => __('Date', 'imaginem-blocks-ii'),
		    'desc' => __('Date', 'imaginem-blocks-ii'),
		    'options' => [
		        'true' => __('Yes','imaginem-blocks-ii'),
		        'false' => __('No','imaginem-blocks-ii')
		    ],
			'default' => 'true',
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
				'default' => 'false',
				]
			);

		$this->add_control(
			'height',
			[
				'label' => __( 'height', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 500,
				'max' => 2000,
				'step' => 1,
				'default' => 0,
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
		    'parallaxoverlay',
			[
				'label' => __('Background Image Overlay', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.entry-content {{WRAPPER}} .gridblock-parallax-wrap .vertical-parallax-image::after' => 'background-color: {{VALUE}};',
				],
		    ]
		);
		$this->add_control(
		    'contentbackground',
			[
				'label' => __('Contents Background Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.entry-content {{WRAPPER}} .gridblock-parallax-wrap .slideshow-box-info' => 'background-color: {{VALUE}};',
				],
		    ]
		);


		$this->add_control(
		    'contentbackgroundhover',
			[
				'label' => __('Contents Background Hover', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.entry-content {{WRAPPER}} .gridblock-parallax-wrap .slideshow-box-info:hover' => 'background-color: {{VALUE}};',
				],
		    ]
		);


		$this->add_control(
		    'titlecolor',
			[
				'label' => __('Title Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.entry-content {{WRAPPER}} .gridblock-blog-parallax .photocard-title' => 'color: {{VALUE}};',
					'.entry-content {{WRAPPER}} .gridblock-blog-parallax .photocard-title a' => 'color: {{VALUE}};',
				],
		    ]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Title Typography', 'imaginem-blocks-ii' ),
				'name' => 'titletype',
				'selector' => '.entry-content {{WRAPPER}} .gridblock-blog-parallax .photocard-title',
			]
		);

		$this->add_control(
		    'descriptioncolor',
			[
				'label' => __('Content Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'.entry-content {{WRAPPER}} .photocard-contents' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Contents Typography', 'imaginem-blocks-ii' ),
				'name' => 'descriptiontype',
				'selector' => '.entry-content {{WRAPPER}} .photocard-contents',
			]
		);

		$this->add_control(
		    'datecolor',
			[
				'label' => __('Date Color', 'imaginem-blocks-ii'),
		        'std' => '',
		        'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .photocard-subtitle' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
		    ]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Date Typography', 'imaginem-blocks-ii' ),
				'name' => 'datetype',
				'selector' => '.entry-content {{WRAPPER}} .photocard-subtitle',
			]
		);

		$this->add_control(
			'readmorecolor',
			[
				'label' => __( 'Readmore Color', 'imaginem-blocks-ii' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .gridblock-parallax-wrap .theme-hover-arrow' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gridblock-parallax-wrap .theme-hover-arrow::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .gridblock-parallax-wrap .arrow-link' => 'color: {{VALUE}};',
					'{{WRAPPER}} .gridblock-parallax-wrap svg g' => 'stroke: {{VALUE}};',
					'{{WRAPPER}} .gridblock-parallax-wrap svg path' => 'stroke: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Readmore Typography', 'imaginem-blocks-ii' ),
				'name' => 'readmoretypography',
				'selector' => '{{WRAPPER}} .gridblock-blog-parallax .theme-hover-arrow,{{WRAPPER}} .gridblock-blog-parallax .arrow-link',
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

		$cat_slugs = '';
		if ( is_array($settings['cat_slugs']) ) {
			$cat_slugs = implode (",", $settings['cat_slugs']);
		}

		$shortcode = '[blog_parallax pagination="'.$settings['pagination'].'" cat_slugs="'.$cat_slugs.'" limit="'.$settings['limit'].'" height="'.$settings['height'].'" title="'.$settings['title'].'" desc="'.$settings['desc'].'" date="'.$settings['date'].'"]';

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
