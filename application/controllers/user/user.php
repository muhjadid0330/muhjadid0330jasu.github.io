<?php
class user extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mu_login');
    }
    function index(){
        $this->load->view('user/v_login');
    }
    function auth(){
        $nik=strip_tags(str_replace("'", "", $this->input->post('nik',TRUE)));
        $password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $cadmin=$this->mu_login->cekadmin($nik,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'id_user'   => $xcadmin['id_user'],
                'nik'  => $xcadmin['nik'],
                'nama'      => $xcadmin['nama_user'],
                'email'      => $xcadmin['email'],
                 'password'      => $xcadmin['password'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('user/dashboard'); 
        }else{
            redirect('user/user/gagallogin'); 
        }
    }


    function gagallogin(){
        $url=base_url('user/user');
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('user/user');
        redirect($url);
    }
}