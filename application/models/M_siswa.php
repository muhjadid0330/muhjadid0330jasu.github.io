<?php
class M_siswa extends CI_Model{

	function get_all_siswa(){
		$hsl=$this->db->query("SELECT id_user,nik,nama_user,email,password FROM tbl_user ORDER BY id_user DESC");
		return $hsl;
	}
	function simpan_mhs($nik,$nama,$email,$pass){
		$hsl=$this->db->query("INSERT INTO tbl_user(nik,nama_user,email,password) VALUES ('$nik','$nama','$email',md5('$pass'))");
		return $hsl;
	}

function get_pernyataan_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_user where id_user='$kode'");
		return $hsl;
	}

	function update_mhs($kode,$nik,$nama,$email,$pass){
		$hsl=$this->db->query("UPDATE tbl_user SET nik='$nik',nama_user='$nama',email='$email',password=md5('$pass') where id_user='$kode'");
		return $hsl;
	}
	function hapus_siswa($kode){
		$hsl=$this->db->query("DELETE FROM tbl_user WHERE id_user='$kode'");
		return $hsl;
	}

	//Front-en


} 