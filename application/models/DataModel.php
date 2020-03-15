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
         $f_sem_id=$data['sem_id'];

         $this->db->where('f_course_id',$f_course_id);
         $this->db->where('f_sem_id',$f_sem_id);
         $result=$this->db->delete('course_subject_tbl');
         if($result)
         {
            foreach($data['subject_id'] as $value)
            {    
              
              $data=array(
                 'f_course_id' => $f_course_id,
                 'f_subject_id' => $value,
                 'f_sem_id' => $f_sem_id
               ); 
  
              if (!$this->db->insert("course_subject_tbl", $data)) 
              { 
                 $k++;
              } 
              $i++;
  
            }
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


      public function addsem($data) { 
         if ($this->db->insert("semester_tbl", $data)) { 
            return true; 
        }
        else
        {
            return false; 
        }
      }
      public function addday($data) { 
         if ($this->db->insert("day_tbl", $data)) { 
            return true; 
        }
        else
        {
            return false; 
        }
      }
      public function addperiod($data) { 
         if ($this->db->insert("period_tbl", $data)) { 
            return true; 
        }
        else
        {
            return false; 
        }
      }
      public function assign_timetblsubject($data) { 


         $this->db->where('f_course_id',$data['f_course_id']);
         $this->db->where('f_sem_id',$data['f_sem_id']);
         $this->db->where('f_day_id',$data['f_day_id']);
         $this->db->where('f_period_id',$data['f_period_id']);
         $result=$this->db->delete('classtimetable_tbl');
         if($result)
         {
            if ($this->db->insert("classtimetable_tbl", $data)) { 
               return true; 
            }  
            else
            {
                return false; 
            }

         }

      } 

      public function getSubject_data($f_course_id,$f_sem_id,$f_day_id,$f_period_id) { 


   
         $result=$this->db->select('crse_name');

         $response = array();
          $this->db->select('f_subject_id');
          $this->db->from('classtimetable_tbl');
          $this->db->where('f_course_id',$f_course_id);
          $this->db->where('f_sem_id',$f_sem_id);
          $this->db->where('f_day_id',$f_day_id);
          $this->db->where('f_period_id',$f_period_id);
          $query = $this->db->get();
          $response = $query->result_array();
          return $response;

      } 


      
      public function get_Course($crse_id) 
      { 
         $this->get_Course_query($crse_id);
         $query = $this->db->get();
         return $query->result();

      } 

      public function get_Course_query($crse_id)
       {

         $this->db->select('crse_name');
         $this->db->from('course_tbl');
         $this->db->where('crse_id', $crse_id);

       }


       public function getassignSubject($course_id,$sem_id) 
       { 
          $response = array();
          $this->db->select('*');
          $this->db->from('course_subject_tbl');
          $this->db->where('f_course_id', $course_id);
          $this->db->where('f_sem_id', $sem_id);
          $query = $this->db->get();
          $response = $query->result_array();
          return $response;
       } 



       public function getDay() 
       { 
         $response = array();
         $this->db->select('*');
         $this->db->from('day_tbl');
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
       } 

       public function getPeriod() 
       { 
         $response = array();
         $this->db->select('*');
         $this->db->from('period_tbl');
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
       } 

       public function gettimetblData($course_id,$sem_id) 
       { 
         $response = array();
         $this->db->select('*');
         $this->db->from('classtimetable_tbl');
         $this->db->where('f_course_id', $course_id);
         $this->db->where('f_sem_id', $sem_id);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
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
      public function subjectDelete($sub_id) 
       { 
         $this->db->where('sub_id',$sub_id);
          $result=$this->db->delete('subject_tbl');
          return $result; 
       }
     public function subjectUpdate($data,$id) 
       { 
         $this->db->where('sub_id',$id);
          $result=$this->db->update('subject_tbl',$data);
          return $result; 
       }

      public function getmodelCourse($course_id) 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('course_tbl');
         $this->db->where('crse_id', $course_id);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      }
   
      public function courseDelete($course_id) 
       { 
         $this->db->where('crse_id',$course_id);
          $result=$this->db->delete('course_tbl');
          return $result; 
       }
     public function courseUpdate($data,$id) 
       { 
         $this->db->where('crse_id',$id);
          $result=$this->db->update('course_tbl',$data);
          return $result; 
       }



       public function getmodelDepartment($dept_id) 
       { 
          $response = array();
          $this->db->select('*');
          $this->db->from('dept_tbl');
          $this->db->where('dept_id', $dept_id);
          $query = $this->db->get();
          $response = $query->result_array();
          return $response;
       }
    
       public function departmentDelete($dept_id) 
        { 
          $this->db->where('dept_id',$dept_id);
           $result=$this->db->delete('dept_tbl');
           return $result; 
        }
      public function departmentUpdate($data,$id) 
        { 
          $this->db->where('dept_id',$id);
           $result=$this->db->update('dept_tbl',$data);
           return $result; 
        }

        public function getmodelUsertype($utype_id) 
        { 
           $response = array();
           $this->db->select('*');
           $this->db->from('usertype_tbl');
           $this->db->where('utype_id', $utype_id);
           $query = $this->db->get();
           $response = $query->result_array();
           return $response;
        }
     
       public function usertypeUpdate($data,$id) 
         { 
           $this->db->where('utype_id',$id);
            $result=$this->db->update('usertype_tbl',$data);
            return $result; 
         }



         public function getSemester() 
         { 
            $response = array();
            $this->db->select('*');
            $this->db->from('semester_tbl');
            $query = $this->db->get();
            $response = $query->result_array();
            return $response;
         } 
       public function getmodelSemester($sem_id) 
         { 
            $response = array();
            $this->db->select('*');
            $this->db->from('semester_tbl');
            $this->db->where('sem_id', $sem_id);
            $query = $this->db->get();
            $response = $query->result_array();
            return $response;
         } 

      public function semesterUpdate($data,$id) 
         { 
           $this->db->where('sem_id',$id);
            $result=$this->db->update('semester_tbl',$data);
            return $result; 
         }


      public function getmodelDay($day_id) 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('day_tbl');
         $this->db->where('day_id', $day_id);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      } 
      public function dayUpdate($data,$id) 
      { 
        $this->db->where('day_id',$id);
         $result=$this->db->update('day_tbl',$data);
         return $result; 
      }

      public function getmodelPeriod($period_id) 
      { 
         $response = array();
         $this->db->select('*');
         $this->db->from('period_tbl');
         $this->db->where('period_id', $period_id);
         $query = $this->db->get();
         $response = $query->result_array();
         return $response;
      } 
      public function periodUpdate($data,$id) 
      { 
        $this->db->where('period_id',$id);
         $result=$this->db->update('period_tbl',$data);
         return $result; 
      }
      public function getDatatable($table,$column_order,$column_search,$order)
      {
          $this->_getDatatable_query($table,$column_order,$column_search,$order);
          if(intval($this->input->get("length"))!= -1)
          $this->db->limit(intval($this->input->get("length")), intval($this->input->get("start")));
          $query = $this->db->get();
          return $query->result();
      }

      private function _getDatatable_query($table,$column_order,$column_search,$order)
      {
         
        $this->db->from($table);
 
        $i = 0;
     
        foreach ($column_search as $item) // loop column 
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
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_GET['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            // $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
      }
      
     public  function count_filtered($table,$column_order,$column_search,$order)
       {
         $this->_getDatatable_query($table,$column_order,$column_search,$order);
         $query = $this->db->get();
         return $query->num_rows();
       }
 
    public function count_all($table)
       {     
           $this->db->from($table);
           return $this->db->count_all_results();
       }




   //     public function getjoinDatatable()
   //    {

   //       $term = $_REQUEST['search']['value'];
   //       // $term=$this->input->get("search");
   //       $this->_getjoinDatatable_query();
   //       if(intval($this->input->get("length"))!= -1)
   //       $this->db->limit(intval($this->input->get("length")), intval($this->input->get("start")));
   //       $query = $this->db->get();
   //       return $query->result(); 


   //    }

   //    private function _getjoinDatatable_query($term='')
   //    {
   //       // $table = 'course_subject_tbl';
   //       // $column_order = array('cs_id','f_course_id','f_subject_id');
   //       // $column_search = array('cs_id','f_course_id','f_subject_id'); 
   //       // $order = array('cs_id' => 'desc'); 

   //       $column = array('cs.cs_id,cs.f_course_id','cs.f_subject_id', 'c.crse_name','s.sub_name');

   //       // SELECT * FROM course_subject_tbl as cs join course_tbl as c on cs.f_course_id=c.crse_id join subject_tbl as s on cs.f_subject_id=s.sub_id


   //       $this->db->select('cs.cs_id,cs.f_course_id,cs.f_subject_id,c.crse_name,s.sub_name');
   //       $this->db->from('course_subject_tbl as cs');
   //       $this->db->join('course_tbl as c', 'cs.f_course_id = c.crse_id','left');
   //       $this->db->join('subject_tbl as s', 'cs.f_subject_id = s.sub_id','left');
   //       $this->db->like('c.crse_name', $term);
   //       $this->db->or_like('s.sub_name', $term);
   //       if(isset($_REQUEST['order'])) // here order processing
   //       {
   //          $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
   //       } 
   //       else if(isset($this->order))
   //       {
   //          $order = $this->order;
   //          $this->db->order_by(key($order), $order[key($order)]);
   //       }
 
 

   //    //   $this->db->from($table);
 
   //    //   $i = 0;
     
   //    //   foreach ($column_search as $item) // loop column 
   //    //   {   $search=$this->input->get("search");
   //    //       if($search['value']) // if datatable send POST for search
   //    //       {
                 
   //    //           if($i===0) // first loop
   //    //           {
   //    //               $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
   //    //               $this->db->like($item, $_GET['search']['value']);
   //    //           }
   //    //           else
   //    //           {
   //    //               $this->db->or_like($item, $_GET['search']['value']);
   //    //           }
 
   //    //           if(count($column_search) - 1 == $i) //last loop
   //    //               $this->db->group_end(); //close bracket
   //    //       }
   //    //       $i++;
   //    //   }
         
   //    //   if(isset($_GET['order'])) // here order processing
   //    //   {
   //    //       $this->db->order_by($column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
   //    //   } 
   //    //   else if(isset($order))
   //    //   {
   //    //       // $order = $this->order;
   //    //       $this->db->order_by(key($order), $order[key($order)]);
   //    //   }



      





   //    }
      
   //   public  function count_joinfiltered()
   //     {
   //       $term = $_REQUEST['search']['value']; 
   //       $this->_getjoinDatatable_query($term);
   //       $query = $this->db->get();
   //       return $query->num_rows();
   //     }
 
   //  public function count_joinall()
   //     {   
   //       $table = 'course_subject_tbl';
   //         $this->db->from($table);
   //         return $this->db->count_all_results();
   //     }



    


     } 
    
?> 