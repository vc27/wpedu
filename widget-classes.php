<?php
/**
 * File Name widget-classes.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
#################################################################################################### */
global $ClassesWidgetVCWP;

/**
Unfinished
**/

extract( $ClassesWidgetVCWP->args );
extract( $ClassesWidgetVCWP->instance );

if ( isset( $post_id ) AND ! empty( $post_id ) AND is_numeric( $post_id ) AND $post_id >= 1 ) {
	$_post = get_post( $post_id );
	
	$_post->_class__status = get_post_meta( $_post->ID, '_class__status', true );
	$_post->_class__short_desc = get_post_meta( $_post->ID, '_class__short_desc', true );
	
	echo $before_widget;

		echo "<div class=\"widget-class\">";
			
			vc_title( $_post, array(
				'element' => 'div',
				'class' => 'h3',
				'permalink' => false,
				'before' => $before_title,
				'after' => $after_title,
			) );
			
			if ( $_post->_class__short_desc ) {
				vc_content( array( 
					'content' => $_post->_class__short_desc 
				) );
			}
						
			echo "<a class=\"btn btn-orange\" href=\"" . get_permalink($_post->ID) . "\">enroll text</a>";
			
		echo "</div>";

	echo $after_widget;
	
}