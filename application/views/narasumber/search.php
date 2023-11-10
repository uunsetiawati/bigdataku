<!--section title -->
<div class="section-title">
	<h6>Data Narasumber</h6>
	<span class="section-subtitle"><code>Cari Data Narasumber</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('narasumber/search/'.$this->uri->segment(3)) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">
		<div class="form-wrapper">	
			<div class="input-wrap">
				<label class="col-form-label">CARI NIK NARASUMBER<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="nikk" placeholder="NIK / NO. KTP" value="<?= set_value('nikk'); ?>" class="form-control <?= (form_error('nikk') == "" ? '':'is-invalid') ?>">
				<?= form_error('nikk'); ?>
			</div> 
		</div>
		<button class="button button-fill button-rounded">Cari</button>

	</form>
	<hr>

	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

