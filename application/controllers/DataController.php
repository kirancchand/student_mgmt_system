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


      public function marklist(){

        // Check form submit or not 
        $course_id = $this->input->post('course_id');
        $sem_id = $this->input->post('sem_id');

         if($this->input->post('upload') != NULL ){ 

             $data = array(); 
             if(!empty($_FILES['file']['name'])){ 

              // Set preference 
              $config['upload_path'] = 'assets/files/'; 
              $config['allowed_types'] = 'csv'; 
              $config['max_size'] = '1000'; // max_size in kb 
              $config['file_name'] = $_FILES['file']['name']; 
            // echo $config['upload_path'];
              // Load upload library 
              $this->load->library('upload',$config); 
            
              // File upload
              if($this->upload->do_upload('file')){ 

                 // Get data about the file
                 $uploadData = $this->upload->data(); 
                 $filename = $uploadData['file_name']; 

                 // Reading file
                        $file = fopen("assets/files/".$filename,"r");
                        $i = 0;
    
                        $importData_arr = array();
                        $studentmark_arr = array();
              
                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);
      
                            for ($c=0; $c < $num; $c++) {
                                $importData_arr[$i][] = $filedata[$c];   
                            }
                            $i++;
                             
                        }
                        fclose($file);
                        $skip = 0;

                        for($j=2;$j<$i;$j++)
                        {
                         
                           for($p=7;$p<$num;$p++)
                          { 
                              if($p%2==1)
                              {
                                    $q=$p+1;
                                   // echo $j.$p;
                                   $studentmark_arr[$j][0] = $importData_arr[$j][$p];
                                   $studentmark_arr[$j][1] = $importData_arr[$j][$q];
                                   $studentmark_arr[$j][2] = $importData_arr[$j][0];
                                   $studentmark_arr[$j][3] = $importData_arr[0][$p];
                                   $studentmark_arr[$j][4] = $sem_id;
                                   $k=$this->DataModel->insertRecord($studentmark_arr[$j][0],$studentmark_arr[$j][1],$studentmark_arr[$j][2],$studentmark_arr[$j][3],$studentmark_arr[$j][4]);
                                   // echo json_encode($k);
                        
                                   // echo json_encode($importData_arr[$j][$q]);
                              }         
                          }

                           
                        }
                        // echo json_encode($studentmark_arr);
                           // echo json_encode($studentmark_arr[2][0]);
                           // echo json_encode($importData_arr[2][7]);
                         // echo json_encode($p);
                         // exit;
              // echo "hyy";
              // exit;
                        // insert import data
                        // foreach($studentmark_arr as $markdata){
                        //     if($skip != 0){
                        //         $k=$this->DataModel->insertRecord($markdata);
                        //         //echo json_encode($k);
                                
                        //     }
                        //     $skip ++;
                        // }
                        // echo json_encode($k);
                        // exit;
                 $data['response'] = 'successfully uploaded '.$filename; 
              }else{ 
              $data['response'] = $this->upload->display_errors();
                 // $data['response'] = array('error' => $this->upload->display_errors());
              } 
             }else{ 
              $data['response'] = 'failed'; 
             } 
             // load view 
              $this->load->view('menu/uploadmarks',$data); 
          }else{
             // load view 
             $this->load->view('users_view'); 
          } 
    
      }

      public function exportCSV(){
		
        // file name
        $filename = 'users_'.date('Ymd').'.csv';
        
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; "); 
    
        // get data
        $usersData = $this->DataModel->getUserDetails();
    
        // file creation
        $file = fopen('php://output', 'w');
    
        $header = array("Username","Name","Gender","Email");
        fputcsv($file, $header);
    
        foreach ($usersData as $key=>$line){
         fputcsv($file,$line);
        }
    
        fclose($file);
        exit;
      }

  public function exportStudent(){
    

    return true;
        // // file name
        // $filename = 'users_'.date('Ymd').'.csv';
        
        // header("Content-Description: File Transfer");
        // header("Content-Disposition: attachment; filename=$filename");
        // header("Content-Type: application/csv; "); 
    
        // // get data
        // $usersData = $this->DataModel->getUserDetails();
    
        // // file creation
        // $file = fopen('php://output', 'w');
    
        // $header = array("Username","Name","Gender","Email");
        // fputcsv($file, $header);
    
        // foreach ($usersData as $key=>$line){
        //  fputcsv($file,$line);
        // }
    
        // fclose($file);
        // exit;
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
              $row[] = $r->duration;
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
    $coursesubject_data=array();
    $coursesem=array();
    $course=array();
    $subject=array();
    $course['data']=$this->DataModel->get_allcoursesubject();

    foreach( $course['data'] as $key => $value)
      {
        // $coursesem['data']=$this->DataModel->get_coursesem($value['f_course_id']);
        $coursesubject_data['data'][$key]['id']=$value['cs_id'];
        $coursesubject_data['data'][$key]['course']=$value['crse_name'];
        $coursesubject_data['data'][$key]['sem']=$value['semester_name'];
        $subject['data']=$this->DataModel->get_coursesubject($value['f_course_id'],$value['f_sem_id']);
        $coursesubject_data['data'][$key]['subject']=$subject['data'];
        // foreach( $coursesem['data'] as $k => $v)
        // {
        //   $subject['data']=$this->DataModel->get_coursesubject($value['f_course_id'],$v['f_sem_id']);
        //   $coursesubject_data['data'][$key]['sem'][$k]['subject']=$subject['data'];
        // }
       
        
        // $coursesubject['data'][$key]['subject']=$coursesubject['data'];
        // $task_data['data'][$key]['btn']='<button type="button" id="'.$value['id'].'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update/view</button>';
      }
    
    echo json_encode($coursesubject_data);

	// 	// Datatables Variables
  //   $draw = intval($this->input->get("draw"));
  //   $start = intval($this->input->get("start"));
  //   $length = intval($this->input->get("length"));
  //   $table = 'course_subject_tbl';
  //   $column_order = array('cs_id','f_course_id','f_subject_id');
  //   $column_search = array('cs_id','f_course_id','f_subject_id'); 
  //   $order = array('cs_id' => 'desc'); 

  //  $assignsubject_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  // //  echo json_encode($subject_result);
  // //  exit();
  //  $data = array();
  //  $no = $start;


  //  foreach($assignsubject_result as $r) {
  //              $no++;
              
  //             $row = array();
  //             $row[] = $no;
  //             $row[] = $r->f_course_id;
  //             $course=$this->DataModel->get_Course($r->f_course_id);
  //             $row[] = $course;
  //             $row[] = '
  //             <button type="button" id="'.$r->cs_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
  //             ';
  //             $data[] = $row;
  //             // <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button
             
  //   }

 
  //     $output = array(
  //                 "draw" => $draw,
  //                 "recordsTotal" => $this->DataModel->count_all($table),
  //                 "recordsFiltered" => $this->DataModel->count_filtered($table,$column_order,$column_search,$order),
  //                 "data" => $data,
  //         );

  
  // //output to json format
  // echo json_encode($output);

  }
  public function getsemesterData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
   
    $table = 'semester_tbl';
    $column_order = array('sem_id','semester_name'); //set column field database for datatable orderable
    $column_search = array('sem_id','semester_name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    $order = array('sem_id' => 'desc'); // default order 


   $subject_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($subject_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->semester_name;
              $row[] = '
              <button type="button" id="'.$r->sem_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>';
              $data[] = $row;
              // <button type="button" id="'.$r->sem_id.'"  class="btn btn-danger delete_btn">delete</button
             
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
  public function getdayData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'day_tbl';
    $column_order = array('day_id','day_name');
    $column_search = array('day_id','day_name'); 
    $order = array('day_id' => 'asc'); 

   $day_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($day_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->day_name;
              $row[] = '
              <button type="button" id="'.$r->day_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
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


  public function getyearData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'year_tbl';
    $column_order = array('year_id','year');
    $column_search = array('year_id','year'); 
    $order = array('year_id' => 'asc'); 

   $year_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($year_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->year;
              $row[] = '
              <button type="button" id="'.$r->year_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
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



  public function getperiodData()
  {
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'period_tbl';
    $column_order = array('period_id','period_name','period_time');
    $column_search = array('period_id','period_name','period_time'); 
    $order = array('period_id' => 'asc'); 

   $period_result=$this->DataModel->getDatatable($table,$column_order,$column_search,$order);
  //  echo json_encode($subject_result);
  //  exit();
   $data = array();
   $no = $start;


   foreach($period_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->period_name;
              $row[] = $r->period_time;
              $row[] = '
              <button type="button" id="'.$r->period_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
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


 public function moveSem()
  {
    $course_id = $this->input->post('course_id');
    $sem_id = $this->input->post('sem_id');
    // $course_id = '1238';
    // $sem_id = '2';

    $result = $this->DataModel->moveSem($course_id,$sem_id);
    echo json_encode($result);

  }

  public function getstudentDatas()
  {
    $students=array();
    $students['data']=$this->DataModel->get_allstudents();
    
    echo json_encode($students);
  }
  public function getstudentData()
  {
    // $course_id = $this->input->get('course_id');
    // $sem_id = $this->input->get('sem_id');
    // if($course_id==null|| $sem_id==null)
    // {
    //   $course_id = 0;
    //   $sem_id = 0;
    // }
    // echo json_encode($sem_id);
    // exit();
		// Datatables Variables
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $table = 'regstn_tbl';
    $column_order = array('user_id','first_name','last_name','admssn_no');
    $column_search = array('user_id','first_name','last_name','admssn_no');
    $order = array('user_id' => 'asc'); 

   // $student_result=$this->DataModel->getDatatableStudent($table,$column_order,$column_search,$order,$course_id,$sem_id);
    // echo json_encode($student_result);
    // exit();
  $student_result=$this->DataModel->getDatatableStudent($table,$column_order,$column_search,$order);
   $data = array();
   $no = $start;


   foreach($student_result as $r) {
               $no++;
              $row = array();
              $row[] = $no;
              $row[] = $r->admssn_no;
              $row[] = $r->first_name;
              $row[] = $r->last_name;
              $row[] = $r->f_crse_id;
              $row[] = $r->f_sem_id;
              $row[] = '
              <button type="button" id="'.$r->user_id.'" data-toggle="modal" data-target="#myModal" class="btn btn-info updateview_btn">update</button>
              ';
              $data[] = $row;
              // <button type="button" id="'.$r->dept_id.'"  class="btn btn-danger delete_btn">delete</button
             
    }

 
      $output = array(
                  "draw" => $draw,
                  "recordsTotal" => $this->DataModel->count_allstudent($table),
                  "recordsFiltered" => $this->DataModel->count_filteredstudent($table,$column_order,$column_search,$order),
                  "data" => $data,
          );

  
  //output to json format
  echo json_encode($output);

  }
  public function gettimetblDatas()
  {
    $course_id = $this->input->post('course_id');
    $sem_id = $this->input->post('sem_id');

    $result['timetbl'] = $this->DataModel->gettimetblData($course_id,$sem_id);  
    $result['subject']=$this->DataModel->getSubject();
		$result['day']=$this->DataModel->getDay();
    $result['period']=$this->DataModel->getPeriod();
    // $k=number of period
    $i=0;
    // $has_subject=$this->DataModel->getSubject_data(1236,1,1,1);
    foreach($result['day'] as $value)
        { 
          // $result[$i][0]=$value['day_name'];
          $day_id=$value['day_id'];
          $has_subject['day'][$i]=$value['day_name'];
          $j=0;
            foreach($result['period'] as $value)
              {
                $has_subject['subject'][$i][$j]=$this->DataModel->getSubject_data($course_id,$sem_id,$day_id,$value['period_id']);
                if($has_subject['subject'][$i][$j]==null)
                {
                  $has_subject['subject'][$i][$j]="no subject";
                }
                else{

                  $subject=$this->DataModel->getmodelSubject($has_subject['subject'][$i][$j][0]['f_subject_id']);
                  $has_subject['subject'][$i][$j]=$subject[0]['sub_name'];
                }
                // $result[$i][$j]=$value['period_name'];
               
          //    $j=$i+1;
          //   if($result['timetbl'][$k]['f_period_id']==$result['period'][$k])
          //   {
          //     $result[$k][$j]=$result['subject'][$k];
          //   }
          //   else
          //   {
          //     $result[$k][$j]="no subject";
          //   }
            $j++;
             }
           

          
          $i++;
        }
        // $has_subject['period_count']=$j;
    
    echo json_encode($has_subject);
  }



  public function gettimetblData()
  {

    $daytbl=array();
    $timetbl=array();

    $course_id = $this->input->post('course_id');
    $sem_id = $this->input->post('sem_id');
    $daytbl['data'] = $this->DataModel->gettimetblDatas($course_id,$sem_id);  
    foreach( $daytbl['data'] as $key => $value)
      {
        $timetbl['data'][$key]['day']=$value['day_name'];
        $timetbl['data'][$key]['timetbl']=$this->DataModel->gettimetbl($course_id,$sem_id,$value['day_id']);
        // $timetbl['data']=$this->DataModel->gettimetblDatas($course_id,$sem_id);
      }
    echo json_encode($timetbl);
    // $result['timetbl'] = $this->DataModel->gettimetblData($course_id,$sem_id);  
    // $result['subject']=$this->DataModel->getSubject();
		// $result['day']=$this->DataModel->getDay();
    // $result['period']=$this->DataModel->getPeriod();
    // $i=0;
    // foreach($result['day'] as $value)
    //     { 
    //       $day_id=$value['day_id'];
    //       $has_subject['day'][$i]=$value['day_name'];
    //       $j=0;
    //         foreach($result['period'] as $value)
    //           {
    //             $has_subject['subject'][$i][$j]=$this->DataModel->getSubject_data($course_id,$sem_id,$day_id,$value['period_id']);
    //             if($has_subject['subject'][$i][$j]==null)
    //             {
    //               $has_subject['subject'][$i][$j]="no subject";
    //             }
    //             else{

    //               $subject=$this->DataModel->getmodelSubject($has_subject['subject'][$i][$j][0]['f_subject_id']);
    //               $has_subject['subject'][$i][$j]=$subject[0]['sub_name'];
    //             }
    //         $j++;
    //          }
           

          
    //       $i++;
    //     }  
    // echo json_encode($has_subject);
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


  public function excelexport()
	{

        $course_id = $this->input->get('course_id');
        $sem_id = $this->input->get('sem_id');
        $header=array();
        $header2=array();
        $student=array();
         // $headerData = $this->DataModel->get_Header($course_id,$sem_id);
        $headerData = $this->DataModel->get_Header($course_id,$sem_id);
        // echo json_encode($headerData);
        // exit;
        $usersData = $this->DataModel->get_Studentxl($course_id,$sem_id);
        // file name 

		$filename =$usersData[0]['crse_name'].'_'.$usersData[0]['semester_name'].'.csv'; 

		 header("Content-Description: File Transfer"); 
		 header("Content-Disposition: attachment; filename=$filename"); 
		 header("Content-Type: application/csv; ");
     // get data 

    //$usersData = $this->DataModel->get_Course($course_id);
    //  json_encode($usersData);
    // exit;
		// file creation 

		 $file = fopen('php://output','w');
     $header['0']="UserId";
     $header['1']="Admission No";
     $header['2']="First Name";
     $header['3']="Last Name";
     $header['4']="Email Id";
     $header['5']="Course";
     $header['6']="Semester";
     $i=7;
    foreach ($headerData as $key=>$hdata){ 
      $header[$i]=$hdata['f_subject_id'];
      $i++;
      $header[$i]=$hdata['sub_name'];
      $i++;
       // echo json_encode($hdata['f_subject_id']);

    }
		 // $header = array("UserId","Admission No","First Name","Last Name","Email Id","Course","Semester"); 
		fputcsv($file, $header);


     $header2['0']="";
     $header2['1']="";
     $header2['2']="";
     $header2['3']="";
     $header2['4']="";
     $header2['5']="";
     $header2['6']="";
     $i=7;
    foreach ($headerData as $key=>$hdata){ 
      $header2[$i]="external";
      $i++;
      $header2[$i]="internal";
      $i++;
       // echo json_encode($hdata['f_subject_id']);

    }

    fputcsv($file, $header2);

		foreach ($usersData as $key=>$line){ 

      $student['user_id']=$line['user_id'];
      $student['admssn_no']=$line['admssn_no'];
      $student['firstname']=$line['first_name'];
      $student['lastname']=$line['last_name'];
      $student['email_id']=$line['emailid'];
      $student['course']=$line['crse_name'];
      $student['semester']=$line['semester_name'];
      // echo json_encode($student);
			fputcsv($file,$student); 
		}
		 fclose($file); 
		exit; 
        // $this->load->library("excel");
        // $object = new PHPExcel();
        // $object->setActiveSheetIndex(0);
        // $table_columns = array("AdmnNo", "First Name", "Last Name");
        // $column = 0;
        // foreach($table_columns as $field)
        // {
        //  $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
        //  $column++;
        // }
        // // $excel_data = $this->excel_export_model->fetch_data();
        // // $data=array(
        // //   'sub_name' => $subjectname,
        // // );
        // // $result = $this->DataModel->addsub($data);  
        // // echo json_encode($result);
        // $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="StudentData.xls"');
        // $object_writer->save('php://output');
        
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
        $duration = $this->input->post('no_of_yr');
        $data=array(
          'crse_name' => $coursename,
          'duration' => $duration,
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
        $sem_id = $this->input->post('sem_id');
        $data=array(
          'course_id' => $course_id,
          'subject_id' => $subject_id,
          'sem_id' => $sem_id
        ); 
        $result=$this->DataModel->assignsubject($data);
        echo json_encode($result);
  }

  public function assign_timetblsubject()
  {
        $course_id = $this->input->post('course_id');
        $subject_id = $this->input->post('subject_id');
        $sem_id = $this->input->post('sem_id');
        $day_id = $this->input->post('day_id');
        $period_id = $this->input->post('period_id');
        $data=array(
          'f_course_id' => $course_id,
          'f_sem_id' => $sem_id,
          'f_day_id'=>$day_id,
          'f_period_id'=>$period_id,
          'f_subject_id' => $subject_id
        ); 
        $result=$this->DataModel->assign_timetblsubject($data);
        echo json_encode($result);
  }


	public function addsem()
	{

        $semname = $this->input->post('semname');
        $data=array(
          'semester_name' => $semname,
        );
        $result = $this->DataModel->addsem($data);  
        echo json_encode($result);
	}

  public function addday()
	{

        $day_name = $this->input->post('day_name');
        $data=array(
          'day_name' => $day_name,
        );
        $result = $this->DataModel->addday($data);  
        echo json_encode($result);
  }

  public function addyear()
	{

        $year = $this->input->post('year');
        $data=array(
          'year' => $year,
        );
        $result = $this->DataModel->addyear($data);  
        echo json_encode($result);
  }


  public function addperiod()
	{

        $period_name = $this->input->post('period_name');
        $period_time = $this->input->post('period_time');
        $data=array(
          'period_name' => $period_name,
          'period_time' => $period_time
        );
        $result = $this->DataModel->addperiod($data);  
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
        $duration = $this->input->post('no_of_year');
        $data=array(
          'crse_name' => $course_name,
          'duration' => $duration
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
        $sem_id = $this->input->post('sem_id');
        $result=$this->DataModel->getassignSubject($course_id,$sem_id);
        echo json_encode($result);
  }


  public function getmodelsemester()
  {
        $sem_id = $this->input->post('sem_id');
        $result=$this->DataModel->getmodelSemester($sem_id);
        echo json_encode($result);
  }
  public function semesterupdate()
  {
        $sem_id = $this->input->post('id');
        $semester_name = $this->input->post('semester_name');
        $data=array(
          'semester_name' => $semester_name
        );
        $result=$this->DataModel->semesterUpdate($data,$sem_id);
        echo json_encode($result);
  }

  public function getmodelday()
  {
        $day_id = $this->input->post('day_id');
        $result=$this->DataModel->getmodelDay($day_id);
        echo json_encode($result);
  }
  public function getmodelyear()
  {
        $year_id = $this->input->post('year_id');
        $result=$this->DataModel->getmodelYear($year_id);
        echo json_encode($result);
  }
  public function getmodelperiod()
  {
        $period_id = $this->input->post('period_id');
        $result=$this->DataModel->getmodelPeriod($period_id);
        echo json_encode($result);
  }

  public function dayupdate()
  {
        $day_id = $this->input->post('id');
        $day_name = $this->input->post('dayname');
        $data=array(
          'day_name' => $day_name
        );
        $result=$this->DataModel->dayUpdate($data,$day_id);
        echo json_encode($result);
  }

  public function yearupdate()
  {
        $year_id = $this->input->post('id');
        $year = $this->input->post('yr');
        $data=array(
          'year' => $year
        );
        $result=$this->DataModel->yearUpdate($data,$year_id);
        echo json_encode($result);
  }
  public function periodupdate()
  {
        $period_id = $this->input->post('id');
        $period_name = $this->input->post('periodname');
        $period_time = $this->input->post('periodtime');
        $data=array(
          'period_name' => $period_name,
          'period_time' => $period_time
        );
        $result=$this->DataModel->periodUpdate($data,$period_id);
        echo json_encode($result);
  }

  public function getmarklist()
  {
        $user_id = $this->input->get('user_id');
        $result=$this->DataModel->getMarklist($user_id);
        echo json_encode($result);
  }
}


	


