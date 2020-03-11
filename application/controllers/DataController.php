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

   $subject_result=$this->DataModel->getsubjectData();
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
                  "recordsTotal" => $this->DataModel->count_all(),
                  "recordsFiltered" => $this->DataModel->count_filtered(),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }


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




}


	


