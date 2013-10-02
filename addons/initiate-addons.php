<?php
/**
 * File Name initiate-addons.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.1
 * @updated 03.15.13
 *
 * Description:
 * Include core functionality, activation and theme functions.
 **/
#################################################################################################### */


if ( ! defined('THEME_ADDONS_INIT') ) {
	
	// Init ParentTheme_VC lib
	require_once( get_template_directory() . "/includes/initiate-lib.php" );
	
	
	
	// Taxonomies & Post Types
	require_once( "PostTypes/initiate.php" );

	
	
	// Post Meta
	require_once( "FeaturedPostMetaVCWP.php" );
	// require_once( "AzzaStarterPostMetaVCWP.php" );
	
	
	
	// Options Pages
	// require_once( "AzzaOptionsPageVCWP.php" );
	
	
	
	// Widgets
	// require_once( "Widgets/ClassesWidgetVCWP.php" );
	
	
	
	// Added Functionality
	require_once( "ThemeSupport/initiate.php" );
	require_once( "WPSEOEdits.php" );
	
	define( 'THEME_ADDONS_INIT', true );
	
} // end if ( ! defined('THEME_ADDONS_INIT') )