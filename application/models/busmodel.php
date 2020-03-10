<?php 
   class busmodel extends CI_Model {


    var $table = 'bustimeassigntbl';
    var $column_order = array('journey_start_time','journey_end_time','place','bus_no'); //set column field database for datatable orderable
    var $column_search = array('journey_start_time','journey_end_time','place','bus_no'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('journey_start_time' => 'desc'); // default order 
  
	
      function __construct() { 
         parent::__construct(); 
         
      } 



  //generate dataTable serverside method
  function get_all_product() {
      $this->datatables->select('b_slno,journey_start_time,journey_end_time,place,bus_no');
      $this->datatables->from('bustimeassigntbl');
      $this->datatables->join('bustbl','f_b_slno=b_slno');
      $this->datatables->join('busrouteassigntbl','f_bt_slno=bt_slno');
      $this->datatables->join('routetbl','f_r_slno=r_slno');
      $this->datatables->group_by('bus_no');
      /*$this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-code="$1" data-name="$2" data-price="$3" data-category="$4">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-code="$1">Delete</a>','b_slno,journey_start_time,journey_end_time,bus_no');*/
      return $this->datatables->generate();
  }


  public function get_stops($bus_no)
       {
         $this->get_stops_query($bus_no);
         $query = $this->db->get();
          return $query->result();
       }
  public function get_stops_query($bus_no)
       {

         $this->db->select('place');
      $this->db->from($this->table);
      $this->db->join('bustbl','f_b_slno=b_slno');
      $this->db->join('busrouteassigntbl','f_bt_slno=bt_slno');
      $this->db->join('routetbl','f_r_slno=r_slno');
      $this->db->where('bus_no='.$bus_no);

       }

  public function get_datatables()
       {
           $this->_get_datatables_query();
           if(intval($this->input->get("length"))!= -1)
           $this->db->limit(intval($this->input->get("length")), intval($this->input->get("start")));
           $query = $this->db->get();
           return $query->result();
       }

 private function _get_datatables_query()
      {
         
      $this->db->select('b_slno,journey_start_time,journey_end_time,place,bus_no');
      $this->db->from($this->table);
      $this->db->join('bustbl','f_b_slno=b_slno');
      $this->db->join('busrouteassigntbl','f_bt_slno=bt_slno');
      $this->db->join('routetbl','f_r_slno=r_slno');
      $this->db->group_by('bus_no');


      /*
        $this->db->from($this->table);
        $this->db->join('busrouteassigntbl','f_r_slno=r_slno');
        $this->db->group_by('busrouteassigntbl.f_bt_slno');*/

 
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
           $this->_get_datatables_query();
           $query = $this->db->get();
           return $query->num_rows();
       }
 
    public function count_all()
       {
           $this->db->from($this->table);
           return $this->db->count_all_results();
       }




          public function addsub($data) { 
         if ($this->db->insert("subject_tbl", $data)) { 
            return true; 
       
        }
      }

        public function addcourse1($data) { 
         if ($this->db->insert("course_table", $data)) { 
            return true; 
         }  
      } 

      public function adddept($data) { 
         if ($this->db->insert("dept_table", $data)) { 
            return true; 
         }  
      } 



      public function addutype($data) { 
         if ($this->db->insert("usertype_tbl", $data)) { 
            return true; 
         }  
      } 

      public function addallsub($data) { 

         if ($this->db->insert("allsub_tb", $data)) 
         {
            return true; 
         }  
      }


       public function busrouteassign_data($data)
      {
        $f_bt_slno = $data['f_bt_slno'];
       
        foreach( $data['f_r_slno']as $key => $value){

          $data = array( 
            'f_bt_slno' => $f_bt_slno,
            'f_r_slno' => $value, 
            ); 
         
          //print_r($data);
          $this->db->insert("busrouteassigntbl", $data);
           
        }
        return true;
        /*$query = $this->db->query('SELECT * FROM connectivity_tbl');
         return $query->result();*/
        
      }










     } 
    
?> 