<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
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
	function __construct(){
    parent::__construct();
      $this->load->database(); 
      $this->load->library('datatables'); //load library ignited-dataTable
      $this->load->model('CrudModel'); //load model crud_model
  }
  function index(){
      $x['category']=$this->CrudModel->get_category();
      $this->load->view('menu/multipletable',$x);
  }
 
  function get_product_json() { //get product data and encode to be JSON object
      //header('Content-Type: application/json');
      echo $this->CrudModel->get_all_product();
  }
 
  function save(){ //insert record method
      $this->CrudModel->insert_product();
      redirect('crud');
  }
 
  function update(){ //update record method
      $this->CrudModel->update_product();
      redirect('crud');
  }
 
  function delete(){ //delete record method
      $this->CrudModel->delete_product();
      redirect('crud');
  }

}

?>
	


