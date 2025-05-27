<div class="header-about">
    <div class="container">
        <div class="social-media-icon socmed-for-about shadow-sm">
            <div class="coming-soon-word text-center">
                <h4>UPLOAD DATA PESERTA UMKM</h4>
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

    <form action="<?= site_url('UploadController/uploadExcelUkm/') ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
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
                            echo anchor('Laporan/laporan', 'Kembali', array('class'=>'button2'));
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
                <h4>PESERTA UMKM</h4>
                <h6>Jumlah Peserta : <?=$total?></h6>
                <h6>Laki - Laki : <?=$gendermen?></h6>
                <h6>Perempuan : <?=$genderwoman;?></h6>

            </div>                          
        </div>
    </div>
</div>
<div class="container">
    <div class="button-default">
        <div class="row"> 
            <div class="col-12">
                <!-- <div class="button-default">   
                    <?php
                        echo anchor('export/export2/'.$this->uri->segment(3), 'Export Peserta Fix', array('class'=>'button3'));
                    ?>
                </div>    -->
                <div class="profile-button">
                    <div class="row">
                        <div class="col-6">
                            <select id="filterAsal" class="form-control">
                                <option value="">Semua Kabupaten</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select id="filterTahun" class="form-control">
                                <option value="">Semua Tahun</option>
                            </select>
                        </div>
                    </div>
                </div>
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
                                    <th >NO</th>
                                    <th >NIK</th>
                                    <th >NAMA</th>
                                    <th >ASAL</th>
                                    
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

    var table = $('#list').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('UploadController/data_ukm'); ?>",
            "type": "POST",
            "data": function(d) {
                d.asal = $('#filterAsal').val();
            }
        },
        "columns": [
            {
                "data": null,
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nik" },
            { "data": "nama" },
            { "data": "asal" }
        ]
    });

    // Reload ketika dropdown berubah
    $('#filterAsal').on('change', function () {
        table.ajax.reload();
    });


    </script>

    <script>
        $.ajax({
            url: '<?php echo site_url('UploadController/get_filter_options_ukm'); ?>',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Isi dropdown Asal
                response.asal.forEach(function (item) {
                    $('#filterAsal').append(`<option value="${item}">${item}</option>`);
                });

                // Isi dropdown Tahun
                response.tahun.forEach(function (item) {
                    $('#filterTahun').append(`<option value="${item}">${item}</option>`);
                });
            }
        });

    </script>