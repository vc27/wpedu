<?php
/**
 * File Name header.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 2.1
 * @updated 06.19.13
 **/
#################################################################################################### */

$title_element = 'div';
$desc_element = 'div';
if ( is_page_template('tpl-home.php') ) {
	$title_element = 'h1';
	$desc_element = 'h2';
}


get_template_part( 'header', 'head' );

?>
<!-- Start Body -->
<body <?php body_class(); ?>>
	<?php do_action('after_body_tag'); ?>
	<div id="page">
		
		<?php
		wp_nav_menu( array( 
			'fallback_cb' => '', 
			'theme_location' => 'primary-navigation', 
			'container' => 'div', 
			'container_id' => 'primary-navigation', 
			'menu_class' => 'inner-wrap' 
		) );
		?>
			
		<!-- Start Header -->
		<div id="header" class="outer-wrap">
			
			<header class="inner-wrap">
				<?php 
				
				echo "<$title_element class=\"h1\"><a href=\"" . home_url() . "\">" . get_bloginfo('name') . "</a></$title_element>";
				echo "<$desc_element class=\"h4\">" . get_bloginfo('description') . "</$desc_element>";
				
				?>
				<div class="clear"></div>
			</header>
		</div>
		
		<!-- Start Main Content -->
		<div id="content-wrap" class="outer-wrap">
			<div class="inner-wrap"><?php do_action( 'inner_wrap_top' ); ?>