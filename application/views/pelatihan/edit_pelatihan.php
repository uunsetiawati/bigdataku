<!--section title -->
<div class="section-title">
	<h6>Data Pelatihan</h6>
	<span class="section-subtitle"><code>Edit Data Pelatihan</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('pelatihan/edit') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta');
	$now=date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$pelatihan['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="judul" placeholder="Judul Pelatihan" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('judul') ?? $pelatihan['judul_pelatihan']; ?>" class="form-control <?= (form_error('judul') == "" ? '':'is-invalid') ?>">
				<?= form_error('judul'); ?> 
			</div>
			<div class="input-wrap">
				<input type="text" name="program" placeholder="KODE ANGGARAN PROGRAM" value="<?= $this->input->post('program') ?? $pelatihan['program']; ?>" class="form-control <?= (form_error('program') == "" ? '':'is-invalid') ?>">
					<?= form_error('program'); ?>          
				 
			</div>
			<div class="input-wrap">
				<input type="text" name="kegiatan" placeholder="KODE ANGGARAN KEGIATAN" value="<?= $this->input->post('kegiatan') ?? $pelatihan['kegiatan']; ?>" class="form-control <?= (form_error('kegiatan') == "" ? '':'is-invalid') ?>">
					<?= form_error('kegiatan'); ?>          
				 
			</div>
			<div class="input-wrap">
				<input type="text" name="subkegiatan" placeholder="KODE ANGGARAN SUB KEGIATAN" value="<?= $this->input->post('subkegiatan') ?? $pelatihan['subkegiatan']; ?>" class="form-control <?= (form_error('subkegiatan') == "" ? '':'is-invalid') ?>">
					<?= form_error('subkegiatan'); ?>          
				 
			</div>
			<div class="input-wrap">
				<?php
					echo form_dropdown('divisi', array('PENGEMBANGAN'=>'PENGEMBANGAN', 'PENYELENGGARA'=>'PENYELENGGARA', 'DAK'=>'DAK'), $pelatihan['divisi'], "class='form-control'");
				?>
			</div>
			<div class="input-wrap">
				<input type="text" name="alamat" placeholder="Tempat Pelatihan" value="<?= $this->input->post('alamat') ?? $pelatihan['alamat_pelatihan']; ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>
			</div>
			<div class="input-wrap">
				<?php
                // cmb_dinamis(nama, tabelnya, fieldnya, pknya, selected, extra)
                 	echo cmb_dinamiskota('kota', 'regencies', 'name', 'id','35', $this->input->post('kota') ?? $pelatihan['kota'], "class='form-control'");
                ?>   
				<?= form_error('kota'); ?>            
				 
			</div>
			<div class="input-wrap">
				<?php
					echo form_dropdown('jenis', array( 'OFFLINE'=>'OFFLINE', 'ONLINE'=>'ONLINE'), $pelatihan['jenis_pelatihan'], "class='form-control'");
				?>
			</div>
			<div class="input-wrap">
				<input type="date" name="awal" value="<?php echo $pelatihan['tgl_mulai']; ?>"  class="form-control" placeholder="Tanggal Mulai Pelatihan" required="">
			</div>
			<div class="input-wrap">
				<input type="date" name="akhir" value="<?php echo $pelatihan['tgl_akhir']; ?>" class="form-control" placeholder="Tanggal Akhir Pelatihan" required="">
			</div>
			<div class="input-wrap">
				<?php
					echo form_dropdown('sasaran', array('KOPERASI'=>'KOPERASI', 'UKM'=>'UKM', 'CALON WIRAUSAHA'=>'CALON WIRAUSAHA','SAFARI PODCAST'=>'SAFARI PODCAST'), $pelatihan['sasaran'], "class='form-control'");
				?>
			</div>
			<div class="input-wrap">
				<?php
					echo form_dropdown('status', array( '1'=>'AKTIF', '2'=>'TIDAK AKTIF'), $pelatihan['status'], "class='form-control'");
				?>
			</div>
			<div class="button-default">
				<button type="submit" name="simpan" class="button">Simpan</button>
				<?php
					echo anchor('pelatihan', 'Kembali', array('class'=>'button2'));
				?>
			</div>
		</div>
	</form>
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator