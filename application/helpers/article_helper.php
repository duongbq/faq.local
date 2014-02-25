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

        $article_ids = get_cookie('article_ids');

        $values = $article_ids != '' ? $article_ids . '%' . $article_id : $article_id;

        $input = array();
        foreach (explode('%', $values) as $value) {
            array_push($input, $value);
        }

        $cookie = array(
            'name' => 'article_ids',
            'value' => implode('%', array_unique($input)),
            'expire' => 60 * 60 * 24 * 7
        );

        set_cookie($cookie);
    }

}
//TODO
if (!function_exists('get_articles_from_cookie')) {

    function get_articles_from_cookie($limit = 5) {

        $CI = & get_instance();
        $CI->db->select('articles.*, categories.category');
        $CI->db->join('categories', 'categories.id = articles.category_id');
        $CI->db->where_in('articles.id', explode('%', get_cookie('article_ids')));
        $CI->db->where('articles.lang', !$CI->csession->get('lang') ? 'english' : $CI->csession->get('lang'));
        $CI->db->limit($limit);
//        $CI->db->order_by('updated_at');

        return $CI->db->get('articles')->result();
    }

}



if (!function_exists('get_tags_by_article_id')) {

    function get_tags_by_article_id($article_id = 0) {

        $CI = & get_instance();

        $CI->db->select('articles_tags.*, tags.tag');
        $CI->db->join('tags', 'tags.id = articles_tags.tag_id');
        $CI->db->where('article_id', $article_id);

        $tags = $CI->db->get('articles_tags')->result();

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

if (!function_exists('set_rating_for_article')) {

    function set_rating_for_article($article_id = 0, $points = 0) {

        $article = get_article_by_id($article_id);
        
        $total_vote = $article->total_vote;
        $voted_point = $article->voted_point;

        $CI = & get_instance();
        $data = array(
            'total_vote' => $total_vote + 1,
            'voted_point' => $voted_point + $points
        );

        $CI->db->update('articles', $data, array('id' => $article_id));
    }

}

if (!function_exists('get_rating_points_by_article_id')) {

    function get_rating_points_by_article_id($article_id = 0) {

        $article = get_article_by_id($article_id);

        $total_vote = $article->total_vote;
        $voted_point = $article->voted_point;

        $average = 0;
        if ($total_vote > 0)
            $average = $voted_point / $total_vote;
        
        $average = Round($average, 2);

        return $average;
    }

}

