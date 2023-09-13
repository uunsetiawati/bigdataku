		<!-- about us -->
		<div class="about-us">					

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="header-about">
                    <div class="container">
                        <div class="social-media-icon socmed-for-about shadow-sm">
                            <div class="coming-soon-word text-center">
                                <h4>DATA PELATIHAN</h4>
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
                            <?php
                                echo anchor('pelatihan/add', '<button class="button button-fill button-small">Tambah Data</button>');
                            ?>
                        </div>                                                                                      
                    </div>
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="list">
								<thead class="table-success">
									<tr>
										<th >No</th>
										<th >Judul</th>
                                        <th >Kode Program</th>
										<th >KAB/KOTA</th>
										<th >Jenis Pelatihan</th>
                                        <th >Mulai</th>
                                        <th >Akhir</th>
										<th >Aksi</th>
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
                "ajax": '<?php echo site_url('pelatihan/data'); ?>',
                "order": [[ 0, 'asc' ]],
                "columns": [                    
                    {    
                        "data": null,
                        "width": "50px",
                        "class": "text-center",
                        "orderable": true, 
                        "sortable": true,  
                        render: function (data, type, row, meta) {
		                 return meta.row + meta.settings._iDisplayStart + 1;
		                }                     
                    },
                    { 
                        "data": "judul",
                    },
                    { 
                        "data": "program",
                    },
                    { 
                        "data": "alamat",
                    },
                    { 
                        "data": "jenis",
                    }, 
                    { 
                        "data": "tanggalmulai",
                        "render": function (data) {
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            return date.getDate() + "-" + (month.toString().length > 1 ? month : "0" + month) + "-" +  date.getFullYear();
                        }
                    }, 
                    { 
                        "data": "tanggalakhir",
                        "render": function (data) {
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            return date.getDate() + "-" + (month.toString().length > 1 ? month : "0" + month) + "-" +  date.getFullYear();
                        }
                    },                    
                    { 
                        "data": "aksi",
                        "width": "80px",
                        "class": "text-center"
                    },
                ]

            });
            
        });
    </script>
