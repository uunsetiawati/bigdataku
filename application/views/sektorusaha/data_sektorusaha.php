		<!-- about us -->
		<div class="about-us">					

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="header-about">
                    <div class="container">
                        <div class="social-media-icon socmed-for-about shadow-sm">
                            <div class="coming-soon-word text-center">
                                <h4>DATA SEKTOR USAHA</h4>
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
                                    echo anchor('sektorusaha/add', '<button class="butto">Tambah Data</button>');
                                ?>
                            </div>  
                        </div> 
                        <div class="col-6">                           
                            <div class="button-default">   
                                <?php
                                    echo anchor('dashboard', 'Kembali', array('class'=>'button2'));
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
										<th >SEKTOR USAHA</th>
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
                "ajax": '<?php echo site_url('sektorusaha/data'); ?>',
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
                        "data": "nama",
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
