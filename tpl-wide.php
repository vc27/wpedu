<?php
/* Template Name: Wide */

/**
 * File Name tpl-wide.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.9
 * @updated 03.22.13
 **/
#################################################################################################### */


get_template_part( 'header' );

echo "<div class=\"row-fluid\">";
	echo "<div class=\"span10 offset1\">";
		get_template_part( 'loop', 'page-default' );
	echo "</div>";
echo "</div>";

get_template_part( 'footer' );