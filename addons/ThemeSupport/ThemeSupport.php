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
		
		add_action( 'init', array( &$this, 'init' ) );
		
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );
		
		add_action( 'wp', array( &$this, 'wp' ) );
		
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
		
		if ( ! is_admin() ) {
			add_action( 'the_post', array( &$this, 'the_post' ) );
			add_filter( 'pre_get_posts', array( &$this, 'pre_get_posts' ) );
		}
		
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
		// $this->remove__polldaddy_show_rating();
		
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
	 * pre_get_posts
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function pre_get_posts( $wp_query ) {
		
		if ( isset( $wp_query->query['post_type'] ) AND ! empty( $wp_query->query['post_type'] ) ) {
			
			if ( $wp_query->query['post_type'] == in_array( $wp_query->query['post_type'], array( 'faq', 'team' ) ) ) {

				$wp_query->set( 'orderby', 'menu_order' );

			} else if ( $wp_query->is_main_query() AND $wp_query->query['post_type'] == 'class' AND $wp_query->is_archive ) {

				$wp_query->set( 'orderby', 'menu_order' );

			} // end if ( $wp_query->is_main_query() )
			
		}
		
	} // end function pre_get_posts
	
	
	
	
	
	
	/**
	 * the_post
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function the_post( $post ) {
		
		if ( ! is_admin() AND $post->post_type == 'class' ) {
			
			$post->_class__status = get_post_meta( $post->ID, '_class__status', true );
			$post->_class__status_id = sanitize_title_with_dashes($post->_class__status);
			$post->_class__cform = get_post_meta( $post->ID, '_class__cform', true );
			$post->_class__price = get_post_meta( $post->ID, '_class__price', true );
			$post->_class__seats = get_post_meta( $post->ID, '_class__seats', true );
			$post->_class__day = get_post_meta( $post->ID, '_class__day', true );
			$post->_class__prurchase_url = get_post_meta( $post->ID, '_class__prurchase_url', true );
			$post->_class__tagline = get_post_meta( $post->ID, '_class__tagline', true );
			$post->_class__short_desc = get_post_meta( $post->ID, '_class__short_desc', true );
			$post->_class__session_1 = get_post_meta( $post->ID, '_class__session_1', true );
			$post->_class__session_2 = get_post_meta( $post->ID, '_class__session_2', true );
			$post->_class__session_3 = get_post_meta( $post->ID, '_class__session_3', true );
			$post->_class__session_4 = get_post_meta( $post->ID, '_class__session_4', true );
			$post->sessions = array();



            // Instructor
            $post->_class__instructor_id = get_post_meta( $post->ID, '_class__instructor_id', true );
            if ( $post->_class__instructor_id ) {
                $post->instructor = get_post($post->_class__instructor_id);
                $post->instructor->_team__short_desc = get_post_meta( $post->_class__instructor_id, '_team__short_desc', true );
            }


			
			
			// Session 1
			if ( ! empty( $post->_class__session_1 ) ) {
				$post->have_session_1 = true;
				$post->sessions[0] = get_post( $post->_class__session_1 );
				$post->sessions[0]->date = get_post_meta( $post->ID, '_class__session_1_date', true );
				$post->sessions[0]->time = get_post_meta( $post->ID, '_class__session_1_time', true );
			} else {
				$post->have_session_1 = false;
			}
			
			
			
			// Session 2
			if ( ! empty( $post->_class__session_2 ) ) {
				$post->have_session_2 = true;
				$post->sessions[1] = get_post( $post->_class__session_2 );
				$post->sessions[1]->date = get_post_meta( $post->ID, '_class__session_2_date', true );
				$post->sessions[1]->time = get_post_meta( $post->ID, '_class__session_2_time', true );
			} else {
				$post->have_session_2 = false;
			}
			
			
			
			// Session 3
			if ( ! empty( $post->_class__session_3 ) ) {
				$post->have_session_3 = true;
				$post->sessions[2] = get_post( $post->_class__session_3 );
				$post->sessions[2]->date = get_post_meta( $post->ID, '_class__session_3_date', true );
				$post->sessions[2]->time = get_post_meta( $post->ID, '_class__session_3_time', true );
			} else {
				$post->have_session_3 = false;
			}
			
			
			
			// Session 4
			if ( ! empty( $post->_class__session_4 ) ) {
				$post->have_session_4 = true;
				$post->sessions[3] = get_post( $post->_class__session_4 );
				$post->sessions[3]->date = get_post_meta( $post->ID, '_class__session_4_date', true );
				$post->sessions[3]->time = get_post_meta( $post->ID, '_class__session_4_time', true );
			} else {
				$post->have_session_4 = false;
			}
			
			switch ( $post->_class__status ) {
				case 'Pre Enroll' :
					$post->purchase_text = 'Pre-Enrollment';
					$post->btn_class = 'btn btn-blue';
					break;
				case 'Open Enrollment' :
					$post->purchase_text = 'Pay&nbsp;for&nbsp;Enrollment';
					$post->btn_class = 'btn btn-orange';
					break;
				case 'In Session' :
					$post->btn_class = 'btn btn-gray';
					break;
				case 'Express Interest' :
					$post->purchase_text = 'Express an Interest in this class';
					$post->btn_class = 'btn btn-blue';
					break;
			} // end switch ( $post->_class_status )
			
			
		} else if ( ! is_admin() AND $post->post_type == 'team' ) {
			
			$post->_team__active = get_post_meta( $post->ID, '_team__active', true );
			$post->_team__site_url = get_post_meta( $post->ID, '_team__site_url', true );
			$post->_team__twitter_username = get_post_meta( $post->ID, '_team__twitter_username', true );
			$post->_team__organizer = get_post_meta( $post->ID, '_team__organizer', true );
			$post->_team__instructor = get_post_meta( $post->ID, '_team__instructor', true );
			$post->_team__short_desc = get_post_meta( $post->ID, '_team__short_desc', true );
			
			
			if ( $post->_team__active ) {
				$post->_team__active_text = "<span class=\"title\">Active:</span> <span class=\"icon-ok orange\"></span>";
			} else {
				$post->_team__active_text = "<span class=\"title\">Inactive</span>";
			}
			$post->_team__site_url_text = "<span class=\"title\">Site:</span> <a href=\"$post->_team__site_url\" target=\"_blank\">$post->_team__site_url</a>";
			$post->_team__twitter_text = "<span class=\"title\">Twitter:</span> <a href=\"http://twitter.com/$post->_team__twitter_username\" target=\"_blank\">@$post->_team__twitter_username</a>";
			
			$post->_team__organizer_text = '';
			if ( $post->_team__organizer ) {
				$post->_team__organizer_text = "<span class=\"title\">Organizer:</span> <span class=\"icon-ok orange\"></span>";
			}
			$post->_team__instructor_text = '';
			if ( $post->_team__instructor ) {
				$post->_team__instructor_text = "<span class=\"title\">Instructor:</span> <span class=\"icon-ok orange\"></span>";
			}
			
		} // end if ( $post->post_type == '' )
		
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
	 * insert_cform
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	static function insert_cform( $id ) {
		
		if ( function_exists( 'insert_cform' ) ) {

			echo insert_cform( $id );

		}
		
	} // end function insert_cform
	
	
	
	
	
	
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