<?php

if (!function_exists('get_articles_by_category_id')) {

    function get_articles_by_category_id($category_id, $limit = 5) {
        
        $CI =& get_instance();
        
        $CI->db->limit($limit);
        
        $CI->db->where('category_id', $category_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'en_US' : $CI->csession->get('lang')); 
        
        return $CI->db->get('articles')->result();
    }

}

if (!function_exists('get_total_articles_by_category_id')) {

    function get_total_articles_by_category_id($category_id) {
        
        $CI =& get_instance();
        
        $CI->db->where('category_id', $category_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'en_US' : $CI->csession->get('lang')); 
        
        return count($CI->db->get('articles')->result()); 
    }

}

if (!function_exists('get_article_by_id')) {

    function get_article_by_id($article_id = 0) {
        
        $CI =& get_instance();
        
        $CI->db->where('id', $article_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'en_US' : $CI->csession->get('lang')); 
        
        return $CI->db->get('articles')->row(0); 
    }

}

