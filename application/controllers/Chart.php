<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);
	}
}
