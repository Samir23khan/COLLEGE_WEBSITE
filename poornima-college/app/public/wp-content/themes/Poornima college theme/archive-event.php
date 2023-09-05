<?php
get_header();  
pageBanner(array(

'title'=>'Upcoming events',
'subtitle'=>'Stay in touch with our upcoming events'
));
?>

<div class="container container--narrow page-section">
    
<?php
while(have_posts()){
    the_post();

echo get_template_part('/template-parts/events');

?>  

<?php 

} 
echo paginate_links();
?>

<hr class="section-break">
<p>Have a look at the gone by events.<a href=<?php echo site_url('/past-events') ?>>Check them out!</a></p>
</div>


<?php
get_footer();
?>
