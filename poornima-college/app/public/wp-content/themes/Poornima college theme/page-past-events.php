<?php
get_header();  
pageBanner(array(

  'title'=>'Past Events',
  'subtitle'=>'Have a peek into the past events'
  )
); 
?>

<div class="container container--narrow page-section">
    
<?php
$today = date('Ymd');
$PastEvents = new WP_Query(array(
  
 'paged'=>get_query_var('paged',1),
 'post_type' =>'event',
 'meta_key'=>'poornima_event_date',
 'orderby'=>'meta_value_num',
 'order'=>'DSC',
 'meta_query'=>(
  array(
    'key'=>'poornima_event_date',
    'compare'=>'<',
    'value'=>$today,
    'type'=>'numeric'
   )
  )
 )
);

while($PastEvents->have_posts()){
  $PastEvents->the_post();

  echo get_template_part('/template-parts/events');
} 
echo paginate_links(array(
  'total'=>$PastEvents->max_num_pages
  )
);
?>
</div>

<?php
get_footer();
?>
