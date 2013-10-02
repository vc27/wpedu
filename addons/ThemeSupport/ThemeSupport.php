<?php
/**
 * File Name ThemeSupport.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.1
 * @updated 08.13.13
 **/
####################################################################################################





/**
 * ThemeSupport
 *
 * @version 1.0
 * @updated 00.00.13
 **/
$ThemeSupport = new ThemeSupport();
class ThemeSupport {
	
	
	
	/**
	 * Option name
	 * 
	 * @access public
	 * @var string
	 * Description:
	 * Used for various purposes when an import may be adding content to an option.
	 **/
	var $option_name = false;
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {
		
		// add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		
		// add_action( 'init', array( &$this, 'init' ) );
		
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );
		
		// add_action( 'wp', array( &$this, 'wp' ) );
		
		// add_action( 'widgets_init', array( &$this, 'widgets_init' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 *
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 **/
	function after_setup_theme() {
		
		/*
		add__featured_image( array(
			'label' => 'Artist Header',
			'id' => 'artist-header',
			'post_type' => 'artists',
			'priority' => 'low',
			'context' => 'side'
		) );
		*/
		
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
		
		// filter the_post
		// add_action( 'the_post', array( &$this, 'the_post' ) );
		
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
		
		// 
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * wp
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function wp() {
		
		// Body Class
		// add_filter( 'body_class', array( &$this, 'body_class' ) );
		
		$this->remove__jetpack_share();
		$this->remove__polldaddy_show_rating();
		
	} // end function wp
	
	
	
	
	
	
	/**
	 * Widgets Initiate
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function widgets_init() {
		
		// register_widget( 'TwitterWidgetVCWP' );
		
	} // end function widgets_init
	
	
	
	
	
	
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
	
	
	
	
	
	
	/**
	 * get
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function get( $key ) {
		
		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}
		
	} // end function get
	
	
	
	
	
	
	/**
	 * have_template_page_options
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	static function have_template_page_options( $option, $setting ) {
		global $template_page_options;
		
		if ( isset( $template_page_options ) AND isset( $template_page_options[$option][$setting] ) AND  ! empty( $template_page_options[$option][$setting] ) ) {
			return true;
		} else {
			return false;
		}
		
	} // end function have_template_page_options
	
	
	
	
	
	
	/**
	 * template_page_options
	 *
	 * @version 1.1
	 * @updated 08.13.13
	 **/
	static function template_page_options( $option, $setting ) {
		global $template_page_options;
		
		if ( self::have_template_page_options( $option, $setting ) ) {
			return html_entity_decode( $template_page_options[$option][$setting] );
		} else {
			return false;
		}
		
	} // end function template_page_options
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * remove__jetpack_share
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function remove__jetpack_share() {

		remove_filter( 'the_content', 'sharing_display', 19 );
		remove_filter( 'the_excerpt', 'sharing_display', 19 );
		
	} // end function remove__jetpack_share
	
	
	
	
	
	
	/**
	 * body_class
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function body_class( $classes ) {
		global $wp_query;
		
		if ( $sss ) {
			
			$classes[] = 'page-has-multi-post-thumbnail';
			
		}
		
		return $classes;
		
	} // end function body_class 
	
	
	
	
	
	
	/**
	 * the_post
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function the_post( $post ) {
		
		if ( $post->post_type == 'post' ) {
			
			// 
			
		}
		
	} // end function the_post 
	
	
	
	
	
	
	/**
	 * wp_head
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function wp_head() {
		
		
		echo "<link rel=\"icon\" href=\"" . home_url() . "/favicon.png\" />\n";
		
		
		if ( function_exists( 'cforms_activate' ) ) {
			?>
			<script type='text/javascript'>
			/* <![CDATA[ */
			var sajax_uri = '<?php echo home_url(); ?>/wp-content/plugins/cforms/lib_ajax.php';
			/* ]]> */
			</script>
			<?php
		}
		
	} // function wp_head
	
	
	
	
	
	
	####################################################################################################
	/**
	 * static
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * jetpack_sharing
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function jetpack_sharing() {

		if ( function_exists( 'sharing_display' ) ) {
			return sharing_display();
		}
		
	} // end function jetpack_sharing
	
	
	
	
	
	
	/**
	 * Test Function
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	static function test_function() {
		
		// template function for building new static functions.
		
	} // end function test_function
	
	
	
} // end class ThemeSupport