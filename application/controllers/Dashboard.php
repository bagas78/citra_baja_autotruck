<?php
class Dashboard extends CI_Controller{

	function __construct(){  
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			
			$data['peringkat'] = $this->db->query("SELECT b.karyawan_nama AS nama, ROUND(a.rangking_nilai + c.total_nilai,2) as nilai FROM t_rangking AS a JOIN t_karyawan AS b ON a.rangking_karyawan = b.karyawan_id JOIN t_total AS c ON b.karyawan_id = c.total_karyawan ORDER BY nilai DESC")->result_array();

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