<!--section title -->
<div class="section-title">
	<h6>Data Pelatihan</h6>
	<span class="section-subtitle"><code>Tambah Data Pelatihan</code></span>
</div>
<!-- end section title -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('pelatihan/add') ?>" method="post" id="add" class="form-outline">
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<input type="text" name="judul" placeholder="JUDUL PELATIHAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('judul'); ?>" class="form-control <?= (form_error('judul') == "" ? '':'is-invalid') ?>">
				<?= form_error('judul'); ?> 
			</div>

			<span class="section-subtitle"><code>.Kode Anggaran</code></span>
			
			<div class="input-wrap">				
				<input type="text" name="program" placeholder="KODE ANGGARAN PROGRAM" value="<?= set_value('program'); ?>" class="form-control <?= (form_error('program') == "" ? '':'is-invalid') ?>">
				<?= form_error('program'); ?>					
			</div>
			<div class="input-wrap">
				<input type="text" name="kegiatan" placeholder="KODE ANGGARAN KEGIATAN" value="<?= set_value('kegiatan'); ?>" class="form-control <?= (form_error('kegiatan') == "" ? '':'is-invalid') ?>">
				<?= form_error('kegiatan'); ?>						
			</div>
			<div class="input-wrap">
				<input type="text" name="subkegiatan" placeholder="KODE ANGGARAN SUB KEGIATAN" value="<?= set_value('subkegiatan'); ?>" class="form-control <?= (form_error('subkegiatan') == "" ? '':'is-invalid') ?>">
				<?= form_error('subkegiatan'); ?>						
			</div>
			<hr>
			<div class="input-wrap">
				<select name="divisi" class="form-control" required>
					<option value="" selected disabled>PILIH DIVISI</option>
					<option value="PENGEMBANGAN" <?=$this->input->post('divisi') == 'PENGEMBANGAN' ? 'selected':''?>>PENGEMBANGAN</option>
					<option value="PENYELENGGARA" <?=$this->input->post('divisi') == 'PENYELENGGARA' ? 'selected':''?>>PENYELENGGARA</option>
					<option value="DAK" <?=$this->input->post('divisi') == 'DAK' ? 'selected':''?>>DAK</option>
				</select>
			</div>
			<div class="input-wrap">
				<input type="text" name="alamat" placeholder="TEMPAT PELATIHAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>
			</div>
			<div class="input-wrap">
				<?php
                // cmb_dinamis(nama, tabelnya, fieldnya, pknya, selected, extra)
                  echo cmb_dinamiskota('kota', 'regencies', 'name', 'id','35',$this->input->post('kota'));
                ?>                
			</div>
			<div class="input-wrap">
				<select name="jenis" class="form-control" required>
					<option value="" selected disabled>PILIH JENIS PELATIHAN</option>
					<option value="OFFLINE" <?=$this->input->post('jenis') == 'OFFLINE' ? 'selected':''?>>OFFLINE</option>
					<option value="ONLINE" <?=$this->input->post('jenis') == 'ONLINE' ? 'selected':''?>>ONLINE</option>
				</select>
			</div>
			<div class="input-wrap">
				<input type="date" name="awal" value="<?= set_value('awal')?>" placeholder="Tanggal Mulai Pelatihan" class="form-control" required="">
			</div>
			<div class="input-wrap">
				<input type="date" name="akhir" value="<?= set_value('akhir')?>" placeholder="Tanggal Akhir Pelatihan" class="form-control" required="">
			</div>
			<div class="input-wrap">
				<select name="sasaran" class="form-control" required>
					<option value="" selected disabled>PILIH SASARAN PESERTA</option>
					<option value="KOPERASI" <?=$this->input->post('sasaran') == 'KOPERASI' ? 'selected':''?>>KOPERASI</option>
					<option value="UKM" <?=$this->input->post('sasaran') == 'UKM' ? 'selected':''?>>UKM</option>
					<option value="CALON WIRAUSAHA" <?=$this->input->post('sasaran') == 'CALON WIRAUSAHA' ? 'selected':''?>>CALON WIRAUSAHA</option>
					<option value="SAFARI PODCAST" <?=$this->input->post('sasaran') == 'SAFARI PODCAST' ? 'selected':''?>>SAFARI PODCAST</option>
				</select>
			</div>
			<div class="input-wrap">
				<select name="status" class="form-control" required>
					<option value="" selected disabled>PILIH STATUS</option>
					<option value="1" <?=$this->input->post('status') == '1' ? 'selected':''?>>AKTIF</option>
					<option value="2" <?=$this->input->post('status') == '2' ? 'selected':''?>>TIDAK AKTIF</option>
				</select>
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