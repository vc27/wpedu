<?php
/**
 * File Name loop-page-default.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.8
 * @updated 07.16.13
 **/
#################################################################################################### */

// Default Loop
if ( have_posts() ) { 
	$i = 0; 
	
	echo "<div id=\"loop-default\" class=\"loop loop-page\">";

		while ( have_posts() ) { 
			the_post(); 
			
			$return_link = "<a href=\"" . home_url() . "/faq#faq-" . $post->post_name . "\">Return to FAQ &raquo;</a>";

			echo "<article id=\"post-$post->ID\" "; post_class(); echo ">";

				vc_title( $wp_query->post, array( 
					'permalink' => false,
					'element' => 'h1',
					'class' => 'h1'
				) );
				
				vc_content();
				
				echo $return_link;
				
				echo "<div class=\"clear\"> </div>";
			echo "</article>";

			// Insert Comments if turned on
			if( ! get_vc_option( 'comments', 'remove_comments' ) AND 'open' == $wp_query->post->comment_status ) {
				comments_template( '', true );
			}
			
			echo $return_link;

		} // End while(have_post())
	
		echo "<div class=\"clear\"></div>";
	echo "</div>";


} // End if(have_post())