<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="200px">
				<h5>FORM PESERTA PELATIHAN</h5>
				<h5><b><?=$peserta['judul_pelatihan']?> </b></h5>
				<h6><?=$peserta['alamat_pelatihan'];?></h6>
				<?php
				$tglmulai = new DateTime($peserta['tgl_mulai']);
				$tglakhir = new DateTime($peserta['tgl_akhir']);
				// Array of month names in alphabet format
				$monthNames = [
					"Januari", "Februari", "Maret", "April",
					"Mei", "Juni", "Juli", "Agustus",
					"September", "Oktober", "November", "Desember"
				];
				?>
				<!-- <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6> -->
				<h6><b>Tanggal Pelatihan: <?=$tglmulai->format("d") . " " . $monthNames[$tglmulai->format("n") - 1] . " " . $tglmulai->format("Y");?> s.d <?=$tglakhir->format("d") . " " . $monthNames[$tglakhir->format("n") - 1] . " " . $tglakhir->format("Y");?></b></h6>
				<h6>Peserta : <?=$peserta['sasaran'];?></h6>
				
			</div>                          
		</div>
	</div>
</div>
<!-- end section title -->

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('peserta/add_peserta/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id_pel',$peserta['id']);?>
		<!-- <div class="form-wrapper">    
		<div class="content bg-lightblue">  
			<div class="coming-soon-word text-center">
				<span class="section-subtitle"><h4><code>Data Pribadi</code></h4></span>
			</div>
		</div> -->

			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Data Pribadi</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->

			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= set_value('no_ktp'); ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA LENGKAP PESERTA<span class="section-subtitle"><code>*</code></span><h7> (Tanpa Gelar)</h7></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_peserta'); ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('nama_peserta'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('tempat_lahir'); ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('tempat_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= set_value('tgl_lahir'); ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('tgl_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>				
				<select name="jk" class="form-control" required>
					<option value="" selected disabled>--PILIH JENIS KELAMIN--</option>
					<option value="LAKI-LAKI" <?=$this->input->post('jk') == 'LAKI-LAKI' ? 'selected':''?>>LAKI-LAKI</option>
					<option value="PEREMPUAN" <?=$this->input->post('jk') == 'PEREMPUAN' ? 'selected':''?>>PEREMPUAN</option>
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">STATUS PERKAWINAN<span class="section-subtitle"><code>*</code></span></label>				
				<select name="status" class="form-control" required>
					<option value="" selected disabled>--PILIH STATUS PERKAWINAN--</option>
					<option value="BELUM MENIKAH" <?=$this->input->post('status') == 'BELUM MENIKAH' ? 'selected':''?>>BELUM MENIKAH</option>
					<option value="MENIKAH" <?=$this->input->post('status') == 'MENIKAH' ? 'selected':''?>>MENIKAH</option>
					<option value="CERAI HIDUP" <?=$this->input->post('status') == 'CERAI HIDUP' ? 'selected':''?>>CERAI HIDUP</option>
					<option value="CERAI MATI" <?=$this->input->post('status') == 'CERAI MATI' ? 'selected':''?>>CERAI MATI</option>
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PENDIDIKAN<span class="section-subtitle"><code>*</code></span></label>				
				<select name="pendidikan" class="form-control" required>
					<option value="" selected disabled>--PILIH PENDIDIKAN--</option>
					<option value="SD" <?=$this->input->post('pendidikan') == 'SD' ? 'selected':''?>>SD</option>
					<option value="SMP" <?=$this->input->post('pendidikan') == 'SMP' ? 'selected':''?>>SMP</option>
					<option value="SMA/SMK" <?=$this->input->post('pendidikan') == 'SMA/SMK' ? 'selected':''?>>SMA/SMK</option>
					<option value="S-1" <?=$this->input->post('pendidikan') == 'S-1' ? 'selected':''?>>S-1</option>
					<option value="S-2" <?=$this->input->post('pendidikan') == 'S-2' ? 'selected':''?>>S-2</option>
					<option value="S-3" <?=$this->input->post('pendidikan') == 'S-3' ? 'selected':''?>>S-3</option>
					<option value="TIDAK SEKOLAH" <?=$this->input->post('pendidikan') == 'TIDAK SEKOLAH' ? 'selected':''?>>TIDAK SEKOLAH</option>
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">AGAMA<span class="section-subtitle"><code>*</code></span></label>				
				<select name="agama" class="form-control" required>
					<option value="" selected disabled>--PILIH AGAMA--</option>
					<option value="ISLAM" <?=$this->input->post('agama') == 'ISLAM' ? 'selected':''?>>ISLAM</option>
					<option value="KRISTEN" <?=$this->input->post('agama') == 'KRISTEN' ? 'selected':''?>>KRISTEN</option>
					<option value="KATOLIK" <?=$this->input->post('agama') == 'KATOLIK' ? 'selected':''?>>KATOLIK</option>
					<option value="HINDU" <?=$this->input->post('agama') == 'HINDU' ? 'selected':''?>>HINDU</option>
					<option value="BUDHA" <?=$this->input->post('agama') == 'BUDHA' ? 'selected':''?>>BUDHA</option>
					<option value="KONGHUCHU" <?=$this->input->post('agama') == 'KONGHUCHU' ? 'selected':''?>>KONGHUCHU</option>					
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
				<?= form_error('rw'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <select name="provinsi" class="form-control" id="provinsi" required>
                    <option selected disabled>- PILIH PROVINSI -</option>
                    <?php 
                        foreach($provinsi as $prov)
                        {
                            echo '<option value="'.$prov->id.'">'.$prov->name.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kota" class="form-control" id="kabupaten" required>
                    <option value='' selected disabled>- PILIH KABUPATEN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kecamatan" class="form-control" id="kecamatan" required>
                    <option value='' selected disabled>- PILIH KECAMATAN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kelurahan" class="form-control" id="desa" required>
                    <option value='' selected disabled>- PILIH KELURAHAN -</option>
                </select>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= set_value('no_telp'); ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_telp'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH ANDA PENYANDANG DISABILITAS<span class="section-subtitle"><code>*</code></span></label>
				<select name="disabilitas" class="form-control" required>
					<option value="" selected disabled>--PILIH SALAH SATU--</option>
					<option value="TIDAK" <?=$this->input->post('disabilitas') == 'TIDAK' ? 'selected':''?>>TIDAK</option>
					<option value="PENYANDANG DISABILITAS FISIK" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS FISIK' ? 'selected':''?>>PENYANDANG DISABILITAS FISIK</option>
					<option value="PENYANDANG DISABILITAS INTELEKTUAL" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS INTELEKTUAL' ? 'selected':''?>>PENYANDANG DISABILITAS INTELEKTUAL</option>
					<option value="PENYANDANG DISABILITAS MENTAL" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS MENTAL' ? 'selected':''?>>PENYANDANG DISABILITAS MENTAL</option>
					<option value="PENYANDANG DISABILITAS SENSORIK" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS SENSORIK' ? 'selected':''?>>PENYANDANG DISABILITAS SENSORIK</option>
				</select>
			</div>
			<div class="form-wrapper" id="foto" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto" class="form-control <?= (form_error('foto') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto'); ?>
				</div>
			</div>
			<div class="form-wrapper" id="foto_ktp" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto_ktp" class="form-control <?= (form_error('foto_ktp') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto_ktp'); ?>
				</div>
			</div>
			<hr>
			<!-- <span class="section-subtitle"><code>.Digitalisasi Usaha</code></span> -->
			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Digitalisasi Usaha</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
			<div class="input-wrap">
				<label class="col-form-label">EMAIL USAHA</label>
				<input type="text" name="email_usaha" placeholder="MASUKKAN EMAIL USAHA" value="<?= set_value('email_usaha'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">WEBSITE USAHA</label>
				<input type="text" name="web_usaha" placeholder="MASUKKAN WEBSITE USAHA" value="<?= set_value('web_usaha'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MEDIA SOSIAL USAHA</label>
                <label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="INSTAGRAM" <?= (!empty($this->input->post('sosmed')) && in_array('INSTAGRAM',$this->input->post('sosmed'))) ? 'checked' : ''?> />INSTAGRAM
                </label>
                <label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="FACEBOOK" <?= (!empty($this->input->post('sosmed')) && in_array('FACEBOOK',$this->input->post('sosmed'))) ? 'checked' : ''?> />FACEBOOK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="TIKTOK" <?= (!empty($this->input->post('sosmed')) && in_array('TIKTOK',$this->input->post('sosmed'))) ? 'checked' : ''?> />TIKTOK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="YOUTUBE" <?= (!empty($this->input->post('sosmed')) && in_array('YOUTUBE',$this->input->post('sosmed'))) ? 'checked' : ''?> />YOUTUBE
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="LAINNYA" <?= (!empty($this->input->post('sosmed')) && in_array('LAINNYA',$this->input->post('sosmed'))) ? 'checked' : ''?> />LAINNYA
                </label>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MARKETPLACE USAHA</label>
                <label class="form-control2">
                <input type="checkbox" name="market[]" value="SHOPEE" <?= (!empty($this->input->post('market')) && in_array('SHOPEE',$this->input->post('market'))) ? 'checked' : ''?>/>SHOPEE
                </label>
                <label class="form-control2">
                <input type="checkbox" name="market[]" value="LAZADA" <?= (!empty($this->input->post('market')) && in_array('LAZADA',$this->input->post('market'))) ? 'checked' : ''?>/>LAZADA
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="TOKOPEDIA" <?= (!empty($this->input->post('market')) && in_array('TOKOPEDIA',$this->input->post('market'))) ? 'checked' : ''?>/>TOKOPEDIA
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="BUKALAPAK" <?= (!empty($this->input->post('market')) && in_array('BUKALAPAK',$this->input->post('market'))) ? 'checked' : ''?>/>BUKALAPAK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="BLIBLI" <?= (!empty($this->input->post('market')) && in_array('BLIBLI',$this->input->post('market'))) ? 'checked' : ''?>/>BLIBLI
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="LAINNYA" <?= (!empty($this->input->post('market')) && in_array('LAINNYA',$this->input->post('market'))) ? 'checked' : ''?>/>LAINNYA
                </label>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH TERDAFTAR DI PLATFORM PENGADAAN BARANG JASA</label>
                <label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="BELA PENGADAAN" <?= (!empty($this->input->post('pengadaan')) && in_array('BELA PENGADAAN',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>BELA PENGADAAN
                </label>
                <label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="E-KATALOG" <?= (!empty($this->input->post('pengadaan')) && in_array('E-KATALOG',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>E-KATALOG
                </label>
				<label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="LAINNYA" <?= (!empty($this->input->post('pengadaan')) && in_array('LAINNYA',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>LAINNYA
                </label>	
			</div>
			
			<hr>
			<!-- <span class="section-subtitle"><code>.Transformasi Usaha</code></span> -->
			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Transformasi Usaha</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
			<div class="input-wrap">
				<label class="col-form-label">PERIZINAN USAHA YANG DIMILIKI</label>
					<?php
					foreach($izin as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="izin[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('izin')) && in_array($row->nama,$this->input->post('izin', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>
			<hr>
			<!-- <span class="section-subtitle"><code>.Informasi Lainnya</code></span> -->
			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Informasi Lainnya</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
			<div class="input-wrap">
				<label class="col-form-label">PERMASALAHAN YANG DIHADAPI<span class="section-subtitle"><code>*</code></span></label>
					<?php
					foreach($masalah as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="masalah[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('masalah')) && in_array($row->nama,$this->input->post('masalah', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KEBUTUHAN DIKLAT / PELATIHAN<span class="section-subtitle"><code>*</code></span></label>
					<?php
					foreach($kebutuhan as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="kebutuhan[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('kebutuhan')) && in_array($row->nama,$this->input->post('kebutuhan', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>	
			

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			<hr>
			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->

			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Data KOPERASI</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
            <div class="input-wrap">
				<label class="col-form-label">NIK KOPERASI</label>
                <input type="number" name="nik_koperasi" placeholder="NIK KOPERASI" value="<?= set_value('nik_koperasi'); ?>" class="form-control">
            </div>
            <div class="input-wrap">
				<label class="col-form-label">NIB KOPERASI</label>
                <input type="number" name="nib" placeholder="NIB KOPERASI" value="<?= set_value('nib'); ?>" class="form-control">
            </div>	
			<div class="input-wrap">
				<label class="col-form-label">NAMA KOPERASI<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_kop" placeholder="NAMA KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_kop'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NOMOR BADAN HUKUM</label>				
				<input type="text" name="no_badan_hukum" placeholder="NOMOR BADAN HUKUM" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('no_badan_hukum'); ?>" class="form-control">				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL BADAN HUKUM</label>				
				<input type="date" name="tgl_badan_hukum" placeholder="TANGGAL BADAN HUKUM" value="<?= set_value('tgl_badan_hukum'); ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_kopukm'); ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= set_value('rt_kopukm'); ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= set_value('rw_kopukm'); ?>" class="form-control">
			</div>
            <!-- <input type="hidden" name="prov_kopukm" value="35"> -->
            <div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <select name="prov_kopukm" class="form-control" id="provinsiukm" required>
                    <option>-- PILIH PROVINSI --</option>
                    <?php 
                        foreach($provinsi as $prov)
                        {
                            echo '<option value="'.$prov->id.'">'.$prov->name.'</option>';
                        }
                    ?>
                </select>
            </div>            
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kota_kopukm" class="form-control" id="kabupatenukm" required>
                    <option value=''>-- PILIH KABUPATEN --</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kec_kopukm" class="form-control" id="kecamatanukm" required>
                    <option value=''>-- PILIH KECAMATAN --</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kel_kopukm" class="form-control" id="desaukm" required>
                    <option value=''>-- PILIH KELURAHAN --</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODE POS<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= set_value('kodepos_kopukm'); ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">BENTUK KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bentuk_koperasi', 'tb_bentuk_koperasi', 'nama', 'nama','--PILIH BENTUK KOPERASI--',$this->input->post('bentuk_koperasi'));
                ?>
			</div>   
			<div class="input-wrap">
				<label class="col-form-label">TIPE KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<select name="tipe_koperasi" class="form-control" required>
					<option value="" selected disabled>--PILIH TIPE KOPERASI--</option>
					<option value="KONVENSIONAL" <?=$this->input->post('tipe_koperasi') == 'KONVENSIONAL' ? 'selected':''?>>KONVENSIONAL</option>
					<option value="SYARIAH" <?=$this->input->post('tipe_koperasi') == 'SYARIAH' ? 'selected':''?>>SYARIAH</option>
				</select>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('jenis_koperasi', 'tb_jenis_koperasi', 'nama', 'nama','--PILIH JENIS KOPERASI--',$this->input->post('jenis_koperasi'));
                ?>
			</div>  
			<div class="input-wrap">
				<label class="col-form-label">KELOMPOK KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('kelompok_koperasi', 'tb_kelompok_koperasi', 'nama', 'nama','--PILIH KELOMPOK KOPERASI--',$this->input->post('kelompok_koperasi'));
                ?>
			</div>  
			<div class="input-wrap">
				<label class="col-form-label">SEKTOR USAHA KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'nama','--PILIH SEKTOR USAHA KOPERASI--',$this->input->post('sektor_usaha'));
                ?>
			</div> 
			<div class="input-wrap">
				<label class="col-form-label">MODAL USAHA KOPERASI (MODAL SENDIRI KOPERASI) <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= set_value('nilai_modalusaha'); ?>" class="form-control">
            </div>	
			<div class="input-wrap">
				<label class="col-form-label">MODAL HUTANG KOPERASI <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_modalhutang" id="dengan-rupiah2" placeholder="NILAI MODAL HUTANG" value="<?= set_value('nilai_modalhutang'); ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">OMZET KOPERASI <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah3" placeholder="NILAI OMZET USAHA" value="<?= set_value('nilai_omzetusaha'); ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">SHU KOPERASI TAHUN BERJALAN/31 DESEMBER <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_shukoperasi" id="dengan-rupiah4" placeholder="NILAI SHU KOPERASI" value="<?= set_value('nilai_shukoperasi'); ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH ANGGOTA LAKI-LAKI<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="anggota_l" placeholder="JUMLAH ANGGOTA LAKI-LAKI" value="<?= set_value('anggota_l'); ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">JUMLAH ANGGOTA PEREMPUAN<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="anggota_p" placeholder="JUMLAH ANGGOTA PEREMPUAN" value="<?= set_value('anggota_p'); ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH CALON ANGGOTA<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="calon_anggota" placeholder="JUMLAH CALON ANGGOTA" value="<?= set_value('calon_anggota'); ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH KARYAWAN / PENGELOLA <span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="jml_tenaga_kerja" placeholder="JUMLAH KARYAWAN / PENGELOLA" value="<?= set_value('jml_tenaga_kerja'); ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'nama','--PILIH JANGKAUAN PEMASARAN--',$this->input->post('wil_pemasaran'));
                ?>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">SKALA USAHA KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<select name="skala_koperasi" class="form-control" required>
					<option value="" selected disabled>--PILIH SKALA USAHA KOPERASI--</option>
					<option value="NASIONAL" <?=$this->input->post('skala_koperasi') == 'NASIONAL' ? 'selected':''?>>NASIONAL</option>
					<option value="PROVINSI" <?=$this->input->post('skala_koperasi') == 'PROVINSI' ? 'selected':''?>>PROVINSI</option>
					<option value="KAB/KOTA" <?=$this->input->post('skala_koperasi') == 'KAB/KOTA' ? 'selected':''?>>KAB/KOTA</option>
				</select>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('lokasi_pemasaran'); ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<select name="jabatan" class="form-control" required>
					<option value="" selected disabled>--PILIH JABATAN PESERTA DI KOPERASI--</option>
					<option value="PENGURUS" <?=$this->input->post('jabatan') == 'PENGURUS' ? 'selected':''?>>PENGURUS</option>
					<option value="PENGAWAS" <?=$this->input->post('jabatan') == 'PENGAWAS' ? 'selected':''?>>PENGAWAS</option>
					<option value="PENGELOLA" <?=$this->input->post('jabatan') == 'PENGELOLA' ? 'selected':''?>>PENGELOLA</option>
					<option value="DEWAN PENGAWAS SYARIAH" <?=$this->input->post('jabatan') == 'DEWAN PENGAWAS SYARIAH' ? 'selected':''?>>DEWAN PENGAWAS SYARIAH</option>
					<option value="ANGGOTA" <?=$this->input->post('jabatan') == 'ANGGOTA' ? 'selected':''?>>ANGGOTA</option>
				</select>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">CABANG KOPERASI</label>
				<input type="text" name="cabang" placeholder="CABANG KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('cabang'); ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KANTOR CABANG PEMBANTU</label>
				<input type="text" name="kantor_cabang_pembantu" placeholder="KANTOR CABANG PEMBANTU" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('kantor_cabang_pembantu'); ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KANTOR KAS</label>
				<input type="text" name="kantor_kas" placeholder="KANTOR KAS" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('kantor_kas'); ?>" class="form-control">
			</div>                    
           
            <div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
			</div>			
	</form>			
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('peserta/script_peserta')?>

<script>
    $(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_des');?>/"+$(this).val();
            $('#desa').load(url);
            return false;
        })
    });
</script>

<script>
    $(document).ready(function(){
        $("#provinsiukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kab');?>/"+$(this).val();
            $('#kabupatenukm').load(url);
            return false;
        })

        $("#kabupatenukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatanukm').load(url);
            return false;
        })

        $("#kecamatanukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_des');?>/"+$(this).val();
            $('#desaukm').load(url);
            return false;
        })
    });
</script>

<script>
            /* Dengan Rupiah */
  var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

  var dengan_rupiah2 = document.getElementById('dengan-rupiah2');
  dengan_rupiah2.addEventListener('keyup', function(e)
  {
      dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah3 = document.getElementById('dengan-rupiah3');
  dengan_rupiah3.addEventListener('keyup', function(e)
  {
      dengan_rupiah3.value = formatRupiah(this.value, 'Rp. ');
  });

  var dengan_rupiah4 = document.getElementById('dengan-rupiah4');
  dengan_rupiah4.addEventListener('keyup', function(e)
  {
      dengan_rupiah4.value = formatRupiah(this.value, 'Rp. ');
  });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
