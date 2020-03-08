<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model{ 

    function __construct() { 
        $this->table = 'users'; 
    } 
     
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from( $this->table ); 
        
        $query = $this->db->get(); 

        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE; 
         
        return $result;  
    } 
     

    public function insert($data = array()) { 

        if(!empty($data)){ 

            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 

            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            $insert = $this->db->insert($this->table, $data); 
             
            return $insert ? $this->db->insert_id() : false; 
        } 

        return false; 
    } 
}