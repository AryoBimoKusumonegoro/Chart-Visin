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
		$this->load->view('welcome_message');
	}

	/*
	function grafik()
	{
		$chartData=file_get_contents('assets/industribesar.json');
		$chartData=json_decode($chartData);
		$res=array();
		foreach ($chartData as $row)
		{
			$dat=[$row->No, (string)$row->Kategori];
			array_push($res, $dat);
		}
		// echo json_encode($res);
		$data['PieChartData']=json_encode($res);
		$this->load->view('grafik', $data);
	}

	*/


	function tampilan()
	{
		//Industri Besar (VI ke-2)
		$source=file_get_contents('assets/besarnon.json');
		// $source=json_decode($source);
		$source=json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $source), true );

		//Data 1
		$data1=array();
		foreach ($source as $row)
		{
			if (!isset($data1[$row['Industri']]))
			{
					$data1[$row['Industri']]=array($row['Jumlah_Unit']);
			}
			else
			{
				array_push($data1[$row['Industri']], $row['Jumlah_Unit']);
			}
		}
		$keys=array_keys($data1);
		$ibes=array();
		foreach ($keys as $row) {
			$ibes[]=[$row, array_sum($data1[$row])];
		}
		$data['ibes1']=json_encode($ibes);
		$data['judul1']='Persebaran Industri Besar Non Agro';

		//Data 2
		$data2=array();
		foreach ($source as $row)
		{
			if (!isset($data2[$row['Industri']]))
			{
					$data2[$row['Industri']]=array($row['Jumlah_SDM']);
			}
			else
			{
				array_push($data2[$row['Industri']], $row['Jumlah_SDM']);
			}
		}
		$keys=array_keys($data2);
		$ibes=array();
		foreach ($keys as $row) {
			$ibes[]=[$row, array_sum($data2[$row])];
		}
		$data['ibes2']=json_encode($ibes);
		$data['judul2']='Persebaran Sumber Daya Manusia Industri Besar Non Agro';


		//Data 3
		$data3=[array('Tahun','Jumlah Unit Industri Non Agro'/*,array('role'=>'style')*/)];
		$totaldata=array();
		foreach($source as $row)
		{
			$year=$row['Tahun'];
			
			if(!isset($totaldata[$year]))
				{
					$totaldata[$year]=[$row['Jumlah_Unit']];
				}
			else
				{
					array_push($totaldata[$year],$row['Jumlah_Unit']);
				}
		}

		$year=array_keys($totaldata);
		foreach(array_keys($totaldata) as $row)
			{
				$dat =[$row, array_sum($totaldata[$row])];
				// echo json_encode($dat);
				array_push($data3, $dat);
			}
		$data['BarChartTitle']= 'Jumlah Unit Industri Berdasarkan Tahun';
		$data['BarChartData']=json_encode($data3);

		//Data 4
		$data4=array();
		foreach ($source as $row)
		{
			if (!isset($data4[$row['Industri']]))
			{
					$data4[$row['Industri']]=array($row['Jumlah_Prod']);
			}
			else
			{
				array_push($data4[$row['Industri']], $row['Jumlah_Prod']);
			}
		}
		$keys=array_keys($data4);
		$ibes=array();
		foreach ($keys as $row) {
			$ibes[]=[$row, array_sum($data4[$row])];
		}
		$data['ibes4']=json_encode($ibes);
		$data['judul4']='Jumlah Produksi Industri Besar Non Agro';


		//Data 5
		$data5=array();
		foreach ($source as $row)
		{
			if (!isset($data5[$row['Industri']]))
			{
					$data5[$row['Industri']]=array($row['Nilai_Prod']);
			}
			else
			{
				array_push($data5[$row['Industri']], $row['Nilai_Prod']);
			}
		}
		$keys=array_keys($data5);
		$ibes=array();
		foreach ($keys as $row) {
			$ibes[]=[$row, array_sum($data5[$row])];
		}
		$data['ibes5']=json_encode($ibes);
		$data['judul5']='Jumlah Nilai Produksi Industri Besar Non Agro';

		$this->load->view('grafik', $data);
		// echo json_encode(array_keys($result));
	}
}
