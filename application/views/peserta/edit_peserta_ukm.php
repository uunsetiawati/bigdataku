<!--section title -->
<div class="section-title">
	<h5>Form Peserta Pelatihan </h5>
	<h4><?=$pelatihan['judul_pelatihan'];?> DI <?=$pelatihan['alamat_pelatihan'];?></h4>
	<?php
	$tglmulai = new DateTime($pelatihan['tgl_mulai']);
	$tglakhir = new DateTime($pelatihan['tgl_akhir']);
	?>
	<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
	<h6>Peserta : <?=$pelatihan['sasaran'];?></h6>
		
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
	<?=form_hidden('id',$peserta['id']);?>
	<?=form_hidden('id_pel',$peserta['id_pelatihan']);?>
	<?=form_hidden('kodeunik',$peserta['kodeunik']);?>
	
		<div class="form-wrapper">  
			<div class="input-wrap">
				<label class="col-form-label">NO. URUT<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_urut" placeholder="NOMOR URUT" value="<?= $this->input->post('no_urut') ?? $peserta['no_urut'];?>" class="form-control <?= (form_error('no_urut') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_urut'); ?>				
			</div>          
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= $this->input->post('no_ktp') ?? $peserta['no_ktp'];?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA PESERTA<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_peserta') ?? $peserta['nama_peserta']; ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama_peserta'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('tempat_lahir') ?? $peserta['tempat_lahir']; ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tempat_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= $this->input->post('tgl_lahir') ?? $peserta['tgl_lahir']; ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>">
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
				echo form_dropdown('status', array( 'BELUM MENIKAH'=>'BELUM MENIKAH', 'MENIKAH'=>'MENIKAH', 'CERAI HIDUP' => 'CERAI HIDUP', 'CERAI MATI'=>'CERAI MATI'), $peserta['status'], "class='form-control'");		
				?>		
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PENDIDIKAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
				echo form_dropdown('pendidikan', array( 'SD'=>'SD', 'SMP'=>'SMP', 'SMA/SMK'=>'SMA/SMK', 'S-1'=>'S-1', 'S-2'=>'S-2', 'S-3'=>'S-3', 'TIDAK SEKOLAH'=>'TIDAK SEKOLAH'), $peserta['pendidikan'], "class='form-control'");		
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
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat') ?? $peserta['alamat']; ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= $this->input->post('rt') ?? $peserta['rt']; ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= $this->input->post('rw') ?? $peserta['rw']; ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
				<?= form_error('rw'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-3 col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>
				<!-- <input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsi ?>" class="form-control" readonly>	 -->
				<input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsi ?>" class="form-control" readonly>	
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KAB/KOTA<span class="section-subtitle"><code>*</code></span></label>						
				<input type="text" name="kab" placeholder="KABUPATEN" value="<?= $kabupaten ?>" class="form-control" readonly>						
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="kec" placeholder="KECAMATAN" value="<?= $kecamatan ?>" class="form-control" readonly>	
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kel" placeholder="KELURAHAN" value="<?= $kelurahan ?>" class="form-control" readonly>	
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= $this->input->post('no_telp') ?? $peserta['no_telp']; ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
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
			<span class="section-subtitle"><code>.Digitalisasi Usaha</code></span>
			<div class="input-wrap">
                <label class="col-form-label">WEBSITE USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="web_usaha" placeholder="WEBSITE USAHA" value="<?= $this->input->post('web_usaha') ?? $peserta['web_usaha']; ?>" class="form-control" required>
            </div>     
			<div class="input-wrap">
                <label class="col-form-label">EMAIL USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="email_usaha" placeholder="EMAIL USAHA"  value="<?= $this->input->post('email_usaha') ?? $peserta['email_usaha']; ?>" class="form-control" required>
            </div> 
			<div class="input-wrap">
                <label class="col-form-label">SOSIAL MEDIA USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="sosmed_usaha" placeholder="SOSIAL MEDIA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('sosmed_usaha') ?? $peserta['sosmed_usaha']; ?>" class="form-control" required>
            </div>   
			<div class="input-wrap">
                <label class="col-form-label">MARKETPLACE USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="market_usaha" placeholder="MARKETPLACE USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('market_usaha') ?? $peserta['market_usaha']; ?>" class="form-control" required>
            </div>    
			<div class="input-wrap">
                <label class="col-form-label">APAKAH TERDAFTAR DI PLATFORM PENGADAAN BARANG JASA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="pengadaan" placeholder="PENGADAAN USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('pengadaan') ?? $peserta['pengadaan']; ?>" class="form-control" required>
            </div>    
				
			<hr>
			<span class="section-subtitle"><code>.Transformasi Usaha</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERIZINAN USAHA YANG DIMILIKI<span class="section-subtitle"><code>*</code></span></label>					
				<input type="text" name="izin_usaha" value="<?=$peserta['izin_usaha'];?>" class="form-control" readonly />
			</div>
			<hr>
			<span class="section-subtitle"><code>.Informasi Lainnya</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERMASALAHAN YANG DIHADAPI<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="permasalahan" value="<?=$peserta['permasalahan'];?>" class="form-control" readonly />
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KEBUTUHAN DIKLAT / PELATIHAN<span class="section-subtitle"><code>*</code></span></label>					
					<input type="text"name="kebutuhan"  value="<?=$peserta['kebutuhan'];?>" class="form-control" readonly/>
			</div>
			
			

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			<hr>
			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->		

			<span class="section-subtitle"><code>.DATA UMKM</code></span>
            <div class="input-wrap">
                <label class="col-form-label">NOMOR NIB<span class="section-subtitle"><code>*</code></span></label>                
                <input type="text" name="nib" placeholder="NOMOR NIB" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nib') ?? $peserta['nib']; ?>" class="form-control" required>                
            </div>
            <div class="input-wrap">
                <label class="col-form-label">NAMA USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_usaha') ?? $peserta['nama_usaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">STATUS USAHA/LEGALITAS USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="status_usaha"  value="<?=$peserta['status_usaha'];?>" class="form-control" readonly/>
			</div>   
            <div class="input-wrap">
				<label class="col-form-label">SERTIFIKASI PRODUK USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="sertifikasi"  value="<?=$peserta['sertifikasi'];?>" class="form-control" readonly/>
			</div>  
            <div class="input-wrap">
                <label class="col-form-label">SEKTOR USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="sektor_usaha"  value="<?=$peserta['sektor_usaha'];?>" class="form-control" readonly/>
                </div>
            </div> 
            <div class="input-wrap">
                <label class="col-form-label">BIDANG USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="bidang_usaha"  value="<?=$peserta['bidang_usaha'];?>" class="form-control" readonly/>
            </div>     
            <div class="input-wrap">
                <label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat_kopukm') ?? $peserta['alamat_kopukm']; ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= $this->input->post('rt_kopukm') ?? $peserta['rt_kopukm']; ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= $this->input->post('rw_kopukm') ?? $peserta['rw_kopukm']; ?>" class="form-control">
			</div>
			<div class="input-wrap">
				<label class="col-3 col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>
				<!-- <input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsi ?>" class="form-control" readonly>	 -->
				<input type="text" name="prov" placeholder="PROVINSI" value="<?= $provinsikopukm ?>" class="form-control" readonly>	
			</div>
            <div class="input-wrap">
                <label class="col-form-label">KAB/KOTA<span class="section-subtitle"><code>*</code></span></label>
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
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= $this->input->post('kodepos_kopukm') ?? $peserta['kodepos_kopukm']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">MODAL USAHA UMK PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="modal_usaha" value="<?=$peserta['modal_usaha'];?>" class="form-control" readonly />
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI MODAL USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= $this->input->post('nilai_modalusaha') ?? $peserta['nilai_modalusaha']; ?>" class="form-control" readonly>
            </div>	
            <div class="input-wrap">
				<label class="col-form-label">OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="omzet_usaha" value="<?=$peserta['omzet_usaha'];?>" class="form-control" readonly />
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah2" placeholder="NILAI OMZET USAHA" value="<?= $this->input->post('nilai_omzetusaha') ?? $peserta['nilai_omzetusaha']; ?>" class="form-control" readonly>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN LAKI-LAKI<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjal" placeholder="JUMLAH KARYAWAN LAKI-LAKI" value="<?= $this->input->post('jml_tenaga_kerjal') ?? $peserta['jml_tenaga_kerjal']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN PEREMPUAN<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjap" placeholder="JUMLAH PEREMPUAN" value="<?= $this->input->post('jml_tenaga_kerjap') ?? $peserta['jml_tenaga_kerjap']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text"name="wil_pemasaran"  value="<?=$peserta['wil_pemasaran'];?>" class="form-control" readonly/>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('lokasi_pemasaran') ?? $peserta['lokasi_pemasaran']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
					echo form_dropdown('jabatan', array( 'PEMILIK'=>'PEMILIK', 'KARYAWAN'=>'KARYAWAN'), $peserta['jabatan'], "class='form-control'");
				?>
			</div>            
           
            <div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
                <?php
					echo anchor('peserta/viewdatapeserta/'.$peserta['kodeunik'], 'Kembali', array('class'=>'button2'));
				?>
			</div>

			
	</form>			
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('peserta/script_peserta')?>
