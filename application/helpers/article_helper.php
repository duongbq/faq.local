<?php

if (!function_exists('get_popular_articles')) {

    function get_popular_articles($limit = 5) {

        $CI = & get_instance();
        $CI->db->select('articles.*, categories.category');
        $CI->db->join('categories', 'categories.id = articles.category_id');
        $CI->db->where('articles.lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));
        $CI->db->limit($limit);
        $CI->db->order_by('total_view', 'desc');

        return $CI->db->get('articles')->result();
    }

}

if (!function_exists('get_articles_by_category_id')) {

    function get_articles_by_category_id($category_id, $limit = 5) {

        $CI = & get_instance();

        $CI->db->limit($limit);

        $CI->db->where('category_id', $category_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));
        $CI->db->order_by('updated_at');

        return $CI->db->get('articles')->result();
    }

}

if (!function_exists('get_total_articles_by_category_id')) {

    function get_total_articles_by_category_id($category_id) {

        $CI = & get_instance();

        $CI->db->where('category_id', $category_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));

        return count($CI->db->get('articles')->result());
    }

}

if (!function_exists('get_article_by_id')) {

    function get_article_by_id($article_id = 0) {

        $CI = & get_instance();

        $CI->db->where('id', $article_id);
        $CI->db->where('lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));

        return $CI->db->get('articles')->row(0);
    }

}

if (!function_exists('set_total_view_by_id')) {

    function set_total_view_by_id($article_id = 0) {
        $article = get_article_by_id($article_id);
        $total_view = $article->total_view;
        $CI = & get_instance();
        $CI->db->update('articles', array('total_view' => $total_view + 1), array('id' => $article_id));
    }

}

//TODO
if (!function_exists('save_article_in_cookie')) {

    function save_article_in_cookie($article_id = 0) {

        $cookie = array(
            'name' => 'article_in_cookie',
            'value' => $article_id,
            'expire' => time(),
            'domain' => base_url(),
            'path' => '/',
            'prefix' => 'myprefix_',
            'secure' => TRUE
        );

        set_cookie($cookie);
        
        
    }

}
//TODO
if (!function_exists('get_articles_from_cookie')) {

    function get_articles_from_cookie() {
        
    }

}



if (!function_exists('get_tags_by_article_id')) {

    function get_tags_by_article_id($article_id = 0) {

        $CI = & get_instance();

        $CI->db->where('article_id', $article_id);
        $CI->db->select('artiles_tags.*, tags.tag');
        $CI->db->join('tags', 'tags.id = artiles_tags.tag_id');

        $tags = $CI->db->get('artiles_tags')->result();

        $article_tags = '';

        foreach ($tags as $tag) {
            $encode_tag = mb_strtolower(url_title(removesign($tag->tag)));
            if ($article_tags == '')
                $article_tags = anchor("tags/search/{$encode_tag}", $tag->tag);
            else
                $article_tags .= ', ' . anchor("tags/search/{$encode_tag}", $tag->tag);
        }
        return $article_tags != '' ? 'Tags: ' . $article_tags : NULL;
    }

}

if (!function_exists('get_related_articles')) {

    function get_related_articles($article_id = 0, $category_id = 0, $limit = 5) {

        $CI = & get_instance();

        $CI->db->where('id !=', $article_id);
        $CI->db->where('category_id', $category_id);

        $CI->db->where('lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));
        $CI->db->limit($limit);

        $CI->db->order_by('updated_at');

        return $CI->db->get('articles')->result();
    }

}

