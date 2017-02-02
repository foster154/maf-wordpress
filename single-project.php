<?php
/**
 * Template for displaying a single portfolio project
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper project-single-page" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<?php // get_sidebar( 'project' ); ?>

			<!-- <div
				class="<?php if ( is_active_sidebar( 'project-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary"> -->
				<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<header class="entry-header">

								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

							</header><!-- .entry-header -->

							<?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'project-featured-image') ); ?>

							<div class="entry-content">
								<?php the_content(); ?>

								<div class="project-links">
									<?php
										$liveUrl = get_field('live_url');
										$codeUrl = get_field('code_url');
										if ($liveUrl) {
											echo '<a class="live-site" target="_blank" href="'.$liveUrl.'"><span class="fa fa-desktop"></span>Live Site</a>';
										}
										if ($codeUrl) {
											echo '<a class="code-site" target="_blank" href="'.$codeUrl.'"><span class="fa fa-github"></span>View Code</a>';
										}
									?>
								</div>


								<!-- Project tech badges -->
								<div class="project-tags">
									<?php
									$tags = get_the_terms( $post->ID, "project_tags" );

										foreach ( $tags as $tag ) {
											//echo $tag->name;
											// if ($tag->name == 'WordPress') {
											//   echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/wordpress.jpg" />';
											// }
											switch ($tag->name) {
												case 'WordPress':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/wordpress.png" />';
													break;
												case 'Bootstrap':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/bootstrap.png" />';
													break;
												case 'CSS':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/css3.png" />';
													break;
												case 'Gulp':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/gulp.png" />';
													break;
												case 'HTML':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/html5.png" />';
													break;
												case 'jQuery':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/jquery.png" />';
													break;
												case 'JavaScript':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/js.png" />';
													break;
												case 'Mongo DB':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/mongo.png" />';
													break;
												case 'React':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/react.png" />';
													break;
												case 'Redux':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/redux.png" />';
													break;
												case 'Ruby on Rails':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/rubyonrails.png" />';
													break;
												case 'SASS':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/sass.png" />';
													break;
												case 'Webpack':
													echo '<img src="'.get_stylesheet_directory_uri().'/img/project-tags/webpack.png" />';
													break;
											}
										}
									?>
								</div>

								<div class="project-screenshots">
									<?php
										$screenshot1 = get_field('screenshot1');
										$screenshot2 = get_field('screenshot2');
										$screenshot3 = get_field('screenshot3');
										$screenshot4 = get_field('screenshot4');
										$screenshot5 = get_field('screenshot5');
										if( !empty($screenshot1) ): ?>
											<img
												src="<?php echo $screenshot1['url']; ?>"
												alt="<?php echo $screenshot1['alt']; ?>"
												class="aligncenter size-full wp-image-82 project-screenshot"
												width="1000"
												height="2720" />
										<?php endif; ?>

										<?php if( !empty($screenshot2) ): ?>
											<img
												src="<?php echo $screenshot2['url']; ?>"
												alt="<?php echo $screenshot2['alt']; ?>"
												class="aligncenter size-full wp-image-82 project-screenshot"
												width="1000"
												height="2720" />
										<?php endif; ?>

										<?php if( !empty($screenshot3) ): ?>
											<img
												src="<?php echo $screenshot3['url']; ?>"
												alt="<?php echo $screenshot3['alt']; ?>"
												class="aligncenter size-full wp-image-82 project-screenshot"
												width="1000"
												height="2720" />
										<?php endif; ?>

										<?php if( !empty($screenshot4) ): ?>
											<img
												src="<?php echo $screenshot4['url']; ?>"
												alt="<?php echo $screenshot4['alt']; ?>"
												class="aligncenter size-full wp-image-82 project-screenshot"
												width="1000"
												height="2720" />
										<?php endif; ?>

										<?php if( !empty($screenshot5) ): ?>
											<img
												src="<?php echo $screenshot5['url']; ?>"
												alt="<?php echo $screenshot5['alt']; ?>"
												class="aligncenter size-full wp-image-82 project-screenshot"
												width="1000"
												height="2720" />
										<?php endif; ?>

									?>
								</div>

								<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								) );
								?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">

								<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
