
<?php

function poornima_post_types(){
  register_post_type('event', array(
    'capability_type'=>'event',
    'map_meta_cap'=>'true',
'supports'=>array('title','editor','excerpt'),
'show_in_rest'=>true,
'has_archive'=>true,

    'public' => true ,
    'labels' => array(
      'name' => 'Events',
      'singular_name'=>'Event',
      'add_new_item'=>'Add New Event',
      'edit_item'=>'Edit Event',
      'all_items'=>'All Events'

    ),
    'menu_icon'=>'dashicons-calendar'
  ));

  register_post_type('Stream', array(
    'capability_type'=>'Stream',
    'map_meta_cap'=>'true',
    'supports'=>array('title','editor'),
    'show_in_rest'=>true,
    'has_archive'=>true,
    
        'public' => true ,
        'labels' => array(
          'name' => 'Stream',
          'singular_name'=>'Stream',
          'add_new_item'=>'Add New Stream',
          'edit_item'=>'Edit stream',
          'all_items'=>'All Stream'
    
        ),
        'menu_icon'=>'dashicons-awards'
      ));

      register_post_type('professor', array(
        'capability_type'=>'professor',
    'map_meta_cap'=>'true',
        
        'supports'=>array('title','editor','thumbnail'),
        'show_in_rest'=>true,
        
        
            'public' => true ,
            'labels' => array(
              'name' => 'Professors',
              'singular_name'=>'Professor',
              'add_new_item'=>'Add New Professor',
              'edit_item'=>'Edit Professor',
              'all_items'=>'All Professor'
        
            ),
            'menu_icon'=>'dashicons-welcome-learn-more'
          ));


          register_post_type('campus', array(
            'capability_type'=>'campus',
            'map_meta_cap'=>'true',
            'supports'=>array('title','editor','thumbnail'),
            'show_in_rest'=>true,
            'has_archive'=>true,
            
                'public' => true ,
                'labels' => array(
                  'name' => 'Campuses',
                  'singular_name'=>'Campus',
                  'add_new_item'=>'Add New Campus',
                  'edit_item'=>'Edit Campus',
                  'all_items'=>'All Campus'
            
                ),
                'menu_icon'=>'dashicons-buddicons-community'
              ));

}
add_action('init','poornima_post_types');
