<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'sectiontitle' => array(
		'label' => __('Section title ', 'fw'),
		'desc'  => __('Insert Section title', 'fw'),
		'type'  => 'text',
	),	
  'titletype_select' => array(
      'label'   => __('Title type select', 'fw'),
      'desc'    => __('Select Title type', 'fw'),
      'type'    => 'select',
      'choices' => array(
          'title-style-0'  => __('Without', 'fw'),
          'title-style-1'  => __('Type 1', 'fw'),
          'title-style-2'  => __('Type 2', 'fw'),
          'title-style-3'  => __('Type 3', 'fw'),
      ),
      'value'   => 'title-style-0'
  ),
  'classname' => array(
		'label' => __('Class name ', 'fw'),
		'desc'  => __('Insert Class', 'fw'),
		'type'  => 'text',
	),
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'is_padding' => array(
		'label'        => __('Section padding', 'fw'),
		'type'         => 'switch',
	),	

  'bgtype_select' => array(
      'label'   => __('Section Background', 'fw'),
      'desc'    => __('Section Background', 'fw'),
      'type'    => 'select',
      'choices' => array(
          'bg-style-0'  => __('Without', 'fw'),
          'bg-style-1'  => __('Type 1', 'fw'),
          'bg-style-2'  => __('Type 2', 'fw'),
          'bg-style-3'  => __('Type 3', 'fw'),
      ),
      'value'   => 'bg-style-0'
  ),

	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	)
);
