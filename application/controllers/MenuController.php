<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuController extends CI_Controller {
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
 
 
		//$this->load->library('Datatables','session');
	 } 


	public function index()
	{
        $this->load->view('index'); 
	}


	public function addsub()
	{
		
        $this->load->view('menu/addsub'); 
	}

		public function addcourse()
	{
        $this->load->view('menu/addcourse'); 
	}

		public function adddept()
	{
        $this->load->view('menu/adddept'); 
	}

		public function addusertype()
	{
        $this->load->view('menu/addusertype'); 
	}

		public function assignsubject()
	{
		$result = array();
		$result['course']=$this->DataModel->getCourse();
		$result['subject']=$this->DataModel->getSubject();
		$result['semester']=$this->DataModel->getSemester();
        $this->load->view('menu/assignsubject',$result); 
	}

	public function addsem()
	{
		
        $this->load->view('menu/addsem'); 
	}

	public function addclasstimetbl()
	{
		$result = array();
		$result['course']=$this->DataModel->getCourse();
		$result['semester']=$this->DataModel->getSemester();
		$result['subject']=$this->DataModel->getSubject();
		$result['day']=$this->DataModel->getDay();
		$result['period']=$this->DataModel->getPeriod();
        $this->load->view('menu/addclasstimetbl',$result); 
	}

	public function addday()
	{
		
        $this->load->view('menu/addday'); 
	}

	public function addyear()
	{
        $this->load->view('menu/addyear'); 
	}


	public function addperiod()
	{
		
        $this->load->view('menu/addperiod'); 
	}

	public function viewstudent()
	{
		$result['course']=$this->DataModel->getCourse();
		$result['semester']=$this->DataModel->getSemester();
        $this->load->view('menu/viewstudent',$result); 
	}

	public function uploadmarks()
	{
		$result['course']=$this->DataModel->getCourse();
		$result['semester']=$this->DataModel->getSemester();
        $this->load->view('menu/uploadmarks',$result); 
	}




}
