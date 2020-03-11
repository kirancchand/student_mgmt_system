<?php 
   class DataModel extends CI_Model {
    var $table = 'subject_tbl';
    var $column_order = array('sub_id','sub_name'); //set column field database for datatable orderable
    var $column_search = array('sub_id','sub_name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('sub_id' => 'desc'); // default order 

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



      public function addusertype($data) { 
         if ($this->db->insert("usertype_tbl", $data)) { 
            return true; 
         } 
         else
         {
             return false; 
         } 
      } 

      public function assignsubject($data)
      { 
        
         $i=0;
         $k=0;
         $f_course_id=$data['course_id'];
         foreach($data['subject_id'] as $value)
          {    
            
            $data=array(
               'f_course_id' => $f_course_id,
               'f_subject_id' => $value
             ); 

            if (!$this->db->insert("course_subject_tbl", $data)) 
            { 
               $k++;
            } 
            $i++;

          }
          if($k>0)
          {
            return false;
          }
          else
          {
             return true ;
          }
          
      } 


      public function getCourse() 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('course_tbl');
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      } 

      public function getSubject() 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('subject_tbl');
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      } 

      public function getmodelSubject($sub_id) 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('subject_tbl');
         $this->db->where('sub_id', $sub_id);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      } 
   
   
      public function getsubjectData()
       {
           $this->_getsubject_query();
           if(intval($this->input->get("length"))!= -1)
           $this->db->limit(intval($this->input->get("length")), intval($this->input->get("start")));
           $query = $this->db->get();
           return $query->result();
       }

      private function _getsubject_query()
      {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {   $search=$this->input->get("search");
            if($search['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_GET['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_GET['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_GET['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
      
     public  function count_filtered()
       {
           $this->_getsubject_query();
           $query = $this->db->get();
           return $query->num_rows();
       }
 
    public function count_all()
       {
           $this->db->from($this->table);
           return $this->db->count_all_results();
       }





     } 
    
?> 