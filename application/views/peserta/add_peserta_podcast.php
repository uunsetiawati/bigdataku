<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="200px">
				<h5>FORM PESERTA SAFARI PODCAST</h5>
				<h5><b><?=$peserta['judul_pelatihan']?> </b></h5>
				<h6><?=$peserta['alamat_pelatihan'];?></h6>
				<?php
				$tglmulai = new DateTime($peserta['tgl_mulai']);
				$tglakhir = new DateTime($peserta['tgl_akhir']);
				// Array of month names in alphabet format
				$monthNames = [
					"Januari", "Februari", "Maret", "April",
					"Mei", "Juni", "Juli", "Agustus",
					"September", "Oktober", "November", "Desember"
				];
				?>
				<!-- <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6> -->
				<h6><b>Tanggal Pelatihan: <?=$tglmulai->format("d") . " " . $monthNames[$tglmulai->format("n") - 1] . " " . $tglmulai->format("Y");?> s.d <?=$tglakhir->format("d") . " " . $monthNames[$tglakhir->format("n") - 1] . " " . $tglakhir->format("Y");?></b></h6>
				
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
	<form action="<?= site_url('peserta/add_peserta_podcast/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id_pel',$peserta['id']);?>
		<!-- <div class="form-wrapper">    
		<div class="content bg-lightblue">  
			<div class="coming-soon-word text-center">
				<span class="section-subtitle"><h4><code>Data Pribadi</code></h4></span>
			</div>
		</div> -->

			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Data Pribadi</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
			<div class="input-wrap">
				<label class="col-form-label">NAMA LENGKAP PESERTA<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_peserta'); ?>" class="form-control">
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
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('tempat_lahir'); ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= set_value('tgl_lahir'); ?>" class="form-control">			
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
				<label class="col-form-label">ALAMAT DOMISILI SESUAI KTP<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>" class="form-control">			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                <select name="provinsi" class="form-control" id="provinsi" required>
                    <option selected disabled>-- PILIH PROVINSI --</option>
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
                    <option value='' selected disabled>-- PILIH KABUPATEN / KOTA --</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kecamatan" class="form-control" id="kecamatan" required>
                    <option value='' selected disabled>-- PILIH KECAMATAN --</option>
                </select>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                <select name="kelurahan" class="form-control" id="desa" required>
                    <option value='' selected disabled>-- PILIH KELURAHAN --</option>
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
			<div class="form-wrapper" id="foto" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<input type="file" name="foto" class="form-control <?= (form_error('foto') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto'); ?>
				</div>
			</div>
			
			<hr>
			<!-- <span class="section-subtitle"><code>.DATA UMKM</code></span> -->
			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Data Usaha</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
            <div class="input-wrap">
				<label class="col-form-label">NAMA USAHA / MERK<span class="section-subtitle"><code>*</code></span><h7>(Jika Tidak Punya Usaha isi "-")</h7></label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA / MERK" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_usaha'); ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span><h7>(Jika Tidak Punya Usaha isi "-")</h7></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_kopukm'); ?>" class="form-control" required>
            </div> 
			<div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA<span class="section-subtitle"><code>*</code></span></label>
				<select name="jabatan" class="form-control" required>
					<option value="" selected disabled>--PILIH JABATAN PESERTA--</option>
					<option value="TIDAK PUNYA USAHA" <?=$this->input->post('jabatan') == 'TIDAK PUNYA USAHA' ? 'selected':''?>>TIDAK PUNYA USAHA</option>
					<option value="PEMILIK" <?=$this->input->post('jabatan') == 'PEMILIK' ? 'selected':''?>>PEMILIK</option>
					<option value="KARYAWAN" <?=$this->input->post('jabatan') == 'KARYAWAN' ? 'selected':''?>>KARYAWAN</option>									
				</select>
			</div>   
			<!-- <span class="section-subtitle"><code>.Digitalisasi Usaha</code></span> -->
			<!--section title -->
			<div class="header-about">
				<div class="social-media-icon socmed-for-about shadow-sm">
					<div class="coming-soon-word text-center">						
					<span class="section-subtitle"><h4><code>Digitalisasi Usaha</code></h4></span>
					</div>                          
				</div>
			</div>
			<!-- end section title -->
			<div class="input-wrap">
				<label class="col-form-label">WEBSITE USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="web_usaha" placeholder="MASUKKAN WEBSITE USAHA" value="<?= set_value('web_usaha'); ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">EMAIL USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="email_usaha" placeholder="MASUKKAN EMAIL USAHA" value="<?= set_value('email_usaha'); ?>" class="form-control" required>
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
			<hr>
           
            <div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
			</div>			
	</form>			
</div>

<!-- separator -->
<div class="separator-small"></div>
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
