<?php
class siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('user/user');
            redirect($url);
        };
		$this->load->model('m_siswa');
		$this->load->library('upload');
	}


	function index(){
		
		$x['data']=$this->m_siswa->get_all_siswa();
		$this->load->view('user/v_datamhs',$x);
	
	}


	function update_mhs(){
		$kode=strip_tags($this->input->post('kode'));
		$nik=strip_tags($this->input->post('nik'));
		$nama=strip_tags($this->input->post('nama'));
		$email=strip_tags($this->input->post('email'));
		$pass=strip_tags($this->input->post('password'));
		$this->m_siswa->update_mhs($kode,$nik,$nama,$email,$pass);
		echo $this->session->set_flashdata('msg','succes');
		redirect('user/siswa');
	}
	function hapus_pengumuman(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_info->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/info');
	}

}