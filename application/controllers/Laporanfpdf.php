<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporanfpdf extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
	function indexx()
	{
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm','Legal');
        $pdf->AddPage();
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
        // $pdf->SetFont('');
        $pdf->Cell(0,7,'B',0,1,'C');
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(10,6,'No',0,0,'C');
        $pdf->Cell(50,6,'Nama Pegawai',0,0,'C');
        $pdf->Cell(70,6,'Alamat',1,0,'C');
        $pdf->Cell(60,6,'Telp',0,1,'C');
        $pdf->SetFont('Times','',10);
        $pegawai = $this->db->get('tb_data_peserta')->result();
        $no=0;
        foreach ($pegawai as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(50,6,$data->nama_peserta,1,0);
            $pdf->Cell(70,6,$data->tempat_lahir,1,0);
            $pdf->Cell(60,6,$data->tgl_lahir,0,1);
        }
        $pdf->Output();
	}

    function cetak(){
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        
        $id_pelatihan=3;
        $peserta = $this->db->get_where('view_peserta', array('id_pelatihan' => 3))->result();
        $pelatihan = $this->db->get_where('tb_data_pelatihan', array('id' => 3))->row_array();
        $tglmulai=new DateTime($pelatihan['tgl_mulai']);
        $tglakhir=new DateTime($pelatihan['tgl_akhir']);
        $pdf = new FPDF('P', 'mm','Legal');
        
        foreach($peserta as $row){
            
            $pdf->AddPage();            
            $pdf->SetMargins(20, 20 ,20);
            $pdf->SetFont('Times','B',14);
            $pdf->Cell(0,5,'',0,1,'C');
            $pdf->Cell(0,6,'BIODATA PESERTA',0,1,'C');
            // $pdf->Cell(0,7,$row->id_pelatihan,0,1,'C');
            // $pdf->Cell(0,7,$row->kodeunik,0,1,'C');
            $pdf->SetFont('Times','',10);
            $pdf->Cell(0,5,'DALAM RANGKA PROGRAM PENINGKATAN KAPASITAS SDM PENGELOLA UKM',0,1,'C');
            $pdf->Cell(0,5,$pelatihan['judul_pelatihan'],0,1,'C');
            $pdf->Cell(0,5,'TANGGAL '.$tglmulai->format("d-m-Y").' S.D '.$tglakhir->format("d-m-Y"),0,1,'C');
            $pdf->Cell(0,5,$pelatihan['alamat_pelatihan'],0,1,'C');
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(0,15,'DATA PESERTA',0,1,'C');
            $pdf->SetFont('Times','',10);
            $pdf->Cell(60,7,'NO. KTP',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->no_ktp,0,1);
            $pdf->Cell(60,7,'NAMA LENGKAP',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->nama_peserta,0,1);
            $tgllahir=new DateTime($row->tgl_lahir);
            $pdf->Cell(60,7,'TEMPAT, TANGGAL LAHIR',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->tempat_lahir.', '.$tgllahir->format("d-m-Y"),0,1);
            $pdf->Cell(60,7,'JENIS KELAMIN',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->jk,0,1);
            $pdf->Cell(60,7,'STATUS PERKAWINAN',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->status,0,1);
            $pdf->Cell(60,7,'PENDIDIKAN TERAKHIR',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->pendidikan,0,1);
            $pdf->Cell(60,7,'AGAMA',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->agama,0,1);
            $pdf->Cell(60,7,'ALAMAT',0,0);
            $pdf->Cell(10,7,':',0,0,'C');
            $pdf->Cell(0,7,$row->alamat,0,1);
            $pdf->Cell(60,7,'KABUPATEN/KOTA',0,0);
            $pdf->Cell(10,7,':',0,0,'C');            
            $pdf->Cell(0,7,$row->kabupaten,0,1);
            $pdf->Cell(60,7,'NO. HP/RUMAH',0,0);
            $pdf->Cell(10,7,':',0,0,'C');            
            $pdf->Cell(0,7,$row->no_telp,0,1);
            $pdf->Cell(60,7,'EMAIL',0,0);
            $pdf->Cell(10,7,':',0,0,'C');            
            $pdf->Cell(0,7,$row->email_usaha,0,1);
            $pdf->Cell(60,7,'JABATAN DI UKM',0,0);
            $pdf->Cell(10,7,':',0,0,'C');            
            $pdf->Cell(0,7,$row->jabatan,0,1);


        }
        
        // $pdf->SetFont('');
        // $pdf->Cell(0,7,'B',0,1,'C');
        // $pdf->SetFont('Times','B',10);
        // $pdf->Cell(10,6,'No',0,0,'C');
        // $pdf->Cell(50,6,'Nama Pegawai',0,0,'C');
        // $pdf->Cell(70,6,'Alamat',1,0,'C');
        // $pdf->Cell(60,6,'Telp',0,1,'C');
        // $pdf->SetFont('Times','',10);
        // $pegawai = $this->db->get('tb_data_peserta')->result();
        // $no=0;
        // foreach ($pegawai as $data){
        //     $no++;
        //     $pdf->Cell(10,6,$no,1,0, 'C');
        //     $pdf->Cell(50,6,$data->nama_peserta,1,0);
        //     $pdf->Cell(70,6,$data->tempat_lahir,1,0);
        //     $pdf->Cell(60,6,$data->tgl_lahir,0,1);
        // }
        $pdf->Output();
    }
}