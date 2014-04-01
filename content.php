<?php
/**
 * @package Kavya
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'kavya-featured' ); ?></a>
	</div>
	<?php endif; ?>
    
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>       
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
    
	<div class="entry-summary">
		<?php ?><?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'kavya' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kavya' ),
				'after'  => '</div>',
			) );
		?><?php ?>
        <?php //the_excerpt(); ?>
	</div><!-- .entry-content -->
    
	<footer class="entry-meta">
    	<?php kavya_posted_on(); ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'kavya' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'kavya' ) );

			if ( ! kavya_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'Tags: %2$s.', 'kavya' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'kavya' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'in %1$s. Tags: %2$s.', 'kavya' );
				} else {
					$meta_text = __( 'in %1$s.', 'kavya' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'kavya' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
    
	<?php endif; ?>

</article><!-- #post-## -->
