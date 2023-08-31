<!--section title -->
<div class="section-title">
	<h6>Sertifikasi</h6>
	<span class="section-subtitle"><code>Edit Sertifikasi</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert\flash_alert.php') ?>


<div class="container">
	<form action="<?= site_url('klasifikasi/edit') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta');
	$now=date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$this->input->post('id') ?? $klasifikasi['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="nama" placeholder="Klasifikasi Usaha" value="<?= $this->input->post('nama') ?? $klasifikasi['nama']; ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama'); ?> 
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
				<?php
					echo anchor('klasifikasi', 'Kembali', array('class'=>'button2'));
				?>
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator