<?php /* Template Name: State Migration Templage don not use it */ ?>
<?php die;
ini_set('max_execution_time', 2147483646);
ini_set('memory_limit', '2024M');
global $wpdb;
$results_city = Array(
    array('city'=>'McLean', 'post_parent'=>88410 , 'state_code' => 'VA','s_c'=>48),
    array('city'=>'Holly', 'post_parent'=>86146 , 'state_code' => 'MI','s_c'=>24),
    array('city'=>'Leicester', 'post_parent'=>86550 , 'state_code' => 'NC','s_c'=>29),
    array('city'=>'Spicewood', 'post_parent'=>88187 , 'state_code' => 'TX','s_c'=>46),
    array('city'=>'Nunnelly', 'post_parent'=>88085 , 'state_code' => 'TN','s_c'=>45),
    array('city'=>'Kemah', 'post_parent'=>88187 , 'state_code' => 'TX','s_c'=>46),
    array('city'=>'Canterbury', 'post_parent'=>86699 , 'state_code' => 'NH','s_c'=>32),
    array('city'=>'Effingham', 'post_parent'=>86699 , 'state_code' => 'NH','s_c'=>32),
    array('city'=>'Glendale', 'post_parent'=>84734 , 'state_code' => 'CO','s_c'=>6),
    array('city'=>'Ellenboro', 'post_parent'=>86550 , 'state_code' => 'NC','s_c'=>29),
    array('city'=>'Nashville', 'post_parent'=>84896 , 'state_code' => 'FL','s_c'=>10),
    array('city'=>'St. Cloud', 'post_parent'=>84896 , 'state_code' => 'FL','s_c'=>10)
);
//print_r($results_city);
foreach($results_city as $result_city) {
   // print_r($result_city); die;
        $my_post = array(
                'post_title'    => wp_strip_all_tags( $result_city['city'] ),
                'post_content'  => '',
                'post_status'   => 'publish',
                //'post_author'   => 1, approved user id by default
                'post_type'     => 'page',
                'ping_status'   => 'closed',
                'comment_status'=> 'closed',
                'post_parent'   => $result_city['post_parent'],
                'page_template'  => 'template-city.php'
            );
        $post_id_city = wp_insert_post( $my_post);
        add_post_meta($post_id_city,"meta-state",$result_city['state_code']);
        add_post_meta($post_id_city,"meta-city",$result_city['city']);
        
        $data = array('city_name'=>$result_city['city'],'post_id'=>$post_id_city,'status'=>1,'state_id'=>$result_city['s_c']);
        $format = array('%s','%d','%d','%d');  // Ignored when corresponding data is NULL, set to NULL for readability.
        $wpdb->insert( $wpdb->prefix . 'city', $data, $format);
        echo '<br>'.$result_city->meta_value.'<br>';    
    }


