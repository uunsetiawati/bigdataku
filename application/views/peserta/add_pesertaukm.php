<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="200px">
				<h5>FORM PESERTA PELATIHAN</h5>
				<h5><b><?=$peserta['judul_pelatihan']?> </b></h5>
				<h6><?=$peserta['alamat_pelatihan'];?></h6>
				<?php
				$tglmulai = new DateTime($peserta['tgl_mulai']);
				$tglakhir = new DateTime($peserta['tgl_akhir']);
				?>
				<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
				<h6>Peserta : <?=$peserta['sasaran'];?></h6>
				
			</div>                          
		</div>
	</div>
</div>
<!-- end section title -->

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


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
					<option value="LAKI-LAKI" <?=$this->input->post('jk') == 'LAKI-LAKI' ? 'selected':''?>>LAKI-LAKI</option>
					<option value="PEREMPUAN" <?=$this->input->post('jk') == 'PEREMPUAN' ? 'selected':''?>>PEREMPUAN</option>
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
			<div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <select name="provinsi" class="form-control" id="provinsi" required>
                    <option selected disabled>- PILIH PROVINSI -</option>
                    <?php 
                        foreach($provinsi as $prov)
                        {
                            echo '<option value="'.$prov->id.'">'.$prov->name.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kota" class="form-control" id="kabupaten" required>
                    <option value='' selected disabled>- PILIH KABUPATEN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kecamatan" class="form-control" id="kecamatan" required>
                    <option value='' selected disabled>- PILIH KECAMATAN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kelurahan" class="form-control" id="desa" required>
                    <option value='' selected disabled>- PILIH KELURAHAN -</option>
                </select>
            </div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= set_value('no_telp'); ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
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
				<label class="col-form-label">STATUS USAHA/LEGALITAS USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('status_usaha', 'tb_legalitas_usaha', 'nama', 'nama','--PILIH STATUS USAHA--',$this->input->post('status_usaha'));
                ?>
			</div>   
            <div class="input-wrap">
				<label class="col-form-label">SERTIFIKASI PRODUK USAHA<span class="section-subtitle"><code>*</code></span></label>
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
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'nama','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha'));
                ?>
            </div> 
            <div class="input-wrap">
				<label class="col-form-label">BIDANG USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'nama','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('bidang_usaha'));
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
            <!-- <input type="hidden" name="prov_kopukm" value="35"> -->
            <div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <select name="prov_kopukm" class="form-control" id="provinsiukm" required>
                    <option>- PILIH PROVINSI -</option>
                    <?php 
                        foreach($provinsi as $prov)
                        {
                            echo '<option value="'.$prov->id.'">'.$prov->name.'</option>';
                        }
                    ?>
                </select>
            </div>            
            <div class="input-wrap">
				<label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kota_kopukm" class="form-control" id="kabupatenukm" required>
                    <option value=''>- PILIH KABUPATEN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kec_kopukm" class="form-control" id="kecamatanukm" required>
                    <option value=''>- PILIH KECAMATAN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kel_kopukm" class="form-control" id="desaukm" required>
                    <option value=''>- PILIH KELURAHAN -</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODE POS<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= set_value('kodepos_kopukm'); ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">MODAL USAHA UMK PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
				<select name="modal_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH MODAL USAHA--</option>
					<option value="< 1M" <?=$this->input->post('modal_usaha') == '< 1M' ? 'selected':''?>>< 1M</option>
					<option value="1M-5M" <?=$this->input->post('modal_usaha') == '1M-5M' ? 'selected':''?>>1M-5M</option>
					<option value="5M-10M" <?=$this->input->post('modal_usaha') == '5M-10M' ? 'selected':''?>>5M-10M</option>										
				</select>
			</div>
            <div class="input-wrap">
				<label class="col-form-label">NILAI MODAL USAHA PERTAHUN<span class="section-subtitle"><code>*</code></span></label>
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
            <div class="input-wrap">
				<label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
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
    $(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_des');?>/"+$(this).val();
            $('#desa').load(url);
            return false;
        })
    });
</script>

<script>
    $(document).ready(function(){
        $("#provinsiukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kab');?>/"+$(this).val();
            $('#kabupatenukm').load(url);
            return false;
        })

        $("#kabupatenukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatanukm').load(url);
            return false;
        })

        $("#kecamatanukm").change(function (){
            var url = "<?php echo site_url('peserta/add_ajax_des');?>/"+$(this).val();
            $('#desaukm').load(url);
            return false;
        })
    });
</script>

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
