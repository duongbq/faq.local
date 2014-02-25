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
        $this->db->where('lang', !$this->csession->get('lang') ? 'english' : $this->csession->get('lang')); 
        return $this->db->get($this->table_name)->result();
    }
    
    function get_by_id($category_id = 0) {
        $this->db->where('id', $category_id); 
        return $this->db->get($this->table_name)->row(0);
    }
    
    function get_all_with_paging($options = array()) {
        
        $total_row = count($this->get_all());
        
        $config = get_config_paging(array('page' => $options['page'], 'per_page' => $options['per_page'], 'total_rows' => $total_row));
        
        $this->pagination->initialize($config);
        
        $this->pagination_link = $this->pagination->create_ajax_links();
        
        $this->db->limit($config['limit'], $config['offset']);
        
        $this->db->where('lang', !$this->csession->get('lang') ? 'english' : $this->csession->get('lang')); 
        
        return $this->db->get($this->table_name)->result();
    }

    function get_pagination_link() {
        return $this->pagination_link;
    }

}
