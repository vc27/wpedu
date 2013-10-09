<?php
/**
 * File Name initiate.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
#################################################################################################### */


if ( ! defined('PostTypeVC_INIT') ) {	
	
	// Classes
	require_once( "ClassPostType.php" );
	require_once( "SessionPostType.php" );
	require_once( "FAQPostType.php" );
	require_once( "TeamPostType.php" );
	// require_once( "PostTypesHelper.php" );
	define( 'PostTypeVC_INIT', true );
	
	
	
} // end if ( ! defined('PostTypeVC_INIT') )