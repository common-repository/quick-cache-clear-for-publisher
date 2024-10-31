<?php 
/*
Plugin Name: Quick Cache Clear for Publisher
Plugin URI: http://www.judenware.com/projects/wordpress/quick-cache-clear-for-publisher/
Description: Allows anyone with publish permissions to clear the cache in Quick Cache
Author: ericjuden
Version: 1.0
Author URI: http://ericjuden.com
Site Wide only: false
Network: false
*/

class Quick_Cache_Clear_For_Publisher {
    function __construct(){
        add_filter('ws_plugin__qcache_ms_user_can_see_admin_header_controls', array(&$this, 'check_publish'));
    }

    function check_publish(){
        global $current_user, $post;
        
        $capability = 'publish_';
        if($post->post_type != ''){
            $capability .= $post->post_type . 's';
        } else {
            $capability .= 'posts';
        }
        
        return current_user_can($capability);
    } 
}
$qc_clear_for_publisher = new Quick_Cache_Clear_For_Publisher();
?>