<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         $this->load->model('export_model');
     }

     public function index()
     {
          $data['semua_pengguna'] = $this->export_model->getAll()->result();
          $this->load->view('export', $data);
     }

     public function export()
     {
          $semua_pengguna = $this->export_model->getAll()->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
          
          

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'No Urut')
                      ->setCellValue('B1', 'No KTP')
                      ->setCellValue('C1', 'Nama Peserta')
                      ->setCellValue('D1', 'Tempat Lahir')
                      ->setCellValue('E1', 'Tanggal Lahir');

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $pengguna->no_urut)
                         //   ->setCellValue('B' . $kolom, $pengguna->no_ktp)
                           ->setCellValueExplicit('B' . $kolom, $pengguna->no_ktp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('C' . $kolom, $pengguna->nama_peserta)
                           ->setCellValue('D' . $kolom, $pengguna->tempat_lahir)
                           ->setCellValue('E' . $kolom, $pengguna->tgl_lahir);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="Cetak.xlsx"');
	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }
}