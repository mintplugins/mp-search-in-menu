<?php			
/**
 * This is the code that will create a new page of settings for your page.
 * To set up this page:
 * Step 1. Include this page in your plugin/theme
 * Step 2. Do a find-and-replace for the term 'mp_search_in_menu_settings' and replace it with the slug you desire for this page
 * Step 3. Go to line 17 and set the title, slug, and type for this page.
 * Step 4. Include options tabs.
 * Go here for full setup instructions: 
 * http://moveplugins.com/settings-class/
 */

function mp_search_in_menu_settings(){
	
	/**
	 * Set args for new administration menu.
	 *
	 * For complete instructions, visit:
	 * http://moveplugins.com/how-to-set-the-args-when-creating-a-new-settings-page/
	 *
	 */
	$args = array('parent_slug' => 'options-general.php', 'title' => __('MP Search in Menu', 'mp_menu'), 'slug' => 'mp_search_in_menu_settings', 'type' => 'submenu');
	
	//Initialize settings class
	global $mp_search_in_menu_settings;
	$mp_search_in_menu_settings = new MP_CORE_Settings($args);
	
	//Include other option tabs
	include_once( 'settings-tab-general.php' );

}
add_action('plugins_loaded', 'mp_search_in_menu_settings');

/**
 * Add settings link on plugin page
 *
 * @since    1.0.0
 * @link       http://moveplugins.com/doc/
 * @see      function_name()
 * @param  array $args See link for description.
 * @return   void
 */
function mp_search_in_menu_settings_link( $links ) { 
  $settings_link = '<a href="options-general.php?page=mp_search_in_menu_settings">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
add_filter("plugin_action_links_mp-search-in-menu/mp-search-in-menu.php", 'mp_search_in_menu_settings_link' );