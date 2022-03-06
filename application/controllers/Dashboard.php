<?php
class Dashboard extends CI_Controller{

	function __construct(){  
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			
			$data['peringkat_ahp'] = $this->db->query("SELECT b.karyawan_nama AS nama, a.rangking_nilai as nilai FROM t_rangking AS a JOIN t_karyawan AS b ON a.rangking_karyawan = b.karyawan_id ORDER BY a.rangking_nilai DESC")->result_array();

			$data['peringkat_pm'] = $this->db->query("SELECT b.karyawan_nama AS nama, a.total_nilai as nilai FROM t_total AS a JOIN t_karyawan AS b ON a.total_karyawan = b.karyawan_id ORDER BY a.total_nilai DESC")->result_array();
			
			$data['dashboard'] = 'class="active"';
		    $data['title'] = 'Dashboard';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/dashboard');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
}