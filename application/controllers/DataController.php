<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataController extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->database();  
         $this->load->model('UserModel'); 
         $this->load->model('DataModel'); 
         $this->load->library('datatables'); //load library ignited-dataTable

      } 

 public function get_place()
 {
  $bus_no=1000;
   $stops=$this->busmodel->get_stops($bus_no);
   echo json_encode($stops);
 }
  function get_product_json() { //get product data and encode to be JSON object
      //header('Content-Type: application/json');
      echo $this->busmodel->get_all_product();
  }
 
  public function getsubjectData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
   
    $table = 'subject_tbl';
    $column_order = array('sub_id','sub_name'); //set column field database for datatable orderable
    $column_search = array('sub_id','sub_name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    $order = array('sub_id' => 'desc'); // default order 


   $subject_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($subject_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->sub_name;
              $row[] = '
              <button type="button" id="'.$r->sub_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              <button type="button" id="'.$r->sub_id.'"  class="btn btn-danger delete_btn">delete</button';
              $data[] = $row;
             
    }


      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_all($table),
                  "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }


  public function getcourseData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'course_tbl';
    $column_order = array('crse_id','crse_name');
    $column_search = array('crse_id','crse_name'); 
    $order = array('crse_id' => 'desc'); 

   $course_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($course_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->crse_name;
              $row[] = '
              <button type="button" id="'.$r->crse_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              <button type="button" id="'.$r->crse_id.'"  class="btn btn-danger delete_btn">delete</button';
              $data[] = $row;
             
    }

 
      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_all($table),
                  "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }


  public function getdepartmentData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'dept_tbl';
    $column_order = array('dept_id','dept_name');
    $column_search = array('dept_id','dept_name'); 
    $order = array('dept_id' => 'desc'); 

   $dept_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($dept_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->dept_name;
              $row[] = '
              <button type="button" id="'.$r->dept_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button';
              $data[] = $row;
             
    }

 
      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_all($table),
                  "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }

  public function getusertypeData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'usertype_tbl';
    $column_order = array('utype_id','usertype');
    $column_search = array('utype_id','usertype'); 
    $order = array('utype_id' => 'desc'); 

   $dept_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($dept_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->usertype;
              $row[] = '
              <button type="button" id="'.$r->utype_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              ';
              $data[] = $row;
              // <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button
             
    }

 
      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_all($table),
                  "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }

  public function getassignsubjectdata()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'course_subject_tbl';
    $column_order = array('cs_id','f_course_id','f_subject_id');
    $column_search = array('cs_id','f_course_id','f_subject_id'); 
    $order = array('cs_id' => 'desc'); 

   $assignsubject_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($assignsubject_result as $r) {
               $no++;
              
              $row = array();
              $row[] = $no;
              $row[] = $r->f_course_id;
              $course=$this->DataModel->get_Course($r->f_course_id);
              $row[] = $course;
              $row[] = '
              <button type="button" id="'.$r->cs_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              ';
              $data[] = $row;
              // <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button
             
    }

 
      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_all($table),
                  "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }


  // public function getassignsubjectdata()
  // {
	// 	// Datatables Variables
  //   $draw = intval($this->input->get("draw"));
  //   $start = intval($this->input->get("start"));
  //   $length = intval($this->input->get("length"));


  //  $assignsubject_result=$this->DataModel->getjoinDatatable();
  //   // echo json_encode($assignsubject_result);
  //   // exit();
  //  $data = array();
  //  $no = $start;


  //  foreach($assignsubject_result as $r) {
  //              $no++;
  //             $row = array();
  //             $row[] = $no;
  //             $row[] = $r->crse_name;
  //             $row[] = $r->sub_name;
  //             $row[] = '
  //             <button type="button" id="'.$r->cs_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
  //             ';
  //             $data[] = $row;
  //             // <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button
             
  //   }

 
  //     $output = array(
  //                 "draw" => $draw,
  //                 "recordsTotal" => $this->DataModel->count_joinall(),
  //                 "recordsFiltered" => $this->DataModel->count_joinfiltered(),
  //                 "data" => $data,
  //         );

  
  // //output to json format
  // echo json_encode($output);

  // }



	public function datatablegetconnectivitydata()
	{

		//header('Content-Type: application/json');
		 //echo $this->ConnectivityModel->connectivity_datatabledata();
		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


         //$connectivity_data=$this->UserModel->get_datatables();
         $connectivity_data=$this->busmodel->get_datatables();
         $data = array();
         $no = $start;


		     foreach($connectivity_data as $r) {
          	   		  $no++;
            		    $row = array();
                    $row[] = $no;
                    $row[] = $r->journey_start_time;
                    $row[] = $r->bus_no;
                    $row[] = $r->journey_end_time;
                    $stops=$this->busmodel->get_stops($r->bus_no);
                    $row[] = $stops;
                    $row[] = count($stops);
                    

                    /*$row[] = $r->place;
                    $row[] = $r->f_r_slno;
                    $row[] = $r->f_bt_slno;
                    /*
                    $row[] = $r->emailid;
                    $row[] = $r->password;
                    $row[] = $r->password;*/

               		/*$row[] = '
                  		<button type="button" id="'.$r->id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
                  		<button type="button" id="'.$r->id.'" data-toggle="modal" data-target="#myModal" class="btn btn-default view_btn">view</button>
                  		<button type="button" id="'.$r->id.'"  class="btn btn-danger delete_btn">delete</button
                  		';*/
                    /*
                    $row[] = '<button type="button" id="'.$r->slno.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
                    <button type="button" id="'.$r->slno.'" data-toggle="modal" data-target="#myModal" class="btn btn-default view_btn">view</button>
                  	<button type="button" id="'.$r->slno.'"  class="btn btn-danger delete_btn">delete</button
                  		';*/

         
                    $data[] = $row;
                   
         
             

          }


            $output = array(
                        "draw" => $draw,
                        "recordsTotal" => $this->busmodel->count_all(),
                        "recordsFiltered" => $this->busmodel->count_filtered(),
                        "data" => $data,
                );
 
        
        //output to json format
        echo json_encode($output);


          
            /*

          $output = array(
                 "draw" => $draw,
                // "recordsTotal" => $connectivity_data->num_rows(),
                 //"recordsFiltered" => $connectivity_data->num_rows(),
                 "data" => $data
            );
         // print_r($output);
          echo json_encode($output);
          exit();*/
	}




	public function addsub()
	{

        $subjectname = $this->input->post('subname');
        $data=array(
          'sub_name' => $subjectname,
        );
        $result = $this->DataModel->addsub($data);  
        echo json_encode($result);
	}
   
  public function addcourse()
  {

        $coursename = $this->input->post('crsename');
        $data=array(
          'crse_name' => $coursename,
        ); 
        $result=$this->DataModel->addcourse($data);
        echo json_encode($result);
  }

  public function adddept()
  {

   
        $dptnme = $this->input->post('deptnm');
    
        $data=array(
          'dept_name' => $dptnme,
        ); 
        $result=$this->DataModel->adddept($data);
        echo json_encode($result);
  }


  public function addusertype()
  {
        $usertype = $this->input->post('usertype');
        $data=array(
          'usertype' => $usertype,
        ); 
        $result=$this->DataModel->addusertype($data);
        echo json_encode($result);
  }

  public function assignsubject()
  {
        $course_id = $this->input->post('course_id');
        $subject_id = $this->input->post('subject');
        $data=array(
          'course_id' => $course_id,
          'subject_id' => $subject_id
        ); 
        $result=$this->DataModel->assignsubject($data);
        echo json_encode($result);
  }

  public function getmodelsubject()
  {
        $sub_id = $this->input->post('sub_id');
        $result=$this->DataModel->getmodelSubject($sub_id);
        echo json_encode($result);
  }

  public function subjectdelete()
  {
        $sub_id = $this->input->post('sub_id');
        $result=$this->DataModel->subjectDelete($sub_id);
        echo json_encode($result);
  }

  public function subjectupdate()
  {
        $sub_id = $this->input->post('id');
        $subject_name = $this->input->post('subject_name');
        $data=array(
          'sub_name' => $subject_name
        );
        $result=$this->DataModel->subjectUpdate($data,$sub_id);
        echo json_encode($result);
  }



  public function getmodelcourse()
  {
        $course_id = $this->input->post('course_id');
        $result=$this->DataModel->getmodelCourse($course_id);
        echo json_encode($result);
  }

  public function coursedelete()
  {
        $course_id = $this->input->post('course_id');
        $result=$this->DataModel->courseDelete($course_id);
        echo json_encode($result);
  }

  public function courseupdate()
  {
        $course_id = $this->input->post('id');
        $course_name = $this->input->post('course_name');
        $data=array(
          'crse_name' => $course_name
        );
        $result=$this->DataModel->courseUpdate($data,$course_id);
        echo json_encode($result);
  }

  public function getmodeldepartment()
  {
        $dept_id = $this->input->post('dept_id');
        $result=$this->DataModel->getmodelDepartment($dept_id);
        echo json_encode($result);
  }

  public function departmentdelete()
  {
        $dept_id = $this->input->post('dept_id');
        $result=$this->DataModel->departmentDelete($dept_id);
        echo json_encode($result);
  }

  public function departmentupdate()
  {
        $dept_id = $this->input->post('id');
        $dept_name = $this->input->post('dept_name');
        $data=array(
          'dept_name' => $dept_name
        );
        $result=$this->DataModel->departmentUpdate($data,$dept_id);
        echo json_encode($result);
  }


  public function getmodelusertype()
  {
        $utype_id = $this->input->post('utype_id');
        $result=$this->DataModel->getmodelUsertype($utype_id);
        echo json_encode($result);
  }

  public function usertypeupdate()
  {
        $utype_id = $this->input->post('id');
        $usertype = $this->input->post('utype');
        $data=array(
          'usertype' => $usertype
        );
        $result=$this->DataModel->usertypeUpdate($data,$utype_id);
        echo json_encode($result);
  }

  public function getassignsubject()
  {
        $course_id = $this->input->post('course_id');
        $result=$this->DataModel->getassignSubject($course_id);
        echo json_encode($result);
  }



}


	


