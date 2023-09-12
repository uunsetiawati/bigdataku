<!--section title -->
<div class="section-title">
	<h5>Form Peserta Pelatihan </h5>
	<h4><?=$peserta['judul_pelatihan'];?> DI <?=$peserta['alamat_pelatihan'];?></h6>
	<?php
	$tglmulai = new DateTime($peserta['tgl_mulai']);
	$tglakhir = new DateTime($peserta['tgl_akhir']);
	?>
	<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> - <?=$tglakhir->format("d-m-Y")?></h6>
	<h6>	
</div>
<!-- end section title -->

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('_FlashAlert\flash_alert.php') ?>


<div class="container">
	<form action="<?= site_url('peserta/add_peserta/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id_pel',$peserta['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap row">
				<label class="col-3 col-form-label">NO. KTP/NIK</label>
				<div class="col-9">
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= set_value('no_ktp'); ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_ktp'); ?> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">NAMA PESERTA</label>
				<div class="col-9">
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" value="<?= set_value('nama_peserta'); ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama_peserta'); ?> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">TEMPAT LAHIR</label>
				<div class="col-9">
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('tempat_lahir'); ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tempat_lahir'); ?> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">TANGGAL LAHIR</label>
				<div class="col-9">
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= set_value('tgl_lahir'); ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tgl_lahir'); ?> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">JENIS KELAMIN</label>
				<div class="col-9">
				<select name="jk" class="form-control" required>
					<option value="" selected disabled>--PILIH JENIS KELAMIN--</option>
					<option value="L" <?=$this->input->post('jk') == 'L' ? 'selected':''?>>LAKI-LAKI</option>
					<option value="P" <?=$this->input->post('jk') == 'P' ? 'selected':''?>>PEREMPUAN</option>
				</select>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">STATUS PERKAWINAN</label>
				<div class="col-9">
				<select name="status" class="form-control" required>
					<option value="" selected disabled>--PILIH STATUS PERKAWINAN--</option>
					<option value="BELUM MENIKAH" <?=$this->input->post('status') == 'BELUM MENIKAH' ? 'selected':''?>>BELUM MENIKAH</option>
					<option value="MENIKAH" <?=$this->input->post('status') == 'MENIKAH' ? 'selected':''?>>MENIKAH</option>
					<option value="CERAI HIDUP" <?=$this->input->post('status') == 'CERAI HIDUP' ? 'selected':''?>>CERAI HIDUP</option>
					<option value="CERAI MATI" <?=$this->input->post('status') == 'CERAI MATI' ? 'selected':''?>>CERAI MATI</option>
				</select>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">PENDIDIKAN</label>
				<div class="col-9">
				<select name="pendidikan" class="form-control" required>
					<option value="" selected disabled>--PILIH PENDIDIKAN--</option>
					<option value="SD" <?=$this->input->post('pendidikan') == 'SD' ? 'selected':''?>>SD</option>
					<option value="SMP" <?=$this->input->post('pendidikan') == 'SMP' ? 'selected':''?>>SMP</option>
					<option value="SMA/SMK" <?=$this->input->post('pendidikan') == 'SMA/SMK' ? 'selected':''?>>SMA/SMK</option>
					<option value="S-1" <?=$this->input->post('pendidikan') == 'S-1' ? 'selected':''?>>S-1</option>
					<option value="S-2" <?=$this->input->post('pendidikan') == 'S-2' ? 'selected':''?>>S-2</option>
					<option value="S-3" <?=$this->input->post('pendidikan') == 'S-3' ? 'selected':''?>>S-3</option>
					<option value="TIDAK SEKOLAH" <?=$this->input->post('pendidikan') == 'TIDAK SEKOLAH' ? 'selected':''?>>TIDAK SEKOLAH</option>
				</select>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">AGAMA</label>
				<div class="col-9">
				<select name="agama" class="form-control" required>
					<option value="" selected disabled>--PILIH AGAMA--</option>
					<option value="ISLAM" <?=$this->input->post('agama') == 'ISLAM' ? 'selected':''?>>ISLAM</option>
					<option value="KRISTEN" <?=$this->input->post('agama') == 'KRISTEN' ? 'selected':''?>>KRISTEN</option>
					<option value="KATOLIK" <?=$this->input->post('agama') == 'KATOLIK' ? 'selected':''?>>KATOLIK</option>
					<option value="HINDU" <?=$this->input->post('agama') == 'HINDU' ? 'selected':''?>>HINDU</option>
					<option value="BUDHA" <?=$this->input->post('agama') == 'BUDHA' ? 'selected':''?>>BUDHA</option>
					<option value="KONGHUCHU" <?=$this->input->post('agama') == 'KONGHUCHU' ? 'selected':''?>>KONGHUCHU</option>					
				</select>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">ALAMAT</label>
				<div class="col-9">
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">RT</label>
				<div class="col-9">
				<input type="text" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">RW</label>
				<div class="col-9">
				<input type="text" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
				<?= form_error('rw'); ?>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">PROVINSI</label>
				<div class="col-9">
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamisprov('provinsi', 'provinces', 'name', 'id','provinsi','toggleselect()',$this->input->post('provinsi'));
                ?> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">KAB/KOTA</label>
				<div class="col-9">
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskab('kota', 'regencies', 'id', 'id','kota','toggleselect2()');
				
                ?> 
				</div>
				<?= form_error('kota'); ?>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">KECAMATAN</label>
				<div class="col-9">
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskec('kecamatan', 'districts', 'id', 'id','kecamatan','toggleselect3()');
                ?> 				
				</div>
				<?= form_error('kecamatan'); ?>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">KELURAHAN</label>
				<div class="col-9">
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskel('kelurahan', 'villages', 'id', 'id','kelurahan');
                ?> 
				<?= form_error('kelurahan'); ?>
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">NO.TELP/WA</label>
				<div class="col-9">
				<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= set_value('no_telp'); ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_telp'); ?>
				</div>
			</div>
			

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			<hr>
			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			<!-- <?= form_close()?> -->
			  
			<div class="input-wrap row">
				<label class="col-3 col-form-label">JENIS PESERTA</label>
				<div class="col-9">
				<select name="jenis_peserta" class="form-control" onchange="ukmkoperasi()" id="pilihtipe" selected="<?=$this->input->post('jenis_peserta')?>">
					<option value="" selected disabled>--PILIH JENIS PESERTA--</option>						
					<option value="KOPERASI">KOPERASI</option>
					<option value="UKM">UKM</option>
					<option value="CALON WIRAUSAHA">CALON WIRAUSAHA</option>
				</select>
				</div>
			</div>
			

			
			<div class="form-wrapper" id="koperasi" style="display:none;">
				<?php $this->load->view('peserta/add_peserta_koperasi')?>				
				
			</div>

			<div class="form-wrapper" id="ukm" style="display:none;">
				<?php $this->load->view('peserta/add_peserta_ukm')?>				
			</div>

			<div class="form-wrapper" id="foto" style="display:none;">
				<div class="input-wrap row">
					<label class="col-3 col-form-label">UPLOAD FOTO DIRI</label>
					<div class="col-9">
					<input type="file" name="userfile" class="form-control" required>
					</div>
				</div>
			</div>

			<div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:none">Simpan</button>
			</div>
	</form>			
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('peserta/script_peserta')?>
