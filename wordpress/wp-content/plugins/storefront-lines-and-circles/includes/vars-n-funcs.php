<?php
/**
 * Created by PhpStorm.
 * User: Shramee Srivastav <shramee.srivastav@gmail.com>
 * Date: 3/5/15
 * Time: 7:53 PM
 */

/**
 * Supported control types
 * * text
 * * checkbox
 * * radio (requires choices array in $args)
 * * select (requires choices array in $args)
 * * dropdown-pages
 * * textarea
 * * color
 * * image
 * * sf-text
 * * sf-heading
 * * sf-divider
 *
 * sf- prefixed controls are arbitrary storefront controls
 *
 * NOTE : sf-text control doesn't show anything if description is not set but
 * in Storefront_Lines_And_Circles_Customizer_Fields class we assign it to label
 * if not set ;)
 *
 */
$storefront_lines_and_circles_customizer_fields = array(

	array(
		'id'		=> 'home',
		'label'		=> 'Show on Home Page',
		'section'	=> 'Lines And Circles',
		'type'		=> 'checkbox',
	),

	array(
		'id'		=> 'data-1-divider',
		'label'		=> 'Circle 1',
		'section'	=> 'Lines And Circles',
		'type'		=> 'sf-divider',

	),
	array(
		'id'		=> 'data-1-img',
		'label'		=> 'Circle 1 Image',
		'section'	=> 'Lines And Circles',
		'type'		=> 'image',

	),
	array(
		'id'		=> 'data-1-head',
		'label'		=> 'Circle 1 Heading',
		'section'	=> 'Lines And Circles',
		'type'		=> 'text',

	),
	array(
		'id'		=> 'data-1-desc',
		'label'		=> 'Circle 1 Description',
		'section'	=> 'Lines And Circles',
		'type'		=> 'textarea',
	),
	array(
		'id'		=> 'data-2-divider',
		'label'		=> 'Circle 2',
		'section'	=> 'Lines And Circles',
		'type'		=> 'sf-divider',

	),
	array(
		'id'		=> 'data-2-img',
		'label'		=> 'Circle 2 Image',
		'section'	=> 'Lines And Circles',
		'type'		=> 'image',

	),
	array(
		'id'		=> 'data-2-head',
		'label'		=> 'Circle 2 Heading',
		'section'	=> 'Lines And Circles',
		'type'		=> 'text',

	),
	array(
		'id'		=> 'data-2-desc',
		'label'		=> 'Circle 2 Description',
		'section'	=> 'Lines And Circles',
		'type'		=> 'textarea',
	),
	array(
		'id'		=> 'data-3-divider',
		'label'		=> 'Circle 3',
		'section'	=> 'Lines And Circles',
		'type'		=> 'sf-divider',

	),
	array(
		'id'		=> 'data-3-img',
		'label'		=> 'Circle 3 Image',
		'section'	=> 'Lines And Circles',
		'type'		=> 'image',

	),
	array(
		'id'		=> 'data-3-head',
		'label'		=> 'Circle 3 Heading',
		'section'	=> 'Lines And Circles',
		'type'		=> 'text',

	),
	array(
		'id'		=> 'data-3-desc',
		'label'		=> 'Circle 3 Description',
		'section'	=> 'Lines And Circles',
		'type'		=> 'textarea',
	),
	array(
		'id'		=> 'data-4-divider',
		'label'		=> 'Circle 4',
		'section'	=> 'Lines And Circles',
		'type'		=> 'sf-divider',

	),
	array(
		'id'		=> 'data-4-img',
		'label'		=> 'Circle 4 Image',
		'section'	=> 'Lines And Circles',
		'type'		=> 'image',

	),
	array(
		'id'		=> 'data-4-head',
		'label'		=> 'Circle 4 Heading',
		'section'	=> 'Lines And Circles',
		'type'		=> 'text',

	),
	array(
		'id'		=> 'data-4-desc',
		'label'		=> 'Circle 4 Description',
		'section'	=> 'Lines And Circles',
		'type'		=> 'textarea',
	),
);