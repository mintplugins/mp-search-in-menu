<?php			
/**
 * This is the code that will create a new tab of settings for your page.
 * To create a new tab and set up this page:
 * Step 1. Duplicate this page and include it in the "class initialization function".
 * Step 1. Do a find-and-replace for the term 'mp_search_in_menu_settings' and replace it with the slug you set when initializing this class
 * Step 2. Do a find and replace for 'general' and replace it with your desired tab slug
 * Step 3. Go to line 17 and set the title for this tab.
 * Step 4. Begin creating your custom options on line 30
 * Go here for full setup instructions: 
 * http://moveplugins.com/doc/settings-class/
 */


/**
* Create new tab
*/
function mp_search_in_menu_settings_general_new_tab( $active_tab ){
	
	//Create array containing the title and slug for this new tab
	$tab_info = array( 'title' => __('MP Search in Menu' , 'mp_search_in_menu'), 'slug' => 'general' );
	
	global $mp_search_in_menu_settings; $mp_search_in_menu_settings->new_tab( $active_tab, $tab_info );
		
}
//Hook into the new tab hook filter contained in the settings class in the Move Plugins Core
add_action('mp_search_in_menu_settings_new_tab_hook', 'mp_search_in_menu_settings_general_new_tab');

/**
* Create settings
*/
function mp_search_in_menu_settings_general_create(){
	
	
	register_setting(
		'mp_search_in_menu_settings_general',
		'mp_search_in_menu_settings_general',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'general_settings',
		__( 'Search in Menu Settings', 'mp_search_in_menu' ),
		'__return_false',
		'mp_search_in_menu_settings_general'
	);
	
	add_settings_field(
		'mp_search_in_menu_search_position',
		__( 'Search in Menu Position', 'mp_search_in_menu' ), 
		'mp_core_select',
		'mp_search_in_menu_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_search_in_menu_search_position',
			'value'       => mp_core_get_option( 'mp_search_in_menu_settings_general',  'mp_search_in_menu_search_position' ),
			'description' => __( 'Where do you want the search to appear in your navigation menu?', 'mp_search_in_menu' ),
			'registration'=> 'mp_search_in_menu_settings_general',
			'options'=> array('before' => 'Before Nav', 'after' => 'After Nav'),
		)
	);
		
	//additional general settings
	do_action('mp_search_in_menu_settings_additional_general_settings_hook');
}
add_action( 'admin_init', 'mp_search_in_menu_settings_general_create' );