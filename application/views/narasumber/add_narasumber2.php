<!--section title -->
<div class="section-title">	
	<h4>Form Data Narasumber</h4>
	<h6><?=$pelatihan['judul_pelatihan'];?> DI <?=$pelatihan['alamat_pelatihan'];?></h6>
	<?php
	$tglmulai = new DateTime($pelatihan['tgl_mulai']);
	$tglakhir = new DateTime($pelatihan['tgl_akhir']);
	?>
	<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
	<h6>Peserta : <?=$pelatihan['sasaran'];?></h6>
	<hr>
	
	<span class="section-subtitle"><code>Cari Data Narasumber</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">

		<form action="<?= site_url('narasumber/add2/'.$this->uri->segment('3')) ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
		<?php 
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		?>
		<?=form_hidden('now',$now);?>
		<?=form_hidden('kodeunik',$this->uri->segment(3));?>
			<div class="form-wrapper">				
				<div class="input-wrap">
					<label class="col-form-label">NIK NARASUMBER<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= $this->input->post('nik') ?? $nik ?>" class="form-control <?= (form_error('nik') == "" ? '':'is-invalid') ?>">
					<?= form_error('nik'); ?>					
				</div>            
				<div class="input-wrap">
					<label class="col-form-label">NAMA NARASUMBER<span class="section-subtitle"><code>*</code></span></label>
					<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama') ?>" class="form-control" required> 
				</div>		
				
				<div class="input-wrap">	
					<label class="col-form-label">INSTANSI NARASUMBER<span class="section-subtitle"><code>*</code></span></label>			
					<input type="text" name="instansi" placeholder="ASAL INSTANSI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('instansi') ?>" class="form-control" required>					
				</div>
				<div class="input-wrap">
					<label class="col-form-label">JUDUL MATERI<span class="section-subtitle"><code>*</code></span></label>	
					<input type="text" name="materi_judul" placeholder="JUDUL MATERI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('materi_judul') ?>" class="form-control" required>						
				</div>			
				<hr>
				<div class="input-wrap">
					<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>	
					<select name="jk" class="form-control" required>
						<option value="" selected disabled>--PILIH JENIS KELAMIN--</option>
						<option value="LAKI-LAKI" <?=$this->input->post('jk') == 'LAKI-LAKI' ? 'selected':''?>>LAKI-LAKI</option>
						<option value="PEREMPUAN" <?=$this->input->post('jk') == 'PEREMPUAN' ? 'selected':''?>>PEREMPUAN</option>
					</select>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="hp" placeholder="NO. TELP/HP" value="<?= set_value('hp'); ?>" class="form-control <?= (form_error('hp') == "" ? '':'is-invalid') ?>">
					<?= form_error('hp'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maks Foto 3MB | JPEG,JPG,PNG,PDF)</h7></label>
					<input type="file" name="ktp" class="form-control <?= (form_error('ktp') == "" ? '':'is-invalid') ?>" accept="image/*,application/pdf" required>
					<?php echo form_error('ktp'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO NPWP<span class="section-subtitle"><code>*</code></span><h7> (Maks Foto 3MB | JPEG,JPG,PNG,PDF)</h7></label>
					<input type="file" name="npwp" class="form-control <?= (form_error('npwp') == "" ? '':'is-invalid') ?>" accept="image/*,application/pdf" required>
					<?php echo form_error('npwp'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD CV<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | pdf,word)</h7></label>
					<input type="file" name="cv" class="form-control <?= (form_error('cv') == "" ? '':'is-invalid') ?>" accept=".pdf,.doc,.docx" required>
					<?php echo form_error('cv'); ?>
				</div>				
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD MATERI<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 10MB | pdf,ppt)</h7></label>
					<input type="file" name="materi" class="form-control <?= (form_error('materi') == "" ? '':'is-invalid') ?>" accept=".pdf,.ppt,.pptx" required>
					<?php echo form_error('materi'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD SPT (SURAT PERINTAH TUGAS)<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf|doc|docx)</h7></label>
					<input type="file" name="spt" class="form-control <?= (form_error('spt') == "" ? '':'is-invalid') ?>" accept=".pdf,.doc,.docx" required>
					<?php echo form_error('spt'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD REKENING<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | jpg,jpeg,png,pdf)</h7></label>
					<input type="file" name="rekening" class="form-control <?= (form_error('rekening') == "" ? '':'is-invalid') ?>" accept="image/*,application/pdf" required>
					<?php echo form_error('rekening'); ?>
				</div>

				<div class="button-default">
					<button type="submit" name="simpan" class="button">Simpan</button>
				</div>
			</div>
		</form>	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<script>
	function checkFileType() {
		var fileInput = document.getElementById('ktp');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

		if (!allowedExtensions.exec(filePath)) {
			alert('File tidak sesuai format. Harap pilih file dengan ekstensi .jpg, .jpeg, .png, atau .gif.');
			return false;
		}
	}
</script>

