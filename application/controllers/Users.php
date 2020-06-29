<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){

		parent::__construct();

		// load base_url
		$this->load->helper('url');

		// Load Model
		$this->load->model('DataModel');
	}
	
	public function index(){

		
		// Check form submit or not 
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
					//  echo "hyy";
     				// Reading file
                    $file = fopen("assets/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
					
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;
					// echo "hyy";
					// exit;
                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
                            $this->DataModel->insertRecord($userdata);
                        }
                        $skip ++;
                    }
     				$data['response'] = 'successfully uploaded '.$filename; 
    			}else{ 
					$data['response'] = $this->upload->display_errors();
     				// $data['response'] = array('error' => $this->upload->display_errors());
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
   			// load view 
   			$this->load->view('menu/addsem',$data); 
  		}else{
   			// load view 
   			$this->load->view('users_view'); 
  		} 

	}

	
}
