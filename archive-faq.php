<?php
/**
 * File Name archive-class.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.04.13
 **/
#################################################################################################### */


get_template_part( 'header' );

echo "<div class=\"row-fluid\">";
	echo "<div class=\"span10 offset1\">";
		
		
		echo "<div id=\"loop-default\" class=\"loop\">";
			echo "<div class=\"hentry\">";
				echo "<h1 class=\"h1\">" . ThemeSupport::template_page_options( 'faq', 'title' ) . "</h1>";

				if ( ThemeSupport::have_template_page_options( 'faq', 'content' ) ) {
					vc_content( array(
						'content' => ThemeSupport::template_page_options( 'faq', 'content' )
					) );
				}
			echo "</div>";
		echo "</div>";

		get_template_part( 'loop-archive-faq' );
		
		
	echo "</div>";
echo "</div>";
		
get_template_part( 'footer' );