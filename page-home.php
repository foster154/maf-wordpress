<?php
/**
 * Template Name: Home Page
 *
 * @package understrap
 */

get_header(); ?>

<section class="hero">
  I build websites and apps</br> that help businesses grow.
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
</section>

<section class="fp-articles">
  <h2>Articles</h2>
</section>

<section class="about">
  <h2>About</h2>
</section>

<?php get_footer();
