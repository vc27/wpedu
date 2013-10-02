<?php
/**
 * File Name primary-content.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.02.13
 **/
#################################################################################################### */


if ( have_posts() ) { 
	$i = 0; 
	
	echo "<div id=\"primary-content\" class=\"loop\">";

		while ( have_posts() ) { 
			the_post(); 
			$i++;

			vc_content();

		} // End while(have_post())
	
		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post())