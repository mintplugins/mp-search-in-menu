<?php

/**
 * Add search to menu
 */
function mp_search_in_menu_add_search_box($items, $args) {
				
        $searchform = '
			<form method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" role="search">
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



if ( !class_exists('JMO_Custom_Nav')) {
    class JMO_Custom_Nav {
        public function add_nav_menu_meta_boxes() {
        	add_meta_box(
        		'wl_login_nav_link',
        		__('WishList Login'),
        		array( $this, 'nav_menu_link'),
        		'nav-menus',
        		'side',
        		'low'
        	);
        }
        
        public function nav_menu_link() {?>
        	<div id="posttype-wl-login" class="posttypediv">
        		<div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
        			<ul id ="wishlist-login-checklist" class="categorychecklist form-no-clear">
        				<li>
        					<label class="menu-item-title">
        						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="-1"> Login/Logout Link
        					</label>
        					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom">
        					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Login">
        					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="<?php bloginfo('wpurl'); ?>/wp-login.php">
        					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="wl-login-pop">
        				</li>
        			</ul>
        		</div>
        		<p class="button-controls">
        			<span class="list-controls">
        				<a href="/wordpress/wp-admin/nav-menus.php?page-tab=all&amp;selectall=1#posttype-page" class="select-all">Select All</a>
        			</span>
        			<span class="add-to-menu">
        				<input type="submit" class="button-secondary submit-add-to-menu right" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-wl-login">
        				<span class="spinner"></span>
        			</span>
        		</p>
        	</div>
        <?php }
    }
}

$custom_nav = new JMO_Custom_Nav;

add_action('admin_init', array($custom_nav, 'add_nav_menu_meta_boxes'));

/**
 * Returns the columns for the nav menus page.
 *
 * @since 3.0.0
 *
 * @return string|WP_Error $output The menu formatted to edit or error object on failure.
 */
function mp_account_wp_nav_menu_manage_columns() {
	return array(
		'cb' => '<input type="checkbox" />',
		'css-classes' => __('CSS Classes'),
		'xfn' => __('Link Relationship (XFN)'),
		'description' => __('Description'),
		'moveplugins' => "Move Plugins"
	);
}
add_action( 'manage_nav-menus_columns', 'mp_account_wp_nav_menu_manage_columns' );