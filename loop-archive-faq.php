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
	
	echo "<div id=\"loop-archive-faq\" class=\"loop\">";

	while ( have_posts() ) { 
		the_post(); 
		$comments = vc_comments( $post, array(
			'no_comments' => __( 'Still have questions? Leave a comment &raquo;', 'parenttheme' ),
			'one_comment' => __( 'Still have questions? Leave a comment &raquo;', 'parenttheme' ),
			'comments' => __( 'Still have questions? Leave a comment &raquo;', 'parenttheme' ),
			'echo' => 0,
		) );

			echo "<article id=\"faq-" . $post->post_name . "\" "; post_class(); echo ">";
				
				vc_title( $wp_query->post, array( 
					'permalink' => false,
					'element' => 'div',
					'class' => 'h5',
					'before' => '<span class="icon-arrow-right"></span>',
				) );
				vc_content( array(
					'after' => $comments
				) );
				
				echo "<div class=\"clear\"></div>";
			echo "</article>";
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 