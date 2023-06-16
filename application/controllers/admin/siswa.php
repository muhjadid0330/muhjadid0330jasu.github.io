<?php
class siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_siswa');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->m_siswa->get_all_siswa();
		$this->load->view('admin/v_siswa',$x);
	
	}

	function kirim_pesan(){
		
		$nik=htmlspecialchars($this->input->post('nik',TRUE),ENT_QUOTES);
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$this->m_siswa->kirim_pesan($nik,$nama,$email,$pass);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Anda Berhasil Terdaftar</div>");
		redirect('kontak');
	}

	function hapus_siswa(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_siswa->hapus_siswa($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/siswa');
	}

}