		<!-- about us -->
		<div class="about-us">					

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="header-about">
                    <div class="container">
                        <div class="social-media-icon socmed-for-about shadow-sm">
                            <div class="coming-soon-word text-center">
                                <h4>DATA TENAGA PENDAMPING</h4>
                                <!-- <?=$pelatihan['judul_pelatihan']?> DI <?=$pelatihan['alamat_pelatihan'];?>
                                <?php
                                $tglmulai = new DateTime($pelatihan['tgl_mulai']);
                                $tglakhir = new DateTime($pelatihan['tgl_akhir']);
                                ?>
                                <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
                                <h6>Peserta : <?=$pelatihan['sasaran'];?></h6> -->
                                
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
                        <div class="col-6">
                            <div class="button-default">
                                <?php
                                    // echo anchor('narasumber/add/'.$this->uri->segment(3), '<button class="button" target="_blank">Tambah Data</button>');
                                    echo anchor('tp', 'Tambah Data', 'class="button" target="_blank"');

                                ?>
                            </div>
                        </div>  
                        <div class="col-6">                           
                            <div class="button-default">   
                                <?php
                                    echo anchor('tp/viewdatatp', 'Kembali', array('class'=>'button2'));
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
										<th >Nama</th>
                                        <th >Kab/Kota</th>
                                        <th >Telp</th>
										<th >Edit</th>
                                        <th >Lihat</th>
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
                "ajax": '<?php echo site_url('tp/data'); ?>',
                "order": [[ 0, 'asc' ]],
                "columns": [                    
                    {    
                        "data": "",
                        "width": "50px",
                        "class": "text-center",
                        "orderable": true, 
                        "sortable": true,  
                        render: function (data, type, row, meta) {
		                 return meta.row + meta.settings._iDisplayStart + 1;
		                }                     
                    },
                    { 
                        "data": "nama",
                    },
                    { 
                        "data": "kota",
                    },       
                    { 
                        "data": "no_telp",
                    },                  
                    { 
                        "data": "aksi",
                        "width": "20px",
                        "class": "text-center"
                    },
                    { 
                        "data": "lihat",
                        "width": "20px",
                        "class": "text-center"
                    },
                ]

            });
            
        });

        function copyText() {  
            var copyText = document.getElementById("text-copy");  
            copyText.select();  
            document.execCommand("copy");
        }
    </script>
