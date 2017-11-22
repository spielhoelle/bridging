<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bridging-ideas
 */

get_header(); ?>
  <div id="primary" class="content-area py-5">
    <main id="main" class="site-main container">

    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("mb-5"); ?>>
                <header class="entry-header py-3">
                        <?php
                if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;

                        if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                                <?php bridging_ideas_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php
                        endif; ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                  <?php
                          the_content( sprintf(
                                  wp_kses(
                                          /* translators: %s: Name of current post. Only visible to screen readers */
                                          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bridging-ideas' ),
                                          array(
                                                  'span' => array(
                                                          'class' => array(),
                                                  ),
                                          )
                                  ),
                                  get_the_title()
                          ) );

                          wp_link_pages( array(
                                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bridging-ideas' ),
                                  'after'  => '</div>',
                          ) );
                  ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                        <?php bridging_ideas_entry_footer(); ?>
                </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; // End of the loop.  ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
