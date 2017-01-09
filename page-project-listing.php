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
        </div>
  		</li>
    </a>

		<?php endwhile; endif; ?>

</ul>

<?php get_footer();
