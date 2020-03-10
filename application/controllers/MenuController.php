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

		public function addcourse1()
	{
		$this->load->helper('url'); 
        $this->load->view('menu/addcourse1'); 
	}

		public function adddept()
	{
		$this->load->helper('url'); 
        $this->load->view('menu/adddept'); 
	}

		public function addutype()
	{
		$this->load->helper('url'); 
        $this->load->view('menu/addutype'); 
	}
		public function addallsub()
	{
		$this->load->helper('url'); 
        $this->load->view('menu/addallsub'); 
	}


	public function invoice()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/invoice'); 
	}

	public function profile()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/profile'); 
	}


	public function login()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/login'); 
	}


	public function register()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/register'); 
	}


	public function f404()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/f404'); 
	}


	public function f500()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/f500'); 
	}


	public function blank()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/blank'); 
	}


	public function pace()
	{
		$this->load->helper('url'); 
        $this->load->view('pages/examples/pace'); 
	}



}
