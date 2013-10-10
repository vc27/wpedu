<?php
/* Template Name: About */

/**
 * File Name tpl-about.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 10.10.13
 **/
#################################################################################################### */


get_template_part( 'header' );

echo "<div class=\"row-fluid\">";
	echo "<div class=\"span10 offset1\">";
		get_template_part( 'loop-page-default' );


        $query = array(
            'post_per_page' => -1,
            'post_type' => 'team',
            'orderby' => 'menu_order'
        );
        $wp_query = new WP_Query();
        $wp_query->query($query);
        get_template_part( 'loop-archive-team' );
        wp_reset_postdata();
        wp_reset_query();


	echo "</div>";
echo "</div>";

get_template_part( 'footer' );