<!--section title -->
<div class="section-title">
	<h5>Form Edit Peserta Pelatihan </h5>
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
	<form action="<?= site_url('peserta/edit_podcast/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id', $this->input->post('id') ?? $peserta['id']);?>
	<?=form_hidden('id_pel', $this->input->post('id_pel') ?? $peserta['id_pelatihan']);?>
	<?=form_hidden('kodeunik', $this->input->post('kodeunik') ?? $peserta['kodeunik']);?>
	
		<div class="form-wrapper">  			
			<div class="input-wrap">
				<label class="col-form-label">NO. URUT<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_urut" placeholder="NOMOR URUT" value="<?= $this->input->post('no_urut') ?? $peserta['no_urut'];?>" class="form-control <?= (form_error('no_urut') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_urut'); ?>				
			</div> 
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= $this->input->post('no_ktp') ?? $peserta['no_ktp']; ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA PESERTA<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_peserta') ?? $peserta['nama_peserta']; ?>" class="form-control" required>			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('tempat_lahir') ?? $peserta['tempat_lahir']; ?>" class="form-control" required>		
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= $this->input->post('tgl_lahir') ?? $peserta['tgl_lahir']; ?>" class="form-control" required>			
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
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat') ?? $peserta['alamat']; ?>" class="form-control" required>			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= $this->input->post('rt') ?? $peserta['rt']; ?>" class="form-control" required>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= $this->input->post('rw') ?? $peserta['rw']; ?>" class="form-control" required>				
			</div>
			<div class="input-wrap">
				<label class="col-3 col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>
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
					<input type="file" name="foto" value="<?=$this->input->post('foto') ?? $peserta['foto']?>" class="form-control" placeholder="UBAH FOTO" required>
					<img src="<?=base_url('uploads/peserta/'.$peserta['foto'])?>" style="width: 144px;height: 211px;">
				</div>
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
                <label class="col-form-label">NAMA USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_usaha') ?? $peserta['nama_usaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat_kopukm') ?? $peserta['alamat_kopukm']; ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
					echo form_dropdown('jabatan', array( 'PEMILIK'=>'PEMILIK', 'KARYAWAN'=>'KARYAWAN'), $peserta['jabatan'], "class='form-control'");
				?>
			</div>     
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
