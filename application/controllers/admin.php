<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('encryption');

	 }
	public function index()
	 {	
		$data['tb_user']= $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
		
	}

		public function tambahuser()
	{
		$this->load->view("v_admintambahuser");
	}

}