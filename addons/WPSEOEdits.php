<?php
/**
 * File Name WPSEOEdits.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.2
 * @updated 03.16.13
 **/
#################################################################################################### */




$WPSEOEdits = new WPSEOEdits();
class WPSEOEdits {
	
	
	
	
	function __construct() {
		
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'admin_init', array( &$this, 'admin_init' ), 9 );
		
	} // end function __construct
	
	
	
	
	
	
	/**
	 * init 
	 * 
	 * @version 0.1
	 * @updated 10.07.12
	 **/
	function init() {
		
		remove_action( 'admin_bar_menu', 'wpseo_admin_bar_menu', 95 );
		add_action( 'admin_menu', array( &$this, 'remove_submenus' ), 200 );
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_init 
	 * 
	 * @version 0.1
	 * @updated 10.07.12
	 **/
	function admin_init() {
		
		add_filter( 'wpseo_use_page_analysis', array( &$this, 'wpseo_use_page_analysis' ) );
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * wpseo_use_page_analysis 
	 * 
	 * @version 0.1
	 * @updated 10.07.12
	 **/
	function wpseo_use_page_analysis() { return false; }
	
	
	
	
	
	
	/**
	 * Remove Sub Menu Pages
	 * 
	 * @version 0.1
	 * @updated 11.08.12
	 **/
	function remove_submenus() {
		global $submenu;
		
		// print_r($submenu);
		// Yoast SEO
		// unset($submenu['wpseo_dashboard'][0]); // Dashboard
		// unset($submenu['wpseo_dashboard'][1]); // Titles & Metas
		// unset($submenu['wpseo_dashboard'][2]); // Social
		// unset($submenu['wpseo_dashboard'][3]); // XML Sitemaps
		unset($submenu['wpseo_dashboard'][4]); // Permalinks
		unset($submenu['wpseo_dashboard'][5]); // Internal Links
		// unset($submenu['wpseo_dashboard'][6]); // Rss
		// unset($submenu['wpseo_dashboard'][7]); // Import & Export
		unset($submenu['wpseo_dashboard'][8]); // Edit files
		
	} // end function remove_submenus
	
	
	
} // end class WPSEOEdits