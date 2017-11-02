<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bridging-ideas
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bridging-ideas' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'bridging-ideas' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bridging-ideas' ), 'bridging-ideas', '<a href="http://thomaskuhnert.com">Thomas Kuhnert</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
get_sidebar();
?>


<?php 
$defaults = array( 
	'menu' => '', 
	'container' => 'div',
	'container_class' => '',
	'container_id' => '',
	'menu_class' => 'menu nav',
	'menu_id' => '',
	'echo' => true,
	'fallback_cb' => 'wp_page_menu',
	'before' => '',
	'after' => '',
	'link_before' => '',
	'link_after' => '',
	'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing' => 'preserve',
	'depth' => 0, 'walker' => '', 
	'theme_location' => '' );

wp_nav_menu( $defaults);
get_sidebar();
wp_footer(); ?>

</body>
</html>
