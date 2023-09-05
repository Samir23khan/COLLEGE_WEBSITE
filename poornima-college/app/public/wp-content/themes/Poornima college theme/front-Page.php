<?php
get_header();

?>
<div class="page-banner">
      
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri ('/images/library-hero.jpg'); ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">A place for discovery &amp; innovation</h2>
        <h3 class="headline headline--small">We are <strong>top</strong> engineering college in Jaipur.</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Course</a>
      </div>
    </div>

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

          <?php 
          $today = date('Ymd');
$homePageEvents = new WP_Query(array(
  
 'posts_per_page' =>2,
 'post_type' =>'event',
 'meta_key'=>'poornima_event_date',
 'orderby'=>'meta_value_num',
 'order'=>'ASC',
 'meta_query'=>(
  array(
    'key'=>'poornima_event_date',
    'compare'=>'>=',
    'value'=>$today,
    'type'=>'numeric'
 ))
  
));

while($homePageEvents->have_posts()){
  $homePageEvents->the_post();

$eventdate= new DateTime(get_field('poornima_event_date'));

echo get_template_part('/template-parts/events');

}
wp_reset_postdata();
?>     
          
        
        
        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

<?php 
$homePagePosts = new WP_Query(array(
 'posts_per_page' =>2,
 'category_name' =>'award'

));

while($homePagePosts->have_posts()){
  $homePagePosts->the_post();
?>


          <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="#">
              <span class="event-summary__month"><?php the_time('M')?></span>
              <span class="event-summary__day"><?php the_time('d')?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php echo wp_trim_words(get_the_content(),10);?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
            </div>
          </div>
          
          <?php
           }
           wp_reset_postdata();
        ?>

          

          <p class="t-center no-margin"><a href="<?php echo site_url('/Blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri ('/images/bus.jpg') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Big Transportation Network</h2>
                <p class="t-center">All students have access to our massive bus network.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri ('/images/lab.jpg') ?>">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">High End Labs</h2>
                <p class="t-center">Well equipped labs for the young &amp; budding engineers.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri ('/images/scholarship.jpg'); ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Education</h2>
                <p class="t-center">Poornima Group offers plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

<?php


get_footer();
?>