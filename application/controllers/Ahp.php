<?php
class Ahp extends CI_Controller{

	function __construct(){ 
		parent::__construct(); 
	} 

	///////////////-- Kriteria --////////////////////////

	function sub(){
		if ( $this->session->userdata('login') == 1) {
			$data['ahp'] = 'active'; 
		    $data['title'] = 'Sub Kriteria';

		    $data['data'] = $this->db->query("SELECT * FROM t_sub as a JOIN t_kriteria as b ON a.sub_kriteria = b.kriteria_id WHERE a.sub_hapus = 0")->result_array();

		    $data['kriteria_data'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('sub/index');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		} 
		else{ 
			redirect(base_url('login'));
		}
	}
	function add_sub(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_sub order by sub_id DESC LIMIT 1")->row_array();
		if (@$k['sub_kode']) {
			$i = str_replace('SK0', '', $k['sub_kode']) + 1;
			$kode = 'SK0'.$i;
		} else {
			$kode = 'SK01';
		}
		

		$set = array(
						'sub_kode' => $kode,
						'sub_title' => $_POST['sub_title'],
						'sub_kriteria' => $_POST['sub_kriteria'],
						'sub_tanggal' => date('Y-m-d'),
					);
		$this->db->set($set);

		if ($this->db->insert('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('ahp/sub'));
	}
	function update_sub($id){
		$set = array(
						'sub_title' => $_POST['sub_title'],
						'sub_kriteria' => $_POST['sub_kriteria'],
					);
		$this->db->set($set);
		$this->db->where('sub_id',$id);
		if ($this->db->update('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('ahp/sub'));
	}
	function delete_sub($id){
		$this->db->set('sub_hapus',1);
		$this->db->where('sub_id',$id);

		if ($this->db->update('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('ahp/sub'));
	}

	/////////////////////////////////////////////////////////

	///////////////-- Kriteria --////////////////////////

	function kriteria(){
		if ( $this->session->userdata('login') == 1) {
			$data['ahp'] = 'active'; 
		    $data['title'] = 'Kriteria';

		    $data['data'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kriteria/index');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		}
		else{
			redirect(base_url('login'));
		}
	}
	function add_kriteria(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_kriteria order by kriteria_id DESC LIMIT 1")->row_array();
		if (@$k['kriteria_kode']) {
			$i = str_replace('KR0', '', $k['kriteria_kode']) + 1;
			$kode = 'KR0'.$i;
		} else {
			$kode = 'KR01';
		}
		

		$set = array(
						'kriteria_kode' => $kode,
						'kriteria_title' => $_POST['kriteria_title'],
						'kriteria_tanggal' => date('Y-m-d'),
					);
		$this->db->set($set);

		if ($this->db->insert('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('ahp/kriteria'));
	}
	function update_kriteria($id){
		$set = array(
						'kriteria_title' => $_POST['kriteria_title'],
					);
		$this->db->set($set);
		$this->db->where('kriteria_id',$id);
		if ($this->db->update('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('ahp/kriteria'));
	}
	function delete_kriteria($id){
		$this->db->set('kriteria_hapus',1);
		$this->db->where('kriteria_id',$id);

		if ($this->db->update('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('ahp/kriteria'));
	}
	
}