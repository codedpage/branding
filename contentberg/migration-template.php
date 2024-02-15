<?php /* Template Name: State Migration Templage don not use it */ ?>
<?php
ini_set('max_execution_time', 2147483646);
ini_set('memory_limit', '2024M');
global $wpdb;
$results_city = Array(
    [0]=> array('city'=>'McLean', 'post_parent'=>88410 , 'state_code' => 'VA'),
    [1]=> array('city'=>'Holly', 'post_parent'=>86146 , 'state_code' => 'MI'),
    [2]=> array('city'=>'Leicester', 'post_parent'=>86550 , 'state_code' => 'NC'),
    [3]=> array('city'=>'Spicewood', 'post_parent'=>88187 , 'state_code' => 'TX'),
    [4]=> array('city'=>'Nunnelly', 'post_parent'=>88085 , 'state_code' => 'TN'),
    [5]=> array('city'=>'Kemah', 'post_parent'=>88187 , 'state_code' => 'TX'),
    [6]=> array('city'=>'Canterbury', 'post_parent'=>86699 , 'state_code' => 'NH'),
    [7]=> array('city'=>'Effingham', 'post_parent'=>86699 , 'state_code' => 'NH'),
    [8]=> array('city'=>'Glendale', 'post_parent'=>84734 , 'state_code' => 'CO'),
    [9]=> array('city'=>'Ellenboro', 'post_parent'=>86550 , 'state_code' => 'NC'),
    [10]=> array('city'=>'Nashville', 'post_parent'=>84896 , 'state_code' => 'FL'),
    [11]=> array('city'=>'St. Cloud', 'post_parent'=>84896 , 'state_code' => 'FL')
);
print_r($results_city);
foreach($results_city as $result_city) {
    print_r($result_city); die;
        $my_post = array(
                'post_title'    => wp_strip_all_tags( $result_city->meta_value ),
                'post_content'  => '',
                'post_status'   => 'publish',
                //'post_author'   => 1, approved user id by default
                'post_type'     => 'page',
                'ping_status'   => 'closed',
                'comment_status'=> 'closed',
                'post_parent'   => $post_id,
                'page_template'  => 'template-city.php'
            );
        $post_id_city = wp_insert_post( $my_post);
        add_post_meta($post_id_city,"meta-state",$result->state_code);
        add_post_meta($post_id_city,"meta-city",$result_city->meta_value);
        
        $data = array('city_name'=>$result_city->meta_value,'post_id'=>$post_id_city,'status'=>1,'state_id'=>$result->id);
        $format = array('%s','%d','%d','%d');  // Ignored when corresponding data is NULL, set to NULL for readability.
        $wpdb->insert( $wpdb->prefix . 'city', $data, $format);
        echo '<br>'.$result_city->meta_value.'<br>';    
    }










$results = $wpdb->get_results( "select id,state_code,state_name  from wp_state" );
//echo $wpdb->last_query;
echo "<pre>";
//print_r($results); die;
foreach($results as $result) {
    $my_post = array(
                'post_title'    => wp_strip_all_tags( $result->state_name ),
                'post_content'  => '',
                'post_status'   => 'publish',
                //'post_author'   => 1, approved user id by default
                'post_type'     => 'page',
                'ping_status'   => 'closed',
                'comment_status'=> 'closed',
                'post_parent'   => 65223,
                'page_template'  => 'template-state.php'
            );
    // Insert the post into the database
    $post_id = wp_insert_post( $my_post);
    add_post_meta($post_id,"meta-state",$result->state_code);
    
    $data = array('post_id'=>$post_id,'status'=>1);
    $format = array('%s','%d');  // Ignored when corresponding data is NULL, set to NULL for readability.
    $where = [ 'id' => $result->id ]; // NULL value in WHERE clause.
    $where_format = [ '%d' ];  // Ignored when corresponding WHERE data is NULL, set to NULL for readability.
    $wpdb->update( $wpdb->prefix . 'state', $data, $where, $format, $where_format );
    
    $results_city = $wpdb->get_results( "select distinct meta_value from wp_postmeta 
                                    where 
                                    meta_key='meta-city' 
                                    and 
                                    post_id 
                                    in 
                                    (SELECT post_id FROM wp_postmeta WHERE meta_key = 'meta-state' and meta_value='".$result->state_code."') 
                                    order by meta_value asc" );
    foreach($results_city as $result_city) {
        $my_post = array(
                'post_title'    => wp_strip_all_tags( $result_city->meta_value ),
                'post_content'  => '',
                'post_status'   => 'publish',
                //'post_author'   => 1, approved user id by default
                'post_type'     => 'page',
                'ping_status'   => 'closed',
                'comment_status'=> 'closed',
                'post_parent'   => $post_id,
                'page_template'  => 'template-city.php'
            );
        $post_id_city = wp_insert_post( $my_post);
        add_post_meta($post_id_city,"meta-state",$result->state_code);
        add_post_meta($post_id_city,"meta-city",$result_city->meta_value);
        
        $data = array('city_name'=>$result_city->meta_value,'post_id'=>$post_id_city,'status'=>1,'state_id'=>$result->id);
        $format = array('%s','%d','%d','%d');  // Ignored when corresponding data is NULL, set to NULL for readability.
        $wpdb->insert( $wpdb->prefix . 'city', $data, $format);
        echo '<br>'.$result_city->meta_value.'<br>';    
    }
    echo '<br>'.$result->state_code.'<br>';
}