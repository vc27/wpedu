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
				
				echo "<div class=\"h4\">$post->_class__tagline</div>";
				echo "<div class=\"entry\">" . wpautop( $post->_class__short_desc ) . "</div>";
				
				echo "<div class=\"row-fluid item-wrapper\">";
					
					echo "<div class=\"span4\">";
						echo "<div class=\"item status\"><span class=\"title\">Status:</span> $post->_class__status</div>";
						echo "<div class=\"item price\"><span class=\"title\">Price:</span> $post->_class__price</div>";
						if ( $post->_class__prurchase_url ) {
							echo "<a class=\"btn btn-orange\" href=\"$post->_class__prurchase_url\">Enroll Now</a>";
						}
					echo "</div>";
					
					echo "<div class=\"span8\">";
						foreach ( $post->sessions as $k => $post->session ) {
							echo "<div class=\"item scrollto\" data-hash=\"#session--" . $post->session->post_name . "\"><strong>Session " . ($k+1) . ":</strong> " . date( 'M jS', strtotime( $post->session->date ) ) . " <span class=\"sub-text\">@" . $post->session->time . "</span></div>";
						}
					echo "</div>";
					
				echo "</div>";
				
				vc_content();

				echo "<div class=\"clear\"></div>";
			echo "</article>";
			
			if ( $post->have_session_1 OR $post->have_session_2 OR $post->have_session_3 OR $post->have_session_4 ) {
				
				echo "<div id=\"sessions\">";
					echo "<h2 class=\"h2\">Sessions</h2>";
					
					echo "<div class=\"session-wrapper\">";
						
						foreach ( $post->sessions as $post->session ) {

							echo "<div id=\"session--" . $post->session->post_name . "\" class=\"hentry session\">";
								vc_title( $post->session, array( 
									'permalink' => false,
									'element' => 'div',
									'class' => 'h3'
								) );

								echo "<div class=\"session-content row-fluid\">";


									// Session Details
									echo "<div class=\"session-details span4\">";

										echo "<div class=\"item-wrapper\">";

											echo "<div class=\"item date\"><span class=\"title\">Date:</span> " . $post->session->date . "</div>";
											echo "<div class=\"item time\"><span class=\"title\">Time:</span> " . $post->session->time . "</div>";

										echo "</div>";

									echo "</div>";


									// Session Content
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
					
				echo "</div>";
				
			} // end if ( $post->have_session_x )

		} // End while(have_post())

		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 