<?php
/**
 * File Name available-classes.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.02.13
 **/
#################################################################################################### */

$post__in = array(
	ThemeSupport::template_page_options( 'home', 'class_1' ),
	ThemeSupport::template_page_options( 'home', 'class_2' ),
	ThemeSupport::template_page_options( 'home', 'class_3' ),
);


$query = array(
	'post_type' => 'class',
	'post__in' => $post__in,
	'orderby' => 'post__in'
);
$wp_query = new WP_Query();
$wp_query->query( $query );


if ( have_posts() ) { 
	
	
	echo "<div id=\"available-classes\">";
		echo "<div class=\"inner-wrap loop\">";

			echo "<div class=\"h2\">" . ThemeSupport::template_page_options( 'home', 'class_title' ) . "</div>";

			if ( ThemeSupport::have_template_page_options( 'home', 'class_content' ) ) {
				vc_content( array(
					'class' => 'h5',
					'content' => ThemeSupport::template_page_options( 'home', 'class_content' )
				) );
			}
			
			echo "<div class=\"row-fluid\">";

				while ( have_posts() ) { 
					the_post(); 
					
					echo "<div class=\"span4\">";
						echo "<div class=\"hentry\">";
						
							vc_title( $post, array(
								'permalink' => true,
								'element' => 'div',
								'class' => 'h3',
							) );
							
							echo "<div class=\"h5\">$post->_class__tagline</div>";
							
							vc_excerpt( $post, array(
								'show_item' => true,
								'text' => $post->_class__short_desc,
								'read_more' => '[...]',
								'count' => 25,
								'strip_tags' => '<p>',
							) );
							
							echo "<a class=\"$post->btn_class\" href=\"" . get_permalink() . "#loop-single-class\">$post->_class__status &raquo;</a>";
							
						echo "</div>";
					echo "</div>";

				} // End while(have_post())		
				wp_reset_postdata();
			
			echo "</div>";

			echo "<div class=\"clear\"></div>";
		echo "</div>";
	echo "</div>";
	
} // End if(have_post())
wp_reset_query();