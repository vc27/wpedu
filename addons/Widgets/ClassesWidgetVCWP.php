<?php
/**
 * File Name ClassesWidgetVCWP.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
####################################################################################################






/**
 * Widgets Initiate
 *
 * @version 1.0
 * @updated 00.00.13
 **/
add_action( 'widgets_init', 'ClassesWidgetVCWP_init' );
function ClassesWidgetVCWP_init() {
	
	register_widget( 'ClassesWidgetVCWP' );
	
} // end function ClassesWidgetVCWP_init






/**
 * ClassesWidgetVCWP
 *
 * @version 1.0
 * @updated 00.00.13
 **/
class ClassesWidgetVCWP extends WP_Widget {
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {
		
		$this->set( 'name', __( "WP Classes" ) );
		$this->set( 'id', 'wp-classes' );
		
		$this->set( 'control_ops', array(
			'id_base' => $this->id
			) );
		
		$this->set( 'widget_ops', array(
			'classname' => $this->id,
			//'description' => __('')
			) );
		
		
		$this->WP_Widget( $this->id, $this->name, $this->widget_ops, $this->control_ops );

	} // end function __construct
	
	
	
	
	
	
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
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	/**
	 * Widget 
	 *
	 * Displays the actual html of the widget
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function widget( $args, $instance ) {
		global $ClassesWidgetVCWP;
		
		$this->set( 'args', $args );
		$this->set( 'instance', $instance );
		
		$ClassesWidgetVCWP = $this;
		
		get_template_part('widget-classes');
		
	} // end function widget 
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Update Widget data
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['post_id'] = $new_instance['post_id'];
		
		return $instance;
		
		
	} // end function update
	
	
	
	
	
	
	/**
	 * Widget Form
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function form( $instance ) {
		
		//Defaults
		$defaults = array(
			'post_id' => '',
			);
		
		$r = wp_parse_args( $instance, $defaults );
		extract( $r, EXTR_SKIP );
		
		$books = new WP_Query();
		$books->query( array(
			'posts_per_page' => -1,
			'post_type' => 'class',
			'fields' => 'ids',
		) );
		
		
		?>
		
		<!-- Post Category -->
		<p>
			<label for="<?php echo $this->get_field_id('post_id'); ?>"><?php _e( 'Class:', 'childtheme' ); ?></label>
			
			<?php
			
			if ( isset( $books->posts ) AND ! empty( $books->posts ) AND is_array( $books->posts ) ) {
				echo "<select class=\"widefat\" id=\"" . $this->get_field_id('post_id') . "\" name=\"" . $this->get_field_name('post_id') . "\">";
					
					echo "<option value=\"\">" . __( 'Select a Class', 'childtheme' ) . "</option>";

					foreach ( $books->posts as $book->ID ) {
						if ( $post_id == $book->ID )
							$sel = 'selected="selected"';
						else
							$sel = '';

						echo "<option $sel value=\"$book->ID\">" . get_the_title( $book->ID ) . "</option>";
					}
					
				echo "</select>";
			}			
			
			?>
		</p>
		
		<?php 
		
		
	} // end function form
	
	
	
} // end class ClassesWidgetVCWP