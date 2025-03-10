		<!-- about us -->
		<div class="about-us">					

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="header-about">
                    <div class="container">
                        <div class="social-media-icon socmed-for-about shadow-sm">
                            <div class="coming-soon-word text-center">
                                <h4>DATA PESERTA PELATIHAN</h4>
                                <?=$peserta['judul_pelatihan']?> DI <?=$peserta['alamat_pelatihan'];?>
                                <?php
                                $tglmulai = new DateTime($peserta['tgl_mulai']);
                                $tglakhir = new DateTime($peserta['tgl_akhir']);
                                ?>
                                <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
                                <h6>Peserta : <?=$peserta['sasaran'];?></h6>

                            </div>                          
                        </div>
                    </div>
                </div>

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->

            <div class="content">
				<div class="container">
					<div class="row">                        
                        <div class="col-3">
                            <div class="button-default">
                                <?php
                                    // echo anchor('pelatihan/laporan/'.$this->uri->segment(3), 'Laporan', array('class'=>'button'));
                                    if($peserta['sasaran'] == "UKM"){
                                        echo anchor('peserta/add_peserta/'.$this->uri->segment(3), 'Tambah Peserta', array('class'=>'button', 'target'=>'_blank'));
                                    }else if($peserta['sasaran'] == "SAFARI PODCAST"){
                                        echo anchor('peserta/add_peserta_podcast/'.$this->uri->segment(3), 'Tambah Peserta', array('class'=>'button', 'target'=>'_blank'));
                                    }else if($peserta['sasaran'] == "KOPERASI"){
                                        echo anchor('peserta/add_peserta/'.$this->uri->segment(3), 'Tambah Peserta', array('class'=>'button', 'target'=>'_blank'));
                                    }
                                    
                                ?>
                            </div>
                        </div>  
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php
                                    echo anchor('export/export1/'.$this->uri->segment(3), 'Export', array('class'=>'button3'));
                                ?>
                            </div>
                        </div>
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php
                                    // echo anchor('peserta/validasiall/'.$this->uri->segment(3), 'Approve', array('class'=>'button3', 'onclick'=>"return confirm('Apakah Anda yakin ingin memvalidasi semua peserta pelatihan ini?')"));
                                    echo anchor('pelatihan/laporan/'.$this->uri->segment(3), 'Laporan', array('class'=>'button8'));
                                ?>
                            </div>
                        </div>
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php                                    
                                    echo anchor('pelatihan', 'Kembali', array('class'=>'button2'));
                                ?>
                            </div>
                        </div> 
                    </div>

                    <div class="row">                        
                        <div class="col-3">
                            <div class="button-default">
                                <?php
                                    echo anchor('peserta/downloadFoto/'.$this->uri->segment(3), 'Download Foto', array('class'=>'button4'));
                                ?>
                            </div>
                        </div>  
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php
                                if($peserta['sasaran'] == 'UKM'){
                                    echo anchor('laporanfpdf/cetak/'.$this->uri->segment(3), 'Cetak', array('class'=>'button6', 'target'=>'_blank'));
                                }else if($peserta['sasaran'] == 'SAFARI PODCAST'){
                                    echo anchor('laporanfpdf/cetak_podcast/'.$this->uri->segment(3), 'Cetak', array('class'=>'button6', 'target'=>'_blank'));
                                }else if($peserta['sasaran'] == 'KOPERASI'){
                                    echo anchor('peserta/viewdatapeserta/'.$this->uri->segment(3), 'Cetak', array('class'=>'button6'));
                                }
                                    
                                ?>
                            </div>
                        </div>
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php
                                    // echo anchor('peserta/batalvalidasi/'.$this->uri->segment(3), 'UnaApprove', 
                                    // array('class'=>'button5', 'onclick'=>"return confirm('Apakah Anda yakin ingin menghapus semua validasi peserta pelatihan ini?')"));
                                    echo anchor('UploadController/formupload/'.$this->uri->segment(3), 'Upload FIX Peserta', 
                                    array('class'=>'button7'));
                                ?>
                            </div>
                        </div>
                        <div class="col-3">                           
                            <div class="button-default">   
                                <?php
                                    echo anchor('peserta/downloadKtp/'.$this->uri->segment(3), 'Download KTP', array('class'=>'button5'));
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="list">
								<thead class="table-success">
									<tr>
                                        <th >No</th>
										<th style="text-align: center;">Nama Peserta</th>
										<th style="text-align: center;">NIK</th>
                                        <th style="text-align: center;">ASAL</th>
                                        <th style="text-align: center;">No. Telp</th>
										<th >#</th>
                                        <!-- <th >#</th> -->
									</tr>
								</thead>								
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
                </div>
            </div>

            
            

			

	<script>

        // Initialize the DataTable
        $(document).ready(function () {
            $('#list').DataTable({
            	"language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
	            },
                // Enable the searching
                // of the DataTable
                "searching": true,
                "ajax": '<?php echo site_url('peserta/data/'.$this->uri->segment(3)); ?>',
                "order": [[ 0, 'asc' ]],
                "columns": [                    
                    {
                        "data": "no_urut",
                        "width": "20px"
                    },
                    { 
                        "data": "nama_peserta",
                    },
                    { 
                        "data": "nik",
                    },
                    { 
                        "data": "kabupaten",
                    },
                    { 
                        "data": "no_telp",
                        "render": function(data, type, row) {
                        return '<a href="https://wa.me/62' + data + '" target="_blank">' + data + '</a>';
                        }
                    },                                     
                    { 
                        "data": "aksi",
                        "width": "20px",
                        "class": "text-center"
                    },
                    // { 
                    //     "data": "validasi",
                    //     "width": "20px",
                    //     "class": "text-center"
                    // },
                ]

            });
            
        });

    </script>
