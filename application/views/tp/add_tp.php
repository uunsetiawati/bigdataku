<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="100px">
				<h4>Form Data Diri Tenaga Pendamping 2024</h4>	
				<h6>Yang Perlu dipersiapkan untuk upload berkas :</h6>
				<span class="section-subtitle"><code>1. FOTO DIRI (FORMAL) | jpg,png</code></span><br>
				<span class="section-subtitle"><code>2. FOTO KTP | jpg, png</code></span><br>
				<span class="section-subtitle"><code>3. KK/KARTU KELUARGA | jpg, png, pdf</code></span><br>
				<span class="section-subtitle"><code>4. SKCK TERBARU DAN MASIH BERLAKU| pdf</code></span><br>
				<span class="section-subtitle"><code>5. IJAZAH | pdf</code></span><br>
				<span class="section-subtitle"><code>6. BUKU REKENING BANK JATIM | jpg, png, pdf</code></span><br>
				<span class="section-subtitle"><code>7. KARTU BPJS KESEHATAN| jpg,png,pdf</code></span><br>
				<span class="section-subtitle"><code>8. SURAT KETERANGKAN BISA MENGOPERASIKAN KOMPUTER | pdf</code></span><br>
				<span class="section-subtitle"><code>9. SURAT KETERANGKAN KERJA / SURAT PENGALAMAN KERJA | pdf</code></span><br>
				<span class="section-subtitle"><code>10. SERTIFIKAT KOMPETENSI (JIKA ADA) | pdf</code></span><br>
				<span class="section-subtitle"><code>11. SURAT PERNYATAAN TIDAK MENGIKUTI KEGIATAN PARTAI | pdf</code></span><br>
				

			</div>                          
		</div>
	</div>
</div>
<!-- end section title -->
<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<div class="container">

		<form action="<?= site_url('tp/add') ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
		<?php 
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		?>
		<?=form_hidden('now',$now);?>
			<div class="form-wrapper">		
                <div class="input-wrap">
					<label class="col-form-label">NAMA TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>
					<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama') ?>" class="form-control" required> 
				</div>			
				<div class="input-wrap">
					<label class="col-form-label">NIK TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= set_value('nik') ?>" class="form-control <?= (form_error('nik') == "" ? '':'is-invalid') ?>">
					<?= form_error('nik'); ?>					
				</div>
				
				<div class="input-wrap">	
					<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>			
					<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('tempat_lahir') ?>" class="form-control" required>					
				</div>
				<div class="input-wrap">
					<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>	
					<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= set_value('tgl_lahir'); ?>" class="form-control" required>					
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
					<label class="col-form-label">EMAIL<span class="section-subtitle"><code>*</code></span></label>	
					<input type="text" name="email" placeholder="EMAIL" value="<?= set_value('email') ?>" class="form-control" required>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= set_value('no_telp'); ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				    <?= form_error('no_telp'); ?>
				</div>
                <div class="input-wrap">
                    <label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat'); ?>" class="form-control" required>			
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="number" name="rt" placeholder="RT" value="<?= set_value('rt'); ?>" class="form-control" required>			
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="number" name="rw" placeholder="RW" value="<?= set_value('rw'); ?>" class="form-control" required>				
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                    <select name="prov" class="form-control" id="provinsi" required>
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
                    <select name="kabkota" class="form-control" id="kabupaten" required>
                        <option value='' selected disabled>- PILIH KABUPATEN -</option>
                    </select>
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                    <select name="kec" class="form-control" id="kecamatan" required>
                        <option value='' selected disabled>- PILIH KECAMATAN -</option>
                    </select>
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                    <select name="kel" class="form-control" id="desa" required>
                        <option value='' selected disabled>- PILIH KELURAHAN -</option>
                    </select>
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">PENDIDIKAN TERAKHIR<span class="section-subtitle"><code>*</code></span></label>				
                    <select name="pendidikan" class="form-control" required>
                        <option value="" selected disabled>--PILIH PENDIDIKAN--</option>
                        <option value="D-III" <?=$this->input->post('pendidikan') == 'D-III' ? 'selected':''?>>D-III</option>
                        <option value="D-IV" <?=$this->input->post('pendidikan') == 'D-IV' ? 'selected':''?>>D-IV</option>
                        <option value="S-1" <?=$this->input->post('pendidikan') == 'S-1' ? 'selected':''?>>S-1</option>
                        <option value="S-2" <?=$this->input->post('pendidikan') == 'S-2' ? 'selected':''?>>S-2</option>
                        <option value="S-3" <?=$this->input->post('pendidikan') == 'S-3' ? 'selected':''?>>S-3</option>
                    </select>				
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">JENIS TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>				
                    <select name="jenis_tp" class="form-control" required>
                        <option value="" selected disabled>--PILIH JENIS TP--</option>
                        <option value="UKM" <?=$this->input->post('jenis_tp') == 'UKM' ? 'selected':''?>>UKM</option>
                        <option value="KOPERASI" <?=$this->input->post('jenis_tp') == 'KOPERASI' ? 'selected':''?>>KOPERASI</option>
                    </select>				
                </div>

                <div class="input-wrap">
					<label class="col-form-label">NO. REKENING BANK JATIM<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="no_rekening" placeholder="NOMOR REKENING BANK JATIM" value="<?= set_value('no_rekening'); ?>" class="form-control" required>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">NO. BPJS KESEHATAN</label>	
					<input type="number" name="no_bpjs" placeholder="NOMOR BPJS KESEHATAN" value="<?= set_value('no_bpjs'); ?>" class="form-control">
				</div>

				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI (FOTO FORMAL)<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | jpg,png)</h7></label>
					<input type="file" name="foto" class="form-control <?= (form_error('foto') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('foto'); ?>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD KTP<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |jpg,png)</h7></label>
					<input type="file" name="ktp" class="form-control <?= (form_error('ktp') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('ktp'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD KK/KARTU KELUARGA<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |jpg,png,pdf)</h7></label>
					<input type="file" name="kk" class="form-control <?= (form_error('kk') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('kk'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SKCK TERBARU DAN MASIH BERLAKU<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="skck" class="form-control <?= (form_error('skck') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('skck'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD IJAZAH<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="ijazah" class="form-control <?= (form_error('ijazah') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('ijazah'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD BUKU REKENING BANK JATIM<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |jpg,png,pdf)</h7></label>
					<input type="file" name="rekening" class="form-control <?= (form_error('rekening') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('rekening'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD KARTU BPJS KESEHATAN<h7> (Maks file ukuran 3MB |jpg,png,pdf)</h7></label>
					<input type="file" name="bpjs" class="form-control <?= (form_error('bpjs') == "" ? '':'is-invalid') ?>">
					<?php echo form_error('bpjs'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT KETERANGKAN BISA MENGOPERASIKAN KOMPUTER<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="suket_kom" class="form-control <?= (form_error('suket_kom') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('suket_kom'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT KETERANGKAN KERJA / SURAT PENGALAMAN KERJA<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="suket_kerja" class="form-control <?= (form_error('suket_kerja') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('suket_kerja'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SERTIFIKAT KOMPETENSI (JIKA ADA)<h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="sertifikat" class="form-control <?= (form_error('sertifikat') == "" ? '':'is-invalid') ?>">
					<?php echo form_error('sertifikat'); ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT PERNYATAAN TIDAK MENGIKUTI KEGIATAN PARTAI<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB |pdf)</h7></label>
					<input type="file" name="pernyataan" class="form-control <?= (form_error('pernyataan') == "" ? '':'is-invalid') ?>" required>
					<?php echo form_error('pernyataan'); ?>
				</div>				

				<div class="button-default">
					<button type="submit" name="simpan" class="button">Simpan</button>
				</div>
			</div>
		</form>	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator-->

<script>
    $(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('tp/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function (){
            var url = "<?php echo site_url('tp/add_ajax_kec');?>/"+$(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function (){
            var url = "<?php echo site_url('tp/add_ajax_des');?>/"+$(this).val();
            $('#desa').load(url);
            return false;
        })
    });
</script>