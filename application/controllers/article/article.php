<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author duongbq
 */
class Article extends Front_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('category_model');
        $this->load->helper('article');
    }

    function view_detail($category_id = 0, $article_id = 0) {

        $article = get_article_by_id($article_id);

        set_total_view_by_id($article_id);
        
        save_article_in_cookie($article_id);
        
        $category = $this->category_model->get_by_id($category_id);

        $related_articles = get_related_articles($article_id, $category_id);

        $view_data = array(
            'article' => $article,
            'category' => $category,
            'related_articles' => $related_articles
        );

        $this->layout->title($article->title . ' | ' . $category->category . ' | ' . DEFAULT_SITE_TITLE);
        $this->layout->meta_description($article->meta_description . ' | ' . $category->category . ' | ' . DEFAULT_SITE_TITLE);
        $this->layout->meta_keywords($article->meta_description . ' | ' . $category->category . ' | ' . DEFAULT_SITE_TITLE);

        $this->layout->view('article/view_detail', $view_data);
    }

}
