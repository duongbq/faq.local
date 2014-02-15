<?php

if (!function_exists('get_articles_by_category_id')) {

    function get_articles_by_category_id($category_id, $limit = 5) {
        
        $CI =& get_instance();
        
        $CI->db->limit($limit);
        
        $CI->db->where('category_id', $category_id);
        
        return $CI->db->get('articles')->result();
    }

}

if (!function_exists('get_total_articles_by_category_id')) {

    function get_total_articles_by_category_id($category_id) {
        
        $CI =& get_instance();
        
        $CI->db->where('category_id', $category_id);
        
//        return $CI->db->count_all('articles');
        return count($CI->db->get('articles')->result()); 
    }

}

