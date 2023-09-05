<?php get_header(); 
while(have_posts()){
    the_post();
    pageBanner();

?>


<div class="container container--narrow page-section">
        
  
  <div class="generic-content">
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox_blog-home-link" href="<?php echo site_url('/event');?>"><i class="fa fa-home" aria-hidden="true"></i>All Events</a> <span class="metabox__main">post by <?php  the_author_posts_link(); ?> on <?php the_time('M d, Y');?> in <?php echo get_the_category_list(','); ?> 
</span>
        </p>
      </div>
     <?php the_content(); ?>
  </div>
  
  <?php
 $relatedStream =get_field('related_stream');
if( $relatedStream ){
?>
    <hr class="section-break">
    <h2 class="headline headline--medium">Related Streams(s)</h2>
   <ul class="link-list min-list">
<?php
foreach($relatedStream as $rs){
?>

<li><a href="<?php echo get_the_permalink($rs);?>"><?php echo get_the_title($rs);?></a></li>

 <?php
 } ?>
 </ul>

 <?php
 }
 ?>
 </div> 
<?php
}
get_footer();
 ?>
