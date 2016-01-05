<?php
/**
 * @package barebum
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post_th">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </div><!-- end post_th -->
    <?php endif; ?>
    
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php bbum_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php bbum_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
