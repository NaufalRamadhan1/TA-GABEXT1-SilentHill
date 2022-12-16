<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function index()
	{
		$data["tampil"] = json_decode($this->client->simple_get(APICUSTOMER));

		
		// foreach($data["tampil"] -> customer as $record)
		// {
		// 	echo $result->kodepesanan_ctr."<br>";
		// }

		$this->load->view('vw_customer', $data);

	}

	function dashboard()
	{
		$data['meta'] = [
			'title' => 'Dashboard',
		];

		$this->load->view('dashboard_vw', $data);
	}

	function sablon()
	{
		$data['meta'] = [
			'title' => 'sablon',
		];
		$this->load->view('vw_sablon', $data);
	}


	function setDelete()
	{
		// buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);

		$delete = json_decode($this->client->simple_delete(APICUSTOMER, array("kodepesanan" => $hasil -> kodepesanannya)));

		// isi nilai err
		// $err = 0;

		// kirim hasil ke "vw_customer"
		echo json_encode(array("statusnya" => $delete -> status));
	}

	function addCustomer()
	{
		$this->load->view('en_customer');
	}

	function setSave()
	{
		// baca nilai dari fetch
		$data = array (
			"kodepesanan" => $this->input->post("kodepesanannya"),
			"nama" => $this->input->post("namanya"),
			"telepon" => $this->input->post("teleponnya"),
			"konsumen" => $this->input->post("konsumennya"),
			"token" => $this->input->post("kodepesanannya")
		);

		$save = json_decode($this->client->simple_post(APICUSTOMER, $data));

		// kirim hasil ke "en_customer"
		echo json_encode(array("statusnya" => $save -> status));
	}
	function updateCustomer()
	{
		// $segmen = $this->uri->total_segments();
		// ambil nilai kodepesanan (berdasarkan segmen)
		$token = $this->uri->segment(3);

		
		$tampil = json_decode($this->client->simple_get(APICUSTOMER, array("kodepesanan" => $token)));

		foreach ($tampil -> Customer as $record)
		{
			$data = array(
			"kodepesanan" => $record->kodepesanan_ctr,
			"nama" =>	$record->nama_ctr,
			"telepon" => $record->telepon_ctr,
			"konsumen" => $record->konsumen_ctr,
			"token"=> $token
			);
			
		}
		
		$this->load->view('up_customer', $data);

	}
}
