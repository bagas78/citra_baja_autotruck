<?php
class Pm extends CI_Controller{

	function __construct(){  
		parent::__construct(); 
	} 

	///////////////-- Aspek --////////////////////////

	function aspek(){
		if ( $this->session->userdata('login') == 1) {
			$data['pm'] = 'active'; 
		    $data['title'] = 'Aspek';

		    $data['data'] = $this->db->query("SELECT * FROM t_aspek WHERE aspek_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('aspek/index');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		} 
		else{ 
			redirect(base_url('login'));
		}
	}
	function delete_aspek($id){
		$this->db->set('aspek_hapus',1);
		$this->db->where('aspek_id',$id);

		if ($this->db->update('t_aspek')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('pm/aspek'));
	}
	function add_aspek(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_aspek order by aspek_id DESC LIMIT 1")->row_array();
		if (@$k['aspek_kode']) {
			$i = str_replace('AS0', '', $k['aspek_kode']) + 1;
			$kode = 'AS0'.$i;
		} else {
			$kode = 'AS01';
		}
		

		$set = array(
						'aspek_kode' => $kode,
						'aspek_title' => $_POST['aspek_title'],
						'aspek_bobot' => $_POST['aspek_bobot'],
						'aspek_cf' => $_POST['aspek_cf'],
						'aspek_sf' => $_POST['aspek_sf'],
					);
		$this->db->set($set);

		if ($this->db->insert('t_aspek')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('pm/aspek'));
	}
	function update_aspek($id){
		$set = array(
						'aspek_title' => $_POST['aspek_title'],
						'aspek_bobot' => $_POST['aspek_bobot'],
						'aspek_cf' => $_POST['aspek_cf'],
						'aspek_sf' => $_POST['aspek_sf'],
					);
		$this->db->set($set);
		$this->db->where('aspek_id',$id);
		if ($this->db->update('t_aspek')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('pm/aspek'));
	}

	/////////////////////////////////////////////////////////

	///////////////-- Faktor --////////////////////////

	function faktor(){
		if ( $this->session->userdata('login') == 1) {
			$data['pm'] = 'active'; 
		    $data['title'] = 'Faktor';

		    $data['data'] = $this->db->query("SELECT * FROM t_faktor as a JOIN t_aspek as b ON a.faktor_aspek = b.aspek_id WHERE a.faktor_hapus = 0")->result_array();
		    $data['aspek_data'] = $this->db->query("SELECT * FROM t_aspek WHERE aspek_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('faktor/index');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		}
		else{
			redirect(base_url('login'));
		}
	}
	function add_faktor(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_faktor order by faktor_id DESC LIMIT 1")->row_array();
		if (@$k['faktor_kode']) {
			$i = str_replace('FK0', '', $k['faktor_kode']) + 1;
			$kode = 'FK0'.$i;
		} else {
			$kode = 'FK01';
		}
		

		$set = array(
						'faktor_kode' => $kode,
						'faktor_aspek' => $_POST['faktor_aspek'],
						'faktor_title' => $_POST['faktor_title'],
						'faktor_nilai' => $_POST['faktor_nilai'],
						'faktor_type' => $_POST['faktor_type'],
					);
		$this->db->set($set);

		if ($this->db->insert('t_faktor')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('pm/faktor'));
	}
	function update_faktor($id){
		$set = array(
						'faktor_aspek' => $_POST['faktor_aspek'],
						'faktor_title' => $_POST['faktor_title'],
						'faktor_nilai' => $_POST['faktor_nilai'],
						'faktor_type' => $_POST['faktor_type'],
					);
		$this->db->set($set);
		$this->db->where('faktor_id',$id);
		if ($this->db->update('t_faktor')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('pm/faktor'));
	}
	function delete_faktor($id){
		$this->db->set('faktor_hapus',1);
		$this->db->where('faktor_id',$id);

		if ($this->db->update('t_faktor')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('pm/faktor'));
	}

	/////////////////////////////////////////////////////////

	///////////////-- Penilaian --////////////////////////

	function penilaian(){
		if ( $this->session->userdata('login') == 1) {
			$data['pm'] = 'active'; 
		    $data['title'] = 'Penilaian';

		    $data['data'] = $this->db->query("SELECT * FROM t_matching as a JOIN t_karyawan as b ON a.matching_karyawan = b.karyawan_id LEFT JOIN t_total AS c ON a.matching_karyawan = c.total_karyawan ORDER BY a.matching_id DESC")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian_pm/index');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		}
		else{
			redirect(base_url('login'));
		}
	}
	function penilaian_delete($id){
		$this->db->where('penilaian_karyawan',$id);
		$this->db->delete('t_penilaian');

		$this->db->where('matching_karyawan',$id);
		$this->db->delete('t_matching');

		$this->session->set_userdata('success','Data berhasil di hapus');
		redirect(base_url('pm/penilaian'));
	}
	function penilaian_add(){
		$data['pm'] = 'active'; 
	    $data['title'] = 'Penilaian';

	    $data['karyawan_data'] = $this->db->query("SELECT * FROM t_matching AS a RIGHT JOIN t_karyawan AS b ON a.matching_karyawan = b.karyawan_id WHERE b.karyawan_hapus = 0 AND a.matching_karyawan IS NULL")->result_array();
	    $data['aspek_data'] = $this->db->query("SELECT * FROM t_aspek WHERE aspek_hapus = 0")->result_array();
	    $data['faktor_data'] = $this->db->query("SELECT * FROM t_faktor WHERE faktor_hapus = 0")->result_array();

	    $this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('penilaian_pm/add');
	    $this->load->view('v_template_admin/admin_footer'); 
	}
	function penilaian_save(){
		$id = $_POST['nama'];

		for ($i = 0; $i < $_POST['jumlah'] ; $i++) {
			
			$faktor = $_POST['faktor'.$i];

			//ambil kode aspek
			$x = $this->db->query("SELECT * FROM t_aspek as a JOIN t_faktor as b ON a.aspek_id = b.faktor_aspek WHERE b.faktor_kode = '$faktor'")->row_array();

			//insert looping
			$set = array(	
						'penilaian_aspek' => $x['aspek_kode'],
						'penilaian_karyawan' => $id,
						'penilaian_faktor' => $faktor,
						'penilaian_nilai' => $_POST['nilai'.$i],
					);
			$this->db->set($set);
			$this->db->insert('t_penilaian');	
		}

		//insert karyawan matching
		$set1 = array(	
						'matching_karyawan' => $id,
					);
		$this->db->set($set1);
		$this->db->where('matching_id',$id);
		if ($this->db->insert('t_matching')) {

			$this->session->set_flashdata('sukses','Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		$this->session->set_flashdata('sukses','Data berhasil di simpan');
		redirect(base_url('pm/penilaian'));
	}
	function penilaian_rangking(){
		$cek = $this->db->query('SELECT * FROM t_matching')->num_rows();

		if ($cek > 0) {

			//delete data
			$this->db->query('DELETE FROM t_cfsf');
			$this->db->query('DELETE FROM t_gap');
			$this->db->query('DELETE FROM t_hasil_konversi');
			$this->db->query('DELETE FROM t_total');
			
			/////////////// -- menghitung gap -- //////////////////////////////

				$nilai = $this->db->query("SELECT * FROM t_penilaian")->result_array();
				$bobot = $this->db->query("SELECT * FROM t_faktor WHERE faktor_hapus = 0")->result_array();

				foreach ($nilai as $n) {
					foreach ($bobot as $b) {
						
						if ($n['penilaian_faktor'] == $b['faktor_kode']) {
							
							$hasil = $n['penilaian_nilai'] - $b['faktor_nilai'];

							$set = array(
											'gap_aspek' => $n['penilaian_aspek'],
											'gap_faktor' => $n['penilaian_faktor'],
											'gap_karyawan' => $n['penilaian_karyawan'],
											'gap_hasil' => $hasil,
										);
							$this->db->set($set);
							$this->db->insert('t_gap');

						}

					}
				}

			/////////// -- konversi gap -- ///////////////////////////////////////

				$konversi = $this->db->query("SELECT * FROM t_konversi")->result_array();
				$gap = $this->db->query("SELECT * FROM t_gap")->result_array();

				foreach ($konversi as $k) {

					foreach ($gap as $g) {
						if ($k['konversi_selisih'] == $g['gap_hasil']) {
							$set = array(
											'hasil_konversi_karyawan' => $g['gap_karyawan'],
											'hasil_konversi_aspek' => $g['gap_aspek'],
											'hasil_konversi_faktor' => $g['gap_faktor'],
											'hasil_konversi_nilai' => str_replace(',', '.', $k['konversi_bobot_nilai']),
										);

							$this->db->set($set);
							$this->db->insert('t_hasil_konversi');
							
						}	
					}
				}

			/////////// -- mencari NF & CF -- /////////////////////////////////////

				$karyawan = $this->db->query("SELECT * FROM t_karyawan WHERE karyawan_hapus = 0")->result_array();			

						foreach ($karyawan as $kr) {

							$idkr = $kr['karyawan_id'];

							$db = $this->db->query("

									SELECT *,
									SUM(IF(faktor_type = 'cf', hasil_konversi_nilai, 0)) / SUM(IF(faktor_type = 'cf', 1,0)) AS core_faktor, 
									SUM(IF(faktor_type = 'sf', hasil_konversi_nilai, 0)) / SUM(IF(faktor_type = 'sf', 1,0)) AS secondary_faktor
									FROM 
									t_hasil_konversi AS a 
									JOIN t_faktor AS b 
									ON a.hasil_konversi_faktor = b.faktor_kode 
									JOIN t_aspek AS c 
									ON b.faktor_aspek = c.aspek_id
									JOIN t_karyawan AS d 
									ON a.hasil_konversi_karyawan = d.karyawan_id 
									WHERE a.hasil_konversi_karyawan = '$idkr' 
									GROUP BY c.aspek_kode

								")->result_array();

							foreach ($db as $value) {
								$aspek_cf = floatval($value['aspek_cf']) / 100.00;
								$aspek_sf = floatval($value['aspek_sf']) / 100.00;
								$nilai = ($aspek_cf * $value['core_faktor']) + ($aspek_sf * $value['secondary_faktor']);

								$set = array(
									'cfsf_karyawan' => @$value['karyawan_id'],
									'cfsf_aspek' => @$value['aspek_kode'],
									'cfsf_cf' => @$aspek_cf,
									'cfsf_sf' => @$aspek_sf,
									'cfsf_nilai' => round($nilai,2),
								);

								$this->db->set($set);
								$this->db->insert('t_cfsf');
							}

						}

				/////////// -- menghitung nilai total -- ////////////////////////

					$cfsf = $this->db->query("SELECT * FROM t_cfsf AS a JOIN t_aspek AS b ON a.cfsf_aspek = b.aspek_kode")->result_array();
					
					foreach ($karyawan as $kr) {

						$sum = 0;
						foreach ($cfsf as $value) {
							if ($kr['karyawan_id'] == $value['cfsf_karyawan']) {

								$bobot = floatval($value['aspek_bobot']) / 100.00;
								$x = round($bobot * $value['cfsf_nilai'], 2);	
								$sum += $x; 
							}
						}

						if ($sum > 0) {
							// insert total
							$set = array(
											'total_karyawan' => $kr['karyawan_id'],
											'total_nilai' => $sum,
										);
							$this->db->set($set);
							$this->db->insert('t_total');
						}
					}

			redirect(base_url('pm/hasil_rangking'));				

		}else{
			$this->session->set_flashdata('gagal','Belum ada karyawan yang di nilai');
			redirect(base_url('pm/penilaian'));
		}
	}
	function hasil_rangking(){
		if ( $this->session->userdata('login') == 1) {
			$data['rangking'] = 'class="active"'; 
		    $data['title'] = 'Rangking';

		    $data['data'] = $this->db->query("SELECT * FROM t_total AS a JOIN t_karyawan AS b ON a.total_karyawan = b.karyawan_id ORDER BY a.total_nilai DESC")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian_pm/hasil');
		    $this->load->view('v_template_admin/admin_footer'); 
  
		}
		else{
			redirect(base_url('login'));
		}
	}
	function penilaian_log(){
		$data['rangking'] = 'class="active"'; 
	    $data['title'] = 'Hasil Profile Matching';

	    $data['karyawan_data'] = $this->db->query("SELECT * FROM t_karyawan as a JOIN t_total as b ON a.karyawan_id = b.total_karyawan WHERE a.karyawan_hapus = 0 GROUP BY a.karyawan_id")->result_array();

	    $data['penilaian_data'] = $this->db->query("SELECT * FROM t_penilaian as a JOIN t_aspek as b ON a.penilaian_aspek = b.aspek_kode JOIN t_faktor as c ON a.penilaian_faktor = c.faktor_kode")->result_array();

	    $data['gap_data'] = $this->db->query("SELECT * FROM t_gap as a JOIN t_aspek as b ON a.gap_aspek = b.aspek_kode JOIN t_faktor as c ON a.gap_faktor = c.faktor_kode")->result_array();

	    $data['gap_konversi_data'] = $this->db->query("SELECT * FROM t_hasil_konversi as a JOIN t_aspek as b ON a.hasil_konversi_aspek = b.aspek_kode JOIN t_faktor as c ON a.hasil_konversi_faktor = c.faktor_kode")->result_array();

	    $data['cfsf_data'] = $this->db->query("SELECT * FROM t_cfsf as a JOIN t_aspek as b ON a.cfsf_aspek = b.aspek_kode")->result_array();

	    $data['total_data'] = $this->db->query("SELECT * FROM t_total")->result_array();

	    $data['konversi_data'] = $this->db->query("SELECT * FROM t_konversi")->result_array();


	    $this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('penilaian_pm/log');
	    $this->load->view('v_template_admin/admin_footer');
	}
	/////////////////////////////////////////////////////////
	
}