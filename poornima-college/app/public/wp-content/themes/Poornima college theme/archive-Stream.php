
<?php
get_header(); 
pageBanner(array(

  'title'=>'Streams',
  'subtitle'=>'Stay in touch with our Streams',
  'bannerImg'=>''
  )); 
?>

<div class="container container--narrow page-section">
<ul class="link-list min-list">
<?php
while(have_posts()){
      the_post();
$eventdate= new DateTime(get_field('poornima_event_date'));

?>
  
<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                
<?php 
} 
?>
</ul>

<?php
get_footer();
?>
