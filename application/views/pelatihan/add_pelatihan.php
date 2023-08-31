<!--section title -->
<div class="section-title">
	<h6>Data Pelatihan</h6>
	<span class="section-subtitle"><code>Tambah Data Pelatihan</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert\flash_alert.php') ?>


<div class="container">
	<form action="<?= site_url('pelatihan/add') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="judul" class="form-control" placeholder="JUDUL PELATIHAN" value="<?= set_value('judul'); ?>" class="form-control <?= (form_error('judul') == "" ? '':'is-invalid') ?>">
				<?= form_error('judul'); ?> 
			</div>
			<div class="input-wrap">
				<?php
                // cmb_dinamis(nama, tabelnya, fieldnya, pknya, selected, extra)
                  echo cmb_dinamis('kode', 'tb_kodekegiatan', 'uraian', 'id',null);
                ?> 
				<?= form_error('kode'); ?>                
			</div>
			<div class="input-wrap">
				<select name="divisi" class="form-control" required>
					<option value="" selected disabled>PILIH DIVISI</option>
					<option value="PENGEMBANGAN">PENGEMBANGAN</option>
					<option value="PENYELENGGARA">PENYELENGGARA</option>
					<option value="DAK">DAK</option>
				</select>
			</div>
			<div class="input-wrap">
				<input type="text" name="alamat" class="form-control" placeholder="TEMPAT PELATIHAN" value="<?= set_value('alamat'); ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>
			</div>
			<div class="input-wrap">
				<?php
                // cmb_dinamis(nama, tabelnya, fieldnya, pknya, selected, extra)
                  echo cmb_dinamiskota('kota', 'regencies', 'name', 'id','35');
                ?>                
			</div>
			<div class="input-wrap">
				<select name="jenis" class="form-control" required>
					<option value="" selected disabled>PILIH JENIS PELATIHAN</option>
					<option value="OFFLINE">OFFLINE</option>
					<option value="ONLINE">ONLINE</option>
				</select>
			</div>
			<div class="input-wrap">
				<input type="date" name="awal" placeholder="Tanggal Mulai Pelatihan" class="form-control" required="">
			</div>
			<div class="input-wrap">
				<input type="date" name="akhir" placeholder="Tanggal Akhir Pelatihan" class="form-control" required="">
			</div>
			<div class="input-wrap">
				<select name="status" class="form-control" required>
					<option value="" selected disabled>PILIH STATUS</option>
					<option value="1">Aktif</option>
					<option value="2">Tidak Aktif</option>
				</select>
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator