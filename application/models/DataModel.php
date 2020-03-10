<?php 
   class DataModel extends CI_Model {

      function __construct() { 
         parent::__construct(); 
         
      } 


    public function addsub($data) { 
         if ($this->db->insert("subject_tbl", $data)) { 
            return true; 
        }
        else
        {
            return false; 
        }
      }

        public function addcourse($data) { 
         if ($this->db->insert("course_tbl", $data)) { 
            return true; 
         }  
         else
         {
             return false; 
         }
      } 

      public function adddept($data) { 
         if ($this->db->insert("dept_tbl", $data)) { 
            return true; 
         }  
         else
         {
             return false; 
         }
      } 



      public function addutype($data) { 
         if ($this->db->insert("usertype_tbl", $data)) { 
            return true; 
         } 
         else
         {
             return false; 
         } 
      } 

      public function addallsub($data) { 

         if ($this->db->insert("allsub_tb", $data)) 
         {
            return true; 
         }  
         else
         {
             return false; 
         }
      }



     } 
    
?> 