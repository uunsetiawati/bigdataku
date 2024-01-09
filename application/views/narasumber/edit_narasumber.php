<!--section title -->
<div class="section-title">
	<h6>Data Narasumber</h6>
	<span class="section-subtitle"><code>Edit Data Narasumber</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('narasumber/edit') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta');
	$now=date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$narsum['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<label class="col-form-label">NIK NARASUMBER<span class="section-subtitle"><code>*</code></span></label>	
				<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= $this->input->post('nik') ?? $narsum['nik'] ?>" class="form-control <?= (form_error('nik') == "" ? '':'is-invalid') ?>">
					<?= form_error('nik'); ?>					
			</div>            
			<div class="input-wrap">
				<label class="col-form-label">NAMA NARASUMBER<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama') ?? $narsum['nama']; ?>" class="form-control" required> 
			</div>		
			
			<div class="input-wrap">	
				<label class="col-form-label">INSTANSI NARASUMBER<span class="section-subtitle"><code>*</code></span></label>			
				<input type="text" name="instansi" placeholder="ASAL INSTANSI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('instansi') ?? $narsum['instansi'] ?>" class="form-control" required>					
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JUDUL MATERI<span class="section-subtitle"><code>*</code></span></label>	
				<input type="text" name="materi_judul" placeholder="JUDUL MATERI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('materi_judul') ?? $narsum['materi_judul']?>" class="form-control" required>						
			</div>			
			<hr>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>	
				<?php
				echo form_dropdown('jk', array('LAKI-LAKI'=>'LAKI-LAKI', 'PEREMPUAN'=>'PEREMPUAN'), $narsum['jk'], "class='form-control'");
				?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
				<input type="number" name="hp" placeholder="NO. TELP/HP" value="<?= $this->input->post('hp') ?? $narsum['hp']; ?>" class="form-control" required>
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
				<?php
					echo anchor('narasumber/viewdatanarsum/'.$narsum['kodeunik'], 'Kembali', array('class'=>'button2'));
				?>
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator