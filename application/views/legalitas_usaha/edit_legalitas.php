<!--section title -->
<div class="section-title">
	<h6>Legalitas Usaha</h6>
	<span class="section-subtitle"><code>Edit Legalitas Usaha</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('legalitas/edit') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta');
	$now=date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$this->input->post('id') ?? $legalitas['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="nama" placeholder="Legalitas Usaha" value="<?= $this->input->post('nama') ?? $legalitas['nama']; ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama'); ?> 
			</div>			
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
				<?php
					echo anchor('legalitas', 'Kembali', array('class'=>'button2'));
				?>
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator