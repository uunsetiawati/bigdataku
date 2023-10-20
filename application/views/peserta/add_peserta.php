<!--section title -->
<div class="section-title">
	<h5>Form Peserta Pelatihan </h5>
	<h4><?=$peserta['judul_pelatihan'];?> DI <?=$peserta['alamat_pelatihan'];?></h4>
	<?php
	$tglmulai = new DateTime($peserta['tgl_mulai']);
	$tglakhir = new DateTime($peserta['tgl_akhir']);
	?>
	<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
	<h6>Peserta : <?=$peserta['sasaran'];?></h6>
		
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
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= set_value('no_ktp'); ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA PESERTA<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_peserta'); ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama_peserta'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('tempat_lahir'); ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tempat_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= set_value('tgl_lahir'); ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tgl_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>				
				<select name="jk" class="form-control" required>
					<option value="" selected disabled>--PILIH JENIS KELAMIN--</option>
					<option value="L" <?=$this->input->post('jk') == 'L' ? 'selected':''?>>LAKI-LAKI</option>
					<option value="P" <?=$this->input->post('jk') == 'P' ? 'selected':''?>>PEREMPUAN</option>
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">STATUS PERKAWINAN<span class="section-subtitle"><code>*</code></span></label>				
				<select name="status" class="form-control" required>
					<option value="" selected disabled>--PILIH STATUS PERKAWINAN--</option>
					<option value="BELUM MENIKAH" <?=$this->input->post('status') == 'BELUM MENIKAH' ? 'selected':''?>>BELUM MENIKAH</option>
					<option value="MENIKAH" <?=$this->input->post('status') == 'MENIKAH' ? 'selected':''?>>MENIKAH</option>
					<option value="CERAI HIDUP" <?=$this->input->post('status') == 'CERAI HIDUP' ? 'selected':''?>>CERAI HIDUP</option>
					<option value="CERAI MATI" <?=$this->input->post('status') == 'CERAI MATI' ? 'selected':''?>>CERAI MATI</option>
				</select>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PENDIDIKAN<span class="section-subtitle"><code>*</code></span></label>				
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
			<div class="input-wrap">
				<label class="col-form-label">AGAMA<span class="section-subtitle"><code>*</code></span></label>				
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
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
				<?= form_error('rw'); ?>				
			</div>
			<!-- <div class="input-wrap row">
				<label class="col-3 col-form-label">PROVINSI</label>
				<div class="col-9">
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamisprov('provinsi', 'provinces', 'name', 'id','provinsi','toggleselect()',$this->input->post('provinsi'));
                ?> 
				</div>
			</div> -->
			<input type="hidden" name="provinsi" value="35">
			<div class="input-wrap">
				<label class="col-form-label">KAB/KOTA<span class="section-subtitle"><code>*</code></span></label>				
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskabupaten('kota', 'regencies', 'name', 'id','kota','toggleselect2()', $this->input->post('kota'));
				
                ?>				
				<?= form_error('kota'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>				
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskec('kecamatan', 'districts', 'id', 'id','kecamatan','toggleselect3()');
                ?> 								
				<?= form_error('kecamatan'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskel('kelurahan', 'villages', 'id', 'id','kelurahan');
                ?> 
				<?= form_error('kelurahan'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= set_value('no_telp'); ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_telp'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH ANDA PENYANDANG DISABILITAS<span class="section-subtitle"><code>*</code></span></label>
				<select name="disabilitas" class="form-control" required>
					<option value="" selected disabled>--PILIH SALAH SATU--</option>
					<option value="TIDAK" <?=$this->input->post('disabilitas') == 'TIDAK' ? 'selected':''?>>TIDAK</option>
					<option value="PENYANDANG DISABILITAS FISIK" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS FISIK' ? 'selected':''?>>PENYANDANG DISABILITAS FISIK</option>
					<option value="PENYANDANG DISABILITAS INTELEKTUAL" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS INTELEKTUAL' ? 'selected':''?>>PENYANDANG DISABILITAS INTELEKTUAL</option>
					<option value="PENYANDANG DISABILITAS MENTAL" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS MENTAL' ? 'selected':''?>>PENYANDANG DISABILITAS MENTAL</option>
					<option value="PENYANDANG DISABILITAS SENSORIK" <?=$this->input->post('disabilitas') == 'PENYANDANG DISABILITAS SENSORIK' ? 'selected':''?>>PENYANDANG DISABILITAS SENSORIK</option>
				</select>
			</div>
			<div class="form-wrapper" id="foto" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto" class="form-control" required>
				</div>
			</div>
			<div class="form-wrapper" id="foto_ktp" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto_ktp" class="form-control" required>
				</div>
			</div>
			<hr>
			<span class="section-subtitle"><code>.Digitalisasi Usaha</code></span>
			<div class="input-wrap">
				<label class="col-form-label">EMAIL USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="email_usaha" placeholder="MASUKKAN EMAIL USAHA" value="<?= set_value('email_usaha'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">WEBSITE USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="web_usaha" placeholder="MASUKKAN WEBSITE USAHA" value="<?= set_value('web_usaha'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MEDIA SOSIAL USAHA<span class="section-subtitle"><code>*</code></span></label>
                <label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="INSTAGRAM" <?= (!empty($this->input->post('sosmed')) && in_array('INSTAGRAM',$this->input->post('sosmed'))) ? 'checked' : ''?> />INSTAGRAM
                </label>
                <label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="FACEBOOK" <?= (!empty($this->input->post('sosmed')) && in_array('FACEBOOK',$this->input->post('sosmed'))) ? 'checked' : ''?> />FACEBOOK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="TIKTOK" <?= (!empty($this->input->post('sosmed')) && in_array('TIKTOK',$this->input->post('sosmed'))) ? 'checked' : ''?> />TIKTOK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="YOUTUBE" <?= (!empty($this->input->post('sosmed')) && in_array('YOUTUBE',$this->input->post('sosmed'))) ? 'checked' : ''?> />YOUTUBE
                </label>
				<label class="form-control2">
                <input type="checkbox" name="sosmed[]" value="LAINNYA" <?= (!empty($this->input->post('sosmed')) && in_array('LAINNYA',$this->input->post('sosmed'))) ? 'checked' : ''?> />LAINNYA
                </label>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MARKETPLACE USAHA<span class="section-subtitle"><code>*</code></span></label>
                <label class="form-control2">
                <input type="checkbox" name="market[]" value="SHOPEE" <?= (!empty($this->input->post('market')) && in_array('SHOPEE',$this->input->post('market'))) ? 'checked' : ''?>/>SHOPEE
                </label>
                <label class="form-control2">
                <input type="checkbox" name="market[]" value="LAZADA" <?= (!empty($this->input->post('market')) && in_array('LAZADA',$this->input->post('market'))) ? 'checked' : ''?>/>LAZADA
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="TOKOPEDIA" <?= (!empty($this->input->post('market')) && in_array('TOKOPEDIA',$this->input->post('market'))) ? 'checked' : ''?>/>TOKOPEDIA
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="BUKALAPAK" <?= (!empty($this->input->post('market')) && in_array('BUKALAPAK',$this->input->post('market'))) ? 'checked' : ''?>/>BUKALAPAK
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="BLIBLI" <?= (!empty($this->input->post('market')) && in_array('BLIBLI',$this->input->post('market'))) ? 'checked' : ''?>/>BLIBLI
                </label>
				<label class="form-control2">
                <input type="checkbox" name="market[]" value="LAINNYA" <?= (!empty($this->input->post('market')) && in_array('LAINNYA',$this->input->post('market'))) ? 'checked' : ''?>/>LAINNYA
                </label>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH TERDAFTAR DI PLATFORM PENGADAAN BARANG JASA<span class="section-subtitle"><code>*</code></span></label>
                <label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="BELA PENGADAAN" <?= (!empty($this->input->post('pengadaan')) && in_array('BELA PENGADAAN',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>BELA PENGADAAN
                </label>
                <label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="E-KATALOG" <?= (!empty($this->input->post('pengadaan')) && in_array('E-KATALOG',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>E-KATALOG
                </label>
				<label class="form-control2">
                <input type="checkbox" name="pengadaan[]" value="LAINNYA" <?= (!empty($this->input->post('pengadaan')) && in_array('LAINNYA',$this->input->post('pengadaan'))) ? 'checked' : '';?>/>LAINNYA
                </label>	
			</div>
			
			<hr>
			<span class="section-subtitle"><code>.Transformasi Usaha</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERIZINAN USAHA YANG DIMILIKI<span class="section-subtitle"><code>*</code></span></label>
					<?php
					foreach($izin as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="izin[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('izin')) && in_array($row->nama,$this->input->post('izin', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>
			<hr>
			<span class="section-subtitle"><code>.Informasi Lainnya</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERMASALAHAN YANG DIHADAPI<span class="section-subtitle"><code>*</code></span></label>
					<?php
					foreach($masalah as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="masalah[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('masalah')) && in_array($row->nama,$this->input->post('masalah', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KEBUTUHAN DIKLAT / PELATIHAN<span class="section-subtitle"><code>*</code></span></label>
					<?php
					foreach($kebutuhan as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="kebutuhan[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('kebutuhan')) && in_array($row->nama,$this->input->post('kebutuhan', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
			</div>
			
			

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			<hr>
			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->
			
			  
			<!-- <div class="input-wrap row">
				<label class="col-3 col-form-label">JENIS PESERTA</label>
				<div class="col-9">
				<select name="jenis_peserta" class="form-control" onchange="ukmkoperasi()" id="pilihtipe" selected="<?=$this->input->post('jenis_peserta')?>">
					<option value="" selected disabled>--PILIH JENIS PESERTA--</option>						
					<option value="KOPERASI">KOPERASI</option>
					<option value="UKM">UKM</option>
					<option value="CALON WIRAUSAHA">CALON WIRAUSAHA</option>
				</select>
				</div>
			</div> -->

			<?php
				if($peserta['sasaran']=='KOPERASI'){
					$this->load->view('peserta/add_peserta_koperasi');
				}else if($peserta['sasaran']=='UKM'){
					$this->load->view('peserta/add_peserta_ukm');
				}else if($peserta['sasaran']=='CALON WIRAUSAHA'){
					$this->load->view('peserta/add_peserta_calon_wirausaha');
				}
			?>	

		<!-- <div class="button-default">
			<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
		</div> -->

			
	</form>			
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('peserta/script_peserta')?>
