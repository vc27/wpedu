<?php
/**
 * File Name loop-single-default.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.5
 * @updated 07.16.13
 **/
#################################################################################################### */

do_action( 'vc_above_loop' );


if ( have_posts() ) {
	$i = 0; 
	
	echo "<div id=\"loop-default\" class=\"loop loop-single\">";

	while ( have_posts() ) { 
		the_post(); 
		$i++;

			echo "<article id=\"post-" . $wp_query->post->ID . "\" "; post_class("p$i"); echo ">";
				
				vc_title( $wp_query->post, array( 'permalink' => false ) );
				echo "<div class=\"meta-data\">";
					vc_date();
					vc_comments( $wp_query->post );
				echo "</div>";
				vc_content();

				echo "<div class=\"clear\"></div>";
			echo "</article>";
			
			// Insert Comments if turned on
			if( ! get_vc_option( 'comments', 'remove_comments' ) AND 'open' == $wp_query->post->comment_status ) {
				comments_template( '', true );
			}
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 

do_action( 'vc_below_loop' ); 