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

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        $this->layout->title('Duongbq-FAQs');
        $this->layout->render_layout('layouts/home/front');
        
        $this->load->model('category_model');
        $this->load->helper('article');
    }

    public function index($page) {
        
        $view_data['categories'] = $this->category_model->get_all_with_paging(array('page' => $page, 'per_page' => 6));
        $view_data['pagination_link'] = $this->category_model->get_pagination_link();
        
        $this->layout->view('home/home', $view_data);
        
    }

}
