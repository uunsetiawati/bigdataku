<!-- pages wrapper -->
<!-- <div class="pages-wrapper"> -->

<!-- separator -->
<!-- <div class="separator-large"></div> -->
<!-- end separator -->

<!-- profile -->
<div class="profile">
    <div class="container">        
        <div class="row">
            <div class="col-4 align-self-center">
                <div class="content statistic text-right">
                    
                </div>
            </div>
            <div class="col-4">
                <div class="header-profile">
                    <div class="container">
                        <img src="<?=base_url('assets/images/logoupt.png')?>" alt="image-demo">
                    </div>
                </div>
            </div>
            <div class="col-4 align-self-center">
                <div class="content statistic text-left">
                    
                </div>
            </div>
        </div>
           
        <div class="row">
            <div class="col-4 align-self-center">
                <div class="content statistic text-right">
                    <h4><?= $total?></h4>
                    <span class="text-small">KOPERASI</span>
                </div>
            </div>
            <div class="col-4">
                <div class="content statistic text-center">                    
                    <h4><?= $total_ukm?></h4>
                    <span class="text-small">UMKM</span>
                </div>
            </div>
            <div class="col-4 align-self-center">
                <div class="content statistic text-left">
                    <h4><?=$total_rapat?></h4>
                    <span class="text-small">RAPAT</span>
                </div>
            </div>
        </div>

        <div class="profile-title text-center">
            <h4>DATA PESERTA PELATIHAN & WEBINAR</h4>
            <span class="text-small">UPT Pelatihan Koperasi dan UKM Jatim</span>
        </div> 

        <hr>   

        <!-- separator -->
        <div class="separator-small"></div>
        <!-- end separator -->

        <ul class="nav nav-fill nav-default" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="ports-tab" data-toggle="tab" href="#ports" role="tab" aria-controls="ports" aria-selected="true">KOPERASI</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link active" id="collection-tab" data-toggle="tab" href="#collection" role="tab" aria-controls="collection" aria-selected="false">UMKM</a> -->
                <a class="nav-link" id="collection-tab" data-toggle="tab" href="#collection" role="tab" aria-controls="collection" aria-selected="false">UMKM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="rapat-tab" data-toggle="tab" href="#rapat" role="tab" aria-controls="rapat" aria-selected="false">RAPAT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cari-tab" data-toggle="tab" href="#cari" role="tab" aria-controls="cari" aria-selected="false">CARI</a>
            </li>
        </ul>

        <!-- separator -->
        <div class="separator-large"></div>
        <!-- end separator -->

        <div class="tab-content">
            <div class="tab-pane" id="ports" role="tabpanel" aria-labelledby="ports-tab">
                <div class="profile-button">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?=site_url('Export/export_koperasi')?>" class="button3">EXPORT</a>
                        </div>
                        <div class="col-6">
                            <a href="<?=site_url('UploadController/formupload_koperasi')?>" class="button6">IMPORT</a>
                        </div>
                    </div>
                </div>
                <!-- separator -->
                <div class="separator-small"></div>
                <!-- end separator -->
                <div class="container">
                    <div class="button-default">
                        <div class="row"> 
                            <div class="col-12">
                                <div class="profile-button">
                                    <div class="row">
                                        <div class="col-6">
                                            <select id="filterKabupaten" class="form-control">
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
                <div class="separator-small"></div>
                <!-- end separator -->

                <div class="row">
                    <div class="col-6">
                        <div class="img-caption">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- <div class="img-caption">
                            <h5 class="mb-1">Detail Kab / Kota</h5>
                            <span class="text-small">Kabupaten bangkalan: L = | P = </span><br>
                            <span class="text-small">Kabupaten Malang: L = | P = </span>
                        </div> -->
                        <div class="img-caption">
                            <h5 class="mb-1">Kabupaten: <span id="captionKabupaten">semua kabupaten</span></h5>
                            <span class="text-small">Laki-laki: <span id="captionLaki">0</span></span><br>
                            <span class="text-small">Perempuan: <span id="captionPerempuan">0</span></span><br>
                            <span class="text-small">Total : <span id="total"><?=$total?></span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="img-caption">
                            <h5 class="mb-1">Jumlah Pelatihan</h5>
                            <span class="text-small">Pelatihan: <span><?=$pelatihan?></span></span><br>
                            <span class="text-small">Uji Kompetensi /SKKNI: <span><?=$uji?></span></span><br>
                            <!-- <span class="text-small">Rapat: <span id="captionPerempuan"><?=$rapat?></span></span> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="img-caption">
                            <!-- <h5 class="mb-1">Red Apple</h5>
                            <span class="text-small">Feb 05, 2020</span> -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- <div class="col-6">
                        <img src="images/vertical3.jpg" alt="image-demo">
                        <h5 class="mb-1">Pelatihan</h5>
                        <?php foreach($pel as $row):
                            ?>
                        <div class="img-caption">                            
                            <span class="text-small">Judul : <?=$row->judul?></span></br>
                            <span class="text-small">Tanggal : <?=$row->tgl_mulai?></span></br>
                            <span class="text-small">Tempat : <?=$row->tgl_akhir?></span></br>
                            <span class="text-small">Laki - Laki : </span></br>
                            <span class="text-small">Perempuan : </span>                            
                        </div>
                        <?php endforeach;?>
                    </div> -->
                    
                    <div class="col-12">
                        <!-- <img src="images/vertical4.jpg" alt="image-demo"> -->
                        <div class="img-caption">
                            <h5 class="mb-1">Data Pelatihan Koperasi</h5>
                            <hr>
                            <div class="col-12">
                                <select id="filterTahunTabel" class="form-control">
                                    <option value="">Semua Tahun</option>
                                    <?php foreach ($tahun_list as $th): ?>
                                        <option value="<?= $th->tahun ?>"><?= $th->tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- separator -->
                            <div class="separator-small"></div>
                            <!-- end separator -->
                            <div class="table-responsive">
                                <table id="tabelKegiatan" border="1" cellpadding="5" cellspacing="0" width="100%" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Tempat</th>
                                            <th>Laki-Laki</th>
                                            <th>Perempuan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($pel as $row): ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $row->judul ?></td>
                                            <td><?= date('d-m-Y', strtotime($row->tgl_mulai)) ?></td>
                                            <td><?= date('d-m-Y', strtotime($row->tgl_akhir)) ?></td>
                                            <td><?= $row->alamat_kegiatan ?></td>
                                            <td><?= isset($row->jumlah_l) ? $row->jumlah_l : '-' ?></td>
                                            <td><?= isset($row->jumlah_p) ? $row->jumlah_p : '-' ?></td>
                                            <td><?= isset($row->total_peserta) ? $row->total_peserta : '-' ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                </div>                
            </div>
            <!-- <div class="tab-pane show active" id="collection" role="tabpanel" aria-labelledby="collection-tab"> -->
            <div class="tab-pane" id="collection" role="tabpanel" aria-labelledby="collection-tab">
                <div class="collection">
                    <div class="profile-button">
                        <div class="row">
                            <div class="col-6">
                                <a href="<?=site_url('Export/export_ukm')?>" class="button4">EXPORT</a>
                            </div>
                            <div class="col-6">
                                <a href="<?=site_url('UploadController/formupload_ukm')?>" class="button7">IMPORT</a>
                            </div>
                        </div>
                    </div>
                    <!-- separator -->
                    <div class="separator-small"></div>
                    <!-- end separator -->
                    <div class="container">
                        <div class="button-default">
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="profile-button">
                                        <div class="row">
                                            <div class="col-6">
                                                <select id="filterKabupatenUkm" class="form-control">
                                                    <option value="">Semua Kabupaten</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select id="filterTahunUkm" class="form-control">
                                                    <option value="">Semua Tahun</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- separator -->
                <div class="separator-small"></div>
                <!-- end separator -->

                <div class="collection">
                    <div class="row">
                        <div class="col-6">
                            <div class="img-caption">
                                <canvas id="myChartUkm" style="width:100%;max-width:600px"></canvas>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="img-caption">
                                <h5 class="mb-1">Kabupaten: <span id="captionKabupatenUkm">semua kabupaten</span></h5>
                                <span class="text-small">Laki-laki: <span id="captionLakiUkm">0</span></span><br>
                                <span class="text-small">Perempuan: <span id="captionPerempuanUkm">0</span></span><br>
                                <span class="text-small">Total : <span id="total"><?=$total_ukm?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="img-caption">
                                <h5 class="mb-1">Jumlah Pelatihan Peserta UKM</h5>
                                <span class="text-small">Pelatihan: <span><?=$pelatihan_ukm?></span><br>
                                <span class="text-small">Uji Kompetensi / SKKNI: <span><?=$uji_ukm?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="img-caption">
                                <!-- <h5 class="mb-1">Red Apple</h5>
                                <span class="text-small">Feb 05, 2020</span> -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <!-- <img src="images/vertical4.jpg" alt="image-demo"> -->
                            <div class="img-caption">
                                <h5 class="mb-1">Data Pelatihan UKM</h5>
                                <hr>
                                <div class="col-12">
                                    <select id="filterTahunTabelUkm" class="form-control">
                                        <option value="">Semua Tahun</option>
                                        <?php foreach ($tahun_list_ukm as $th): ?>
                                            <option value="<?= $th->tahun ?>"><?= $th->tahun ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- separator -->
                                <div class="separator-small"></div>
                                <!-- end separator -->
                                <div class="table-responsive">
                                    <table id="tabelKegiatanUkm" border="1" cellpadding="5" cellspacing="0" width="100%" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Tempat</th>
                                                <th>Laki-Laki</th>
                                                <th>Perempuan</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach ($pel_ukm as $row): ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $row->judul ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tgl_mulai)) ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tgl_akhir)) ?></td>
                                                <td><?= $row->alamat_kegiatan ?></td>
                                                <td><?= isset($row->jumlah_l) ? $row->jumlah_l : '-' ?></td>
                                                <td><?= isset($row->jumlah_p) ? $row->jumlah_p : '-' ?></td>
                                                <td><?= isset($row->total_peserta) ? $row->total_peserta : '-' ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="rapat" role="tabpanel" aria-labelledby="rapat-tab">
                <div class="collection">
                    <div class="profile-button">
                        <div class="row">
                            <div class="col-6">
                                <a href="<?=site_url('Export/export_rapat')?>" class="button2">EXPORT</a>
                            </div>
                            <div class="col-6">
                                <a href="<?=site_url('UploadController/formupload_rapat')?>" class="button">IMPORT</a>
                            </div>
                        </div>
                    </div>
                    <!-- separator -->
                    <div class="separator-small"></div>
                    <!-- end separator -->
                    <div class="container">
                        <div class="button-default">
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="profile-button">
                                        <div class="row">
                                            <div class="col-6">
                                                <select id="filterKabupatenRapat" class="form-control">
                                                    <option value="">Semua Kabupaten</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select id="filterTahunRapat" class="form-control">
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
                    <div class="separator-small"></div>
                    <!-- end separator -->

                    <div class="collection">
                        <div class="row">
                            <div class="col-6">
                                <div class="img-caption">
                                    <canvas id="myChartRapat" style="width:100%;max-width:600px"></canvas>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-caption">
                                    <h5 class="mb-1">Kabupaten: <span id="captionKabupatenRapat">semua kabupaten</span></h5>
                                    <span class="text-small">Laki-laki: <span id="captionLakiRapat">0</span></span><br>
                                    <span class="text-small">Perempuan: <span id="captionPerempuanRapat">0</span></span><br>
                                    <span class="text-small">Total : <span id="total"><?=$total_rapat?></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="img-caption">
                                    <h5 class="mb-1">Jumlah Peserta</h5>
                                    <span class="text-small">Rapat: <span><?=$peserta_rapat?></span><br>
                                    <span class="text-small">Webinar: <span><?=$peserta_webinar?></span><br>
                                    <span class="text-small">Inklusi: <span><?=$peserta_inklusi?></span><br>
                                    <span class="text-small">Safari Podcast: <span><?=$peserta_safari?></span><br>
                                    <span class="text-small">Pembekalan: <span><?=$peserta_pembekalan?></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="img-caption">
                                    <!-- <h5 class="mb-1">Red Apple</h5>
                                    <span class="text-small">Feb 05, 2020</span> -->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <!-- <img src="images/vertical4.jpg" alt="image-demo"> -->
                                <div class="img-caption">
                                    <h5 class="mb-1">Data Rapat | Webinar | Inklusi | Safari Podcast</h5>
                                    <hr>
                                    <div class="col-12">
                                        <select id="filterTahunTabelRapat" class="form-control">
                                            <option value="">Semua Tahun</option>
                                            <?php foreach ($tahun_list_rapat as $th): ?>
                                                <option value="<?= $th->tahun ?>"><?= $th->tahun ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- separator -->
                                    <div class="separator-small"></div>
                                    <!-- end separator -->
                                    <div class="table-responsive">
                                        <table id="tabelKegiatanRapat" border="1" cellpadding="5" cellspacing="0" width="100%" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Tempat</th>
                                                    <th>Laki-Laki</th>
                                                    <th>Perempuan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($rapat as $row): 
                                                // if (!$row->tgl_akhir) continue; // Lewati baris jika tgl_akhir kosong/null
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $row->judul ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row->tgl_mulai)) ?></td>
                                                    <td><?= !empty($row->tgl_akhir) && $row->tgl_akhir != '0000-00-00' ? date('d-m-Y', strtotime($row->tgl_akhir)) : '' ?></td>
                                                    <td><?= $row->alamat_kegiatan ?></td>
                                                    <td><?= isset($row->jumlah_l) ? $row->jumlah_l : '-' ?></td>
                                                    <td><?= isset($row->jumlah_p) ? $row->jumlah_p : '-' ?></td>
                                                    <td><?= isset($row->total_peserta) ? $row->total_peserta : '-' ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="cari" role="tabpanel" aria-labelledby="cari-tab">
                <form action="<?= site_url('Laporan/laporan/'.$this->uri->segment(3)) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">
                    <div class="form-wrapper">	
                        <div class="input-wrap">
                            <label class="col-form-label">CARI NIK PESERTA<span class="section-subtitle"><code>*</code></span></label>				
                            <input type="number" name="nikk" placeholder="NIK / NO. KTP" value="<?= set_value('nikk'); ?>" class="form-control <?= (form_error('nikk') == "" ? '':'is-invalid') ?>">
                            <?= form_error('nikk'); ?>
                        </div> 
                    </div>
                    <button class="button button-fill button-rounded">Cari</button>
                </form>
                <?php if (!empty($peserta)): ?>
                    <div class="table-responsive mt-4">
                        <div class="alert alert-warning mt-3">
                            Hasil pencarian untuk NIK: <strong><?= $nikk ?></strong>
                        </div><br>
                        <!-- <h5>Hasil pencarian untuk NIK: <strong><?= $nikk ?></strong></h5> -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Alamat Kegiatan</th>
                                    <!-- tambahkan kolom lain jika perlu -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($peserta as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->no_ktp ?></td>
                                        <td><?= $row->nama_peserta ?></td>
                                        <td><?= $row->jk ?></td>
                                        <td><?= $row->judul ?></td>
                                        <td><?= date('d-m-Y', strtotime($row->tgl_mulai)) ?></td>
                                        <td><?= date('d-m-Y', strtotime($row->tgl_akhir)) ?></td>
                                        <td><?= $row->alamat_kegiatan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php elseif (isset($nikk)): ?>
                    <div class="alert alert-warning mt-3">
                        Tidak ada data ditemukan untuk NIK: <strong><?= $nikk ?></strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!-- end profile -->

<!-- <script>
    var xValues = ["Laki-Laki", "Perempuan"];
    var yValues = [<?= $gendermen?>, <?= $genderwoman?>];
    var barColors = [    
    "#00aba9",    
    "#b91d47",
    ];

    new Chart("myChart", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        title: {
        display: true,
        text: "Perbandingan Gender Koperasi"
        }
    }
    });
</script> -->

<script>
    function loadGenderChart(asal, tahun) {
        $.ajax({
            url: "<?php echo site_url('Laporan/get_gender_data'); ?>",
            type: "POST",
            data: {
                asal: asal,
                tahun: tahun
            },
            dataType: "json",
            success: function(response) {
                let labels = [];
                let data = [];
                let colors = [];

                let laki = 0, perempuan = 0;

                // $.each(response, function(label, value) {
                //     labels.push(label);
                //     data.push(value);
                //     colors.push(label === 'LAKI-LAKI' ? '#00aba9' : '#b91d47');
                // });
                $.each(response, function(label, value) {
                    labels.push(label);
                    data.push(value);
                    // const labelKey = label.toLowerCase().replace(/\s+/g, '');
                    // if (label.toLowerCase().includes('LAKI-LAKI')) {
                    if (label === 'LAKI-LAKI') {
                        colors.push('#00aba9');
                        laki = value;
                    } else {
                        colors.push('#b91d47');
                        perempuan = value;
                    }
                });

                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: colors,
                            data: data
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Perbandingan Gender Koperasi"
                        }
                    }
                });
                // Update caption text
                $('#captionKabupaten').text(asal || 'semua kabupaten');
                $('#captionLaki').text(laki);
                $('#captionPerempuan').text(perempuan);
            }
        });
    }

    // Panggil pertama kali saat halaman load
    loadGenderChart('', '');

    // Panggil ulang saat filter berubah
    $('#filterKabupaten, #filterTahun').on('change', function () {
        const kabupaten = $('#filterKabupaten').val();
        const tahun = $('#filterTahun').val();
        loadGenderChart(kabupaten, tahun);
    });
</script>

<script>
    function loadGenderChartUkm(asal, tahun) {
        $.ajax({
            url: "<?php echo site_url('Laporan/get_gender_data_ukm'); ?>",
            type: "POST",
            data: {
                asal: asal,
                tahun: tahun
            },
            dataType: "json",
            success: function(response) {
                let labels = [];
                let data = [];
                let colors = [];

                let laki = 0, perempuan = 0;

                // $.each(response, function(label, value) {
                //     labels.push(label);
                //     data.push(value);
                //     colors.push(label === 'LAKI-LAKI' ? '#00aba9' : '#b91d47');
                // });
                $.each(response, function(label, value) {
                    labels.push(label);
                    data.push(value);
                    // const labelKey = label.toLowerCase().replace(/\s+/g, '');
                    // if (label.toLowerCase().includes('LAKI-LAKI')) {
                    if (label === 'LAKI-LAKI') {
                        colors.push('#00aba9');
                        laki = value;
                    } else {
                        colors.push('#b91d47');
                        perempuan = value;
                    }
                });

                new Chart("myChartUkm", {
                    type: "pie",
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: colors,
                            data: data
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Perbandingan Gender UMKM"
                        }
                    }
                });
                // Update caption text
                $('#captionKabupatenUkm').text(asal || 'semua kabupaten');
                $('#captionLakiUkm').text(laki);
                $('#captionPerempuanUkm').text(perempuan);
            }
        });
    }

    // Panggil pertama kali saat halaman load
    loadGenderChartUkm('', '');

    // Panggil ulang saat filter berubah
    $('#filterKabupatenUkm, #filterTahunUkm').on('change', function () {
        const kabupaten = $('#filterKabupatenUkm').val();
        const tahun = $('#filterTahunUkm').val();
        loadGenderChartUkm(kabupaten, tahun);
    });
</script>

<script>
    function loadGenderChartRapat(asal, tahun) {
        $.ajax({
            url: "<?php echo site_url('Laporan/get_gender_data_rapat'); ?>",
            type: "POST",
            data: {
                asal: asal,
                tahun: tahun
            },
            dataType: "json",
            success: function(response) {
                let labels = [];
                let data = [];
                let colors = [];

                let laki = 0, perempuan = 0;

                // $.each(response, function(label, value) {
                //     labels.push(label);
                //     data.push(value);
                //     colors.push(label === 'LAKI-LAKI' ? '#00aba9' : '#b91d47');
                // });
                $.each(response, function(label, value) {
                    labels.push(label);
                    data.push(value);
                    // const labelKey = label.toLowerCase().replace(/\s+/g, '');
                    // if (label.toLowerCase().includes('LAKI-LAKI')) {
                    if (label === 'LAKI-LAKI') {
                        colors.push('#00aba9');
                        laki = value;
                    } else {
                        colors.push('#b91d47');
                        perempuan = value;
                    }
                });

                new Chart("myChartRapat", {
                    type: "pie",
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: colors,
                            data: data
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Perbandingan Gender Peserta Rapat dan Webinar"
                        }
                    }
                });
                // Update caption text
                $('#captionKabupatenRapat').text(asal || 'semua kabupaten');
                $('#captionLakiRapat').text(laki);
                $('#captionPerempuanRapat').text(perempuan);
            }
        });
    }

    // Panggil pertama kali saat halaman load
    loadGenderChartRapat('', '');

    // Panggil ulang saat filter berubah
    $('#filterKabupatenRapat, #filterTahunRapat').on('change', function () {
        const kabupaten = $('#filterKabupatenRapat').val();
        const tahun = $('#filterTahunRapat').val();
        loadGenderChartRapat(kabupaten, tahun);
    });
</script>

<script>
    $.ajax({
        url: '<?php echo site_url('UploadController/get_filter_options'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            // Isi dropdown Asal
            response.asal.forEach(function (item) {
                $('#filterKabupaten').append(`<option value="${item}">${item}</option>`);
            });

            // Isi dropdown Tahun
            response.tahun.forEach(function (item) {
                $('#filterTahun').append(`<option value="${item}">${item}</option>`);
            });
        }
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
                $('#filterKabupatenUkm').append(`<option value="${item}">${item}</option>`);
            });

            // Isi dropdown Tahun
            response.tahun.forEach(function (item) {
                $('#filterTahunUkm').append(`<option value="${item}">${item}</option>`);
            });
        }
    });
</script>

<script>
    $.ajax({
        url: '<?php echo site_url('UploadController/get_filter_options_rapat'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            // Isi dropdown Asal
            response.asal.forEach(function (item) {
                // $('#filterKabupatenRapat').append(`<option value="${item}">${item}</option>`);
                if (item && item.trim() !== "") {
                    $('#filterKabupatenRapat').append(`<option value="${item}">${item}</option>`);
                }
            });

            // Isi dropdown Tahun
            response.tahun.forEach(function (item) {
                $('#filterTahunRapat').append(`<option value="${item}">${item}</option>`);
            });
        }
    });
</script>

<!-- <script>
    $('#filterTahunTabel').on('change', function () {
    var selectedYear = this.value;

    if (selectedYear) {
        // Cari tahun di akhir string (karena format d-m-Y)
        table.column(2).search(selectedYear + '$', true, false).draw();
    } else {
        table.column(2).search('').draw(); // reset
    }
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        $('#tabelKegiatan').DataTable({
            responsive: true,
            order: [[2, 'desc']], // Sortir berdasarkan Tanggal Mulai (kolom ke-3)
            columnDefs: [
                { orderable: false, targets: 0 } // Kolom 0 (No) tidak bisa disortir
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function(settings) {
                var api = this.api();
                api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }
        });

        // Filter berdasarkan tahun dari tanggal mulai
        $('#filterTahunTabel').on('change', function () {
            var selectedYear = this.value;

            if (selectedYear) {
                // Cari tahun di akhir string (karena format d-m-Y)
                table.column(2).search(selectedYear + '$', true, false).draw();
            } else {
                table.column(2).search('').draw(); // reset
            }
            });
    });
</script> -->

<script>
    $(document).ready(function() {
        var table = $('#tabelKegiatan').DataTable({
            responsive: true,
            // order: [[2, 'desc']], // Sortir berdasarkan Tanggal Mulai (kolom ke-3)
            columnDefs: [
                { orderable: false, targets: 0 } // Kolom 0 (No) tidak bisa disortir
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function(settings) {
                var api = this.api();
                // api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                //     cell.innerHTML = i + 1;
                // });
                var pageInfo = api.page.info();
                api.column(0, { page: 'current' }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + pageInfo.start;
                });
            }
        });

        // Filter berdasarkan tahun dari tanggal mulai (kolom ke-2, format d-m-Y)
        $('#filterTahunTabel').on('change', function () {
            var selectedYear = this.value;

            if (selectedYear) {
                // Cari tahun di akhir format d-m-Y
                table.column(2).search(selectedYear + '$', true, false).draw();
            } else {
                table.column(2).search('').draw(); // Reset pencarian
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#tabelKegiatanUkm').DataTable({
            responsive: true,
            // order: [[2, 'ASC']], // Sortir berdasarkan Tanggal Mulai (kolom ke-3)
            columnDefs: [
                { orderable: false, targets: 0 } // Kolom 0 (No) tidak bisa disortir
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function(settings) {
                var api = this.api();
                // api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                //     cell.innerHTML = i + 1;
                // });
                var pageInfo = api.page.info();
                api.column(0, { page: 'current' }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + pageInfo.start;
                });
            }
        });

        // Filter berdasarkan tahun dari tanggal mulai (kolom ke-2, format d-m-Y)
        $('#filterTahunTabelUkm').on('change', function () {
            var selectedYear = this.value;

            if (selectedYear) {
                // Cari tahun di akhir format d-m-Y
                table.column(2).search(selectedYear + '$', true, false).draw();
            } else {
                table.column(2).search('').draw(); // Reset pencarian
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#tabelKegiatanRapat').DataTable({
            responsive: true,
            // order: [[2, 'DESC']], // Sortir berdasarkan Tanggal Mulai (kolom ke-3)
            columnDefs: [
                { orderable: false, targets: 0 } // Kolom 0 (No) tidak bisa disortir
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function(settings) {
                var api = this.api();
                // api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                //     cell.innerHTML = i + 1;
                // });

                var pageInfo = api.page.info();
                api.column(0, { page: 'current' }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + pageInfo.start;
                });
            }
        });

        // Filter berdasarkan tahun dari tanggal mulai (kolom ke-2, format d-m-Y)
        $('#filterTahunTabelRapat').on('change', function () {
            var selectedYear = this.value;

            if (selectedYear) {
                // Cari tahun di akhir format d-m-Y
                table.column(2).search(selectedYear + '$', true, false).draw();
            } else {
                table.column(2).search('').draw(); // Reset pencarian
            }
        });
    });
</script>



