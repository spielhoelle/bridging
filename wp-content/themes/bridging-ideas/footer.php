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

        <footer id="colophon" class="site-footer bg-light">
          <div class="container">
            <div class="row">
              <?php 
              get_sidebar();
              ?>
              </div>
            </div>

            <div class="site-info bg-grey">
              <div class="text-center py-3">Copyright © 2017 Bridging People and Ideas</div>
              </div>
            </div>

        </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
