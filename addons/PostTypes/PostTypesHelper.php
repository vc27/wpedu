<?php
/**
 * File Name PostTypesHelper.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
####################################################################################################





/**
 * PostTypesHelper
 *
 * @version 1.0
 * @updated 00.00.13
 **/
class PostTypesHelper {
	
	
	
	/**
	 * id
	 * 
	 * @access public
	 * @var string
	 **/
	var $id = 'azza';
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {
		
		$this->set_paths();
		
		// require_once( "AzzaPostType.php" );

		// hook method after_setup_theme
		add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );

		// hook method init
		add_action( 'init', array( &$this, 'init' ) );

		// hook method admin_init
		add_action( 'admin_init', array( &$this, 'admin_init' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * set_paths
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set_paths() {

		$this->set( 'dir_path', "/addons/" . basename( dirname( __file__ ) ) );
		$this->set( 'template_path', get_stylesheet_directory() . $this->dir_path );
		$this->set( 'template_directory', get_stylesheet_directory_uri() . $this->dir_path );

	} // end function set_paths
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 *
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 **/
	function after_setup_theme() {
		
		// 
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/init
	 * 
	 * Description:
	 * Runs after WordPress has finished loading but before any headers are sent.
	 **/
	function init() {
		
        //
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
	 * 
	 * Description:
	 * admin_init is triggered before any other hook when a user access the admin area.
	 * This hook doesn't provide any parameters, so it can only be used to callback a 
	 * specified function.
	 **/
	function admin_init() {
		
		$this->register_scripts_and_css();
		add_action( 'admin_print_styles', array( &$this, 'admin_print_styles' ) );
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Register
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Register Scripts and CSS
	 * 
	 * @version 1.1
	 * @updated 00.00.13
	 **/
	function register_scripts_and_css() {
		
		// Register Admin CSS
		wp_register_style( "$this->id-admin", "$this->template_directory/css/admin-style.css" );
		
		// Register Admin Scripts
		wp_register_script( "$this->id-admin-custom", "$this->template_directory/js/admin-custom.js", array('jquery'), '', true );
		
	} // end function register_scripts_and_css
	
	
	
	
	
	
	/**
	 * Add Admin CSS
	 * 
	 * @version 1.1
	 * @updated 00.00.13
	 **/
	function admin_print_styles() {
		
		wp_enqueue_style( "$this->id-admin" );
		
	} // end function admin_print_styles
	
	
	
	
	
	
	/**
	 * Add Admin CSS
	 * 
	 * @version 1.1
	 * @updated 00.00.13
	 **/
	function admin_enqueue_scripts() {

		wp_enqueue_script( "$this->id-admin-custom" );

	} // end function admin_enqueue_script
	
	
	
} // end class PostTypesHelper