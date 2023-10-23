<!--section title -->
<div class="section-title">
	<h6>Kode Kegiatan</h6>
	<span class="section-subtitle"><code>Tambah Kode Kegiatan</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('kode/add') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="kode" placeholder="Kode Kegiatan" value="<?= set_value('kode'); ?>" class="form-control <?= (form_error('kode') == "" ? '':'is-invalid') ?>">
				<?= form_error('kode'); ?> 
			</div>
			<div class="input-wrap">
				<input type="text" name="uraian" placeholder="Uraian Kode Kegiatan" value="<?= set_value('uraian'); ?>" class="form-control <?= (form_error('uraian') == "" ? '':'is-invalid') ?>">
				<?= form_error('uraian'); ?> 
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
			
				<?php
					echo anchor('kode', 'Kembali', array('class'=>'button2'));
				?>	
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator