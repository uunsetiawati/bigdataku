<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="200px">
				<h5>FORM EDIT PESERTA PELATIHAN</h5>
				<h5><b><?=$pelatihan['judul_pelatihan']?> </b></h5>
				<h6><?=$pelatihan['alamat_pelatihan'];?></h6>
				<?php
				$tglmulai = new DateTime($pelatihan['tgl_mulai']);
				$tglakhir = new DateTime($pelatihan['tgl_akhir']);
				// Array of month names in alphabet format
				$monthNames = [
					"Januari", "Februari", "Maret", "April",
					"Mei", "Juni", "Juli", "Agustus",
					"September", "Oktober", "November", "Desember"
				];
				?>
				<!-- <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6> -->
				<h6><b>Tanggal Pelatihan: <?=$tglmulai->format("d") . " " . $monthNames[$tglmulai->format("n") - 1] . " " . $tglmulai->format("Y");?> s.d <?=$tglakhir->format("d") . " " . $monthNames[$tglakhir->format("n") - 1] . " " . $tglakhir->format("Y");?></b></h6>
				<h6>Peserta : <?=$pelatihan['sasaran'];?></h6>
				
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
	<form action="<?= site_url('peserta/edit/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$this->input->post('id') ?? $peserta['id']);?>
	<?=form_hidden('id_pel',$this->input->post('id_pelatihan') ?? $peserta['id_pelatihan']);?>
	<?=form_hidden('kodeunik',$this->input->post('kodeunik') ?? $peserta['kodeunik']);?>
		

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
				<label class="col-form-label">NO. URUT<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_urut" placeholder="NOMOR URUT" value="<?= $this->input->post('no_urut') ?? $peserta['no_urut'];?>" class="form-control <?= (form_error('no_urut') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('no_urut'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= $this->input->post('no_ktp') ?? $peserta['no_ktp'] ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA LENGKAP PESERTA<span class="section-subtitle"><code>*</code></span><h7> (Tanpa Gelar)</h7></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_peserta') ?? $peserta['nama_peserta'] ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('nama_peserta'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('tempat_lahir') ?? $peserta['tempat_lahir']; ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('tempat_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= $this->input->post('tgl_lahir') ?? $peserta['tgl_lahir'] ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>" required>
				<?= form_error('tgl_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>				
				<?php
				echo form_dropdown('jk', array( 'LAKI-LAKI'=>'LAKI-LAKI', 'PEREMPUAN'=>'PEREMPUAN'), $peserta['jk'], "class='form-control'");		
				?>			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">STATUS PERKAWINAN<span class="section-subtitle"><code>*</code></span></label>					
				<?php
				echo form_dropdown('status', array( 'BELUM MENIKAH'=>'BELUM MENIKAH', 'MENIKAH'=>'MENIKAH', 'CERAI HIDUP' => 'CERAI HIDUP', 'CERAI MATI' => 'CERAI MATI'), $peserta['jk'], "class='form-control'");		
				?>		
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PENDIDIKAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
				echo form_dropdown('pendidikan', array( 'SD'=>'SD', 'SMP'=>'SMP', 'SMA/SMK'=>'SMA/SMK', 'D-III'=>'D-III', 'S-1'=>'S-1', 'S-2'=>'S-2', 'S-3'=>'S-3', 'TIDAK SEKOLAH'=>'TIDAK SEKOLAH'), $peserta['pendidikan'], "class='form-control'");		
				?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">AGAMA<span class="section-subtitle"><code>*</code></span></label>				
				<?php
				echo form_dropdown('agama', array( 'ISLAM'=>'ISLAM', 'KRISTEN'=>'KRISTEN', 'KATOLIK'=>'KATOLIK', 'HINDU'=>'HINDU', 'BUDHA'=>'BUDHA','KONGHUCHU'=>'KONGHUCHU'), $peserta['agama'], "class='form-control'");		
				?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat') ?? $peserta['alamat'] ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= $this->input->post('rt') ?? $peserta['rt'] ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= $this->input->post('rw') ?? $peserta['rw'] ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
				<?= form_error('rw'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsi ?>" class="form-control" readonly>	
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kab" placeholder="KABUPATEN" value="<?= $kabupaten ?>" class="form-control" readonly>	
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kab" placeholder="KABUPATEN" value="<?= $kecamatan ?>" class="form-control" readonly>	
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kab" placeholder="KABUPATEN" value="<?= $kelurahan ?>" class="form-control" readonly>	
            </div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= $this->input->post('no_telp') ?? $peserta['no_telp'] ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_telp'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH ANDA PENYANDANG DISABILITAS<span class="section-subtitle"><code>*</code></span></label>
				<?php
					echo form_dropdown('disabilitas', array('TIDAK'=>'TIDAK', 'PENYANDANG DISABILITAS FISIK'=>'PENYANDANG DISABILITAS FISIK', 'PENYANDANG DISABILITAS INTELEKTUAL'=>'PENYANDANG DISABILITAS INTELEKTUAL', 'PENYANDANG DISABILITAS MENTAL' => 'PENYANDANG DISABILITAS MENTAL', 'PENYANDANG DISABILITAS SENSORIK' => 'PENYANDANG DISABILITAS SENSORIK'), $peserta['disabilitas'], "class='form-control'");
				?>
			</div>
			<div class="form-wrapper" id="foto" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="hidden" name="foto" value="<?=$this->input->post('foto') ?? $peserta['foto']?>" class="form-control" required>
					<img src="<?=base_url('uploads/peserta/'.$peserta['foto'])?>" style="width: 144px;height: 211px;">
				</div>
			</div>
			<div class="form-wrapper" id="foto_ktp" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="hidden" name="foto_ktp" value="<?=$this->input->post('foto_ktp') ?? $peserta['ktp']?>" class="form-control" required>
					<img src="<?=base_url('uploads/ktp/'.$peserta['ktp'])?>" style="width:323.52px;height:204.01px;">
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
				<input type="text" name="email_usaha" placeholder="MASUKKAN EMAIL USAHA" value="<?= $this->input->post('emial_usaha') ?? $peserta['email_usaha'] ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">WEBSITE USAHA</label>
				<input type="text" name="web_usaha" placeholder="MASUKKAN WEBSITE USAHA" value="<?= $this->input->post('web_usaha') ?? $peserta['web_usaha'] ?>" class="form-control" readonly>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MEDIA SOSIAL USAHA</label>
                <input type="text" name="sosmed_usaha" placeholder="SOSIAL MEDIA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('sosmed_usaha') ?? $peserta['sosmed_usaha']; ?>" class="form-control" readonly>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MARKETPLACE USAHA</label>
                <input type="text" name="market_usaha" placeholder="MARKETPLACE USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('market_usaha') ?? $peserta['market_usaha']; ?>" class="form-control" readonly>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH TERDAFTAR DI PLATFORM PENGADAAN BARANG JASA</label>
                <input type="text" name="pengadaan" placeholder="PLATFORM PENGADAAN BARANG JASA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('pengadaan') ?? $peserta['pengadaan']; ?>" class="form-control" readonly>	
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
				<input type="text" name="izin_usaha" placeholder="PERIZINAN USAHA YANG DIMILIKI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('izin_usaha') ?? $peserta['izin_usaha']; ?>" class="form-control" readonly>
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
				<input type="text" name="permasalahan" placeholder="PERMASALAHAN YANG DIHADAPI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('permasalahan') ?? $peserta['permasalahan']; ?>" class="form-control" readonly>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KEBUTUHAN DIKLAT / PELATIHAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kebutuhan" placeholder="KEBUTUHAN DIKLAT / PELATIHAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('kebutuhan') ?? $peserta['kebutuhan']; ?>" class="form-control" readonly>
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
                <input type="number" name="nik_koperasi" placeholder="NIK KOPERASI" value="<?= $this->input->post('nik_koperasi') ?? $peserta['nik_koperasi'] ?>" class="form-control">
            </div>
            <div class="input-wrap">
				<label class="col-form-label">NIB KOPERASI</label>
                <input type="number" name="nib" placeholder="NIB KOPERASI" value="<?= $this->input->post('nib') ?? $peserta['nib'] ?>" class="form-control">
            </div>	
			<div class="input-wrap">
				<label class="col-form-label">NAMA KOPERASI<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_kop" placeholder="NAMA KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_kop') ?? $peserta['nama_kop'] ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NOMOR BADAN HUKUM</label>				
				<input type="text" name="no_badan_hukum" placeholder="NOMOR BADAN HUKUM" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('no_badan_hukum') ?? $peserta['no_badan_hukum'] ?>" class="form-control">				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL BADAN HUKUM</label>				
				<input type="date" name="tgl_badan_hukum" placeholder="TANGGAL BADAN HUKUM" value="<?= $this->input->post('tgl_badan_hukum') ?? $peserta['tgl_badan_hukum'] ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat_kop_ukm') ?? $peserta['alamat_kopukm'] ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= $this->input->post('rt_kopukm') ?? $peserta['rt_kopukm'] ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= $this->input->post('rw_kopukm') ?? $peserta['rw_kopukm'] ?>" class="form-control">
			</div>
            <!-- <input type="hidden" name="prov_kopukm" value="35"> -->
            <div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsikopukm ?>" class="form-control" readonly>	
            </div>            
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kabkopukm" placeholder="KABUPATEN" value="<?= $kabupatenkopukm ?>" class="form-control" readonly>	
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kabkopukm" placeholder="KECAMATAN" value="<?= $kecamatankopukm ?>" class="form-control" readonly>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <input type="text" name="kabkopukm" placeholder="KELURAHAN" value="<?= $kelurahankopukm ?>" class="form-control" readonly>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODE POS<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= $this->input->post('kodepos') ?? $peserta['kodepos_kopukm']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">BENTUK KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="bentuk_koperasi" value="<?=$peserta['bentuk_koperasi'];?>" class="form-control" readonly/>
			</div>   
			<div class="input-wrap">
				<label class="col-form-label">TIPE KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<input type="text"name="tipe_koperasi" value="<?=$peserta['tipe_koperasi'];?>" class="form-control" readonly/>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="jenis_koperasi" value="<?=$peserta['jenis_koperasi'];?>" class="form-control" readonly/>
			</div>  
			<div class="input-wrap">
				<label class="col-form-label">KELOMPOK KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="kelompok_koperasi" value="<?=$peserta['kelompok_koperasi'];?>" class="form-control" readonly/>
			</div>  
			<div class="input-wrap">
				<label class="col-form-label">SEKTOR USAHA KOPERASI<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="sektor_usaha"  value="<?=$peserta['sektor_usaha'];?>" class="form-control" readonly/>
			</div> 
			<div class="input-wrap">
				<label class="col-form-label">MODAL USAHA KOPERASI (MODAL SENDIRI KOPERASI) <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= $this->input->post('nilai_modalusaha') ??$peserta['nilai_modalusaha'] ?>" class="form-control">
            </div>	
			<div class="input-wrap">
				<label class="col-form-label">MODAL HUTANG KOPERASI <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_modalhutang" id="dengan-rupiah2" placeholder="NILAI MODAL HUTANG" value="<?= $this->input->post('nilai_modalhutang') ?? $peserta['nilai_modalhutang'] ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">OMZET KOPERASI <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah3" placeholder="NILAI OMZET USAHA" value="<?= $this->input->post('nilai_omzetusaha') ?? $peserta['nilai_omzetusaha'] ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">SHU KOPERASI TAHUN BERJALAN/31 DESEMBER <h7> (Dalam Rupiah)</h7></label>
                <input type="text" name="nilai_shukoperasi" id="dengan-rupiah4" placeholder="NILAI SHU KOPERASI" value="<?= $this->input->post('nilai_shukoperasi') ?? $peserta['nilai_shukoperasi'] ?>" class="form-control">
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH ANGGOTA LAKI-LAKI<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="anggota_l" placeholder="JUMLAH ANGGOTA LAKI-LAKI" value="<?= $this->input->post('anggota_l') ?? $peserta['anggota_l'] ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">JUMLAH ANGGOTA PEREMPUAN<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="anggota_p" placeholder="JUMLAH ANGGOTA PEREMPUAN" value="<?= $this->input->post('anggota_p') ?? $peserta['anggota_p'] ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH CALON ANGGOTA<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="calon_anggota" placeholder="JUMLAH CALON ANGGOTA" value="<?= $this->input->post('calon_anggota') ?? $peserta['calon_anggota'] ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JUMLAH KARYAWAN / PENGELOLA <span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="jml_tenaga_kerja" placeholder="JUMLAH KARYAWAN / PENGELOLA" value="<?= $this->input->post('jml_tenaga_kerja') ?? $peserta['jml_tenaga_kerja'] ?>" class="form-control" required>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="wil_pemasaran"  value="<?=$peserta['wil_pemasaran'];?>" class="form-control" readonly/>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">SKALA USAHA KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<?php
				echo form_dropdown('skala_koperasi', array( 'NASIOANL'=>'NASIONAL', 'PROVINSI'=>'PROVINSI', 'KAB/KOTA'=>'KAB/KOTA'), $peserta['skala_koperasi'], "class='form-control'");		
				?>	
			</div>
			<div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('lokasi_pemasaran') ?? $peserta['lokasi_pemasaran'] ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI KOPERASI<span class="section-subtitle"><code>*</code></span></label>
				<?php
				echo form_dropdown('jabatan', array( 'PENGURUS'=>'PENGURUS', 'PENGAWAS'=>'PENGAWAS', 'PENGELOLA'=>'PENGELOLA', 'DEWAN PENGAWAS SYARIAH'=>'DEWAN PENGAWAS SYARIAH', 'ANGGOTA'=>'ANGGOTA'), $peserta['jabatan'], "class='form-control'");		
				?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">CABANG KOPERASI</label>
				<input type="text" name="cabang" placeholder="CABANG KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('cabang') ?? $peserta['cabang'] ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KANTOR CABANG PEMBANTU</label>
				<input type="text" name="kantor_cabang_pembantu" placeholder="KANTOR CABANG PEMBANTU" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('kantor_cabang_pembantu') ?? $peserta['kantor_cabang_pembantu'] ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KANTOR KAS</label>
				<input type="text" name="kantor_kas" placeholder="KANTOR KAS" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('kantor_kas') ?? $peserta['kantor_kas']; ?>" class="form-control">
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
