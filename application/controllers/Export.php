<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          check_not_login();
          $this->load->model('export_model');
     }

     public function indexX()
     {
          $kodeunik=202309130849;
          $data['semua_pengguna'] = $this->export_model->getAll($kodeunik)->result();
          $this->load->view('export', $data);
     }

     public function export1(){
          $kodeunik=$this->uri->segment(3);
          $pelatihan=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();          
          if($pelatihan['sasaran']=='CALON WIRAUSAHA'){
               $this->export($kodeunik);
          }else if($pelatihan['sasaran']=='UKM'){
               echo 'UKM';
          }
     }

     public function export($kodeunik)
     {
          // $kodeunik = $this->uri->segment(3);	
          $semua_pengguna = $this->export_model->getAll($kodeunik)->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'No Urut')
                      ->setCellValue('B1', 'No KTP')
                      ->setCellValue('C1', 'Nama Peserta')
                      ->setCellValue('D1', 'Tempat Lahir')
                      ->setCellValue('E1', 'Tanggal Lahir')
                      ->setCellValue('F1', 'JK')
                      ->setCellValue('G1', 'Status')
                      ->setCellValue('H1', 'Pendidikan')
                      ->setCellValue('I1', 'Agama')
                      ->setCellValue('J1', 'Alamat')
                      ->setCellValue('K1', 'RT')
                      ->setCellValue('L1', 'RW')
                      ->setCellValue('M1', 'Provinsi')
                      ->setCellValue('N1', 'Kabupaten')
                      ->setCellValue('O1', 'Kecamatan')
                      ->setCellValue('P1', 'Kelurahan')
                      ->setCellValue('Q1', 'No. Telp')
                      ->setCellValue('R1', 'Disabilitas')
                      ->setCellValue('S1', 'Jabatan')
                      ->setCellValue('T1', 'Alamat Kop/Ukm')
                      ->setCellValue('U1', 'RT Kop/UKM')
                      ->setCellValue('V1', 'RW Kop/UKM');
          
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(5); // Set width kolom F
          $sheet->getColumnDimension('G')->setWidth(15); // Set width kolom G
          $sheet->getColumnDimension('H')->setWidth(10); // Set width kolom H
          $sheet->getColumnDimension('I')->setWidth(10); // Set width kolom I
          $sheet->getColumnDimension('J')->setWidth(30); // Set width kolom J
          $sheet->getColumnDimension('K')->setWidth(5); // Set width kolom K
          $sheet->getColumnDimension('L')->setWidth(5); // Set width kolom L
          $sheet->getColumnDimension('M')->setWidth(15); // Set width kolom Provinsi
          $sheet->getColumnDimension('N')->setWidth(25); // Set width kolom Kabupaten
          $sheet->getColumnDimension('O')->setWidth(25); // Set width kolom Kecamatan
          $sheet->getColumnDimension('P')->setWidth(25); // Set width kolom Kelurahan
          $sheet->getColumnDimension('Q')->setWidth(15); // Set width kolom NO. telp
          $sheet->getColumnDimension('R')->setWidth(15); // Set width kolom Disabilitas
          $sheet->getColumnDimension('S')->setWidth(10); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(30); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(8); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(8); // Set width kolom RW Kop/UKM

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $pengguna->no_urut)
                         //   ->setCellValue('B' . $kolom, $pengguna->no_ktp)
                           ->setCellValueExplicit('B' . $kolom, $pengguna->no_ktp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('C' . $kolom, $pengguna->nama_peserta)
                           ->setCellValue('D' . $kolom, $pengguna->tempat_lahir)
                           ->setCellValue('E' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_lahir)))
                           ->setCellValue('F' . $kolom, $pengguna->jk)
                           ->setCellValue('G' . $kolom, $pengguna->status)
                           ->setCellValue('H' . $kolom, $pengguna->pendidikan)
                           ->setCellValue('I' . $kolom, $pengguna->agama)
                           ->setCellValue('J' . $kolom, $pengguna->alamat)
                           ->setCellValueExplicit('K' . $kolom, $pengguna->rt, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('L' . $kolom, $pengguna->rw, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('M' . $kolom, $pengguna->provinsi)
                           ->setCellValue('N' . $kolom, $pengguna->kabupaten)
                           ->setCellValue('O' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('P' . $kolom, $pengguna->kelurahan)
                           ->setCellValueExplicit('Q' . $kolom, $pengguna->no_telp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('R' . $kolom, $pengguna->disabilitas)
                           ->setCellValue('S' . $kolom, $pengguna->jabatan)
                           ->setCellValue('T' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValueExplicit('U' . $kolom, $pengguna->rt_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('V' . $kolom, $pengguna->rw_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Peserta.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     function cek(){
          $kodeunik = $this->uri->segment(3);
          echo $kodeunik;	
     }
}