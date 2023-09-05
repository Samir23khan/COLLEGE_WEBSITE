<?php get_header(); 
while(have_posts()){
    the_post();
    pageBanner();
?>

<div class="container container--narrow page-section">
          
<div class="generic-content">
   <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
           <a class="metabox__blog-home-link" href="<?php echo site_url('/stream');?>"><i class="fa fa-home" aria-hidden="true"></i>All Streams </a> 
            </span>
        </p>
    </div>
<?php the_content(); ?>
</div>

<?php 
  $today = date('Ymd');
  $homePageEvents = new WP_Query(array(
  
 'posts_per_page' =>-1,
 'post_type' =>'event',
 'meta_key'=>'poornima_event_date',
 'orderby'=>'meta_value_num',
 'order'=>'ASC',
 'meta_query'=>array(
  array(
    'key'=>'related_stream',
    'compare'=>'LIKE',
    'value'=>'"'.get_the_id(). '"'
   )
  ) 
 )
);

if($homePageEvents->have_posts()){

  while($homePageEvents->have_posts()){
  $homePageEvents->the_post();
?>

   <hr class="section-break">
   <h2 class="headline headline--medium">Upcoming events</h2>
  
<?php
echo get_template_part('/template-parts/events');
  }
 }
}
wp_reset_postdata();

$relatedProfessor = new WP_Query(
  array(
    'posts_per_page' => -1,
    'post_type' => 'professor',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'related_stream',
        'compare' => 'LIKE',
        'value' => '"'. get_the_ID(). '"'
      )
    )
  )
);

if($relatedProfessor->have_posts()){
?>
  <hr class="section-break">
  <h2 class="headline headline--medium"><?php echo get_the_title(); ?> Professor </h2>
  <ul class="professor-cards">
<?php

  while($relatedProfessor->have_posts()){
    $relatedProfessor->the_post();
?>
<li class="professor-card__list-item">
    <a class="professor-card" href="<?php the_permalink();  ?>">
       <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
          <span class="professor-card__name"> <?php the_title(); ?> </span>
    </a>
</li>

<?php
  }
 }
 wp_reset_postdata();
?>
</ul>
<?php get_footer(); ?>
