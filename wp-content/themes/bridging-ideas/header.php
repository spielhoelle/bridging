<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bridging-ideas
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">


        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-target="#navbar-example2" data-spy="scroll" >
<div id="page" class="site pt-5">
        <!--<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'bridging-ideas' ); ?><!--</a>-->

        <header id="masthead" class="site-header">

                <nav class="nav navbar navbar-expand-lg navbar-light bg-white fixed-top" id="navbar-example2">
                        <div class="container">
  <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="text-transparent position-absolute"><?php bloginfo( 'name' ); ?></span> <?php the_custom_logo(); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
                <div class="collapse navbar-collapse" id="navbarNav">
<?php
$defaults = array(
  'menu' => '',
  'menu_class' => 'menu navbar-nav',
  'menu_id' => '',
  'echo' => true,
  'fallback_cb' => 'wp_page_menu',
  'items_wrap' => '<ul  class="%2$s">%3$s</ul>',
  'item_spacing' => 'preserve',
  'depth' => 0,
  'walker' => '',
  'theme_location' => '' );
wp_nav_menu($defaults);
?>

                </div>
 </div>
</nav>

        </header><!-- #masthead -->

        <div id="content" class="site-content">
