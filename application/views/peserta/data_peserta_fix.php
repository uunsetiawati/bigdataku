<div class="header-about">
    <div class="container">
        <div class="social-media-icon socmed-for-about shadow-sm">
            <div class="coming-soon-word text-center">
                <h4>UPLOAD DATA PESERTA PELATIHAN</h4>
                <?=$pelatihan['judul_pelatihan']?> DI <?=$pelatihan['alamat_pelatihan'];?>
                <?php
                $tglmulai = new DateTime($pelatihan['tgl_mulai']);
                $tglakhir = new DateTime($pelatihan['tgl_akhir']);
                ?>
                <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
                <h6>Peserta : <?=$pelatihan['sasaran'];?></h6>

            </div>                          
        </div>
    </div>
</div>

<?php $this->load->view('_FlashAlert/flash_alert') ?>



<div class="container">
    <div class="button-default">
        <!-- <a href="uploads/file/uploadexcel.xlsx" class="button4">Download Template Excel</a> -->
            <?php
        echo anchor('uploads/file/uploadexcel.xlsx', 'Download Template Excel', array('class'=>'button4'));
        ?>
    </div>

    <hr>

    <form action="<?= site_url('UploadController/uploadExcel/'.$this->uri->segment('3')) ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
    <?php 
    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    $now = date('Y-m-d H:i:s');
    ?>
    <?=form_hidden('now',$now);?>
    <?=form_hidden('kodeunik',$this->uri->segment(3));?>
        <div class="form-wrapper">				
            
            <div class="input-wrap">
                <label class="col-form-label">UPLOAD EXCEL<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 10MB | xls,xlsx)</h7></label>
                <input type="file" name="file" class="form-control <?= (form_error('excel') == "" ? '':'is-invalid') ?>" accept=".xls,.xlsx" required>
                <?php echo form_error('excel'); ?>
            </div>
            <div class="row">                        
                <div class="col-6">
                    <div class="button-default">
                        <button type="submit" name="simpan" class="button">Simpan</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="button-default">   
                        <?php
                            echo anchor('peserta/viewdatapeserta/'.$this->uri->segment(3), 'Kembali', array('class'=>'button2'));
                        ?>
                    </div>   
                </div> 
            </div>        
        </div>
    </form>	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<div class="header-about">
    <div class="container">
        <div class="social-media-icon socmed-for-about shadow-sm">
            <div class="coming-soon-word text-center">
                <h4>PESERTA PELATIHAN</h4>
                <h6>Jumlah Peserta : <?=$total?></h6>
                <h6>Laki - Laki : <?=$gendermen?></h6>
                <h6>Perempuan : <?=$genderwoman;?></h6>

            </div>                          
        </div>
    </div>
</div>

<!-- separator -->
<div class="separator-large"></div>
    <!-- end separator -->

    <div class="content">
        <div class="container">
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="list">
                            <thead class="table-success">
                                <tr>
                                    <th >No. Urut</th>
                                    <th >Kodeunik</th>
                                    <th >NIK</th>
                                    <th >NAMA</th>
                                    
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
                "ajax": '<?php echo site_url('UploadController/data/'.$this->uri->segment(3)); ?>',
                "order": [[ 0, 'asc' ]],
                "columns": [                    
                    {    
                        "data": "nourut",
                        // "width": "50px",
                        // "class": "text-center",
                        // "orderable": true, 
                        // "sortable": true,  
                        // render: function (data, type, row, meta) {
		                //  return meta.row + meta.settings._iDisplayStart + 1;
		                // }                     
                    },
                    { 
                        "data": "kodeunik",
                    },
                    { 
                        "data": "nik",
                    },
                    { 
                        "data": "nama",
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