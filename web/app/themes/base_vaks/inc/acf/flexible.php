<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder( 'flex-layouts' );
$builder
	->addFlexibleContent('flex_layouts', ['label' => ''])

		// Products
		->addLayout('Products/Portfolio', ['label' => 'Kulturas'])
		->addGroup('products', ['layout' => 'block', 'label' => 'Saraksts'])
			//->addText('prod_category_name', ['label' => 'Product Group Category Name'])
			//->addTextarea('prod_group_description', ['label' => 'Product Group Description', 'rows' => 3])
			->addRepeater('product_items', ['layout' => 'table', 'label' => 'Agricultures'])
				->addImage('product_image', ['return_format' => 'id', 'wrapper' => ['width' => 25], 'label' => 'Aattēls'])
				->addSelect('select_field', [ 'label' => 'Fona krāsa','choices' => ['dzeltens','zals','zils'],'default_value' => ['dzeltens'],'wrapper' => ['width' => 25],'ui' => 1,'return_format' => 'value'])
				->addGroup('product_description', ['layout' => 'block', 'label' => 'Kultūru Nosaukumi'])
					->addText('product_caption', ['label' => 'Kultūras Nosaukums'])
				// 	->addLink('product_link', ['label' => 'Product Link'])
				// 	->addTextarea('product_short_description', ['label' => 'Product Short Description', 'rows' => 3])
				// ->endGroup()
				// ->addGroup('product_prices', ['layout' => 'block', 'label' => 'Prices', 'wrapper' => ['width' => 25]])
				// 	->addNumber('product_price', ['label' => 'Price'])
				// 	->addNumber('product_new_price', ['label' => 'New Price'])
				->endGroup()
			->endRepeater()
		->endGroup()

		// Related Posts
		->addLayout('Related Posts Cards')
		->addNumber('col_desk_related_posts', [
			'label' => 'Col per row - Desktop',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '15',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addNumber('col_tab_related_posts', [
			'label' => 'Col per row - Tablet',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '15',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addNumber('col_mob_related_posts', [
			'label' => 'Col per row - Mob & Default',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '15',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addTrueFalse('truefalse_swiper_related_posts', [
			'label' => 'Swiper slider',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addTrueFalse('truefalse_loadmore_related_posts', [
			'label' => 'Load more',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addTrueFalse('truefalse_form_related_posts', [
			'label' => 'Apply',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addTrueFalse('truefalse_learnmore_related_posts', [
			'label' => 'Read more',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addText('txt_learnmore_related_post', ['label' => 'R_more text', 'wrapper' => ['width' => 10]])
		->addGroup('related-posts', ['layout' => 'block', 'label' => 'Related Pages'])
			->addRelationship('relationship_field_posts', [
				'label' => 'Relationship Field',
				'instructions' => '',
				'required' => 0,
				//'conditional_logic' => 0,
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'post_type' => [],
				'taxonomy' => [],
				'filters' => [
					0 => 'post_type',
					1 => 'taxonomy',
					1 => 'search', 
				],
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			])
		->endGroup()

		// Related Pages
		->addLayout('Related Pages Cards')
		->addNumber('col_desk_related_pages', [
			'label' => 'Col per row - Desktop',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '20',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addNumber('col_tab_related_pages', [
			'label' => 'Col per row - Tablet',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '20',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addNumber('col_mob_related_pages', [
			'label' => 'Col per row - Mob & Default',
			'layout' => 'block',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '20',
				'class' => '',
				'id' => '',
			],
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '12',
			'step' => '',
		])
		->addTrueFalse('truefalse_swiper_related_pages', [
			'label' => 'Swiper slider',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addTrueFalse('truefalse_loadmore_related_pages', [
			'label' => 'Load more',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addTrueFalse('truefalse_learnmore_related_pages', [
			'label' => 'Read more',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '10',
				'class' => '',
				'id' => '',
			],
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		])
		->addText('txt_learnmore_related_page', ['label' => 'R_more text', 'wrapper' => ['width' => 10]])
		->addGroup('related-pages', ['layout' => 'block', 'label' => 'Related Pages'])
			->addRelationship('relationship_field_pages', [
				'label' => 'Relationship Field',
				'instructions' => '',
				'required' => 0,
				//'conditional_logic' => 0,
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'post_type' => ['page'],
				'taxonomy' => [],
				'filters' => [
					0 => 'post_type',
					0 => 'taxonomy',
					0 => 'search', 
				],
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			])
		->endGroup()

		// Accordion
		->addLayout('Accordion')
		->addRepeater('accordion')
			->addGroup('accordion_items')
				->addAccordion('accordion_tab', ['layout' => 'block', 'label' => 'Accordion Item'])
				->addText('accordion_title', ['layout' => 'block', 'label' => 'Accordion Caption', 'wrapper' => ['width' => 100] ])
				->addWysiwyg('accordion_content', ['layout' => 'block', 'label' => 'Accordion Caption', 'wrapper' => ['width' => 100] ])
			->endGroup()
		->endRepeater()
		
	->endFlexibleContent()
	//->setLocation('post_type', '==', 'post'); // If static bottom
	//->setLocation('post_type', '==', 'page'); // If static bottom
	//->setLocation('post_type', '==', 'all'); // If static bottom all post types
	->setLocation('block', '==', 'acf/flex-layouts');

	add_action('acf/init', function() use ($builder) {
		acf_add_local_field_group( $builder->build() );
		acf_update_setting('google_api_key', 'AIzaSyDgxqiCatkYH81cqSfRaDaMtTbw8yLpfuE'); // Caballero
		//acf_update_setting('google_api_key', 'AIzaSyAIzn4jDmtS-gvSR3TwREr6mmVAkF-NwvQ'); // me
		//print_r($builder->build());
	});
