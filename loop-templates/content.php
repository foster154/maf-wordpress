<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

	<div class="img-wrapper">
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	</div>

		<div class="post-content-wrapper">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

			<div class="entry-content">

				<?php
				the_excerpt();
				?>

				<a class="read-more-btn" href="<?php echo get_permalink() ?>">
					Read Article
				</a>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

		</div>

	</div><!-- .entry-content -->



</article><!-- #post-## -->
