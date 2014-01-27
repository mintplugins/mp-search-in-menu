<?php 
/**
 * Customize
 *
 * Theme options are lame! Manage any customizations through the Theme
 * Customizer. Expose the customizer in the Appearance panel for easy access.
 * This uses the customizer class in the mp-core plugin
 *
 * @package mp_search_in_menu
 * @since mp_search_in_menu 3.0
 */
 
function mp_search_in_menu_customizer(){
	
	$args = array(
		array( 'section_id' => 'mp_search_in_menu_settings', 'section_title' => __( 'MP Search In Menu', 'mp_core' ),'section_priority' => 1,
			'settings' => array(
				'mp_search_in_menu_searchicon_color' => array(
					'label'      => __( 'Magnifying Glass Color:', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => '.mp-search-in-menu form',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				)
			)
		)
	);
	
	$args = has_filter('mp_search_in_menu_customizer_args') ? apply_filters('mp_search_in_menu_customizer_args', $args) : $args;
	
	new MP_CORE_Customizer($args);
}

add_action ('init', 'mp_search_in_menu_customizer');