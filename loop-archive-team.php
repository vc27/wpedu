<?php
/**
 * File Name loop-archive-team.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.04.13
 **/
#################################################################################################### */


if ( have_posts() ) {
	$i = 0; 
	
	echo "<div id=\"loop-archive-team\" class=\"loop\">";

	while ( have_posts() ) { 
		the_post();

			echo "<article id=\"faq-" . $post->post_name . "\" "; post_class(); echo ">";

                $featured__image = featured__image( $post, array(
                    'before' => '<div class="image-wrap">',
                    'after' => '</div>',
                    'permalink' => false,
                    'post_thumbnail_size' => 'team-image',
                    'echo' => 0
                ) );
                vc_title( $post, array(
                    'before' => $featured__image . ' ',
                    'permalink' => true,
                    'element' => 'div',
                    'class' => 'h3'
                ) );
                if ( $post->_team__short_desc ) {
                    vc_content( array(
                        'content' => $post->_team__short_desc
                    ) );
                }
				
				echo "<div class=\"clear\"></div>";
			echo "</article>";
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 