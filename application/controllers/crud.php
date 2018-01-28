<?php 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->library('encryption');
 
	}
 
	function index(){
		$data['tb_user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);
	}
 
	function tambah(){
		$this->load->view('v_admintambahuser');
	}
 
	function tambah_aksi(){
	
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => base64_encode($password),
			'level' => $level
		);
 
		$this->m_data->input_data($data,'tb_user');
		redirect('admin');
	}

	function edit($id){
	$where = array('id' => $id);
	$data['tb_user'] = $this->m_data->edit_data($where,'tb_user')->result();
	$this->load->view('v_adminedituser',$data);
	}
 
	function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'tb_user');
		redirect('admin');
	}

	function update(){
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$level = $this->input->post('level');
	$data = array(
		'nama' => $nama,
		'email' => $email,
		'password' => base64_encode($password),
		'level' => $level
	);
 
	$where = array(
		'id' => $id
	);
	$this->m_data->update_data($where,$data,'tb_user');
	redirect('admin');
	
	// $query = $this->db->query('UPDATE `tb_user` SET `username` = "'.$username.'", `password` = "'.$password.'", `fullname` = "'.$fullname.'", `level` = "'.$level.'" WHERE `tb_user`.`id` = "'.$id.'"');
	// 	if ($query) {
	// 		echo redirect('admin/data_user');
	// 	}
	}
}