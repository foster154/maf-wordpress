<?php
/**
 * Template Name: Home Page
 *
 * @package understrap
 */

get_header(); ?>

<section class="hero">
  <div class="tree">
    <?php get_template_part( 'img/inline', 'tree.svg' ); ?>
  </div>
  <div class="hero-text">
    I build websites and apps</br> that help businesses grow.
  </div>
</section>

<section class="fp-testamonials clearfix">
  <div class="fp-testamonials-wrapper">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/quote.svg" />
    <div class="quote">
      Mark really captured the vision for our organization. He is a great communicator, which made the whole process very user friendly.  I have nothing but good things to say--would definitely recommend working with Mark!
      <span class="quote-by"><em> - Amanda, LEAP Charities</em></span>
    </div>


  </div>
</section>

<section class="fp-portfolio">
  <h2>Portfolio</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/portfolio.jpg" />
  <a class="fp-button" href="/markadamfoster/portfolio/">
    See Projects & Details
  </a>
</section>

<section class="fp-articles">
  <h2>Recent Articles</h2>
  <ul>
    <?php

        $args = array('showposts' => 5);

        $the_query = new WP_Query( $args );

        if( $the_query->have_posts() ):

            echo '<ul>';

            while ( $the_query->have_posts()) : $the_query->the_post();
                echo '<li class="clearfix">
                        <div class="img-wrapper">
                          '.get_the_post_thumbnail().'
                        </div>
                        <div class="post-content-wrapper">
                          <h3>'.get_the_title().'</h3>
                          '.get_the_excerpt().'
                          <a class="fp-post-read-more" href="'.get_the_permalink().'">
                            Read Article
                          </a>
                        </div>
                      </li>';
            endwhile;

            echo '</ul>';

        endif;

        wp_reset_query();
    ?>
  </ul>
  <a class="fp-button" href="/markadamfoster/articles/">
    See All Articles
  </a>
</section>

<section class="fp-about">
  <h2>About</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/about.jpg" />
  <a class="fp-button" href="/markadamfoster/about/">
    More About Mark
  </a>
</section>

<?php get_footer();
