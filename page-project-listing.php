<?php
/**
 * Template Name: Projects
 *
 * @package understrap
 */

get_header(); ?>

<div class="project-listing-page-wrapper">

<h2>Portfolio</h2>

<ul class="projects">
<?php
  $r = new WP_Query(array(
  	'no_found_rows'       => true,
  	'post_status'         => 'publish',
  	'post_type' 		  		=> 'project',
  	'posts_per_page'	  	=> $number,
  	'category_name'		  	=> $category
	) );
?>

		<?php
      if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post();
      $summary = get_post_meta( get_the_ID(), 'summary', true );
    ?>

    <a href='<?php echo get_permalink(); ?>'>
  		<li>
        <div class="project-image">
  				<?php the_post_thumbnail(); ?>
  			</div>
        <h3 class="project-title"><?php echo get_the_title(); ?></h3>
        <div class="project-summary">
          <?php echo esc_html($summary); ?>
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
        </div>
  		</li>
    </a>

		<?php endwhile; endif; ?>

</ul>

<?php get_footer();
