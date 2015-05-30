<?php
/**
 * Custom Fields
 *
 * @package Mokka
 * @since 	Mokka 1.0
**/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_category-options',
		'title' => 'Category Options',
		'fields' => array (
			array (
				'key' => 'field_538b30782d6fa',
				'label' => 'Display Latest Posts on Menu',
				'name' => 'menu_latest_posts',
				'type' => 'radio',
				'instructions' => 'Enable or Disable latest posts in the drop down on Main Menu',
				'choices' => array (
					'menu_latest_posts_on' => 'Enable',
					'menu_latest_posts_off' => 'Disable',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'menu_latest_posts_off',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_538b310f2cfbf',
				'label' => 'Category Layouts',
				'name' => 'category_layouts',
				'type' => 'radio',
				'instructions' => 'Choose Category page layout for this category',
				'choices' => array (
					'layout_1' => 'Layout 1</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-1.png">',
					'layout_2' => 'Layout 2</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-2.png">',
					'layout_3' => 'Layout 3</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-3.png">',
					'layout_4' => 'Layout 4</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-4.png">',
					'layout_5' => 'Layout 5</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-5.png">',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'layout_1',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_538b324d35275',
				'label' => 'Category Ad',
				'name' => 'category_ad',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-audio',
		'title' => 'Format Audio',
		'fields' => array (
			array (
				'key' => 'field_538cd3f523f31',
				'label' => 'Select Option',
				'name' => 'select_option',
				'type' => 'select',
				'choices' => array (
					'audio_url' => 'Audio Url',
					'self_audio_url' => 'Self Hosted Audio Url',
					'audio_embed_code' => 'Audio Embed Code',
				),
				'default_value' => 'audio_url',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_538cde0c0b484',
				'label' => 'Audio Url',
				'name' => 'add_audio_url',
				'type' => 'text',
				'instructions' => 'Paste page URL from SoundCloud',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'audio_url',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538cde573ed7e',
				'label' => 'Audio Embed Code',
				'name' => 'add_audio_embed_code',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'audio_embed_code',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539d7dc16ead4',
				'label' => 'Title',
				'name' => 'self_audio_title',
				'type' => 'text',
				'instructions' => 'Input the audio title ',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'self_audio_url',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539d7df96ead5',
				'label' => 'Artist',
				'name' => 'audio_artist',
				'type' => 'text',
				'instructions' => 'Input the audio artist (for playlist).',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'self_audio_url',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539d7e266ead6',
				'label' => 'Audio format',
				'name' => 'audio_format',
				'type' => 'select',
				'instructions' => 'Choose audio format',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'self_audio_url',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'mp3' => 'mp3',
					'wav' => 'wav',
					'ogg' => 'ogg',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_539d7e5f6ead7',
				'label' => 'Audio URL',
				'name' => 'self_hosted_audio_url',
				'type' => 'text',
				'instructions' => 'Input the audio URL.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_538cd3f523f31',
							'operator' => '==',
							'value' => 'self_audio_url',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-gallery',
		'title' => 'Format Gallery',
		'fields' => array (
			array (
				'key' => 'field_539d6c3ae1eab',
				'label' => 'Gallery Type',
				'name' => 'gallery_type',
				'type' => 'select',
				'instructions' => 'Select gallery type',
				'choices' => array (
					'slidershow' => 'Slidershow',
					'grid' => 'Grid',
				),
				'default_value' => 'slidershow',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_539d739ae4ab4',
				'label' => 'Target Height',
				'name' => 'target_height',
				'type' => 'text',
				'instructions' => 'The ideal height you want your row to be. It will not be exactly height that you have entered because plugin adjusts the row height to get the correct width. Play with this value because it will affect on image tile displaying. This only works with grid type gallery format',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_539d6c3ae1eab',
							'operator' => '==',
							'value' => 'grid',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 300,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539d7409241ec',
				'label' => 'Margins',
				'name' => 'grid_margins',
				'type' => 'text',
				'instructions' => 'Decide margin between images',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_539d6c3ae1eab',
							'operator' => '==',
							'value' => 'grid',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 2,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_539d7447aab74',
				'label' => 'Randomize',
				'name' => 'grid_randomize',
				'type' => 'select',
				'instructions' => 'Automatically randomize or not the order of photos.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_539d6c3ae1eab',
							'operator' => '==',
							'value' => 'grid',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'false' => 'False',
					'true' => 'True',
				),
				'default_value' => 'false',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_539d7664bac8f',
				'label' => 'Auto Slide',
				'name' => 'auto_slide',
				'type' => 'select',
				'instructions' => 'Enable/disable auto slider',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_539d6c3ae1eab',
							'operator' => '==',
							'value' => 'slidershow',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'true' => 'True',
					'false' => 'False',
				),
				'default_value' => 'true',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_539d76c3fd43c',
				'label' => 'Slide Speed',
				'name' => 'slide_speed',
				'type' => 'text',
				'instructions' => 'Decide slider speed',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_539d6c3ae1eab',
							'operator' => '==',
							'value' => 'slidershow',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 500,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5391a0c2a24fe',
				'label' => 'Upload Gallery Images',
				'name' => 'upload_gallery_images',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-link',
		'title' => 'Format link',
		'fields' => array (
			array (
				'key' => 'field_538c80861016c',
				'label' => 'Format Link',
				'name' => 'format_link',
				'type' => 'text',
				'instructions' => 'Please enter link here',
				'default_value' => '',
				'placeholder' => 'Http://www.example.com',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'link',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-quote',
		'title' => 'Format Quote',
		'fields' => array (
			array (
				'key' => 'field_538c944ace500',
				'label' => 'Quote Author',
				'name' => 'quote_author',
				'type' => 'text',
				'instructions' => 'Put quote author in this field',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'quote',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-video',
		'title' => 'Format Video',
		'fields' => array (
			array (
				'key' => 'field_5391a1aa31803',
				'label' => 'Add Video',
				'name' => 'add_video',
				'type' => 'text',
				'instructions' => 'Paste video page URL',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-composer',
		'title' => 'Page Composer',
		'fields' => array (
			array (
				'key' => 'field_53a538f6dc9ae',
				'label' => 'Page Composer',
				'name' => 'page_composer',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Grid/Slider',
						'name' => 'grid_slider',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a5d1b4777ae',
								'label' => 'Select Grid or Slider',
								'name' => 'grid_or_slider',
								'type' => 'radio',
								'instructions' => 'Choose grid style',
								'column_width' => '',
								'choices' => array (
									'grid_1' => 'Grid 1</br><img class="opt-image" title="Grid 1" src="'.get_template_directory_uri().'/images/partial/grid-1.jpg">',
									'grid_2' => 'Grid 2</br><img class="opt-image" title="Grid 2" src="'.get_template_directory_uri().'/images/partial/grid-2.jpg">',
									'grid_3' => 'Grid 3 + owlCarousel</br><img class="opt-image" title="Grid 3" src="'.get_template_directory_uri().'/images/partial/grid-3.jpg">',
									'owlCarousel' => 'owlCarousel</br><img class="opt-image" title="Flexslider" src="'.get_template_directory_uri().'/images/partial/flexislider.jpg">',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'grid_1',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_53a6ccf139ec5',
								'label' => 'Select Option',
								'name' => 'select_option',
								'type' => 'radio',
								'instructions' => 'Posts from all categories / from specific category',
								'column_width' => '',
								'choices' => array (
									'all_categories' => 'All Categories',
									'specific_categories' => 'Specific Categories',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'all_categories',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_53a6cdf6e0ca6',
								'label' => 'Categories',
								'name' => 'featured_categories',
								'type' => 'taxonomy',
								'instructions' => 'Select one or more categories',
								'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
										array (
											'field' => 'field_53a6ccf139ec5',
											'operator' => '==',
											'value' => 'specific_categories',
										),
									),
									'allorany' => 'all',
								),
								'column_width' => '',
								'taxonomy' => 'category',
								'field_type' => 'checkbox',
								'allow_null' => 0,
								'load_save_terms' => 0,
								'return_format' => 'id',
								'multiple' => 0,
							),
							array (
								'key' => 'field_53a6c5ef31b87',
								'label' => 'Number of posts',
								'name' => 'number_of_posts',
								'type' => 'text',
								'instructions' => 'Enter number of posts to show',
								'column_width' => '',
								'default_value' => 6,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Latest By Category',
						'name' => 'latest_by_category',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a53bcdabd0e',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a53bf8abd0f',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a540901a269',
								'label' => 'Category',
								'name' => 'category_name',
								'type' => 'taxonomy',
								'instructions' => 'Select the category for this section',
								'column_width' => '',
								'taxonomy' => 'category',
								'field_type' => 'select',
								'allow_null' => 0,
								'load_save_terms' => 0,
								'return_format' => 'id',
								'multiple' => 0,
							),
							array (
								'key' => 'field_53a578ae54833',
								'label' => 'Posts Excerpt',
								'name' => 'posts_excerpt',
								'type' => 'radio',
								'instructions' => 'Choose to enable or disable the excerpt',
								'column_width' => '',
								'choices' => array (
									'enable' => 'Enable',
									'disable' => 'Disable',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'enable',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_53a578de54834',
								'label' => 'Number of Posts',
								'name' => 'number_of_posts',
								'type' => 'text',
								'instructions' => 'How many posts you want to show',
								'column_width' => '',
								'default_value' => 3,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Latest Posts',
						'name' => 'latest_posts',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a579959a908',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a579959a909',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57e03340e7',
								'label' => 'Posts Layout',
								'name' => 'posts_layout',
								'type' => 'radio',
								'instructions' => 'Select layout fot latest posts',
								'column_width' => '',
								'choices' => array (
									'layout_1' => 'Layout 1</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-1.png">',
									'layout_2' => 'Layout 2</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-2.png">',
									'layout_3' => 'Layout 3</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-3.png">',
									'layout_4' => 'Layout 4</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-4.png">',
									'layout_5' => 'Layout 5</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-5.png">',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'layout_1',
								'layout' => 'horizontal',
							),
							
							array (
								'key' => 'field_53a579959a90c',
								'label' => 'Number of Posts',
								'name' => 'number_of_posts',
								'type' => 'text',
								'instructions' => 'How many posts you want to show',
								'column_width' => '',
								'default_value' => 9,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							
							array (
								'key' => 'field_540waqas5216d',
								'label' => 'Exclude Posts',
								'name' => 'exclude_latest_posts',
								'type' => 'relationship',
								'instructions' => 'Select post which you do not want to show in latest posts, you can select multiple posts',
								'column_width' => '',
								'return_format' => 'id',
								'post_type' => array (
									0 => 'post',
								),
								'taxonomy' => array (
									0 => 'all',
								),
								'filters' => array (
									0 => 'search',
								),
								'result_elements' => array (
									0 => 'featured_image',
									1 => 'post_title',
								),
								'max' => '',
							),
							array (
								'key' => 'field_532cb07e11292',
								'label' => 'Pagination',
								'name' => 'latest_posts_pagination',
								'type' => 'radio',
								'instructions' => 'Enable or Disable the pagination',
								'column_width' => '',
								'choices' => array (
									'enable' => 'Enable',
									'disable' => 'Disable',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'disable',
								'layout' => 'horizontal',
							),
						),
					),
					array (
						'label' => 'Featured Posts',
						'name' => 'featured_posts',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53ac0b77f903d',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53ac0b77f903e',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53ac0b77f9040',
								'label' => 'Posts Excerpt',
								'name' => 'posts_excerpt',
								'type' => 'radio',
								'instructions' => 'Choose to enable or disable the excerpt',
								'column_width' => '',
								'choices' => array (
									'enable' => 'Enable',
									'disable' => 'Disable',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'enable',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_5401a3bb5216d',
								'label' => 'Exclude Posts',
								'name' => 'exclude_featured_posts',
								'type' => 'relationship',
								'instructions' => 'Select post which you do not want to show in featured posts, you can select multiple posts',
								'column_width' => '',
								'return_format' => 'id',
								'post_type' => array (
									0 => 'post',
								),
								'taxonomy' => array (
									0 => 'all',
								),
								'filters' => array (
									0 => 'search',
								),
								'result_elements' => array (
									0 => 'featured_image',
									1 => 'post_title',
								),
								'max' => '',
							),
							array (
								'key' => 'field_53ac0b77f9041',
								'label' => 'Number of Posts',
								'name' => 'number_of_posts',
								'type' => 'text',
								'instructions' => 'How many posts you want to show',
								'column_width' => '',
								'default_value' => 3,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Latest By Format',
						'name' => 'latest_by_format',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a57a11f387e',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57a11f387f',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57a11f3880',
								'label' => 'Format',
								'name' => 'format',
								'type' => 'select',
								'instructions' => 'Select the format for this section',
								'column_width' => '',
								'choices' => array (
									'standard' => 'Standard',
									'video' => 'Video',
									'audio' => 'Audio',
									'gallery' => 'Gallery',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_53a57a11f3881',
								'label' => 'Posts Excerpt',
								'name' => 'posts_excerpt',
								'type' => 'radio',
								'instructions' => 'Choose to enable or disable the excerpt',
								'column_width' => '',
								'choices' => array (
									'enable' => 'Enable',
									'disable' => 'Disable',
								),
								'other_choice' => 0,
								'save_other_choice' => 0,
								'default_value' => 'enable',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_53a57a11f3882',
								'label' => 'Number of Posts',
								'name' => 'number_of_posts',
								'type' => 'text',
								'instructions' => 'How many posts you want to show',
								'column_width' => '',
								'default_value' => 3,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Code Box',
						'name' => 'code_box',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a57b63e8c2c',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57b63e8c2d',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57b63e8c2e',
								'label' => 'Source Code',
								'name' => 'source_code',
								'type' => 'textarea',
								'instructions' => 'Supports text, HTML tags, JS code and video embed code',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => '',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Wysiwyg Editor',
						'name' => 'wysiwyg_editor',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_53a57b63e8waq',
								'label' => 'Main Title',
								'name' => 'main_title',
								'type' => 'text',
								'instructions' => 'Enter main title for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53a57b63e8was',
								'label' => 'Sub Title',
								'name' => 'sub_title',
								'type' => 'text',
								'instructions' => 'Enter Subtitle for this section',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_53bee7224d379',
								'label' => 'Wysiwyg Editor',
								'name' => 'wysiwyg_editor',
								'type' => 'wysiwyg',
								'instructions' => 'Support shortcodes, content, html',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
				),
				'button_label' => 'Add Section',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-composer.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_538b3c1de2afe',
				'label' => 'Page Layouts',
				'name' => 'page_layouts',
				'type' => 'radio',
				'instructions' => 'Choose layout for this page',
				'choices' => array (
					'layout_1' => 'Layout 1</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-1.png">',
					'layout_2' => 'Layout 2</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-2.png">',
					'layout_3' => 'Layout 3</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-3.png">',
					'layout_4' => 'Layout 4</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-4.png">',
					'layout_5' => 'Layout 5</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-5.png">',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'layout_1',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-options',
		'title' => 'Post Options',
		'fields' => array (
			array (
				'key' => 'field_53a5d62cf6022',
				'label' => 'Add this post in Homepage Grid/Slider',
				'name' => 'home_grid',
				'type' => 'true_false',
				'message' => 'Add this post in Homepage Grid/Slider',
				'default_value' => 0,
			),
			array (
				'key' => 'field_538b36c7d9f80',
				'label' => 'Make Featured',
				'name' => 'make_featured',
				'type' => 'true_false',
				'instructions' => '',
				'message' => 'Set as featured.',
				'default_value' => 0,
			),
			array (
				'key' => 'field_538b36ffd9f81',
				'label' => 'Post Layout',
				'name' => 'post_layout',
				'type' => 'radio',
				'instructions' => 'Choose the layout for this post',
				'choices' => array (
					'layout_1' => 'Layout 1</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-1.png">',
					'layout_2' => 'Layout 2</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-2.png">',
					'layout_3' => 'Layout 3</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-3.png">',
					'layout_4' => 'Layout 4</br><img class="opt-image" title="Layout 1" src="'.get_template_directory_uri().'/images/partial/layout-4.png">',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'layout_1',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_538b389fd9f82',
				'label' => 'Featured Image Credit Line',
				'name' => 'featured_image_credit_line',
				'type' => 'text',
				'instructions' => 'Optional Photograph credit line',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/* Add-Ons
 * USING PREMIUN ADD-ONS OUTSIDE THIS THEME IS NOT ALLOWED!!!
 */
function ft_register_fields(){
	include_once('add-ons/acf-gallery/gallery.php');
	include_once('add-ons/acf-repeater/repeater.php');
	include_once('add-ons/acf-flexible-content/flexible-content.php');
}
add_action('acf/register_fields', 'ft_register_fields'); 