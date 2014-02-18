<?php

class Backend_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->csession->get('user_id')) {
            redirect('sessions/login');
        }

        $this->layout->title('Trang quản trị - Zon Studio');
        $this->layout->render_layout('layouts/admin/layout');
    }

}

class Front_Controller extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper('language');
        
        $this->layout->title(DEFAULT_SITE_TITLE);
        $this->layout->render_layout('layouts/home/front');

        $lang = !$this->csession->get('lang') ? 'english' : $this->csession->get('lang');

        $this->config->set_item('language', $lang);
        
        $this->lang->load('faq', $lang);
        
//        $this->output->enable_profiler(TRUE);
    }

}

