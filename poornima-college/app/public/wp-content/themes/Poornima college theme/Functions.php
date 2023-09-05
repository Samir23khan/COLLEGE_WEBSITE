<?php 
function customApiFields(){
register_  _()


}





function pageBanner($args=null){
if(!isset($args['title'])){
  $args['title'] = get_the_title();

  }

  if(!isset($args['subtitle'])){
    $args['subtitle'] = get_field('page_sub_heading');

  }
  if(!isset($args['bannerImg']) and !is_archive() and !is_home()){
    if(get_field('page_banner_image')){
      $args['bannerImg'] = get_field('page_banner_image')['sizes']['bannerImage'];
    }
  else{
  $args['bannerImg'] = get_theme_file_uri('/images/college.jpg');
}
 }
 
?>
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image:url(<?php echo $args['bannerImg']; ?>)"></div>
       <div class="page-banner__content container container--narrow">
         <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
        <div class="page-banner__intro">
          <p><?php echo $args['subtitle']; ?></p>
        </div>
      </div>
    </div>
<?php
}

function load_main_css(){
    wp_enqueue_script('Clg_js',get_theme_file_uri('/build/index.js'),array('jquery'),'1.0',true);
    wp_enqueue_style('Google_font','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awsome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('primary_index_stylesheet',get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('index_stylesheet',get_theme_file_uri('/build/index.css'));

wp_localize_script('Clg_js','universityData',aray(
'root_url' =>get_site_url();
));
}
add_action('wp_enqueue_scripts','load_main_css');//
add_action('wp_enqueue_scripts','load_main_css');






function load_features(){
  /*
  register_nav_menu('headerMenuLocation','Header Menu location');
  register_nav_menu('footerMenuLocation1','footer Menu location1');
  register_nav_menu('footerMenuLocation2','footer Menu location2');
*/

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails'); 
  add_image_size('professorLandscape',400,260,true);
  add_image_size('professorPortrait',480,650,true);
  add_image_size('bannerImage',1500,350,true);

}
add_action('after_setup_theme','load_features');

function adjust_events($query){
  if(is_admin() AND is_post_type_archive('event') AND is_main_query()){
    
    $toady = date('Ymd');
    
    $query->set('meta_key','poornima_event_date');

    $query->set('orderby','meta_value_num');

    $query->set('order','ASC');

    $query->set('meta_query',array(
        'key'=>'poornima_event_date',
        'compare'=>'>=',
        'value'=>$today,
        'type'=>'numeric'
      )
    );
  }
}

add_action('pre_get_posts','adjust_events');

function redirectSubscriber(){
   $currUser = wp_get_current_user();
    if($currUser->roles[0]=='subscriber' and count($currUser->roles)==1){
      wp_redirect(home_url('/'));
       exit;
     }
  }

 add_action('admin_init','redirectSubscriber');

 function redirectSubscriberOnLogout(){
         wp_redirect(esc_url(site_url('/')));   
  exit;
 }
add_action('wp_logout','redirectSubscriberOnLogout');


 function noSubsAbminBar(){
   $currUser = wp_get_current_user();
    if(isset($currUser)and count($currUser->roles)>0){
     if($currUser->roles[0]=='subscriber' and count($currUser->roles)==1){
      show_admin_bar(false);
  }
 }
}

 add_action('wp_loaded','noSubsAbminBar');

function ourHeader(){
  return esc_url(site_url('/'));
}

add_action('login_headerurl','ourHeader');


function ourLoginCSS(){
  wp_enqueue_script('Clg_js',get_theme_file_uri('/build/index.js'),array('jquery'),'1.0',true);
  wp_enqueue_style('Google_font','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font_awsome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('primary_index_stylesheet',get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('index_stylesheet',get_theme_file_uri('/build/index.css'));
 }
add_action('login_enqueue_scripts','ourLoginCSS');

function ourLoginTitle(){
  return get_bloginfo('name');
 }
add_filter('login_headertitle','ourLoginTitle');

?>