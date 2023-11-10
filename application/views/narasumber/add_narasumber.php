<!--section title -->
<div class="section-title">
	<h6>Data Narasumber</h6>
	<span class="section-subtitle"><code>Tambah Data Narasumber</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">

		<form action="<?= site_url('narasumber/add/'.$this->uri->segment('3')) ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
		<?php 
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		?>
		<?=form_hidden('now',$now);?>
		<?=form_hidden('kodeunik',$this->uri->segment(3));?>
			<div class="form-wrapper">				
				<div class="input-wrap">
					<label class="col-form-label">NIK NARASUMBER<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= $narsum['nik'] ?>" class="form-control <?= (form_error('nik') == "" ? '':'is-invalid') ?>">
					<?= form_error('nik'); ?>					
				</div>            
				<div class="input-wrap">
					<label class="col-form-label">NAMA NARASUMBER<span class="section-subtitle"><code>*</code></span></label>
					<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $narsum['nama'] ?>" class="form-control" required readonly> 
				</div>		
				
				<div class="input-wrap">	
					<label class="col-form-label">INSTANSI NARASUMBER<span class="section-subtitle"><code>*</code></span></label>			
					<input type="text" name="instansi" placeholder="ASAL INSTANSI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $narsum['instansi'] ?>" class="form-control" required readonly>					
				</div>
				<div class="input-wrap">
					<label class="col-form-label">JUDUL MATERI<span class="section-subtitle"><code>*</code></span></label>	
					<input type="text" name="materi_judul" placeholder="JUDUL MATERI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('materi_judul') ?>" class="form-control" required>						
				</div>			
				<hr>
				<div class="input-wrap">
					<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>	
					<?php
					echo form_dropdown('jk', array( 'LAKI-LAKI'=>'LAKI-LAKI', 'PEREMPUAN'=>'PEREMPUAN'), $narsum['jk'], "class='form-control' selected disabled");		
					?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="hp" placeholder="NO. TELP/HP" value="<?= $narsum['hp']; ?>" class="form-control" reuired readonly>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD MATERI<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 10MB | pdf,ppt)</h7></label>
					<input type="file" name="materi" class="form-control <?= (form_error('materi') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('materi'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD SPT (SURAT PERINTAH TUGAS)<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf|doc|docx)</h7></label>
					<input type="file" name="spt" class="form-control <?= (form_error('spt') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('spt'); ?>
				</div>

				<?=form_hidden('ktp',$narsum['ktp'])?>
				<?=form_hidden('npwp',$narsum['npwp'])?>
				<?=form_hidden('cv',$narsum['cv'])?>
				<?=form_hidden('rekening',$narsum['rekening'])?>

				<div class="button-default">
					<button type="submit" name="simpan" class="button">Simpan</button>
				</div>
			</div>
		</form>	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator