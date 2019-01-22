<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 		if($this->session->userdata('logged_in')){
 			$session_data = $this->session->userdata('logged_in');
 			$data['username'] = $session_data['username'];
 			$data['level'] = $session_data['level'];
 			$current_controller = $this->router->fetch_class();
 			$this->load->library('acl');
 			if (! $this->acl->is_public($current_controller))
 			{
 				if (! $this->acl->is_allowed($current_controller, $data['level']))
 				{
 					echo '<script>alert("Anda Tidak Memiliki Hak Akses")</script>';
 					redirect('login/logout','refresh');
 				}
 			}
 		}else{
 			redirect('login','refresh');
 		}
 	}

 	function print()
 	{
 		$this->load->view('print_sppd');
 	}

 	function generate_to_pdf(){
		$this->load->model('sppd_model');
		$this->load->library('pdf');
 		$data['sppd_list']=$this->sppd_model->getDataSppd();
		$this->pdf->load_view('sppd_laporan',$data);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->render();
	}

	function generate_to_excel(){
		// Load plugin PHPExcel nya
		$this->load->library('excel');
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Data Surat')
					 ->setLastModifiedBy('Data Surat')
					 ->setTitle("Data Surat")
					 ->setSubject("Surat")
					 ->setDescription("Data Surat")
					 ->setKeywords("Data Surat");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  ),
		  'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'D6DBDF')
        )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SURAT"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A2', "Periode ".date('d m Y')); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A2:P2'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A2
		// Buat header tabel nya pada baris ke 3
		
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$resultData = $this->db->get("sppd")->result();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($resultData as $row){ // 
			//$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow), "Nama Pegawai");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+1), "Pangkat / Gol. Ruang");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+2), "Jabatan");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+3), "Maksud Perj. Dinas");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+4), "Tempat Berangkat");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+5), "Tempat Tujuan");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+6), "Tanggal Berangkat");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+7), "Tanggal Kembali");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+8), "Instansi");
			$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow+9), "Kode Rekening");

			// Apply style header yang telah kita buat tadi ke masing-masing kolom header
			//$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('A'.($numrow))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+1))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+2))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+3))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+4))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+5))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+6))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+7))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+8))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('A'.($numrow+9))->applyFromArray($style_row);

			//$excel->setActiveSheetIndex(0)->setCellValue('A'.($numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow), $row->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+1), $row->pangkat);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+2), $row->jabatan);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+3), $row->maksud);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+4), $row->tmp_berangkat);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+5), $row->tmp_tujuan);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+6), $row->tgl_berangkat);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+7), $row->tgl_kembali);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+8), $row->instansi);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.($numrow+9), $row->rekening);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			//$excel->getActiveSheet()->getStyle('A'.($numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A2
			//$excel->getActiveSheet()->getStyle('A'.($numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+1))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+2))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+3))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+4))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+5))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+6))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+7))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+8))->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.($numrow+9))->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow= $numrow+13; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(75);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Surat");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data_surat_'.date_format(date_create($this->input->post('startdate')),"Ymd").'_'.date_format(date_create($this->input->post('enddate')),"Ymd").'.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  
	}

	public function index()
	{
		$this->load->helper('url','form');
		$this->load->model('sppd_model');
		$data['sppd_list'] = $this->sppd_model->getDataSppd();
		$this->load->view('sppd', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('sppd_model');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('maksud', 'maksud', 'trim|required');
		

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('tambah_sppd_view');
		}
		else
		{			
			$this->sppd_model->insertSppd();
			$this->load->view('tambah_sppd_data');
		}
		

	}

	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('maksud', 'maksud', 'trim|required');


		$this->load->model('sppd_model');
		$data['sppd'] = $this->sppd_model->getSppd($id);

		if ($this->form_validation->run()==FALSE)
		{
			$this->load->view('edit_sppd_view',$data);
		}
		else
		{
			$this->sppd_model->updateById($id);
			$this->load->view('edit_sppd_data');
		}
	}

	public function deleteData($id)
	{
		$this->load->helper("url");
		$this->load->model("sppd_model");
		$this->sppd_model->delete($id);
		redirect('sppd');
	}
}

