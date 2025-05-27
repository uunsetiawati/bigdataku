<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        // $this->load->database();
        $this->load->library('ssp');
        $this->load->model('pelatihan_m'); // Pastikan Anda membuat model untuk menyimpan data
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        // load helper excel
        $this->load->helper('excel');
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

    function data_koperasi()
	{       

        $table = 'tb_peserta_koperasi';
        // Primary key
		$primaryKey = 'id'; // Pastikan menggunakan prefix agar tidak ambigu
		// list field yang mau ditampilkan
		$columns    = array(
			//tabel db(kolom di database) => dt(nama datatable di view)
			array('db' => 'no_ktp', 'dt' => 'nik'),
			array('db' => 'nama_peserta', 'dt' => 'nama'),
            array('db' => 'kabupaten', 'dt' => 'asal')			
	        
	    );
		// $where = "kodeunik='".$kodeunik."'";
        // $join = "JOIN tb_data_peserta b ON a.nik = b.no_ktp";
        // Buat filter where (pastikan kolom `kabupaten` memang ada)
        
		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
	    );

        // Ambil nilai filter dari POST
        $asal = $this->input->post('asal');

        $where = "";
        if (!empty($asal)) {
            $asal = $this->db->escape_str($asal); // cegah SQL injection
            $where = "kabupaten = '$asal'";
        }
        

        // header('Content-Type: application/json');
        //  echo json_encode(
		//      	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		//      );

        echo json_encode(
            SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns, null, $where)
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

    public function laporan()
    {      

        // Fungsi untuk menghitung jumlah kegiatan berdasarkan keyword
        $countByKeyword = function($keyword,$db) {
            return $this->db->select('DISTINCT tgl_mulai, alamat_kegiatan', false)
                            ->like('judul', $keyword)
                            ->get($db)
                            ->num_rows();
        };

        // Hitung jumlah kegiatan
        $data['pelatihan'] = $countByKeyword('pelatihan','tb_peserta_koperasi');
        $data['webinar']   = $countByKeyword('webinar','tb_peserta_koperasi');
        $data['rapat']     = $countByKeyword('rapat','tb_peserta_koperasi');
        $data['uji']       = $countByKeyword('uji','tb_peserta_koperasi');
        $data['pelatihan_ukm'] = $countByKeyword('pelatihan','tb_peserta_ukm');
        $data['webinar_ukm']   = $countByKeyword('webinar','tb_peserta_ukm');
        $data['rapat_ukm']     = $countByKeyword('rapat','tb_peserta_ukm');
        $data['uji_ukm']       = $countByKeyword('uji','tb_peserta_ukm');
        $data['peserta_rapat']       = $countByKeyword('rapat','tb_peserta_rapat');
        $data['peserta_webinar']       = $countByKeyword('webinar','tb_peserta_rapat');
        $data['peserta_inklusi']       = $countByKeyword('inklusi','tb_peserta_rapat');
        $data['peserta_safari']       = $countByKeyword('safari','tb_peserta_rapat');
        $data['peserta_pembekalan']       = $countByKeyword('pembekalan','tb_peserta_rapat');

        // Fungsi untuk menghitung jumlah kegiatan berdasarkan peserta ukm
        // $data['pelatihan_ukm'] = $this->db->select('tgl_mulai,alamat_kegiatan')
        //                     ->distinct()
        //                     ->like('judul', 'pelatihan') 
        //                     ->order_by('tgl_mulai', 'ASC')
        //                     ->get('tb_peserta_ukm')
        //                     ->num_rows();

        // Data detail pelatihan peserta koperasi
        $data['pel'] = $this->db->select("
                                judul,
                                tgl_mulai,
                                tgl_akhir,
                                alamat_kegiatan,
                                SUM(CASE WHEN jk = 'LAKI-LAKI' THEN 1 ELSE 0 END) AS jumlah_l,
                                SUM(CASE WHEN jk = 'PEREMPUAN' THEN 1 ELSE 0 END) AS jumlah_p,
                                COUNT(*) AS total_peserta
                            ", false)
                            // ->like('judul', 'pelatihan')
                            ->group_by(['judul','tgl_mulai','tgl_akhir','alamat_kegiatan'])
                            ->order_by('tgl_mulai', 'DESC')
                            ->get('tb_peserta_koperasi')
                            ->result();

        // Data detail pelatihan peserta umkm
        $data['pel_ukm'] = $this->db->select("
                                judul,
                                tgl_mulai,
                                tgl_akhir,
                                alamat_kegiatan,
                                SUM(CASE WHEN jk = 'LAKI-LAKI' THEN 1 ELSE 0 END) AS jumlah_l,
                                SUM(CASE WHEN jk = 'PEREMPUAN' THEN 1 ELSE 0 END) AS jumlah_p,
                                COUNT(*) AS total_peserta
                            ", false)
                            // ->like('judul', 'pelatihan')
                            ->group_by(['judul','tgl_mulai','tgl_akhir','alamat_kegiatan'])
                            ->order_by('tgl_mulai', 'DESC')
                            ->get('tb_peserta_ukm')
                            ->result();
        
        // Data detail pelatihan peserta rapat
        $data['rapat'] = $this->db->select("
                                judul,
                                tgl_mulai,
                                tgl_akhir,
                                alamat_kegiatan,
                                SUM(CASE WHEN jk = 'LAKI-LAKI' THEN 1 ELSE 0 END) AS jumlah_l,
                                SUM(CASE WHEN jk = 'PEREMPUAN' THEN 1 ELSE 0 END) AS jumlah_p,
                                COUNT(*) AS total_peserta
                            ", false)
                            // ->like('judul', 'pelatihan')
                            ->group_by(['judul','tgl_mulai','tgl_akhir','alamat_kegiatan'])
                            ->order_by('tgl_mulai', 'DESC')
                            ->get('tb_peserta_rapat')
                            ->result();                    
    
        $tahun_query = $this->db->select("YEAR(tgl_mulai) as tahun", FALSE)
                        ->distinct()
                        ->order_by("tahun", "DESC")
                        ->get("tb_peserta_koperasi")
                        ->result();
        $tahun_query_ukm = $this->db->select("YEAR(tgl_mulai) as tahun", FALSE)
                        ->distinct()
                        ->order_by("tahun", "DESC")
                        ->get("tb_peserta_ukm")
                        ->result();

        $tahun_query_rapat = $this->db->select("YEAR(tgl_mulai) as tahun", FALSE)
                        ->distinct()
                        ->order_by("tahun", "DESC")
                        ->get("tb_peserta_rapat")
                        ->result();

        $nikk = $this->input->post('nikk', true);
        $data['nikk'] = $nikk;
        $nikk = $this->db->escape($nikk); // menambahkan tanda kutip otomatis dan aman

        // $data['peserta'] = $this->db->get_where('tb_peserta_koperasi', ['no_ktp' => $nikk])->result();
        
        // $query = "
        // SELECT 'koperasi' AS sumber, no_ktp, nama_peserta, jk, judul, tgl_mulai, tgl_akhir, alamat_kegiatan
        // FROM tb_peserta_koperasi
        // WHERE no_ktp = ?
        
        // UNION ALL
        
        // SELECT 'ukm' AS sumber, no_ktp, nama_peserta, jk, judul, tgl_mulai, tgl_akhir, alamat_kegiatan
        // FROM tb_peserta_ukm
        // WHERE no_ktp = ?
        
        // ORDER BY tgl_mulai DESC
        // ";

        $sql = "
            SELECT 'koperasi' AS sumber, no_ktp, nama_peserta, jk, judul, tgl_mulai, tgl_akhir, alamat_kegiatan
            FROM tb_peserta_koperasi
            WHERE no_ktp = $nikk

            UNION ALL

            SELECT 'ukm' AS sumber, no_ktp, nama_peserta, jk, judul, tgl_mulai, tgl_akhir, alamat_kegiatan
            FROM tb_peserta_ukm
            WHERE no_ktp = $nikk

            UNION ALL

            SELECT 'rapat' AS sumber, no_ktp, nama_peserta, jk, judul, tgl_mulai, NULL AS tgl_akhir, alamat_kegiatan
            FROM tb_peserta_rapat
            WHERE no_ktp = $nikk

            ORDER BY tgl_mulai DESC
        ";

        $query = $this->db->query($sql);
        $data['peserta'] = $query->result();

        // $data['peserta'] = $this->db->query($query, [$nikk, $nikk])->result();

        $data['tahun_list'] = $tahun_query;
        $data['tahun_list_ukm'] = $tahun_query_ukm;
        $data['tahun_list_rapat'] = $tahun_query_rapat;
        $data['total']=$this->db->get('tb_peserta_koperasi')->num_rows();
        $data['total_ukm']=$this->db->get('tb_peserta_ukm')->num_rows();
        $data['total_rapat']=$this->db->get('tb_peserta_rapat')->num_rows();
        $data['gendermen']=$this->db->get_where('tb_peserta_koperasi', array('jk'=>'LAKI-LAKI'))->num_rows();
		$data['genderwoman']=$this->db->get_where('tb_peserta_koperasi', array('jk'=>'PEREMPUAN'))->num_rows();
        $this->templateadmin->load('template/dashboard', 'laporan/laporan_koperasi',$data);
    }

    public function get_gender_data()
    {
        $asal = $this->input->post('asal');
        $tahun = $this->input->post('tahun');

        $this->db->select('jk, COUNT(*) as total');
        $this->db->from('tb_peserta_koperasi');

        if (!empty($asal)) {
            $this->db->where('kabupaten', $asal);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tgl_mulai)', $tahun);
        }

        $this->db->group_by('jk');
        $query = $this->db->get();

        $result = $query->result();

        // Format untuk chart
        $data = [];
        foreach ($result as $row) {
            $data[$row->jk] = (int)$row->total;
        }

        echo json_encode($data);
    }

    public function get_gender_data_ukm()
    {
        $asal = $this->input->post('asal');
        $tahun = $this->input->post('tahun');

        $this->db->select('jk, COUNT(*) as total');
        $this->db->from('tb_peserta_ukm');

        if (!empty($asal)) {
            $this->db->where('kabupaten', $asal);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tgl_mulai)', $tahun);
        }

        $this->db->group_by('jk');
        $query = $this->db->get();

        $result = $query->result();

        // Format untuk chart
        $data = [];
        foreach ($result as $row) {
            $data[$row->jk] = (int)$row->total;
        }

        echo json_encode($data);
    }

    public function get_gender_data_rapat()
    {
        $asal = $this->input->post('asal');
        $tahun = $this->input->post('tahun');

        $this->db->select('jk, COUNT(*) as total');
        $this->db->from('tb_peserta_rapat');

        if (!empty($asal)) {
            $this->db->where('kabupaten', $asal);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tgl_mulai)', $tahun);
        }

        $this->db->group_by('jk');
        $query = $this->db->get();

        $result = $query->result();

        // Format untuk chart
        $data = [];
        foreach ($result as $row) {
            $data[$row->jk] = (int)$row->total;
        }

        echo json_encode($data);
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

    public function uploadExcelKoperasi()
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
                if ($key == 0) continue; // Lewati baris header

                // Ambil dan konversi tanggal mulai pelatihan dari format d-m-Y ke Y-m-d
                // $tanggal_mulai_raw = $data[2]; // Sesuaikan kolomnya
                // $tanggal_mulai = null;
                $tanggal_mulai = convert_excel_date($data[2]);
                $tanggal_akhir = convert_excel_date($data[3]);
                $tgl_lahir = convert_excel_date($data[8]);
                $tgl_bh = convert_excel_date($data[29]);

                // if (!empty($tanggal_mulai_raw)) {
                //     $parsed_date = DateTime::createFromFormat('d-m-Y', $tanggal_mulai_raw);
                //     if ($parsed_date) {
                //         $tanggal_mulai = $parsed_date->format('Y-m-d');
                //     } else {
                //         // fallback jika tidak sesuai format
                //         $tanggal_mulai = date('Y-m-d', strtotime($tanggal_mulai_raw));
                //     }
                // }

                // // Ambil dan konversi tanggal lahir dari format d-m-Y ke Y-m-d
                // $tanggal_lahir_raw = $data[2]; // Sesuaikan kolomnya
                // $tanggal_lahir = null;

                // if (!empty($tanggal_lahir_raw)) {
                //     $parsed_date = DateTime::createFromFormat('d-m-Y', $tanggal_lahir_raw);
                //     if ($parsed_date) {
                //         $tanggal_lahir = $parsed_date->format('Y-m-d');
                //     } else {
                //         // fallback jika tidak sesuai format
                //         $tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir_raw));
                //     }
                // }
                
                $insert_data = array(
                    
                    'subkegiatan' => $data[0],
                    'judul' => $data[1],
                    'tgl_mulai' => $tanggal_mulai,
                    'tgl_akhir' => $tanggal_akhir,
                    'alamat_kegiatan' => $data[4],
                    'no_ktp' => $data[5],
                    'nama_peserta' => $data[6],
                    'tempat_lahir' => $data[7],
                    'tgl_lahir' => $tgl_lahir,
                    'jk' => $data[9],
                    'status' => $data[10],
                    'pendidikan' => $data[11],
                    'agama' => $data[12],
                    'alamat' => $data[13],
                    'rt' => $data[14],
                    'rw' => $data[15],
                    'kelurahan' => $data[16],
                    'kecamatan' => $data[17],
                    'kabupaten' => $data[18],
                    'provinsi' => $data[19],
                    'no_telp' => $data[20],
                    'disabilitas' => $data[21],
                    'izin_usaha' => $data[22],
                    'permasalahan' => $data[23],
                    'kebutuhan_diklat' => $data[24],
                    'nik_koperasi' => $data[25],
                    'nib_koperasi' => $data[26],
                    'nama_koperasi' => $data[27],
                    'no_bh' => $data[28],
                    'tgl_bh' => $tgl_bh,
                    'alamat_koperasi' => $data[30],
                    'rt_koperasi' => $data[31],
                    'rw_koperasi' => $data[32],
                    'kelurahan_koperasi' => $data[33],
                    'kecamatan_koperasi' => $data[34],
                    'kabupaten_koperasi' => $data[35],
                    'provinsi_koperasi' => $data[36],
                    'kodepos_koperasi' => $data[37],
                    'bentuk_koperasi' => $data[38],
                    'tipe_koperasi' => $data[39],
                    'jenis_koperasi' => $data[40],
                    'kelompok_koperasi' => $data[41],
                    'sektor_koperasi' => $data[42],
                    'modal_koperasi' => $data[43],
                    'modal_hutang' => $data[44],
                    'omzet_koperasi' => $data[45],
                    'shu_koperasi' => $data[46],
                    'jml_anggota_laki' => $data[47],
                    'jml_anggota_perempuan' => $data[48],
                    'jml_calon_anggota' => $data[49],
                    'jml_karyawan' => $data[50],
                    'skala_usaha' => $data[51],
                    'lokasi_pemasaran' => $data[52],
                    'cabang_koperasi' => $data[53],
                    'kantor_cabang_pembantu' => $data[54],
                    'kantor_kas' => $data[55],
                    'jabatan_koperasi' => $data[56],
                    'created' => $now,

                );

                $this->pelatihan_m->uploadtDataKoperasi($insert_data);
            }

            // echo "Data berhasil disimpan!";
            redirect('UploadController/formupload_koperasi/'.$kodeunik);
        } else {
            echo "File tidak sesuai format.";
        }
    }

    public function get_filter_options()
    {
        // Load database jika belum autoload
        // $this->load->database();

        // Ambil data unik dari kolom "asal"
        $asal_query = $this->db->select('kabupaten')
                            ->distinct()
                            ->order_by('kabupaten', 'ASC')
                            ->get('tb_peserta_koperasi')
                            ->result_array();

        // Ambil data unik dari kolom "tahun"
        // $tahun_query = $this->db->select('tahun')
        //                         ->distinct()
        //                         ->order_by('tahun', 'DESC')
        //                         ->get('anggota')
        //                         ->result_array();

        // Ubah ke array 1 dimensi
        $asal = array_column($asal_query, 'kabupaten');
        // $tahun = array_column($tahun_query, 'tahun');

        // Kirim sebagai JSON
        echo json_encode([
            'asal' => $asal
            // 'tahun' => $tahun
        ]);
    }

    public function search($id = null)
    {
        $nikk = $this->input->post('nikk', true);

        $data['peserta'] = $this->db->get_where('tb_peserta_koperasi', ['no_ktp' => $nikk])->result();
        $data['nikk'] = $nikk;

        // $this->load->view('peserta/form_pencarian', $data);
        $this->templateadmin->load('template/dashboard', 'laporan/laporan_koperasi',$data);
        // redirect('laporan/laporan');
    }


}
