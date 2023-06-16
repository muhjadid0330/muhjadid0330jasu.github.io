<?php 
class pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
		
       
	}

	function index(){
		
		$this->load->view('v_pendaftaran');
	}

	function simpan_mhs(){
		
		$nik=$this->input->post('nik');
		$nama=$this->input->post('nama',TRUE);
		$email=$this->input->post('email');
		$pass=$this->input->post('password');
		$this->m_siswa->simpan_mhs($nik,$nama,$email,$pass);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Anda Berhasil Terdaftar</div>");
		redirect('user/user');
	}


	
}