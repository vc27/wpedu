<?php
/**
 * File Name loop-archive-faq.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.04.13
 **/
#################################################################################################### */


if ( have_posts() ) {
	$i = 0; 
	
	echo "<div id=\"loop-archive-class\" class=\"loop\">";

	while ( have_posts() ) { 
		the_post(); 

			echo "<article id=\"post-" . $post->ID . "\" "; post_class(); echo ">";
				
				vc_title( $wp_query->post, array( 
					'permalink' => false,
					'element' => 'div',
					'class' => 'h5',
					'after' => "<a class=\"$post->btn_class btn-slim\" href=\"" . get_permalink() . "\">$post->_class__status &raquo;</a>"
				) );
				
				echo "<div class=\"entry\">";
					echo "<div class=\"h6\">$post->_class__tagline</div>";
					echo wpautop( $post->_class__short_desc . "\n<a href=\"" . get_permalink() . "#sessions\">Class Outline &raquo;</a>" );
				echo "</div>";
				
				echo "<div class=\"clear\"></div>";
			echo "</article>";
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 