<!--section title -->
<div class="section-title">
	<h6>Bentuk Koperasi</h6>
	<span class="section-subtitle"><code>Tambah Bentuk Koperasi</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert\flash_alert.php') ?>


<div class="container">
	<form action="<?= site_url('bentukkoperasi/add') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="nama" placeholder="Bentuk Koperasi" value="<?= set_value('nama'); ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama'); ?> 
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
			
				<?php
					echo anchor('bentukkoperasi', 'Kembali', array('class'=>'button2'));
				?>	
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator