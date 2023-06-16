<?php 
class portalacademy extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->model('m_tulisan');
		$this->load->model('m_pengguna');	
       
	}


	function index(){
		$this->load->view('v_portalacademy');
		$x['data']=$this->m_tulisan->get_all_tulisan();
		$this->load->view('admin/v_tulisan',$x);
	}

	function tulisanUser(){
		$x['data']=$this->m_tulisan->get_all_tulisan_kirim();
		$this->load->view('admin/v_tulisanUser',$x);
	}

	
}