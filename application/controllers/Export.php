<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

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
               $this->exportukm($kodeunik);
          }else if($pelatihan['sasaran']=='SAFARI PODCAST'){
               $this->exportpodcast($kodeunik);
          }else if($pelatihan['sasaran']=='KOPERASI'){
               $this->exportkoperasi($kodeunik);
          }
     }

     public function export($kodeunik)
     {
          check_not_login();
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
                      ->setCellValue('F1', 'Jenis Kelamin')
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
          $sheet->getColumnDimension('F')->setWidth(10); // Set width kolom F
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

     public function exportukmdewan($kodeunik)
     {
          check_not_login();
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
                      ->setCellValue('S1', 'Perizinan')
                      ->setCellValue('T1', 'Permasalahan')
                      ->setCellValue('U1', 'Kebutuhan Diklat')
                      ->setCellValue('V1', 'No NIB')
                      ->setCellValue('W1', 'Nama Usaha')
                      ->setCellValue('X1', 'Status Usaha')
                      ->setCellValue('Y1', 'Sertifikasi')
                      ->setCellValue('Z1', 'Sektor Usaha')
                      ->setCellValue('AA1', 'Bidang Usaha')
                      ->setCellValue('AB1', 'ALAMAT USAHA')
                      ->setCellValue('AC1', 'RT')
                      ->setCellValue('AD1', 'RW')
                      ->setCellValue('AE1', 'KOTA USAHA')
                      ->setCellValue('AF1', 'KEC USAHA')
                      ->setCellValue('AG1', 'KEL USAHA')
                      ->setCellValue('AH1', 'KODEPOS USAHA')
                      ->setCellValue('AI1', 'MODAL USAHA')
                      ->setCellValue('AJ1', 'NILAI MODAL USAHA')
                      ->setCellValue('AK1', 'OMZET USAHA')
                      ->setCellValue('AL1', 'NILAI OMZET USAHA')
                      ->setCellValue('AM1', 'KARYAWAN L')
                      ->setCellValue('AN1', 'KARYAWAN P')
                      ->setCellValue('AO1', 'WILAYAH PEMASARAN')
                      ->setCellValue('AP1', 'LOKASI PEMASARAN')
                      ->setCellValue('AQ1', 'JABATAN');
          
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
          $sheet->getColumnDimension('S')->setWidth(20); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(20); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(20); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(15); // Set width kolom NIB
          $sheet->getColumnDimension('W')->setWidth(15); // Set width kolom Nama usaha
          $sheet->getColumnDimension('X')->setWidth(20); // Set width kolom status usaha
          $sheet->getColumnDimension('Y')->setWidth(20); // Set width kolom sertifikasi
          $sheet->getColumnDimension('Z')->setWidth(20); // Set width kolom sektor usaha
          $sheet->getColumnDimension('AA')->setWidth(20); // Set width kolom bidang usaha
          $sheet->getColumnDimension('AB')->setWidth(30); // Set width kolom alamat usaha
          $sheet->getColumnDimension('AC')->setWidth(5); // Set width kolom RT usaha
          $sheet->getColumnDimension('AD')->setWidth(5); // Set width kolom RW usaha
          $sheet->getColumnDimension('AE')->setWidth(25); // Set width kolom Kota usaha
          $sheet->getColumnDimension('AF')->setWidth(25); // Set width kolom Kec usaha
          $sheet->getColumnDimension('AG')->setWidth(25); // Set width kolom kel usaha
          $sheet->getColumnDimension('AH')->setWidth(10); // Set width kolom kodepos usaha
          $sheet->getColumnDimension('AI')->setWidth(10); // Set width kolom modal usaha
          $sheet->getColumnDimension('AJ')->setWidth(20); // Set width kolom nilai modal usaha
          $sheet->getColumnDimension('AK')->setWidth(10); // Set width kolom omzet usaha
          $sheet->getColumnDimension('AL')->setWidth(20); // Set width kolom nilai omzet usaha
          $sheet->getColumnDimension('AM')->setWidth(5); // Set width kolom tenaga kerja laki
          $sheet->getColumnDimension('AN')->setWidth(5); // Set width kolom tenaga kerja cewe
          $sheet->getColumnDimension('AO')->setWidth(25); // Set width kolom wilayah pemasaran
          $sheet->getColumnDimension('AP')->setWidth(30); // Set width kolom lokasi pemasaran
          $sheet->getColumnDimension('AQ')->setWidth(15); // Set width kolom jabatan

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
                           ->setCellValue('S' . $kolom, $pengguna->izin_usaha)
                           ->setCellValue('T' . $kolom, $pengguna->permasalahan)
                           ->setCellValue('U' . $kolom, $pengguna->kebutuhan)
                           ->setCellValueExplicit('V' . $kolom, $pengguna->nib, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('W' . $kolom, $pengguna->nama_usaha)
                           ->setCellValue('X' . $kolom, $pengguna->status_usaha)
                           ->setCellValue('Y' . $kolom, $pengguna->sertifikasi)
                           ->setCellValue('Z' . $kolom, $pengguna->sektor_usaha)
                           ->setCellValue('AA' . $kolom, $pengguna->bidang_usaha)
                           ->setCellValue('AB' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValueExplicit('AC' . $kolom, $pengguna->rt_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AD' . $kolom, $pengguna->rw_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AE' . $kolom, $pengguna->kota_kopukm)
                           ->setCellValue('AF' . $kolom, $pengguna->kec_kopukm)
                           ->setCellValue('AG' . $kolom, $pengguna->kel_kopukm)
                           ->setCellValueExplicit('AH' . $kolom, $pengguna->kodepos_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AI' . $kolom, $pengguna->modal_usaha)
                           ->setCellValueExplicit('AJ' . $kolom, $pengguna->nilai_modalusaha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AK' . $kolom, $pengguna->omzet_usaha)
                           ->setCellValueExplicit('AL' . $kolom, $pengguna->nilai_omzetusaha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AM' . $kolom, $pengguna->jml_tenaga_kerjal, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AN' . $kolom, $pengguna->jml_tenaga_kerjap, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AO' . $kolom, $pengguna->wil_pemasaran)
                           ->setCellValue('AP' . $kolom, $pengguna->lokasi_pemasaran)
                           ->setCellValue('AQ' . $kolom, $pengguna->jabatan);
               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Peserta.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     public function exportukm($kodeunik)
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	

          // $semua_pengguna = $this->export_model->getAll($kodeunik)->result();

          $query = $this->db->query("SELECT 
          a.id                     AS id,
          a.id_pelatihan           AS id_pelatihan,
          a.kodeunik               AS kodeunik,
          a.no_urut                AS no_urut,
          a.no_ktp                 AS no_ktp,
          a.nama_peserta           AS nama_peserta,
          a.tempat_lahir           AS tempat_lahir,
          a.tgl_lahir              AS tgl_lahir,
          a.jk                     AS jk,
          a.status                 AS status,
          a.pendidikan             AS pendidikan,
          a.agama                  AS agama,
          a.alamat                 AS alamat,
          a.rt                     AS rt,
          a.rw                     AS rw,
          d.name                   AS provinsi,
          b.name                   AS kabupaten,
          e.name                   AS kecamatan,
          f.name                   AS kelurahan,
          a.no_telp                AS no_telp,
          a.disabilitas            AS disabilitas,
          a.jabatan                AS jabatan,
          a.nama_kop               AS nama_kop,
          a.nik_koperasi           AS nik_koperasi,
          a.no_badan_hukum         AS no_badan_hukum,
          a.tgl_badan_hukum        AS tgl_badan_hukum,
          a.alamat_kopukm          AS alamat_kopukm,
          a.rt_kopukm              AS rt_kopukm,
          a.rw_kopukm              AS rw_kopukm,
          d.name                   AS prov_kopukm,
          b.name                   AS kota_kopukm,
          e.name                   AS kec_kopukm,
          f.name                   AS kel_kopukm,
          a.kodepos_kopukm         AS kodepos_kopukm,
          a.jml_anggota            AS jml_anggota,
          a.anggota_l              AS anggota_l,
          a.anggota_p              AS anggota_p,
          a.calon_anggota          AS calon_anggota,
          a.bentuk_koperasi        AS bentuk_koperasi,
          a.jenis_koperasi         AS jenis_koperasi,
          a.tipe_koperasi          AS tipe_koperasi,
          a.kelompok_koperasi      AS kelompok_koperasi,
          a.cabang                 AS cabang,
          a.kantor_cabang_pembantu AS kantor_cabang_pembantu,
          a.kantor_kas             AS kantor_kas,
          a.sektor_usaha           AS sektor_usaha,
          a.bidang_usaha           AS bidang_usaha,
          a.jenis_produk           AS jenis_produk,
          a.volume_usaha           AS volume_usaha,
          a.status_usaha           AS status_usaha,
          a.sertifikasi            AS sertifikasi,
          a.wil_pemasaran          AS wil_pemasaran,
          a.nama_usaha             AS nama_usaha,
          a.nib                    AS nib,
          a.jml_tenaga_kerja       AS jml_tenaga_kerja,
          a.jml_tenaga_kerjal      AS jml_tenaga_kerjal,
          a.jml_tenaga_kerjap      AS jml_tenaga_kerjap,
          a.modal_usaha            AS modal_usaha,
          a.nilai_modalusaha       AS nilai_modalusaha,
          a.nilai_modalhutang      AS nilai_modalhutang,
          a.omzet_usaha            AS omzet_usaha,
          a.nilai_omzetusaha       AS nilai_omzetusaha,
          a.nilai_shukoperasi      AS nilai_shukoperasi,
          a.skala_koperasi         AS skala_koperasi,
          a.web_usaha              AS web_usaha,
          a.email_usaha            AS email_usaha,
          a.sosmed_usaha           AS sosmed_usaha,
          a.market_usaha           AS market_usaha,
          a.pengadaan              AS pengadaan,
          a.izin_usaha             AS izin_usaha,
          a.pemasaran              AS pemasaran,
          a.lokasi_pemasaran       AS lokasi_pemasaran,
          a.idebisnis              AS idebisnis,
          a.permasalahan           AS permasalahan,
          a.kebutuhan              AS kebutuhan,
          a.foto                   AS foto,
          a.ktp                    AS ktp,
          c.jenis_pelatihan        AS jenis_pelatihan,
          c.divisi                 AS divisi,
          c.program                AS program,
          c.id                     AS id_pel,
          c.judul_pelatihan        AS judul_pelatihan,
          c.alamat_pelatihan       AS alamat_pelatihan,
          c.kota                   AS kota_pelatihan,
          c.tgl_mulai              AS tgl_mulai,
          c.tgl_akhir              AS tgl_akhir

          FROM tb_data_peserta a 
          JOIN regencies b ON a.kabupaten = b.id 
          JOIN tb_data_pelatihan c ON a.id_pelatihan = c.id
          JOIN provinces d ON a.provinsi = d.id
          JOIN districts e ON a.kecamatan = e.id
          JOIN villages f ON a.kelurahan = f.id
          
          WHERE a.kodeunik=$kodeunik
          ORDER BY no_urut ASC");

          $semua_pengguna = $query->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
          $height = 50;

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO. URUT')
                      ->setCellValue('B1', 'NO. KTP')
                      ->setCellValue('C1', 'NAMA PESERTA')
                      ->setCellValue('D1', 'TEMPAT LAHIR')
                      ->setCellValue('E1', 'TANGGAL LAHIR')
                      ->setCellValue('F1', 'JENIS KELAMIN')
                      ->setCellValue('G1', 'STATUS PERKAWINAN')
                      ->setCellValue('H1', 'PENDIDIKAN TERAKHIR')
                      ->setCellValue('I1', 'AGAMA')
                      ->setCellValue('J1', 'ALAMAT')
                      ->setCellValue('K1', 'RT')
                      ->setCellValue('L1', 'RW')
                      ->setCellValue('M1', 'KELURAHAN')
                      ->setCellValue('N1', 'KECAMATAN')
                      ->setCellValue('O1', 'KABUPATEN')
                      ->setCellValue('P1', 'PROVINSI')
                      ->setCellValue('Q1', 'NO. TELP')
                      ->setCellValue('R1', 'APAKAH ANDA PENYANDANG DISABILITAS')
                      ->setCellValue('S1', 'PERIZINAN USAHA YANG DIMIKI')
                      ->setCellValue('T1', 'PERMSALAHAN YANG DIHADAPI')
                      ->setCellValue('U1', 'KEBUTUHAN DIKLAT/PELATIHAN')
                      ->setCellValue('V1', 'NO. NIB')
                      ->setCellValue('W1', 'NAMA USAHA')
                      ->setCellValue('X1', 'STATUS USAHA')
                      ->setCellValue('Y1', 'SERTIFIKASI USAHA')
                      ->setCellValue('Z1', 'SEKTOR USAHA')
                      ->setCellValue('AA1', 'BIDANG USAHA')
                      ->setCellValue('AB1', 'ALAMAT USAHA')
                      ->setCellValue('AC1', 'RT USAHA')
                      ->setCellValue('AD1', 'RW USAHA')
                      ->setCellValue('AE1', 'KELURAHAN USAHA')
                      ->setCellValue('AF1', 'KECAMATAN USAHA')
                      ->setCellValue('AG1', 'KABUPATEN USAHA')
                      ->setCellValue('AH1', 'KODEPOS USAHA')
                      ->setCellValue('AI1', 'MODAL USAHA PER TAHUN')
                      ->setCellValue('AJ1', 'NILAI MODAL USAHA PER TAHUN')
                      ->setCellValue('AK1', 'OMZET USAHA PER TAHUN')
                      ->setCellValue('AL1', 'NILAI OMZET USAHA PER TAHUN')
                      ->setCellValue('AM1', 'JUMLAH KARYAWAN LAKI-LAKI')
                      ->setCellValue('AN1', 'JUMLAH KARYAWAN PEREMPUAN')
                      ->setCellValue('AO1', 'WILAYAH PEMASARAN')
                      ->setCellValue('AP1', 'LOKASI PEMASARAN')
                      ->setCellValue('AQ1', 'JABATAN PESERTA DI USAHA')
                      ->setCellValue('AR1', 'Lihat FOTO')
                      ->setCellValue('AS1', 'FOTO')
                      ->setCellValue('AT1', 'Lihat KTP')
                      ->setCellValue('AU1', 'KTP');
                      
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom F
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
          $sheet->getColumnDimension('S')->setWidth(20); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(20); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(20); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(15); // Set width kolom NIB
          $sheet->getColumnDimension('W')->setWidth(15); // Set width kolom Nama usaha
          $sheet->getColumnDimension('X')->setWidth(20); // Set width kolom status usaha
          $sheet->getColumnDimension('Y')->setWidth(20); // Set width kolom sertifikasi
          $sheet->getColumnDimension('Z')->setWidth(20); // Set width kolom sektor usaha
          $sheet->getColumnDimension('AA')->setWidth(20); // Set width kolom bidang usaha
          $sheet->getColumnDimension('AB')->setWidth(30); // Set width kolom alamat usaha
          $sheet->getColumnDimension('AC')->setWidth(5); // Set width kolom RT usaha
          $sheet->getColumnDimension('AD')->setWidth(5); // Set width kolom RW usaha
          $sheet->getColumnDimension('AE')->setWidth(25); // Set width kolom Kota usaha
          $sheet->getColumnDimension('AF')->setWidth(25); // Set width kolom Kec usaha
          $sheet->getColumnDimension('AG')->setWidth(25); // Set width kolom kel usaha
          $sheet->getColumnDimension('AH')->setWidth(10); // Set width kolom kodepos usaha
          $sheet->getColumnDimension('AI')->setWidth(10); // Set width kolom modal usaha
          $sheet->getColumnDimension('AJ')->setWidth(20); // Set width kolom nilai modal usaha
          $sheet->getColumnDimension('AK')->setWidth(10); // Set width kolom omzet usaha
          $sheet->getColumnDimension('AL')->setWidth(20); // Set width kolom nilai omzet usaha
          $sheet->getColumnDimension('AM')->setWidth(5); // Set width kolom tenaga kerja laki
          $sheet->getColumnDimension('AN')->setWidth(5); // Set width kolom tenaga kerja cewe
          $sheet->getColumnDimension('AO')->setWidth(25); // Set width kolom wilayah pemasaran
          $sheet->getColumnDimension('AP')->setWidth(30); // Set width kolom lokasi pemasaran
          $sheet->getColumnDimension('AQ')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AR')->setWidth(15); // Set width kolom jabatan

          $kolom = 2;
          $nomor = 1;
          $height = 50;
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
                           ->setCellValue('M' . $kolom, $pengguna->kelurahan)
                           ->setCellValue('N' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('O' . $kolom, $pengguna->kabupaten)
                           ->setCellValue('P' . $kolom, $pengguna->provinsi)
                           ->setCellValueExplicit('Q' . $kolom, $pengguna->no_telp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('R' . $kolom, $pengguna->disabilitas)
                           ->setCellValue('S' . $kolom, $pengguna->izin_usaha)
                           ->setCellValue('T' . $kolom, $pengguna->permasalahan)
                           ->setCellValue('U' . $kolom, $pengguna->kebutuhan)
                           ->setCellValueExplicit('V' . $kolom, $pengguna->nib, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('W' . $kolom, $pengguna->nama_usaha)
                           ->setCellValue('X' . $kolom, $pengguna->status_usaha)
                           ->setCellValue('Y' . $kolom, $pengguna->sertifikasi)
                           ->setCellValue('Z' . $kolom, $pengguna->sektor_usaha)
                           ->setCellValue('AA' . $kolom, $pengguna->bidang_usaha)
                           ->setCellValue('AB' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValueExplicit('AC' . $kolom, $pengguna->rt_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AD' . $kolom, $pengguna->rw_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AE' . $kolom, $pengguna->kel_kopukm)
                           ->setCellValue('AF' . $kolom, $pengguna->kec_kopukm)
                           ->setCellValue('AG' . $kolom, $pengguna->kota_kopukm)
                           ->setCellValueExplicit('AH' . $kolom, $pengguna->kodepos_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AI' . $kolom, str_replace('&lt;', '<',$pengguna->modal_usaha))
                           ->setCellValueExplicit('AJ' . $kolom, $pengguna->nilai_modalusaha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AK' . $kolom, str_replace('&lt;', '<',$pengguna->omzet_usaha))
                           ->setCellValueExplicit('AL' . $kolom, $pengguna->nilai_omzetusaha, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AM' . $kolom, $pengguna->jml_tenaga_kerjal, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AN' . $kolom, $pengguna->jml_tenaga_kerjap, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AO' . $kolom, $pengguna->wil_pemasaran)
                           ->setCellValue('AP' . $kolom, $pengguna->lokasi_pemasaran)
                           ->setCellValue('AQ' . $kolom, $pengguna->jabatan)
                           ->setCellValue('AR' . $kolom, 'Lihat FOTO')
                           ->setCellValue('AT' . $kolom, 'Lihat KTP')
                           ->getRowDimension($kolom)->setRowHeight($height);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/peserta/'.$pengguna->foto));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AR' . $kolom)->setHyperlink($hyperlink);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/ktp/'.$pengguna->ktp));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AT' . $kolom)->setHyperlink($hyperlink);

                         // Jika diinginkan, tambahkan juga gambar
                         if (file_exists('uploads/peserta/'.$pengguna->foto)) {
                         $drawing = new Drawing();
                         $drawing->setName('Foto');
                         $drawing->setDescription('Foto');
                         $drawing->setPath('uploads/peserta/'.$pengguna->foto);
                         $drawing->setHeight(50);
                         $drawing->setCoordinates('AS' . $kolom);
                         $drawing->setWorksheet($spreadsheet->getActiveSheet());
                         }

                         // Jika diinginkan, tambahkan juga gambar
                         if (file_exists('uploads/ktp/'.$pengguna->ktp)) {
                         $ktp = new Drawing();
                         $ktp->setName('KTP');
                         $ktp->setDescription('KTP');
                         $ktp->setPath('uploads/ktp/'.$pengguna->ktp);
                         $ktp->setHeight(50);
                         $ktp->setCoordinates('AU' . $kolom);
                         $ktp->setWorksheet($spreadsheet->getActiveSheet());
                         }

               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Pesertaukm.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     public function cekexport()
     {
          // $semua_pengguna = $this->db->query("select 
          // 'a'.'id'            AS 'id',
          // 'a'.'nama'          AS 'nama',
          // 'b'.'name'          AS 'provinsi' FROM 'tb_data_peserta' 'a' JOIN 'provinces' 'b' WHERE 'a'.'prov' = 'b'.'id'");
          // echo $semua_pengguna;

          $semua_pengguna = $this->db->query("SELECT 
          a.id                     AS id,
          a.id_pelatihan           AS id_pelatihan,
          a.kodeunik               AS kodeunik,
          a.no_urut                AS no_urut,
          a.no_ktp                 AS no_ktp,
          a.nama_peserta           AS nama_peserta,
          a.tempat_lahir           AS tempat_lahir,
          a.tgl_lahir              AS tgl_lahir,
          a.jk                     AS jk,
          a.status                 AS status,
          a.pendidikan             AS pendidikan,
          a.agama                  AS agama,
          a.alamat                 AS alamat,
          a.rt                     AS rt,
          a.rw                     AS rw,
          d.name                   AS provinsi,
          b.name                   AS kabupaten,
          e.name                   AS kecamatan,
          f.name                   AS kelurahan,
          a.no_telp                AS no_telp,
          a.disabilitas            AS disabilitas,
          a.jabatan                AS jabatan,
          a.nama_kop               AS nama_kop,
          a.nik_koperasi           AS nik_koperasi,
          a.no_badan_hukum         AS no_badan_hukum,
          a.tgl_badan_hukum        AS tgl_badan_hukum,
          a.alamat_kopukm          AS alamat_kopukm,
          a.rt_kopukm              AS rt_kopukm,
          a.rw_kopukm              AS rw_kopukm,
          d.name                   AS prov_kopukm,
          b.name                   AS kota_kopukm,
          e.name                   AS kec_kopukm,
          f.name                   AS kel_kopukm,
          a.kodepos_kopukm         AS kodepos_kopukm,
          a.jml_anggota            AS jml_anggota,
          a.anggota_l              AS anggota_l,
          a.anggota_p              AS anggota_p,
          a.calon_anggota          AS calon_anggota,
          a.bentuk_koperasi        AS bentuk_koperasi,
          a.jenis_koperasi         AS jenis_koperasi,
          a.tipe_koperasi          AS tipe_koperasi,
          a.kelompok_koperasi      AS kelompok_koperasi,
          a.cabang                 AS cabang,
          a.kantor_cabang_pembantu AS kantor_cabang_pembantu,
          a.kantor_kas             AS kantor_kas,
          a.sektor_usaha           AS sektor_usaha,
          a.bidang_usaha           AS bidang_usaha,
          a.jenis_produk           AS jenis_produk,
          a.volume_usaha           AS volume_usaha,
          a.status_usaha           AS status_usaha,
          a.sertifikasi            AS sertifikasi,
          a.wil_pemasaran          AS wil_pemasaran,
          a.nama_usaha             AS nama_usaha,
          a.nib                    AS nib,
          a.jml_tenaga_kerja       AS jml_tenaga_kerja,
          a.jml_tenaga_kerjal      AS jml_tenaga_kerjal,
          a.jml_tenaga_kerjap      AS jml_tenaga_kerjap,
          a.modal_usaha            AS modal_usaha,
          a.nilai_modalusaha       AS nilai_modalusaha,
          a.nilai_modalhutang      AS nilai_modalhutang,
          a.omzet_usaha            AS omzet_usaha,
          a.nilai_omzetusaha       AS nilai_omzetusaha,
          a.nilai_shukoperasi      AS nilai_shukoperasi,
          a.skala_koperasi         AS skala_koperasi,
          a.web_usaha              AS web_usaha,
          a.email_usaha            AS email_usaha,
          a.sosmed_usaha           AS sosmed_usaha,
          a.market_usaha           AS market_usaha,
          a.pengadaan              AS pengadaan,
          a.izin_usaha             AS izin_usaha,
          a.pemasaran              AS pemasaran,
          a.lokasi_pemasaran       AS lokasi_pemasaran,
          a.idebisnis              AS idebisnis,
          a.permasalahan           AS permasalahan,
          a.kebutuhan              AS kebutuhan,
          a.foto                   AS foto,
          a.ktp                    AS ktp,
          c.jenis_pelatihan        AS jenis_pelatihan,
          c.divisi                 AS divisi,
          c.program                AS program,
          c.id                     AS id_pel,
          c.judul_pelatihan        AS judul_pelatihan,
          c.alamat_pelatihan       AS alamat_pelatihan,
          c.kota                   AS kota_pelatihan,
          c.tgl_mulai              AS tgl_mulai,
          c.tgl_akhir              AS tgl_akhir

          FROM tb_data_peserta a 
          JOIN regencies b 
          JOIN tb_data_pelatihan c
          JOIN provinces d
          JOIN districts e
          JOIN villages f
          ON a.kabupaten = b.id 
          AND a.id_pelatihan = c.id
          AND a.provinsi = d.id
          AND a.kecamatan = e.id
          AND a.kelurahan = f.id
          
          AND a.kodeunik=202403210947");

          $result = $semua_pengguna->result(); // Ambil hasil query sebagai array
          foreach ($result as $row) {
          echo $row->id . ' ' . $row->nama_peserta . ' ' . $row->provinsi . '<br>';
          }
     }

     public function exportkoperasi($kodeunik)
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	
          // $semua_pengguna = $this->export_model->getAll($kodeunik)->result();      
          
          $query = $this->db->query("SELECT 
          a.id                     AS id,
          a.id_pelatihan           AS id_pelatihan,
          a.kodeunik               AS kodeunik,
          a.no_urut                AS no_urut,
          a.no_ktp                 AS no_ktp,
          a.nama_peserta           AS nama_peserta,
          a.tempat_lahir           AS tempat_lahir,
          a.tgl_lahir              AS tgl_lahir,
          a.jk                     AS jk,
          a.status                 AS status,
          a.pendidikan             AS pendidikan,
          a.agama                  AS agama,
          a.alamat                 AS alamat,
          a.rt                     AS rt,
          a.rw                     AS rw,
          d.name                   AS provinsi,
          b.name                   AS kabupaten,
          e.name                   AS kecamatan,
          f.name                   AS kelurahan,
          a.no_telp                AS no_telp,
          a.disabilitas            AS disabilitas,
          a.jabatan                AS jabatan,
          a.nama_kop               AS nama_kop,
          a.nik_koperasi           AS nik_koperasi,
          a.no_badan_hukum         AS no_badan_hukum,
          a.tgl_badan_hukum        AS tgl_badan_hukum,
          a.alamat_kopukm          AS alamat_kopukm,
          a.rt_kopukm              AS rt_kopukm,
          a.rw_kopukm              AS rw_kopukm,
          d.name                   AS prov_kopukm,
          b.name                   AS kota_kopukm,
          e.name                   AS kec_kopukm,
          f.name                   AS kel_kopukm,
          a.kodepos_kopukm         AS kodepos_kopukm,
          a.jml_anggota            AS jml_anggota,
          a.anggota_l              AS anggota_l,
          a.anggota_p              AS anggota_p,
          a.calon_anggota          AS calon_anggota,
          a.bentuk_koperasi        AS bentuk_koperasi,
          a.jenis_koperasi         AS jenis_koperasi,
          a.tipe_koperasi          AS tipe_koperasi,
          a.kelompok_koperasi      AS kelompok_koperasi,
          a.cabang                 AS cabang,
          a.kantor_cabang_pembantu AS kantor_cabang_pembantu,
          a.kantor_kas             AS kantor_kas,
          a.sektor_usaha           AS sektor_usaha,
          a.bidang_usaha           AS bidang_usaha,
          a.jenis_produk           AS jenis_produk,
          a.volume_usaha           AS volume_usaha,
          a.status_usaha           AS status_usaha,
          a.sertifikasi            AS sertifikasi,
          a.wil_pemasaran          AS wil_pemasaran,
          a.nama_usaha             AS nama_usaha,
          a.nib                    AS nib,
          a.jml_tenaga_kerja       AS jml_tenaga_kerja,
          a.jml_tenaga_kerjal      AS jml_tenaga_kerjal,
          a.jml_tenaga_kerjap      AS jml_tenaga_kerjap,
          a.modal_usaha            AS modal_usaha,
          a.nilai_modalusaha       AS nilai_modalusaha,
          a.nilai_modalhutang      AS nilai_modalhutang,
          a.omzet_usaha            AS omzet_usaha,
          a.nilai_omzetusaha       AS nilai_omzetusaha,
          a.nilai_shukoperasi      AS nilai_shukoperasi,
          a.skala_koperasi         AS skala_koperasi,
          a.web_usaha              AS web_usaha,
          a.email_usaha            AS email_usaha,
          a.sosmed_usaha           AS sosmed_usaha,
          a.market_usaha           AS market_usaha,
          a.pengadaan              AS pengadaan,
          a.izin_usaha             AS izin_usaha,
          a.pemasaran              AS pemasaran,
          a.lokasi_pemasaran       AS lokasi_pemasaran,
          a.idebisnis              AS idebisnis,
          a.permasalahan           AS permasalahan,
          a.kebutuhan              AS kebutuhan,
          a.foto                   AS foto,
          a.ktp                    AS ktp,
          c.jenis_pelatihan        AS jenis_pelatihan,
          c.divisi                 AS divisi,
          c.program                AS program,
          c.id                     AS id_pel,
          c.judul_pelatihan        AS judul_pelatihan,
          c.alamat_pelatihan       AS alamat_pelatihan,
          c.kota                   AS kota_pelatihan,
          c.tgl_mulai              AS tgl_mulai,
          c.tgl_akhir              AS tgl_akhir

          FROM tb_data_peserta a 
          JOIN regencies b ON a.kabupaten = b.id 
          JOIN tb_data_pelatihan c ON a.id_pelatihan = c.id
          JOIN provinces d ON a.provinsi = d.id
          JOIN districts e ON a.kecamatan = e.id
          JOIN villages f ON a.kelurahan = f.id
          
          WHERE a.kodeunik=$kodeunik
          ORDER BY no_urut ASC");

          $semua_pengguna = $query->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
          $height = 50;

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO. URUT')
                      ->setCellValue('B1', 'NO. KTP')
                      ->setCellValue('C1', 'NAMA PESERTA')
                      ->setCellValue('D1', 'TEMPAT LAHIR')
                      ->setCellValue('E1', 'TANGGAL LAHIR')
                      ->setCellValue('F1', 'JENIS KELAMIN')
                      ->setCellValue('G1', 'STATUS PERKAWINAN')
                      ->setCellValue('H1', 'PENDIDIKAN TERAKHIR')
                      ->setCellValue('I1', 'AGAMA')
                      ->setCellValue('J1', 'ALAMAT')
                      ->setCellValue('K1', 'RT')
                      ->setCellValue('L1', 'RW')
                      ->setCellValue('M1', 'KELURAHAN')
                      ->setCellValue('N1', 'KECAMATAN')
                      ->setCellValue('O1', 'KABUPATEN')
                      ->setCellValue('P1', 'PROVINSI')
                      ->setCellValue('Q1', 'NO. TELP')
                      ->setCellValue('R1', 'APAKAH ANDA PENYANDANG DISABILITAS')
                      ->setCellValue('S1', 'PRIZINAN USAHA YANG DIMIKI')
                      ->setCellValue('T1', 'PERMSALAHAN YANG DIHADAPI')
                      ->setCellValue('U1', 'KEBUTUHAN DIKLAT/PELATIHAN')
                      ->setCellValue('V1', 'NIK KOPERASI')
                      ->setCellValue('W1', 'NIB KOPERASI')
                      ->setCellValue('X1', 'NAMA KOPERASI')
                      ->setCellValue('Y1', 'NOMOR BADAN HUKUM')
                      ->setCellValue('Z1', 'TANGGAL BADAN HUKUM')
                      ->setCellValue('AA1', 'ALAMAT KOPERASI')
                      ->setCellValue('AB1', 'RT KOPERASI')
                      ->setCellValue('AC1', 'RW KOPERASI')
                      ->setCellValue('AD1', 'KELURAHAN KOPERASI')
                      ->setCellValue('AE1', 'KECAMATAN KOPERASI')
                      ->setCellValue('AF1', 'KABUPATEN KOPERASI')
                      ->setCellValue('AG1', 'PROVINSI KOPERASI')
                      ->setCellValue('AH1', 'KODEPOS KOPERASI')
                      ->setCellValue('AI1', 'BENTUK KOPERASI')
                      ->setCellValue('AJ1', 'TIPE KOPERASI')
                      ->setCellValue('AK1', 'JENIS KOPERASI')
                      ->setCellValue('AL1', 'KELOMPOK KOPERASI')
                      ->setCellValue('AM1', 'SEKTOR USAHA KOPERASI')
                      ->setCellValue('AN1', 'MODAL USAHA KOPERASI (MODAL SENDIRI)')
                      ->setCellValue('AO1', 'MODAL HUTANG KOPERASI')
                      ->setCellValue('AP1', 'OMZET KOPERASI')
                      ->setCellValue('AQ1', 'SHU KOPERASI TAHUN BERJALAN/31 DESEMBER')
                      ->setCellValue('AR1', 'JUMLAH ANGGOTA LAKI-LAKI')
                      ->setCellValue('AS1', 'JUMLAH ANGGOTA PEREMPUAN')
                      ->setCellValue('AT1', 'JUMLAH CALON ANGGOTA')
                      ->setCellValue('AU1', 'JUMLAH KARYAWAN / PENGELOLA')
                      ->setCellValue('AV1', 'SKALA USAHA KOPERASI')
                      ->setCellValue('AW1', 'LOKASI PEMASARAN')
                      ->setCellValue('AX1', 'CABANG KOPERASI')
                      ->setCellValue('AY1', 'KANTOR CABANG PEMBANTU')
                      ->setCellValue('AZ1', 'KANTOR KAS')
                      ->setCellValue('BA1', 'JABATAN PESERTA DI KOPERASI')
                      ->setCellValue('BB1', 'Lihat FOTO')
                      ->setCellValue('BC1', 'FOTO')
                      ->setCellValue('BD1', 'Lihat KTP')
                      ->setCellValue('BE1', 'KTP');
                      
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom F
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
          $sheet->getColumnDimension('S')->setWidth(20); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(20); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(20); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(15); // Set width kolom NIB
          $sheet->getColumnDimension('W')->setWidth(15); // Set width kolom Nama usaha
          $sheet->getColumnDimension('X')->setWidth(20); // Set width kolom status usaha
          $sheet->getColumnDimension('Y')->setWidth(20); // Set width kolom sertifikasi
          $sheet->getColumnDimension('Z')->setWidth(20); // Set width kolom sektor usaha
          $sheet->getColumnDimension('AA')->setWidth(20); // Set width kolom bidang usaha
          $sheet->getColumnDimension('AB')->setWidth(5); // Set width kolom alamat usaha
          $sheet->getColumnDimension('AC')->setWidth(5); // Set width kolom RT usaha
          $sheet->getColumnDimension('AD')->setWidth(5); // Set width kolom RW usaha
          $sheet->getColumnDimension('AE')->setWidth(25); // Set width kolom Kota usaha
          $sheet->getColumnDimension('AF')->setWidth(25); // Set width kolom Kec usaha
          $sheet->getColumnDimension('AG')->setWidth(25); // Set width kolom kel usaha
          $sheet->getColumnDimension('AH')->setWidth(10); // Set width kolom kodepos usaha
          $sheet->getColumnDimension('AI')->setWidth(10); // Set width kolom modal usaha
          $sheet->getColumnDimension('AJ')->setWidth(20); // Set width kolom nilai modal usaha
          $sheet->getColumnDimension('AK')->setWidth(10); // Set width kolom omzet usaha
          $sheet->getColumnDimension('AL')->setWidth(20); // Set width kolom nilai omzet usaha
          $sheet->getColumnDimension('AM')->setWidth(15); // Set width kolom tenaga kerja laki
          $sheet->getColumnDimension('AN')->setWidth(15); // Set width kolom tenaga kerja cewe
          $sheet->getColumnDimension('AO')->setWidth(15); // Set width kolom wilayah pemasaran
          $sheet->getColumnDimension('AP')->setWidth(15); // Set width kolom lokasi pemasaran
          $sheet->getColumnDimension('AQ')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AR')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AS')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AT')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AU')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AV')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AW')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AX')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AY')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AZ')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BA')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BB')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BC')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BD')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BE')->setWidth(15); // Set width kolom jabatan

          $kolom = 2;
          $nomor = 1;
          $height = 50;
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
                           ->setCellValue('M' . $kolom, $pengguna->kelurahan)
                           ->setCellValue('N' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('O' . $kolom, $pengguna->kabupaten)
                           ->setCellValue('P' . $kolom, $pengguna->provinsi)
                           ->setCellValueExplicit('Q' . $kolom, $pengguna->no_telp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('R' . $kolom, $pengguna->disabilitas)
                           ->setCellValue('S' . $kolom, $pengguna->izin_usaha)
                           ->setCellValue('T' . $kolom, $pengguna->permasalahan)
                           ->setCellValue('U' . $kolom, $pengguna->kebutuhan)
                           ->setCellValueExplicit('V' . $kolom, $pengguna->nik_koperasi, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('W' . $kolom, $pengguna->nib, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('X' . $kolom, $pengguna->nama_kop)
                           ->setCellValue('Y' . $kolom, $pengguna->no_badan_hukum)
                           ->setCellValue('Z' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_badan_hukum)))
                           ->setCellValue('AA' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValueExplicit('AB' . $kolom, $pengguna->rt_kopukm,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AC' . $kolom, $pengguna->rw_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AD' . $kolom, $pengguna->kel_kopukm)
                           ->setCellValue('AE' . $kolom, $pengguna->kec_kopukm)
                           ->setCellValue('AF' . $kolom, $pengguna->kota_kopukm)
                           ->setCellValue('AG' . $kolom, $pengguna->prov_kopukm)
                           ->setCellValueExplicit('AH' . $kolom, $pengguna->kodepos_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AI' . $kolom, $pengguna->bentuk_koperasi)
                           ->setCellValue('AJ' . $kolom, $pengguna->tipe_koperasi)
                           ->setCellValue('AK' . $kolom, $pengguna->jenis_koperasi)
                           ->setCellValue('AL' . $kolom, $pengguna->kelompok_koperasi)
                           ->setCellValue('AM' . $kolom, $pengguna->sektor_usaha)
                           ->setCellValue('AN' . $kolom, $pengguna->nilai_modalusaha)
                           ->setCellValue('AO' . $kolom, $pengguna->nilai_modalhutang)
                           ->setCellValue('AP' . $kolom, $pengguna->nilai_omzetusaha)
                           ->setCellValue('AQ' . $kolom, $pengguna->nilai_shukoperasi)
                           ->setCellValueExplicit('AR' . $kolom, $pengguna->anggota_l, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AS' . $kolom, $pengguna->anggota_p, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AT' . $kolom, $pengguna->calon_anggota, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AU' . $kolom, $pengguna->jml_tenaga_kerja, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AV' . $kolom, $pengguna->skala_koperasi)
                           ->setCellValue('AW' . $kolom, $pengguna->lokasi_pemasaran)
                           ->setCellValue('AX' . $kolom, $pengguna->cabang)
                           ->setCellValue('AY' . $kolom, $pengguna->kantor_cabang_pembantu)
                           ->setCellValue('AZ' . $kolom, $pengguna->kantor_kas)
                           ->setCellValue('BA' . $kolom, $pengguna->jabatan)
                           ->setCellValue('BB' . $kolom, 'Lihat FOTO')
                           ->setCellValue('BD' . $kolom, 'Lihat KTP')
                           ->getRowDimension($kolom)->setRowHeight($height);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/peserta/'.$pengguna->foto));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('BB' . $kolom)->setHyperlink($hyperlink);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/ktp/'.$pengguna->ktp));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('BD' . $kolom)->setHyperlink($hyperlink);

                         // Jika diinginkan, tambahkan juga gambar
                         // if (file_exists('uploads/peserta/'.$pengguna->foto)) {
                         // $drawing = new Drawing();
                         // $drawing->setName('Foto');
                         // $drawing->setDescription('Foto');
                         // $drawing->setPath('uploads/peserta/'.$pengguna->foto);
                         // $drawing->setHeight(50);
                         // $drawing->setCoordinates('BC' . $kolom);
                         // $drawing->setWorksheet($spreadsheet->getActiveSheet());
                         // }

                         // Jika diinginkan, tambahkan juga gambar
                         // if (file_exists('uploads/ktp/'.$pengguna->ktp)) {
                         // $ktp = new Drawing();
                         // $ktp->setName('KTP');
                         // $ktp->setDescription('KTP');
                         // $ktp->setPath('uploads/ktp/'.$pengguna->ktp);
                         // $ktp->setHeight(50);
                         // $ktp->setCoordinates('BE' . $kolom);
                         // $ktp->setWorksheet($spreadsheet->getActiveSheet());
                         // }

               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Pesertakoperasi.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     public function exportpodcast($kodeunik)
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	
          $semua_pengguna = $this->export_model->getAllPodcast($kodeunik)->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
          $height = 50;

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO. URUT')
                      ->setCellValue('B1', 'NAMA PESERTA')
                      ->setCellValue('C1', 'JENIS KELAMIN')
                      ->setCellValue('D1', 'TEMPAT LAHIR')
                      ->setCellValue('E1', 'TANGGAL LAHIR')
                      ->setCellValue('F1', 'AGAMA')
                      ->setCellValue('G1', 'PENDIDIKAN TERAKHIR')
                      ->setCellValue('H1', 'ALAMAT')
                      ->setCellValue('I1', 'RT')
                      ->setCellValue('J1', 'RW')
                      ->setCellValue('K1', 'KELURAHAN')
                      ->setCellValue('L1', 'KECAMATAN')
                      ->setCellValue('M1', 'KABUPATEN')
                      ->setCellValue('N1', 'PROVINSI')
                      ->setCellValue('O1', 'NO. TELP')
                      ->setCellValue('P1', 'STATUS PERKAWINAN')
                      ->setCellValue('Q1', 'APAKAH ANDA PENYANDANG DISABILITAS')
                      ->setCellValue('RQ1', 'JABATAN PESERTA DI USAHA')
                      ->setCellValue('S1', 'NAMA USAHA')
                      ->setCellValue('T1', 'EMAIL USAHA')
                      ->setCellValue('U1', 'MEDIA SOSIAL USAHA')
                      ->setCellValue('V1', 'MARKETPLACE USAHA')
                      ->setCellValue('W1', 'Lihat FOTO')
                      ->setCellValue('X1', 'FOTO');
                      
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(25); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom F
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
          $sheet->getColumnDimension('S')->setWidth(20); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(20); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(20); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(15); // Set width kolom NIB
          $sheet->getColumnDimension('W')->setWidth(15); // Set width kolom Nama usaha
          $sheet->getColumnDimension('X')->setWidth(20); // Set width kolom status usaha

          $kolom = 2;
          $nomor = 1;
          $height = 50;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $pengguna->no_urut)
                         //   ->setCellValue('B' . $kolom, $pengguna->no_ktp)
                           ->setCellValue('B' . $kolom, $pengguna->nama_peserta)
                           ->setCellValue('C' . $kolom, $pengguna->jk)
                           ->setCellValue('D' . $kolom, $pengguna->tempat_lahir)
                           ->setCellValue('E' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_lahir)))
                           ->setCellValue('F' . $kolom, $pengguna->agama)
                           ->setCellValue('G' . $kolom, $pengguna->pendidikan)
                           ->setCellValue('H' . $kolom, $pengguna->alamat)
                           ->setCellValue('I' . $kolom, $pengguna->rt)
                           ->setCellValue('J' . $kolom, $pengguna->rw)
                           ->setCellValue('K' . $kolom, $pengguna->kelurahan)
                           ->setCellValue('L' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('M' . $kolom, $pengguna->kabupaten)
                           ->setCellValue('N' . $kolom, $pengguna->provinsi)
                           ->setCellValueExplicit('O' . $kolom, $pengguna->no_telp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('P' . $kolom, $pengguna->disabilitas)
                           ->setCellValue('Q' . $kolom, $pengguna->jabatan)
                           ->setCellValue('R' . $kolom, $pengguna->nama_usaha)
                           ->setCellValue('S' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValue('T' . $kolom, $pengguna->web_usaha)
                           ->setCellValue('U' . $kolom, $pengguna->email_usaha)
                           ->setCellValue('V' . $kolom, $pengguna->market_usaha)
                           ->setCellValue('W' . $kolom, 'Lihat FOTO')
                           ->getRowDimension($kolom)->setRowHeight($height);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/peserta/'.$pengguna->foto));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('w' . $kolom)->setHyperlink($hyperlink);

                         // Jika diinginkan, tambahkan juga gambar
                         // $drawing = new Drawing();
                         // $drawing->setName('Foto');
                         // $drawing->setDescription('Foto');
                         // $drawing->setPath('uploads/peserta/'.$pengguna->foto);
                         // $drawing->setHeight(50);
                         // $drawing->setCoordinates('x' . $kolom);
                         // $drawing->setWorksheet($spreadsheet->getActiveSheet());


               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Pesertasafaripodcast.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     function cek(){
          $kodeunik = $this->uri->segment(3);
          echo $kodeunik;	
     }

     public function exporttp()
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	
          $semua_pengguna = $this->export_model->getAllTp()->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO')
                      ->setCellValue('B1', 'NAMA')
                      ->setCellValue('C1', 'NIK')
                      ->setCellValue('D1', 'TEMPAT LAHIR')
                      ->setCellValue('E1', 'TANGGAL LAHIR')
                      ->setCellValue('F1', 'JENIS KELAMIN')
                      ->setCellValue('G1', 'EMAIL')
                      ->setCellValue('H1', 'NO. TELP')
                      ->setCellValue('I1', 'ALAMAT')
                      ->setCellValue('J1', 'RT')
                      ->setCellValue('K1', 'RW')
                      ->setCellValue('L1', 'PROVINSI')
                      ->setCellValue('M1', 'KABUPATEN')
                      ->setCellValue('N1', 'KECAMATAN')
                      ->setCellValue('O1', 'KELURAHAN')
                      ->setCellValue('P1', 'PENDIDIKAN')
                      ->setCellValue('Q1', 'JENIS TP')
                      ->setCellValue('R1', 'NO. REKENING')
                      ->setCellValue('S1', 'NO. BPJS')
                      ->setCellValue('T1', 'FOTO')
                      ->setCellValue('U1', 'KTP')
                      ->setCellValue('V1', 'KK')
                      ->setCellValue('W1', 'SKCK')
                      ->setCellValue('X1', 'IJAZAH')
                      ->setCellValue('Y1', 'REKENING')
                      ->setCellValue('Z1', 'BPJS')
                      ->setCellValue('AA1', 'SUKET KOM')
                      ->setCellValue('AB1', 'SUKET KERJA')
                      ->setCellValue('AC1', 'SERTIFIKAT')
                      ->setCellValue('AD1', 'PERNYATAAN')
                      ->setCellValue('AE1', 'WILAYAH KERJA');
          
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(6); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(30); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(20); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom F
          $sheet->getColumnDimension('G')->setWidth(20); // Set width kolom G
          $sheet->getColumnDimension('H')->setWidth(15); // Set width kolom H
          $sheet->getColumnDimension('I')->setWidth(30); // Set width kolom I
          $sheet->getColumnDimension('J')->setWidth(5); // Set width kolom J
          $sheet->getColumnDimension('K')->setWidth(5); // Set width kolom K
          $sheet->getColumnDimension('L')->setWidth(25); // Set width kolom L
          $sheet->getColumnDimension('M')->setWidth(25); // Set width kolom Provinsi
          $sheet->getColumnDimension('N')->setWidth(25); // Set width kolom Kabupaten
          $sheet->getColumnDimension('O')->setWidth(25); // Set width kolom Kecamatan
          $sheet->getColumnDimension('P')->setWidth(15); // Set width kolom Kelurahan
          $sheet->getColumnDimension('Q')->setWidth(15); // Set width kolom NO. telp
          $sheet->getColumnDimension('R')->setWidth(15); // Set width kolom Disabilitas
          $sheet->getColumnDimension('S')->setWidth(18); // Set width kolom Jabatan
          $sheet->getColumnDimension('T')->setWidth(15); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('U')->setWidth(15); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('V')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('W')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('X')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('Y')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('Z')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('AA')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('AB')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('AC')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('AD')->setWidth(15); // Set width kolom RW Kop/UKM
          $sheet->getColumnDimension('AE')->setWidth(20); // Set width kolom RW Kop/UKM

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->nama)
                           ->setCellValueExplicit('C' . $kolom, $pengguna->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)                           
                           ->setCellValue('D' . $kolom, $pengguna->tempat_lahir)
                           ->setCellValue('E' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_lahir)))
                           ->setCellValue('F' . $kolom, $pengguna->jk)
                           ->setCellValue('G' . $kolom, $pengguna->email)
                           ->setCellValueExplicit('H' . $kolom, $pengguna->no_telp,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('I' . $kolom, $pengguna->alamat)
                           ->setCellValueExplicit('J' . $kolom, $pengguna->rt, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('K' . $kolom, $pengguna->rw, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('L' . $kolom, $pengguna->provinsi)
                           ->setCellValue('M' . $kolom, $pengguna->kabkota)
                           ->setCellValue('N' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('O' . $kolom, $pengguna->kelurahan)
                           ->setCellValue('P' . $kolom, $pengguna->pendidikan)
                           ->setCellValue('Q' . $kolom, $pengguna->jenis_tp)
                           ->setCellValue('R' . $kolom, $pengguna->no_rekening)
                           ->setCellValue('S' . $kolom, $pengguna->no_bpjs)
                           ->setCellValue('T' . $kolom, 'Lihat FOTO')
                           ->setCellValue('U' . $kolom, 'Lihat KTP')
                           ->setCellValue('V' . $kolom, 'Lihat KK')
                           ->setCellValue('W' . $kolom, 'Lihat SKCK')
                           ->setCellValue('X' . $kolom, 'Lihat IJAZAH')
                           ->setCellValue('Y' . $kolom, 'Lihat REKENING')
                           ->setCellValue('Z' . $kolom, 'Lihat BPJS')
                           ->setCellValue('AA' . $kolom, 'Lihat SUKET_KOM')
                           ->setCellValue('AB' . $kolom, 'Lihat SUKET_KERJA')
                           ->setCellValue('AC' . $kolom, 'Lihat SERTIFIKAT')
                           ->setCellValue('AD' . $kolom, 'Lihat PERNYATAAN')
                           ->setCellValue('AE' . $kolom, $pengguna->wilayah_kerja);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/tp/foto/'.$pengguna->foto));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('T' . $kolom)->setHyperlink($hyperlink);

                         $ktp = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $ktp->setUrl(site_url('uploads/tp/ktp/'.$pengguna->ktp));
                         $ktp->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('U' . $kolom)->setHyperlink($ktp);

                         $kk = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $kk->setUrl(site_url('uploads/tp/kk/'.$pengguna->kk));
                         $kk->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('V' . $kolom)->setHyperlink($kk);

                         $skck = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $skck->setUrl(site_url('uploads/tp/skck/'.$pengguna->skck));
                         $skck->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('W' . $kolom)->setHyperlink($skck);

                         $ijazah = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $ijazah->setUrl(site_url('uploads/tp/ijazah/'.$pengguna->ijazah));
                         $ijazah->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('X' . $kolom)->setHyperlink($ijazah);

                         $rekening = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $rekening->setUrl(site_url('uploads/tp/rekening/'.$pengguna->rekening));
                         $rekening->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('Y' . $kolom)->setHyperlink($rekening);

                         $bpjs = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $bpjs->setUrl(site_url('uploads/tp/bpjs/'.$pengguna->bpjs));
                         $bpjs->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('Z' . $kolom)->setHyperlink($bpjs);

                         $suket_kom = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $suket_kom->setUrl(site_url('uploads/tp/suket_kom/'.$pengguna->suket_kom));
                         $suket_kom->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AA' . $kolom)->setHyperlink($suket_kom);

                         $suket_kerja = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $suket_kerja->setUrl(site_url('uploads/tp/suket_kerja/'.$pengguna->suket_kerja));
                         $suket_kerja->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AB' . $kolom)->setHyperlink($suket_kerja);

                         $sertifikat = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $sertifikat->setUrl(site_url('uploads/tp/sertifikat/'.$pengguna->sertifikat));
                         $sertifikat->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AC' . $kolom)->setHyperlink($sertifikat);

                         $pernyataan = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $pernyataan->setUrl(site_url('uploads/tp/pernyataan/'.$pengguna->pernyataan));
                         $pernyataan->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('AD' . $kolom)->setHyperlink($pernyataan);

               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="TP.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

     public function exportnarsum()
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	
          $semua_pengguna = $this->export_model->getAllNarsum()->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO')
                      ->setCellValue('B1', 'NIK')
                      ->setCellValue('C1', 'NAMA')
                      ->setCellValue('D1', 'INSTANSI')
                      ->setCellValue('E1', 'JUDUL MATERI')
                      ->setCellValue('F1', 'JENIS KELAMIN')
                      ->setCellValue('G1', 'NO. TELP')
                      ->setCellValue('H1', 'KTP')
                      ->setCellValue('I1', 'NPWP')
                      ->setCellValue('J1', 'CV')
                      ->setCellValue('K1', 'MATERI')
                      ->setCellValue('L1', 'SPT')
                      ->setCellValue('M1', 'REKENING');
          
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(6); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(30); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(20); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom F
          $sheet->getColumnDimension('G')->setWidth(20); // Set width kolom G
          $sheet->getColumnDimension('H')->setWidth(15); // Set width kolom H
          $sheet->getColumnDimension('I')->setWidth(15); // Set width kolom I
          $sheet->getColumnDimension('J')->setWidth(15); // Set width kolom J
          $sheet->getColumnDimension('K')->setWidth(15); // Set width kolom K
          $sheet->getColumnDimension('L')->setWidth(15); // Set width kolom L
          $sheet->getColumnDimension('M')->setWidth(15); // Set width kolom Provinsi

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValueExplicit('B' . $kolom, $pengguna->nik,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('C' . $kolom, $pengguna->nama)                           
                           ->setCellValue('D' . $kolom, $pengguna->instansi)
                           ->setCellValue('E' . $kolom, $pengguna->materi_judul)
                           ->setCellValue('F' . $kolom, $pengguna->jk)
                           ->setCellValueExplicit('G' . $kolom, $pengguna->hp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('H' . $kolom, 'LIHAT KTP')
                           ->setCellValue('I' . $kolom, 'LIHAT NPWP')
                           ->setCellValue('J' . $kolom, 'LIHAT CV')
                           ->setCellValue('K' . $kolom, 'LIHAT MATERI')
                           ->setCellValue('L' . $kolom, 'LIHAT SPT')
                           ->setCellValue('M' . $kolom, 'LIHAT REKENING');

                         $ktp = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $ktp->setUrl(site_url('uploads/narasumber/ktp/'.$pengguna->ktp));
                         $ktp->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('H' . $kolom)->setHyperlink($ktp);

                         $kk = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $kk->setUrl(site_url('uploads/narasumber/npwp/'.$pengguna->npwp));
                         $kk->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('I' . $kolom)->setHyperlink($kk);

                         $skck = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $skck->setUrl(site_url('uploads/narasumber/cv/'.$pengguna->cv));
                         $skck->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('J' . $kolom)->setHyperlink($skck);

                         $ijazah = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $ijazah->setUrl(site_url('uploads/narasumber/materi/'.$pengguna->materi));
                         $ijazah->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('K' . $kolom)->setHyperlink($ijazah);

                         $rekening = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $rekening->setUrl(site_url('uploads/narasumber/spt/'.$pengguna->spt));
                         $rekening->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('L' . $kolom)->setHyperlink($rekening);

                         $bpjs = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $bpjs->setUrl(site_url('uploads/narasumber/rekening/'.$pengguna->rekening));
                         $bpjs->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('M' . $kolom)->setHyperlink($bpjs);

               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="NARASUMBER.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }


     public function exportall()
     {
          check_not_login();
          // $kodeunik = $this->uri->segment(3);	
          $semua_pengguna = $this->export_model->getSemua()->result();

          $spreadsheet = new Spreadsheet;
          // $spreadsheet->getDefaultStyle('B')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
          $height = 50;

          $spreadsheet->getActiveSheet()
                      ->setCellValue('A1', 'NO')
                      ->setCellValue('B1', 'BAGIAN')
                      ->setCellValue('C1', 'KODE KEGIATAN')
                      ->setCellValue('D1', 'KAB/KOTA')
                      ->setCellValue('E1', 'JUDUL KEGIATAN')
                      ->setCellValue('F1', 'TANGGAL KEGIATAN')
                      ->setCellValue('G1', 'TEMPAT KEGIATAN')
                      ->setCellValue('H1', 'NO. URUT')
                      ->setCellValue('I1', 'NO. KTP')
                      ->setCellValue('J1', 'NAMA PESERTA')
                      ->setCellValue('K1', 'TEMPAT LAHIR')
                      ->setCellValue('L1', 'TANGGAL LAHIR')
                      ->setCellValue('M1', 'JENIS KELAMIN')
                      ->setCellValue('N1', 'STATUS PERKAWINAN')
                      ->setCellValue('O1', 'PENDIDIKAN TERAKHIR')
                      ->setCellValue('P1', 'AGAMA')
                      ->setCellValue('Q1', 'ALAMAT')
                      ->setCellValue('R1', 'RT')
                      ->setCellValue('S1', 'RW')
                      ->setCellValue('T1', 'KELURAHAN')
                      ->setCellValue('U1', 'KECAMATAN')
                      ->setCellValue('V1', 'KABUPATEN')
                      ->setCellValue('W1', 'PROVINSI')
                      ->setCellValue('X1', 'NO. TELP')
                      ->setCellValue('Y1', 'APAKAH ANDA PENYANDANG DISABILITAS')
                      ->setCellValue('Z1', 'PRIZINAN USAHA YANG DIMIKI')
                      ->setCellValue('AA1', 'PERMSALAHAN YANG DIHADAPI')
                      ->setCellValue('AB1', 'KEBUTUHAN DIKLAT/PELATIHAN')
                      ->setCellValue('AC1', 'NIK KOPERASI')
                      ->setCellValue('AD1', 'NIB KOPERASI')
                      ->setCellValue('AE1', 'NAMA KOPERASI')
                      ->setCellValue('AF1', 'NOMOR BADAN HUKUM')
                      ->setCellValue('AG1', 'TANGGAL BADAN HUKUM')
                      ->setCellValue('AH1', 'ALAMAT KOPERASI')
                      ->setCellValue('AI1', 'RT KOPERASI')
                      ->setCellValue('AJ1', 'RW KOPERASI')
                      ->setCellValue('AK1', 'KELURAHAN KOPERASI')
                      ->setCellValue('AL1', 'KECAMATAN KOPERASI')
                      ->setCellValue('AM1', 'KABUPATEN KOPERASI')
                      ->setCellValue('AN1', 'PROVINSI KOPERASI')
                      ->setCellValue('AO1', 'KODEPOS KOPERASI')
                      ->setCellValue('AP1', 'BENTUK KOPERASI')
                      ->setCellValue('AQ1', 'TIPE KOPERASI')
                      ->setCellValue('AR1', 'JENIS KOPERASI')
                      ->setCellValue('AS1', 'KELOMPOK KOPERASI')
                      ->setCellValue('AT1', 'SEKTOR USAHA KOPERASI')
                      ->setCellValue('AU1', 'MODAL USAHA KOPERASI (MODAL SENDIRI)')
                      ->setCellValue('AV1', 'MODAL HUTANG KOPERASI')
                      ->setCellValue('AW1', 'OMZET KOPERASI')
                      ->setCellValue('AX1', 'SHU KOPERASI TAHUN BERJALAN/31 DESEMBER')
                      ->setCellValue('AY1', 'JUMLAH ANGGOTA LAKI-LAKI')
                      ->setCellValue('AZ1', 'JUMLAH ANGGOTA PEREMPUAN')
                      ->setCellValue('BA1', 'JUMLAH CALON ANGGOTA')
                      ->setCellValue('BB1', 'JUMLAH KARYAWAN / PENGELOLA')
                      ->setCellValue('BC1', 'SKALA USAHA KOPERASI')
                      ->setCellValue('BD1', 'LOKASI PEMASARAN')
                      ->setCellValue('BE1', 'CABANG KOPERASI')
                      ->setCellValue('BF1', 'KANTOR CABANG PEMBANTU')
                      ->setCellValue('BG1', 'KANTOR KAS')
                      ->setCellValue('BH1', 'JABATAN PESERTA DI KOPERASI')
                      ->setCellValue('BI1', 'Lihat FOTO')
                      ->setCellValue('BJ1', 'Lihat KTP');
                      
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->getColumnDimension('A')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom A
          $sheet->getColumnDimension('C')->setWidth(15); // Set width kolom A
          $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom A
          $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom A
          $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom A
          $sheet->getColumnDimension('G')->setWidth(15); // Set width kolom A
          $sheet->getColumnDimension('H')->setWidth(8); // Set width kolom A
          $sheet->getColumnDimension('I')->setWidth(25); // Set width kolom B
          $sheet->getColumnDimension('J')->setWidth(25); // Set width kolom C
          $sheet->getColumnDimension('K')->setWidth(15); // Set width kolom D
          $sheet->getColumnDimension('L')->setWidth(15); // Set width kolom E
          $sheet->getColumnDimension('M')->setWidth(15); // Set width kolom F
          $sheet->getColumnDimension('N')->setWidth(15); // Set width kolom G
          $sheet->getColumnDimension('O')->setWidth(10); // Set width kolom H
          $sheet->getColumnDimension('P')->setWidth(10); // Set width kolom I
          $sheet->getColumnDimension('Q')->setWidth(30); // Set width kolom J
          $sheet->getColumnDimension('R')->setWidth(5); // Set width kolom K
          $sheet->getColumnDimension('S')->setWidth(5); // Set width kolom L
          $sheet->getColumnDimension('T')->setWidth(15); // Set width kolom Provinsi
          $sheet->getColumnDimension('U')->setWidth(25); // Set width kolom Kabupaten
          $sheet->getColumnDimension('V')->setWidth(25); // Set width kolom Kecamatan
          $sheet->getColumnDimension('W')->setWidth(25); // Set width kolom Kelurahan
          $sheet->getColumnDimension('X')->setWidth(15); // Set width kolom NO. telp
          $sheet->getColumnDimension('Y')->setWidth(15); // Set width kolom Disabilitas
          $sheet->getColumnDimension('Z')->setWidth(20); // Set width kolom Jabatan
          $sheet->getColumnDimension('AA')->setWidth(20); // Set width kolom Alamat Kop/UKM
          $sheet->getColumnDimension('AB')->setWidth(20); // Set width kolom RT Kop/UKM
          $sheet->getColumnDimension('AC')->setWidth(15); // Set width kolom NIB
          $sheet->getColumnDimension('AD')->setWidth(15); // Set width kolom Nama usaha
          $sheet->getColumnDimension('AE')->setWidth(20); // Set width kolom status usaha
          $sheet->getColumnDimension('AF')->setWidth(20); // Set width kolom sertifikasi
          $sheet->getColumnDimension('AG')->setWidth(20); // Set width kolom sektor usaha
          $sheet->getColumnDimension('AH')->setWidth(20); // Set width kolom bidang usaha
          $sheet->getColumnDimension('AI')->setWidth(5); // Set width kolom alamat usaha
          $sheet->getColumnDimension('AJ')->setWidth(5); // Set width kolom RT usaha
          $sheet->getColumnDimension('AK')->setWidth(5); // Set width kolom RW usaha
          $sheet->getColumnDimension('AL')->setWidth(25); // Set width kolom Kota usaha
          $sheet->getColumnDimension('AM')->setWidth(25); // Set width kolom Kec usaha
          $sheet->getColumnDimension('AN')->setWidth(25); // Set width kolom kel usaha
          $sheet->getColumnDimension('AO')->setWidth(10); // Set width kolom kodepos usaha
          $sheet->getColumnDimension('AP')->setWidth(10); // Set width kolom modal usaha
          $sheet->getColumnDimension('AQ')->setWidth(20); // Set width kolom nilai modal usaha
          $sheet->getColumnDimension('AR')->setWidth(10); // Set width kolom omzet usaha
          $sheet->getColumnDimension('AS')->setWidth(20); // Set width kolom nilai omzet usaha
          $sheet->getColumnDimension('AT')->setWidth(15); // Set width kolom tenaga kerja laki
          $sheet->getColumnDimension('AU')->setWidth(15); // Set width kolom tenaga kerja cewe
          $sheet->getColumnDimension('AV')->setWidth(15); // Set width kolom wilayah pemasaran
          $sheet->getColumnDimension('AW')->setWidth(15); // Set width kolom lokasi pemasaran
          $sheet->getColumnDimension('AX')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AY')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('AZ')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BA')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BB')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BC')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BD')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BE')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BF')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BG')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BH')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BI')->setWidth(15); // Set width kolom jabatan
          $sheet->getColumnDimension('BJ')->setWidth(15);

          $kolom = 2;
          $nomor = 1;
          $height = 50;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->getActiveSheet()
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->divisi)
                           ->setCellValue('C' . $kolom, $pengguna->program)
                           ->setCellValue('D' . $kolom, $pengguna->kota_pelatihan)
                           ->setCellValue('E' . $kolom, $pengguna->judul_pelatihan)
                           ->setCellValue('F' . $kolom, $pengguna->tgl_mulai.'sd'.$pengguna->tgl_akhir)
                           ->setCellValue('G' . $kolom, $pengguna->alamat_pelatihan)
                           ->setCellValue('H' . $kolom, $pengguna->no_urut)
                         //   ->setCellValue('B' . $kolom, $pengguna->no_ktp)
                           ->setCellValueExplicit('I' . $kolom, $pengguna->no_ktp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('J' . $kolom, $pengguna->nama_peserta)
                           ->setCellValue('K' . $kolom, $pengguna->tempat_lahir)
                           ->setCellValue('L' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_lahir)))
                           ->setCellValue('M' . $kolom, $pengguna->jk)
                           ->setCellValue('N' . $kolom, $pengguna->status)
                           ->setCellValue('O' . $kolom, $pengguna->pendidikan)
                           ->setCellValue('P' . $kolom, $pengguna->agama)
                           ->setCellValue('Q' . $kolom, $pengguna->alamat)
                           ->setCellValueExplicit('R' . $kolom, $pengguna->rt, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('S' . $kolom, $pengguna->rw, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('T' . $kolom, $pengguna->kelurahan)
                           ->setCellValue('U' . $kolom, $pengguna->kecamatan)
                           ->setCellValue('V' . $kolom, $pengguna->kabupaten)
                           ->setCellValue('W' . $kolom, $pengguna->provinsi)
                           ->setCellValueExplicit('X' . $kolom, $pengguna->no_telp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('Y' . $kolom, $pengguna->disabilitas)
                           ->setCellValue('Z' . $kolom, $pengguna->izin_usaha)
                           ->setCellValue('AA' . $kolom, $pengguna->permasalahan)
                           ->setCellValue('AB' . $kolom, $pengguna->kebutuhan)
                           ->setCellValueExplicit('AC' . $kolom, $pengguna->nik_koperasi, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AD' . $kolom, $pengguna->nib, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AE' . $kolom, $pengguna->nama_kop)
                           ->setCellValue('AF' . $kolom, $pengguna->no_badan_hukum)
                           ->setCellValue('AG' . $kolom, date('d-m-Y',strtotime($pengguna->tgl_badan_hukum)))
                           ->setCellValue('AH' . $kolom, $pengguna->alamat_kopukm)
                           ->setCellValueExplicit('AI' . $kolom, $pengguna->rt_kopukm,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AJ' . $kolom, $pengguna->rw_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AK' . $kolom, $pengguna->kel_kopukm)
                           ->setCellValue('AL' . $kolom, $pengguna->kec_kopukm)
                           ->setCellValue('AM' . $kolom, $pengguna->kota_kopukm)
                           ->setCellValue('AN' . $kolom, $pengguna->prov_kopukm)
                           ->setCellValueExplicit('AO' . $kolom, $pengguna->kodepos_kopukm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('AP' . $kolom, $pengguna->bentuk_koperasi)
                           ->setCellValue('AQ' . $kolom, $pengguna->tipe_koperasi)
                           ->setCellValue('AR' . $kolom, $pengguna->jenis_koperasi)
                           ->setCellValue('AS' . $kolom, $pengguna->kelompok_koperasi)
                           ->setCellValue('AT' . $kolom, $pengguna->sektor_usaha)
                           ->setCellValue('AU' . $kolom, $pengguna->nilai_modalusaha)
                           ->setCellValue('AV' . $kolom, $pengguna->nilai_modalhutang)
                           ->setCellValue('AW' . $kolom, $pengguna->nilai_omzetusaha)
                           ->setCellValue('AX' . $kolom, $pengguna->nilai_shukoperasi)
                           ->setCellValueExplicit('AY' . $kolom, $pengguna->anggota_l, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('AZ' . $kolom, $pengguna->anggota_p, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('BA' . $kolom, $pengguna->calon_anggota, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValueExplicit('BB' . $kolom, $pengguna->jml_tenaga_kerja, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                           ->setCellValue('BC' . $kolom, $pengguna->skala_koperasi)
                           ->setCellValue('BD' . $kolom, $pengguna->lokasi_pemasaran)
                           ->setCellValue('BE' . $kolom, $pengguna->cabang)
                           ->setCellValue('BF' . $kolom, $pengguna->kantor_cabang_pembantu)
                           ->setCellValue('BG' . $kolom, $pengguna->kantor_kas)
                           ->setCellValue('BH' . $kolom, $pengguna->jabatan)
                           ->setCellValue('BI' . $kolom, 'Lihat FOTO')
                           ->setCellValue('BJ' . $kolom, 'Lihat KTP')
                           ->getRowDimension($kolom)->setRowHeight($height);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/peserta/'.$pengguna->foto));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('BI' . $kolom)->setHyperlink($hyperlink);

                         $hyperlink = new \PhpOffice\PhpSpreadsheet\Cell\Hyperlink();
                         $hyperlink->setUrl(site_url('uploads/ktp/'.$pengguna->ktp));
                         $hyperlink->setTooltip('Klik untuk membuka');
                         $spreadsheet->getActiveSheet()->getCell('BJ' . $kolom)->setHyperlink($hyperlink);

                         
               $kolom++;
               $nomor++;

          }          

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="Pesertakoperasi.xlsx"');
          header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }
}