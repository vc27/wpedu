<?php
/**
 * File Name loop-default.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.5
 * @updated 05.16.13
 **/
#################################################################################################### */

do_action( 'vc_above_loop' );


if ( have_posts() ) {
	$i = 0; 
	
	echo "<div id=\"loop-default\" class=\"loop\">";

	while ( have_posts() ) { 
		the_post(); 
		$i++;

			echo "<article id=\"post-" . $wp_query->post->ID . "\" "; post_class( vc_OddOrEven( $i, 'echo=0' ) . " p$i"); echo ">";
				
				if ( vc_show_featured_image() ) { 
					featured__image( $wp_query->post, array( 'post_thumbnail_size' => get_vc_option( 'post_display', 'featured_image_size' ) ) );
				}
				
				echo "<div class=\"post-wrap\">";
					
					vc_title( $wp_query->post, array( 'permalink' => true ) );
					
					echo "<div class=\"meta-data\">";
						vc_date();
						vc_comments( $wp_query->post );
					echo "</div>";

					if ( vc_is_excerpt() ) // allows for admin control
						vc_excerpt( $wp_query->post, array( 'count' => get_vc_option( 'post_display', 'word_count' ), 'read_more' => get_vc_option( 'post_display', 'read_more' ), 'strip_tags' => get_vc_option( 'post_display', 'strip_tags' ), 'push_read_more' => true ) );
					else
						vc_content();
					
				echo "</div>";
				echo "<div class=\"clear\"></div>";
			echo "</article>";
			
			// Insert Comments if turned on
			if ( ! get_vc_option( 'comments', 'remove_comments' ) AND 'open' == $wp_query->post->comment_status )
				comments_template( '', true );
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 

do_action( 'vc_below_loop' ); 