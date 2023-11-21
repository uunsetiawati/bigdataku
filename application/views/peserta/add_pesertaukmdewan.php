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

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('peserta/add_pesertadewan/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id_pel',$peserta['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= set_value('no_ktp'); ?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
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
                  echo cmb_dinamiskabupaten('kota', 'regencies', 'name', 'id','kota','toggleselect2()');				
                ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>				
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskec('kecamatan', 'districts', 'id', 'id','kecamatan','toggleselect3()');
                ?> 							
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskel('kelurahan', 'villages', 'id', 'id','kelurahan');
                ?> 
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
					<input type="file" name="foto" class="form-control <?= (form_error('foto') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto'); ?>
				</div>
			</div>
			<div class="form-wrapper" id="foto_ktp" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto_ktp" class="form-control <?= (form_error('foto_ktp') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto_ktp'); ?>
				</div>
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
			
			  
			<span class="section-subtitle"><code>.DATA UMKM</code></span>
            <div class="input-wrap">
				<label class="col-form-label">NOMOR NIB<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nib" placeholder="NOMOR NIB" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nib'); ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">NAMA USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_usaha'); ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
				<label class="col-form-label">STATUS USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('status_usaha', 'tb_legalitas_usaha', 'nama', 'nama','--PILIH STATUS USAHA--',$this->input->post('status_usaha'));
                ?>
			</div>   
            <div class="input-wrap">
				<label class="col-form-label">SERTIFIKASI USAHA</label>
				<?php
				foreach($sertifikasi as $row){?>
					<label class="form-control2">
					<input type="checkbox" name="sertifikasi[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('sertifikasi')) && in_array($row->nama,$this->input->post('sertifikasi', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
					</label>
				<?php }
				?>
			</div>  
            <div class="input-wrap">
				<label class="col-form-label">SEKTOR USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'nama','--PILIH SEKTOR USAHA--', $this->input->post('sektor_usaha'));
                ?>
            </div> 
            <div class="input-wrap">
				<label class="col-form-label">BIDANG USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'nama','--PILIH BIDANG USAHA--', $this->input->post('bidang_usaha'));
                ?>
            </div>     
            <div class="input-wrap">
				<label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_kopukm'); ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= set_value('rt_kopukm'); ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= set_value('rw_kopukm'); ?>" class="form-control">
			</div>
            <input type="hidden" name="prov_kopukm" value="35">
            <div class="input-wrap">
				<label class="col-form-label">KAB / KOTA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskabupaten('kota_kopukm', 'regencies', 'name', 'id','kota_koperasi','tskota()');                
                ?> 
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskec('kec_kopukm', 'districts', 'id', 'id','kec_koperasi','tskec()');
                ?> 		
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskel('kel_kopukm', 'villages', 'id', 'id','kel_koperasi');
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODEPOS<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= set_value('kodepos_kopukm'); ?>" class="form-control" required>
			</div>
            <div class="input-wrap">
				<label class="col-form-label">MODAL UMK PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
				<select name="modal_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH MODAL USAHA--</option>
					<option value="< 1M" <?=$this->input->post('modal_usaha') == '< 1M' ? 'selected':''?>>< 1M</option>
					<option value="1M-5M" <?=$this->input->post('modal_usaha') == '1M-5M' ? 'selected':''?>>1M-5M</option>
					<option value="5M-10M" <?=$this->input->post('modal_usaha') == '5M-10M' ? 'selected':''?>>5M-10M</option>										
				</select>
			</div>
            <div class="input-wrap">
				<label class="col-form-label">NILAI MODAL UMK PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= set_value('nilai_modalusaha'); ?>" class="form-control" required>
            </div>	
            <div class="input-wrap"> 
				<label class="col-form-label">OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
				<select name="omzet_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH OMZET USAHA--</option>
					<option value="< 2M" <?=$this->input->post('omzet_usaha') == '< 2M' ? 'selected':''?>>< 2M</option>
					<option value="2M-15M" <?=$this->input->post('omzet_usaha') == '2M-15M' ? 'selected':''?>>2M-15M</option>
					<option value="15M-50M" <?=$this->input->post('omzet_usaha') == '15M-50M' ? 'selected':''?>>15M-50M</option>										
				</select>
			</div>
            <div class="input-wrap">
				<label class="col-form-label">NILAI OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah2" placeholder="NILAI OMZET USAHA" value="<?= set_value('nilai_omzetusaha'); ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
				<label class="col-form-label">JUMLAH KARYAWAN LAKI-LAKI<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjal" placeholder="JUMLAH KARYAWAN LAKI-LAKI" value="<?= set_value('jml_tenaga_kerjal'); ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">JUMLAH KARYAWAN PEREMPUAN<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjap" placeholder="JUMLAH PEREMPUAN" value="<?= set_value('jml_tenaga_kerjap'); ?>" class="form-control" required>
                </div>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/ LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'nama','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran'));
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('lokasi_pemasaran'); ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA<span class="section-subtitle"><code>*</code></span></label>
				<select name="jabatan" class="form-control" required>
					<option value="" selected disabled>--PILIH JABATAN PESERTA--</option>
					<option value="PEMILIK" <?=$this->input->post('jabatan') == 'PEMILIK' ? 'selected':''?>>PEMILIK</option>
					<option value="KARYAWAN" <?=$this->input->post('jabatan') == 'KARYAWAN' ? 'selected':''?>>KARYAWAN</option>									
				</select>
				</div>
			</div>            
           
            <div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
			</div>			
	</form>			
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('peserta/script_peserta')?>

<script>
            /* Dengan Rupiah */
  var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

  var dengan_rupiah2 = document.getElementById('dengan-rupiah2');
  dengan_rupiah2.addEventListener('keyup', function(e)
  {
      dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
  });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
