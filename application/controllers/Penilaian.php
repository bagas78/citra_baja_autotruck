<?php
class Penilaian extends CI_Controller{

	function __construct(){ 
		parent::__construct(); 
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['ahp'] = 'active';
		    $data['title'] = 'Penilaian';
		    $data['kriteria_data'] = $this->db->query("SELECT * FROM t_kriteria AS a JOIN t_sub AS b ON a.kriteria_id = b.sub_kriteria WHERE kriteria_hapus = 0 GROUP BY a.kriteria_kode")->result_array();
		    $data['sub_data'] = $this->db->query("SELECT * FROM t_sub WHERE sub_hapus = 0")->result_array();
		    $data['karyawan_data'] = $this->db->query("SELECT * FROM t_karyawan WHERE karyawan_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}  
		else{
			redirect(base_url('login'));
		}
	}
	function save_rangking(){
		//delete rangking user
		$this->db->where('rangking_karyawan',$_POST['rangking_karyawan']);
		$this->db->delete('t_rangking');

		$set = array(
						'rangking_karyawan' => $_POST['rangking_karyawan'],
						'rangking_nilai' => round($_POST['rangking_nilai'],3),
						'rangking_tanggal' => date('Y-m-d'),
					);

		$this->query_builder->add('t_rangking',$set);

		$data = $this->db->query("SELECT * FROM t_rangking as a JOIN t_karyawan as b ON a.rangking_karyawan = b.karyawan_id WHERE a.rangking_hapus = 0 ORDER BY rangking_nilai DESC")->result_array();
		echo json_encode($data);
	} 
}