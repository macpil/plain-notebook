<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Plain_Notebook
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$i = 0;
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post(); $i += 1;
				if ( $i == 1 ) { ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
						</h2>
						<hr>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<div class="entry-footer">
						<?php
						$key_1_value = get_post_meta( get_the_ID(), 'location', true );
						if ( ! empty( $key_1_value ) ) {
    						echo $key_1_value . '<br>';
						}
						?>
						<?php the_time('F j, Y'); ?>
					</div>
				<?php } else { ?>
					<article class="entry">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a> &mdash; <?php the_time('F j, Y'); ?>
					</article>
				<?php } ?>
			<?php
		endwhile; ?>
		<nav class="posts-navigation" role="navigation">
			<?php the_posts_navigation(); ?>
		</nav>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
