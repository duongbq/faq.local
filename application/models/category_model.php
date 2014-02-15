<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category_model
 *
 * @author duongbq
 */
class Category_model extends CI_Model {
    
    var $table_name = 'categories';
    var $pagination_link = NULL;

    function __construct() {
        parent::__construct();
        
    }
    
    function get_all() {
        return $this->db->get($this->table_name)->result();
    }
    
    function get_all_with_paging($options = array()) {
        
        $total_row = $this->db->count_all($this->table_name);
        
        $config = get_config_paging(array('page' => $options['page'], 'per_page' => $options['per_page'], 'total_rows' => $total_row));
        
        $this->pagination->initialize($config);
        
        $this->pagination_link = $this->pagination->create_ajax_links();
        
        $this->db->limit($config['limit'], $config['offset']);
        
        return $this->db->get($this->table_name)->result();
    }

    function get_pagination_link() {
        return $this->pagination_link;
    }

}
