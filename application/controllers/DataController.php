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
        //  $this->load->model('busmodel');
         $this->load->library('datatables'); //load library ignited-dataTable
  
  
         //$this->load->library('Datatables','session');
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

    //     //$this->load->view('menu/addBusno');
       
    //     // $dptid = $this->input->post('deptid');
    //     $dptnme = $this->input->post('deptnm');
    //     // echo $dptid;
    //     // echo $deptnme;
     
    //     $data=array(
    //       // 'dept_id' => $dptid,
    //       'dept_name' => $dptnme,
    //     ); 
    //     $result=$this->busmodel->adddept($data);
    // if ($result == true) 
    // {  
    //   $this->load->view('menu/adddept');
    // }
    // else
    // {
    //   $this->load->view('index');
    // }
  }

  
  public function addallsub()
  {

        //$this->load->view('menu/addallsub');
       
     
    //     $sub = $this->input->post('subname');
       
     
    //     $data=array(
          
    //       'subjectname' => $sub,
    //     ); 
    //     $result=$this->busmodel->addallsub($data);
    // if ($result == true) 
    // {  
    //   $this->load->view('menu/addallsub');
    // }
    // else
    // {
    //   $this->load->view('index');
    // }
  }







	  public function addassignbusroute()
  {
    //$this->load->helper('url'); 
        //$this->load->view('menu/addassignbinmember'); 
        //$bin_number = $this->input->post('bin_number');  
       // $members[] = $this->input->post('members'); 
        //print_r($members);
      //  $busno = $this->input->post('busno');
      //  $starttime = $this->input->post('starttime');
      //  $endtime = $this->input->post('endtime');
      //  $routes=$this->input->post('routes');

      // $data['f_b_slno']=$busno;
      // $data['journey_start_time']=$starttime;
      // $data['journey_end_time']=$endtime;
      // $bustime_data=$this->busmodel->bustime_data($data);
      //   //$data = array();/*

      //   foreach( $routes as $key => $value){

      //     $assigndata['f_r_slno'][$key]=$value;
      //     $assigndata['f_bt_slno']=$bustime_data;
          
      //   }
      //   $busrouteassign_data=$this->busmodel->busrouteassign_data($assigndata);

      //   if($busrouteassign_data)
      //     echo true;
        //$binmemberassign_data=$this->BinMemberAssignModel->binmemberassign_data($data);
      // echo $this->input->post('starttime');
       //echo json_encode( $routes);
        //echo json_encode($binmemberassign_data);

        //$this->food_model->add_food($data);
        /*$data = array( 
            'username' => $username, 
            'password' => $pass
         ); 
        $result=$this->UserModel->login($data);
        $connectivity_data=$this->ConnectivityModel->connectivity_data();
        $data['result']=$connectivity_data;*/
  }





// public function addsub()
// 	{

//        $this->load->view('menu/addsub');
      
// 	}
public function multipletable()
  {

       $this->load->view('menu/multipletable');
      
  }
}


	


