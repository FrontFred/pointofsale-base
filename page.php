<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package erply
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			<div class="row">
				<?php if(is_front_page()):?>
					<div class="col-md-10">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
					<?php else:?>
						<div class="col-md-12 posts-container">
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>
				<?php endif;?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//Temporarily commented out for testing purposes!!!!!
// get_sidebar();
get_footer();