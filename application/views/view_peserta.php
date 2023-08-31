
		<!-- about us -->
		<div class="about-us">			

			<!-- newsletter -->
			<div class="newsletter bg-lightblue">

				<!-- separator -->
				<div class="separator-medium"></div>
				<!-- end separator -->

				<div class="section-title text-center title-large">
					<h3>DATA PESERTA PELATIHAN</h3>
				</div>

				

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

			</div>
			<!-- end newsletter -->

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->


			<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="list">
								<thead class="table-success">
									<tr>
										<th width="5%">No</th>
										<th width="10%">Tanggal</th>
										<th width="50%">Target</th>
										<th width="50%">Realisasi</th>
										<th width="20%">#</th>
									</tr>
								</thead>								
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

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
                "ajax": '<?php echo site_url('peserta/data'); ?>',
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
                        "data": "kabkota",
                    },
                    { 
                        "data": "namakopukm",
                    },
                    { 
                        "data": "nama_peserta",
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
