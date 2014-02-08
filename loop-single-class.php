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




                // Primary Content
				echo "<div class=\"row-fluid item-wrapper\">";
					
					echo "<div class=\"span7\">";
						echo "<div class=\"h5\">$post->_class__tagline</div>";
						echo "<div class=\"entry\">" . wpautop( $post->_class__short_desc ) . "</div>";
					echo "</div>";
					
					echo "<div class=\"span5\">";
						echo "<div class=\"item status\"><span class=\"title\">Status:</span> $post->_class__status</div>";
						echo "<div class=\"item price\"><span class=\"title\">Price:</span> $post->_class__price</div>";
						echo "<div class=\"item date\">";
							echo "<span class=\"title\">Dates:</span> ";
							
							if ( isset( $post->_class__day ) AND ! empty( $post->_class__day ) ) {
								echo "$post->_class__day: ";
							}
							
<<<<<<< HEAD
							if ( isset( $post->_class__tentative_date ) AND ! empty( $post->_class__tentative_date ) ) {
								echo $post->_class__tentative_date;
							}
							
							if ( isset( $post->sessions[0]->date ) AND ! empty( $post->sessions[0]->date ) AND $post->sessions[0]->date != 'TBD' ) {
								
								echo ": " . date( 'jS', strtotime( $post->sessions[0]->date ) );
								
								if ( isset( $post->sessions[1]->date ) AND ! empty( $post->sessions[1]->date ) ) {
									echo ", ";
									echo date( 'jS', strtotime( $post->sessions[1]->date ) );
								}
								if ( isset( $post->sessions[2]->date ) AND ! empty( $post->sessions[2]->date ) ) {
									echo ", ";
									echo date( 'jS', strtotime( $post->sessions[2]->date ) );
								}
								if ( isset( $post->sessions[3]->date ) AND ! empty( $post->sessions[3]->date ) ) {
									echo " & ";
									echo date( 'jS', strtotime( $post->sessions[3]->date ) );
								}
							} else if ( ! isset( $post->_class__tentative_date ) OR empty( $post->_class__tentative_date ) ) {
=======
							if ( isset( $post->sessions[0]->date ) AND ! empty( $post->sessions[0]->date ) AND $post->sessions[0]->date != 'TBD' ) {
								echo date( 'M jS', strtotime( $post->sessions[0]->date ) ) . ", ";
								echo date( 'jS', strtotime( $post->sessions[1]->date ) ) . ", ";
								echo date( 'jS', strtotime( $post->sessions[2]->date ) ) . " & ";
								echo date( 'jS', strtotime( $post->sessions[3]->date ) );
							} else {
>>>>>>> 42c470d4581f2f8c0d1ceef9eee354f002e2c343
								echo "TBD";
							}
								
						echo "</div>";
						
						if ( isset( $post->_class__seats ) AND ! empty( $post->_class__seats ) ) {
							echo "<div class=\"item item-bleed seats\"><span class=\"title\">Available Seats:</span> $post->_class__seats</div>";
						}
						
						if ( $post->_class__prurchase_url ) {
							echo "<a id=\"btn-purchase\" class=\"$post->btn_class $post->_class__status_id\" href=\"$post->_class__prurchase_url\" target=\"_blank\">$post->purchase_text&nbsp;&raquo;</a>";
							echo "<span class=\"sub-text block\">secure checkout via square</span>";
						} else {
							echo "<a id=\"btn-purchase\" class=\"$post->btn_class $post->_class__status_id\" href=\"#form-wrapper\" target=\"_blank\">$post->purchase_text&nbsp;&raquo;</a>";
						}
						
					echo "</div>";
					
				echo "</div>";
				


                // Session Dates
<<<<<<< HEAD
                if ( ( isset( $post->_class__show_session ) AND $post->_class__show_session == 1 ) AND isset( $post->sessions ) AND is_array( $post->sessions ) ) {
=======
                if ( isset( $post->sessions ) AND is_array( $post->sessions ) ) {
>>>>>>> 42c470d4581f2f8c0d1ceef9eee354f002e2c343

                    echo "<div class=\"item-wrapper\">";

                        if ( isset( $post->sessions[0]->date ) AND ! empty( $post->sessions[0]->date ) AND $post->sessions[0]->date != 'TBD' ) {
                            echo "<div class=\"h5\">Classes are " . date( 'M jS', strtotime( $post->sessions[0]->date ) ) . " to " . date( 'M jS', strtotime( $post->sessions[3]->date ) ) . " " . date( 'Y', strtotime( $post->sessions[3]->date ) ) . "</div>";
                        }
                        echo "<ol>";
                            foreach ( $post->sessions as $k => $post->session ) {
                                echo "<li class=\"item scrollto\" data-hash=\"#session--" . $post->session->post_name . "\">";
                                    echo "<strong>" . $post->session->post_title . ":</strong> ";
                                    if ( isset( $post->session->date ) AND ! empty( $post->session->date ) AND $post->session->date != 'TBD' ) {
                                        echo date( 'M jS', strtotime( $post->session->date ) );
                                    } else {
                                        echo "TBD";
                                    }
<<<<<<< HEAD
									if ( isset( $post->session->time ) AND ! empty( $post->session->time ) ) {
										echo " <span class=\"sub-text\">@" . $post->session->time . "</span>";
									}
=======
                                    echo " <span class=\"sub-text\">@" . $post->session->time . "</span>";
>>>>>>> 42c470d4581f2f8c0d1ceef9eee354f002e2c343
                                echo "</li>";
                            }
                        echo "</ol>";

                    echo "</div>";
                }
				


                // Text Editor
				vc_content();



                // Contact Form
				if ( isset( $post->_class__cform ) AND ! empty( $post->_class__cform ) ) {
					echo "<div id=\"form-wrapper\">";
						if ( isset( $post->_class__form_title ) AND ! empty( $post->_class__form_title ) ) {
							echo "<div class=\"h5\">$post->_class__form_title</div>";
						}
						ThemeSupport::insert_cform($post->_class__cform);
					echo "</div>";
				}



                // Instructor
                if ( $post->_class__instructor_id ) {

                    echo "<div id=\"loop-archive-team\">";

                        echo "<div class=\"hentry\">";

                            echo "<div class=\"h5\">Instructor</div>";
                                $featured__image = featured__image( $post->instructor, array(
                                    'before' => '<div class="image-wrap">',
                                    'after' => '</div>',
                                    'permalink' => false,
                                    'post_thumbnail_size' => 'team-image',
                                    'echo' => 0
                                ) );
                                vc_title( $post->instructor, array(
                                    'before' => $featured__image . ' ',
                                    'permalink' => true,
                                    'element' => 'div',
                                    'class' => 'h4'
                                ) );
                                if ( $post->instructor->_team__short_desc ) {
                                    vc_content( array(
                                        'content' => $post->instructor->_team__short_desc
                                    ) );
                                }

                            echo "<div class=\"clear\"></div>";
                        echo "</div>";


                    echo "<div class=\"clear\"></div>";
                    echo "</div>";
                }




				echo "<div class=\"clear\"></div>";
			echo "</article>";
            // end Primary Content




            // Session Loop
<<<<<<< HEAD
			if ( isset( $post->_class__show_session ) AND $post->_class__show_session == 1 ) {
=======
			if ( $post->have_session_1 OR $post->have_session_2 OR $post->have_session_3 OR $post->have_session_4 ) {
>>>>>>> 42c470d4581f2f8c0d1ceef9eee354f002e2c343
				
				if ( $post->have_session_1 OR $post->have_session_2 OR $post->have_session_3 OR $post->have_session_4 ) {

					echo "<div id=\"sessions\">";
						echo "<h2 class=\"h2\">Sessions</h2>";

						echo "<div class=\"session-wrapper\">";

							foreach ( $post->sessions as $post->session ) {

								if ( isset( $post->session->post_content ) AND ! empty( $post->session->post_content ) ) {

									echo "<div id=\"session--" . $post->session->post_name . "\" class=\"hentry session\">";
										vc_title( $post->session, array( 
											'permalink' => false,
											'element' => 'div',
											'class' => 'h3'
										) );

										echo "<div class=\"session-content row-fluid\">";


											// Session Details
											if ( isset( $post->session->date ) AND ! empty( $post->session->date ) ) {
												echo "<div class=\"session-details span4\">";

													echo "<div class=\"item-wrapper\">";

														echo "<div class=\"item date\"><span class=\"title\">Date:</span> " . $post->session->date . "</div>";
														if ( isset( $post->session->time ) AND ! empty( $post->session->time ) ) {
															echo "<div class=\"item time\"><span class=\"title\">Time:</span> " . $post->session->time . "</div>";
														}

													echo "</div>";

												echo "</div>";
											}


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

								} // end if ( isset( $post->session->post_content ) ) )

							} // end foreach ( $post->sessions as $session )

						echo "</div>";					

					echo "</div>";

				} // end if ( $post->have_session_x )
				
			} // end if ( isset( $post->_class__show_session ) AND $post->_class__show_session == 1 ) {

		} // End while(have_post())

		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 