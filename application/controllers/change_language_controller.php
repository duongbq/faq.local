<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Change_language_controller
 *
 * @author duongbq
 */
class Change_language_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function change_language() {
        
        if ($this->input->is_ajax_request()) {
            
            $lang = $this->input->post('lang');
            
            $this->csession->save('lang', $lang);
            echo '1';
        } else {
            redirect(base_url());
        }
    }

}
