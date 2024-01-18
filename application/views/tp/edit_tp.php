<!--section title -->
<div class="header-about">
	<div class="container">
		<div class="social-media-icon socmed-for-about shadow-sm">
			<div class="coming-soon-word text-center">
				<img src="<?=base_url('assets/images/logoupt.png')?>" width="100px">
				<h4>Form Data Diri Tenaga Pendamping 2024</h4>	
			</div>                          
		</div>
	</div>
</div>
<!-- end section title -->
<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<div class="container">

		<form action="<?= site_url('tp/edit') ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline">
		<?php 
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		?>
		<?=form_hidden('now',$now);?>
		<?=form_hidden('id',$tp['id']);?>
			<div class="form-wrapper">		
                <div class="input-wrap">
					<label class="col-form-label">NAMA TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>
					<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $tp['nama'] ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>" readonly> 
					<?= form_error('nama'); ?>
				</div>		
				<div class="input-wrap">
                    <label class="col-form-label">ASAL KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                    <input type="text" name="kabkota" placeholder="kabkota" value="<?= $prov['kabkota'] ?>" class="form-control" readonly>	
                </div>	
				<!-- <div class="input-wrap">
					<label class="col-form-label">NIK TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= $tp['nik'] ?>" class="form-control" readonly>			
				</div>
				
				<div class="input-wrap">	
					<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>			
					<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= $tp['tempat_lahir'] ?>" class="form-control" readonly>					
				</div>
				<div class="input-wrap">
					<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>	
					<input type="date" name="tgl_lahir" placeholder="JENIS KELAMIN" value="<?= $tp['tgl_lahir']; ?>" class="form-control" readonly>					
				</div>			
                <div class="input-wrap">
                    <label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="text" name="jk" placeholder="JENIS KELAMIN" value="<?= $tp['jk']; ?>" class="form-control" readonly>					
                </div>
				<div class="input-wrap">
					<label class="col-form-label">EMAIL<span class="section-subtitle"><code>*</code></span></label>	
					<input type="text" name="email" placeholder="EMAIL" value="<?= $tp['email'] ?>" class="form-control" readonly>
				</div>
				<div class="input-wrap">
					<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= $tp['no_telp']; ?>" class="form-control" readonly>
				</div>
                <div class="input-wrap">
                    <label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= $tp['alamat'] ?>" class="form-control" readonly>			
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="number" name="rt" placeholder="RT" value="<?= $tp['rt'] ?>" class="form-control" readonly>			
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="number" name="rw" placeholder="RW" value="<?= $tp['rw'] ?>" class="form-control" readonly>				
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">PROVINSI<span class="section-subtitle"><code>*</code></span></label>	
                    <input type="text" name="prov" placeholder="RW" value="<?= $prov['provinsi'] ?>" class="form-control" readonly>	
                </div>
                
                <div class="input-wrap">
                    <label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>	
                    <input type="text" name="kecamatan" placeholder="RW" value="<?= $prov['kecamatan'] ?>" class="form-control" readonly>	
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>	
                    <input type="text" name="kelurahan" placeholder="RW" value="<?= $prov['kelurahan'] ?>" class="form-control" readonly>	
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">PENDIDIKAN TERAKHIR<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="text" name="pendidikan" placeholder="RW" value="<?= $tp['pendidikan'] ?>" class="form-control" readonly>					
                </div>
                <div class="input-wrap">
                    <label class="col-form-label">JENIS TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>				
                    <input type="text" name="jenis_tp" placeholder="RW" value="<?= $tp['jenis_tp'] ?>" class="form-control" readonly>					
                </div>

                <div class="input-wrap">
					<label class="col-form-label">NO. REKENING BANK JATIM<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="no_rekening" placeholder="NOMOR REKENING BANK JATIM" value="<?= $tp['no_rekening'] ?>" class="form-control" readonly>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">NO. BPJS KESEHATAN<span class="section-subtitle"><code>*</code></span></label>	
					<input type="number" name="no_bpjs" placeholder="NOMOR BPJS KESEHATAN" value="<?= $tp['no_bpjs'] ?>" class="form-control" readonly>
				</div> -->
				<div class="input-wrap">
                    <label class="col-form-label">WILAYAH KERJA<span class="section-subtitle"><code>*</code></span></label>	
					<?php
					echo cmb_dinamiskota('wilayah_kerja','regencies','name','name',35,$this->input->post('wilayah_kerja') ?? $tp['wilayah_kerja'], "class='form-control'")
					?>
                </div>					

				<div class="button-default">
					<button type="submit" name="simpan" class="button">Simpan</button>
				</div>                         
				<div class="button-default">   
					<?php
						echo anchor('tp/viewdatatp', 'Kembali', array('class'=>'button2'));
					?>
				</div>
			</div>
		</form>	
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator-->

<script>
    $(document).ready(function(){
        $("#wilayah_kerja").change(function (){
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