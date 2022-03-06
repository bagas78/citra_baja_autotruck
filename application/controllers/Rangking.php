<?php
class Rangking extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) { 
			$data['rangking'] = 'class="active"';
		    $data['title'] = 'Rangking';
		    $data['data'] = $this->db->query("SELECT * FROM t_rangking as a JOIN t_karyawan as b ON a.rangking_karyawan = b.karyawan_id")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('rangking/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
}