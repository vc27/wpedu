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
			$featured__image = featured__image( $post, array( 
				'before' => '<div class="image-wrap">',
				'after' => '</div>',
				'permalink' => false,
				'post_thumbnail_size' => 'team-image',
				'echo' => 0
			) );

			echo "<article id=\"post-$post->ID\" "; post_class(); echo ">";

				vc_title( $post, array( 
					'before' => $featured__image . ' ',
					'permalink' => false,
					'element' => 'h1',
					'class' => 'h1'
				) );
				
				echo "<div class=\"meta-data item-wrapper\">";
					
					echo "<ul>";
						echo "<li class=\"item item-bleed\">$post->_team__active_text</li>";
						echo "<li class=\"item item-bleed\">$post->_team__site_url_text</li>";
						echo "<li class=\"item item-bleed\">$post->_team__twitter_text</li>";
						echo "<li class=\"item item-bleed\">$post->_team__organizer_text</li>";
						echo "<li class=\"item item-bleed\">$post->_team__instructor_text</li>";
					echo "</ul>";
					
				echo "</div>";
				
				vc_content();
				
				echo "<div class=\"clear\"> </div>";
			echo "</article>";

		} // End while(have_post())
	
		echo "<div class=\"clear\"></div>";
	echo "</div>";
	
	echo "<a class=\"btn-back\" href=\"" . home_url() . "/" . $wp_query->post->post_type . "\">&laquo; Back to Team Members</a>";


} // End if(have_post())