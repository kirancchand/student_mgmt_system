<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexRoutingController extends CI_Controller {
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
	 } 
	public function index()
	{
        $this->load->view('index'); 
	}

	public function login()
	{
        $this->load->view('login'); 
	}

	public function register()
	{ 
		$result['course']=$this->DataModel->getCourse();
		$result['semester']=$this->DataModel->getSemester();
		$result['usertype']=$this->DataModel->getUsertype();
		$result['year']=$this->DataModel->getYear();
        $this->load->view('register',$result); 
	}
}
