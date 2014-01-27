<?php

/**
 * Add search to menu
 */
function mp_search_in_menu_add_search_box($items, $args) {
				
        $searchform = '
			<form action="" id="searchform" method="get">
				<input type="text" name="s" id="s" placeholder="' . __( 'Search...', 'mp_search_in_menu' ) . '" >
			</form>
		';
        
		$position = mp_core_get_option( 'mp_search_in_menu_settings_general',  'mp_search_in_menu_search_position' );
		
		if ($position == 'before'){
			$items = '<li class="mp-search-in-menu">' . $searchform . '</li>' . $items;
		}
		else{
        	$items .= '<li class="mp-search-in-menu">' . $searchform . '</li>';
		}
		
    return $items;
}
add_filter('wp_nav_menu_items','mp_search_in_menu_add_search_box', 10, 2);