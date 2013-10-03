<?php
/**
 * File Name footer.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.2
 * @updated 06.19.13
 **/
#################################################################################################### */

do_action( 'inner_wrap_bottom' );

?>
			<div class="clear"></div>
		</div><!-- End content-wrap-inner -->
	</div><!-- End content-wrap -->
	
	<?php
	
	if ( is_page_template('tpl-home.php') ) {
		get_template_part( 'home-page/available-classes' );
	}	
	
	?>
	
	<!-- Start Footer -->
	<div id="footer" class="outer-wrap">
		<footer class="inner-wrap">
			
			<div class="row-fluid row-one">
				<div class="span4"><?php vc_sidebars( 'Footer Col One' ); ?></div>
				<div class="span4"><?php vc_sidebars( 'Footer Col Two' ); ?></div>
				<div class="span4"><?php vc_sidebars( 'Footer Col Three' ); ?></div>
			</div>
			
			<div class="row-fluid row-two">
				<?php 

				get_template_part('social-networks');
				wp_nav_menu( array( 'depth' => 1, 'fallback_cb' => '', 'theme_location' => 'footer-navigation', 'container' => 'div', 'container_id' => 'footer-navigation' ) );
				echo "<div id=\"copyright\">" . html_entity_decode( get_vc_option( 'contact', 'copyright' ) ) . "</div>";

				?>
			</div>
			
			<div class="clear"></div>
		</footer>
	</div><!-- End Footer -->

</div><!-- End Page -->

<!-- Start wp_footer -->
<?php wp_footer(); ?>
</body>
</html>