<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * ZonStudio
 * 
 * A free and open source web based invoicing system
 *
 * @package		ZonStudio
 * @author		duongbq
 * @copyright	Copyright (c) 2012 - 2013 ZonStudio, LLC
 * @license		http://www.zonstudio.com
 * @link		http://www.zonstudio.com
 * 
 */

class Home extends Front_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('category_model');
        $this->load->helper('article');
//        $this->output->enable_profiler(TRUE);
    }

    public function index($page) {

        $view_data['categories'] = $this->category_model->get_all_with_paging(array('page' => $page, 'per_page' => 6));
        $view_data['pagination_link'] = $this->category_model->get_pagination_link();

        $this->layout->view('home/home', $view_data);
    }

    function view_detail($category_id = 0, $article_id = 0) {

        $article = get_article_by_id($article_id);
        $category = $this->category_model->get_by_id($category_id);

        $view_data = array('article' => $article, 'category' => $category);

        $this->layout->title($article->title . ' | '. $category->category . ' | '. DEFAULT_SITE_TITLE);
        $this->layout->meta_description($article->meta_description . ' | '. $category->category . ' | '. DEFAULT_SITE_TITLE);
        $this->layout->meta_keywords($article->meta_description . ' | '. $category->category . ' | '. DEFAULT_SITE_TITLE);
        
        $this->layout->view('home/view_detail', $view_data);
    }

}
