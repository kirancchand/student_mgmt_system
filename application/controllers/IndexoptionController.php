<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexoptionController extends CI_Controller {
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
      } 
	public function index()
	{
        //$this->load->view('index'); 
		
	}
	public function login()
	{
        //$this->load->view('index');
       
        $email = $this->input->post('email');  
		$pass = $this->input->post('password');
		// echo "$email<br>"; 
		// echo $pass;
        $data = array( 
            'emailid' => $email, 
            'password' => $pass
         ); 
		$result=$this->UserModel->login($data);
		// print_r($result);
		if ($result == true) 
		{	 
			$this->load->view('home');
		}
		else
		{
			$this->load->view('index');
		}

		
	}
		public function register()
	{
        //$this->load->view('index'); 
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$emailid = $this->input->post('email');
		$usertype = $this->input->post('f_utype_id');
		$course = $this->input->post('f_crse_id');
		$semester = $this->input->post('f_sem_id');
		$year = $this->input->post('f_year_id');
		$admssn_no = $this->input->post('admn_no');
		$emp_code = $this->input->post('emp_code');
		$pass = $this->input->post('password');
		
		// echo "$first_name";
		// echo " $last_name<br>";
		// echo "$emailid<br>";
		// echo "$usertype<br>";
		// echo "$course<br>";
		// echo "$subject<br>";
		// echo "$admssn_no<br>";
	    // echo "$emp_code<br>";
		// echo "$pass<br>";
		// echo $pass2;
		

	 
	//  $pass = $this->input->post('password'); 
         $data = array( 
			'first_name' => $first_name,
			'last_name'=>$last_name,
			'emailid'=>$emailid,
			 'f_utype_id'=>$usertype,
			 'f_crse_id'=>$course,
			 'f_sem_id'=>$semester,
			 'f_year_id'=>$year,
			 'admssn_no'=>$admssn_no,
			 'emp_code'=>$emp_code,
			'password' => $pass,
			
         ); 
		 
		 $result=$this->UserModel->register($data); 
		 print_r($result);

        if ($result == true) 
        {
        	$this->load->view('home');
		}
		else
		{
			$this->load->view('index');
		}
    
		
	}


}
