<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    function insertRecord($record){
       
        if(count($record) > 0){
            // return "hii";
            // exit;
            // Check user
            $this->db->select('*');
            $this->db->where('username', $record[0]);
            $q = $this->db->get('users');
            $response = $q->result_array();
          
            // Insert record
            if(count($response) == 0){
                $newuser = array(
                    "username" => trim($record[0]),
                    "name" => trim($record[1]),
                    "gender" => trim($record[2]),
                    "email" => trim($record[3])
                );

                $this->db->insert('users', $newuser);
            }
            
        }
        
    }

}