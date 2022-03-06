<?php
class Karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) { 
			$data['karyawan'] = 'class="active"';
		    $data['title'] = 'Data Karyawan';
		    $data['data'] = $this->db->query("SELECT * FROM t_karyawan WHERE karyawan_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('karyawan/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$x = $_POST['karyawan_nik'];
        $cek = $this->db->query("SELECT * FROM t_karyawan WHERE karyawan_nik = '$x'")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','NIK sudah di gunakan !!');
			redirect(base_url('karyawan'));
		}else{
			$set = array(
							'karyawan_departement' => $_POST['karyawan_departement'],
							'karyawan_jabatan' => $_POST['karyawan_jabatan'],
							'karyawan_nama' => $_POST['karyawan_nama'],
							'karyawan_alamat' => $_POST['karyawan_alamat'],
							'karyawan_nik' => $_POST['karyawan_nik'],
							'karyawan_tanggal_lahir' => $_POST['karyawan_tanggal_lahir'],
							'karyawan_tempat_lahir' => $_POST['karyawan_tempat_lahir'],
						);
			$this->query_builder->add('t_karyawan',$set);

			$this->session->set_flashdata('success','Data berhasil di tambah');
			redirect(base_url('karyawan'));
		}
	}
	function delete($id){
        //hapus user
        $this->db->set('karyawan_hapus',1);
        $this->db->where('karyawan_id',$id);
        $this->db->update('t_karyawan');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('karyawan'));
	}
	function update($id){
		$set = array(
			'karyawan_departement' => $_POST['karyawan_departement'],
			'karyawan_jabatan' => $_POST['karyawan_jabatan'],
			'karyawan_nama' => $_POST['karyawan_nama'],
			'karyawan_alamat' => $_POST['karyawan_alamat'],
			'karyawan_nik' => $_POST['karyawan_nik'],
			'karyawan_tanggal_lahir' => $_POST['karyawan_tanggal_lahir'],
			'karyawan_tempat_lahir' => $_POST['karyawan_tempat_lahir'],
		);
		$this->query_builder->update('t_karyawan',$set,'karyawan_id ='.$id);

		$this->session->set_flashdata('success','Data berhasil di edit');
		redirect(base_url('karyawan'));
	}
}