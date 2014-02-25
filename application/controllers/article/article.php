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

    function rate_for_article() {

        if ($this->input->is_ajax_request()) {
            
            $article_id = $this->input->post('article_id');
            $points = $this->input->post('points');
            
            set_rating_for_article($article_id, $points);

            $average = get_rating_points_by_article_id($article_id);

            $responsetext = "";
            for ($i = 1; $i <= 5; $i++) {
                if ($average >= $i)
                    $responsetext .= '<img src="/assets/frontend/images/rate1.gif" hspace="1" vspace="0"  alt="' . $average . '%"/>';
                else {
                    if ($i == intval($average + .7))
                        $responsetext .= '<img src="/assets/frontend/images/rate.gif" hspace="1" alt="' . $average . '%"/>';
                    else
                        $responsetext .= '<img src="/assets/frontend/images/rate0.gif" hspace="1" alt="' . $average . '%"/>';
                }
            }
            
            echo $responsetext;
            
        } else {
            redirect(base_url());
        }
    }

}
