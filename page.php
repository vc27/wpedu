<?php
/**
 * File Name page.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.6
 * @updated 03.22.13
 **/
#################################################################################################### */


get_template_part( 'header' );

echo "<div class=\"row-fluid\">";
	
	echo "<div class=\"span8\">";
		get_template_part( 'loop', 'page-default' );
	echo "</div>";
	
	echo "<div class=\"span4\">";
		vc_sidebars( 'Primary Sidebar' );
	echo "</div>";
	
echo "</div>";

get_template_part( 'footer' );