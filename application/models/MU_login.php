<?php
class mu_login extends CI_Model{
    function cekadmin($nik,$password){
        $hasil=$this->db->query("SELECT * FROM tbl_user WHERE Nik='$nik' AND password=md5('$password')");
        return $hasil;
    }
  
}
