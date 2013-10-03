<?php
/**
 * File Name loop-single-class.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.03.13
 **/
#################################################################################################### */


if ( have_posts() ) {
	
	// See ThemeSupport::the_post for added post_meta
	
	echo "<div id=\"loop-single-class\" class=\"loop\">";

		while ( have_posts() ) { 
			the_post(); 

			echo "<article id=\"post-" . $post->ID . "\" "; post_class(); echo ">";

				vc_title( $post, array( 
					'permalink' => false,
					'class' => 'h1'
				) );

				vc_content();

				echo "<div class=\"clear\"></div>";
			echo "</article>";
			
			if ( $post->have_session_1 OR $post->have_session_2 OR $post->have_session_3 OR $post->have_session_4 ) {
				
				echo "<div id=\"sessions\">";
					
					foreach ( $post->sessions as $post->session ) {
						
						echo "<div id=\"session--" . $post->session->post_name . "\" class=\"hentry session\">";
							vc_title( $post->session, array( 
								'permalink' => false,
								'element' => 'div',
								'class' => 'h3'
							) );
							echo "<div class=\"row-fluid\">";
								echo "<div class=\"span4\"></div>";
								echo "<div class=\"span8\">";

									if ( ! empty( $post->session->post_content ) ) {
										vc_content( array(
											'content' => $post->session->post_content
										) );
									}
								echo "</div>";
							echo "</div>";

						echo "</div>";
					
					} // end foreach ( $post->sessions as $session )
					
				echo "</div>";
				
			} // end if ( $post->have_session_x )

		} // End while(have_post())

		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 