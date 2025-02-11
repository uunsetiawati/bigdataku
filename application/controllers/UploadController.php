<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UploadController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // $this->load->database();
        $this->load->library('ssp');
        $this->load->model('pelatihan_m'); // Pastikan Anda membuat model untuk menyimpan data
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    function data($kodeunik)
	{       

        $table = 'view_peserta_fix';
        // Primary key
		$primaryKey = 'id'; // Pastikan menggunakan prefix agar tidak ambigu
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
            array('db' => 'nourut', 'dt' => 'nourut'),
			array('db' => 'kodeunik', 'dt' => 'kodeunik'),
			array('db' => 'nik', 'dt' => 'nik'),
            array('db' => 'nama', 'dt' => 'nama')			
	        
	    );
		$where = "kodeunik='".$kodeunik."'";
        // $join = "JOIN tb_data_peserta b ON a.nik = b.no_ktp";
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
	    );

        // header('Content-Type: application/json');
        //  echo json_encode(
		//      	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		//      );

        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
        );

	}

    public function index()
    {
        // $this->load->view('upload_excel');
        $this->templateadmin->load('template/dashboard', 'peserta/data_peserta_fix2');
    }

    public function formupload($kodeunik)
    {
        $data['pelatihan']=$this->db->get_where('tb_data_pelatihan', array('kodeunik' => $kodeunik))->row_array();
        $data['total']=$this->db->get_where('view_peserta_fix', array('kodeunik'=>$kodeunik))->num_rows();
        $data['gendermen']=$this->db->get_where('view_peserta_fix', array('kodeunik'=>$kodeunik,'jk'=>'LAKI-LAKI'))->num_rows();
		$data['genderwoman']=$this->db->get_where('view_peserta_fix', array('kodeunik'=>$kodeunik,'jk'=>'PEREMPUAN'))->num_rows();
        $this->templateadmin->load('template/dashboard', 'peserta/data_peserta_fix',$data);
    }

    public function uploadExcel($kodeunik)
    {
        $file_mimes = array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            // Pastikan `IOFactory` sudah diimport dan dipanggil di sini
            if ($extension == 'xls') {
                $reader = IOFactory::createReader('Xls');
            } else {
                $reader = IOFactory::createReader('Xlsx');
            }

            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            // $kodeunik=202311170326;
            $now = date('Y-m-d H:i:s');
            // Loop untuk menyimpan data ke database
            foreach ($sheetData as $key => $data) {
                if ($key == 0) continue;
                
                $insert_data = array(
                    'kodeunik' => $kodeunik,
                    'nourut' => $data[0],
                    'nik' => $data[1],
                    'created' => $now,
                );

                $this->pelatihan_m->uploadtData($insert_data);
            }

            // echo "Data berhasil disimpan!";
            redirect('UploadController/formupload/'.$kodeunik);
        } else {
            echo "File tidak sesuai format.";
        }
    }
}
