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
                                </tr>
                            </thead>								
                        </table>
                    </div>
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
                "ajax": '<?php echo site_url('peserta_p/data/'.$this->uri->segment(3)); ?>',
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
                ]

            });
            
        });

    </script>
