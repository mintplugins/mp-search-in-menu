<?php

/**
 * Enqueue Scripts for the MP Search In Menu Plugin
 */
 function mp_search_in_menu_enqueue_scripts(){
	 
	 //Enqueue Font Awesome CSS
	wp_enqueue_style( 'fontawesome', plugins_url( '/fonts/font-awesome-4.0.3/css/font-awesome.css', dirname( __FILE__ ) ) );	 
	
	//MP Search In Menu CSS
	wp_enqueue_style( 'mp_search_in_menu_css', plugins_url( '/css/mp-search-in-menu-frontend.css', dirname( __FILE__ ) ), array('fontawesome') );
	
 }
 add_action( 'wp_enqueue_scripts', 'mp_search_in_menu_enqueue_scripts' );
	