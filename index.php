<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kavya
 */

get_header(); ?>
	
    
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
        <?php
		if ( is_home() && ! is_paged() ) // condition should be same as in pre_get_posts
			get_template_part( 'featured-content' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php kavya_paging_nav( 'nav-below' ); ?>

			<?php elseif ( ! is_home() || is_paged() ) : ?>

				<?php get_template_part( 'content', 'none' ); ?>
      
			<?php else : ?>
    
			<?php
				$featured_posts = kavya_get_featured_posts();
				if ( ! $featured_posts->have_posts() )
					get_template_part( 'content', 'none' );
			?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
