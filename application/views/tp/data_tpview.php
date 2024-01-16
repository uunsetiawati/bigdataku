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

		<!-- <form action="<?= site_url('tp/add') ?>" method="post" enctype="multipart/form-data" id="add" class="form-outline"> -->
		<?php 
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		?>
		<?=form_hidden('now',$now);?>
			<div class="form-wrapper">		
                <div class="input-wrap">
					<label class="col-form-label">NAMA TENAGA PENDAMPING<span class="section-subtitle"><code>*</code></span></label>
					<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $tp['nama'] ?>" class="form-control" readonly> 
				</div>			
				<div class="input-wrap">
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
                    <label class="col-form-label">KABUPATEN / KOTA<span class="section-subtitle"><code>*</code></span></label>	
                    <input type="text" name="kabkota" placeholder="RW" value="<?= $prov['kabkota'] ?>" class="form-control" readonly>	
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
				</div>

				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI (FOTO FORMAL)<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | jpg,png)</h7></label>
					<img src="<?=base_url('uploads/tp/foto/'.$tp['foto'])?>" width="30%">
				</div>
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD KTP<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |jpg,png)</h7></label>
					<img src="<?=base_url('uploads/tp/ktp/'.$tp['ktp'])?>" width="30%">
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD KK/KARTU KELUARGA<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |jpg,png,pdf)</h7></label><br>
					<?php
					$file_kk = base_url('uploads/tp/kk/'.$tp['kk']);
					$file_extension_kk = pathinfo($file_kk, PATHINFO_EXTENSION);
					?>
					<?php if ($file_extension_kk == 'pdf'): ?>
						<embed type="application/pdf" src="<?=base_url('uploads/tp/kk/'.$tp['kk'])?>" width="600" height="400"></embed>
					<?php elseif (in_array($file_extension_kk, ['jpg', 'jpeg', 'png', 'gif'])): ?>
						<img src="<?=base_url('uploads/tp/kk/'.$tp['kk'])?>" alt="Uploaded Image" width="600" height="400">
					<?php endif; ?>

				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SKCK TERBARU DAN MASIH BERLAKU<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<!-- <img src="<?=base_url('uploads/tp/kk/'.$tp['kk'])?>" width="30%"> -->
					<embed type="application/pdf" src="<?=base_url('uploads/tp/skck/'.$tp['skck'])?>" width="600" height="400"></embed>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD IJAZAH<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<embed type="application/pdf" src="<?=base_url('uploads/tp/ijazah/'.$tp['ijazah'])?>" width="600" height="400"></embed>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD BUKU REKENING BANK JATIM<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |jpg,png,pdf)</h7></label><br>
					<?php
					$file_rekening = base_url('uploads/tp/rekening/'.$tp['rekening']);
					$file_extension_rekening = pathinfo($file_rekening, PATHINFO_EXTENSION);
					?>
					<?php if ($file_extension_rekening == 'pdf'): ?>
						<embed type="application/pdf" src="<?=$file_rekening?>" width="600" height="400"></embed>
					<?php elseif (in_array($file_extension_rekening, ['jpg', 'jpeg', 'png', 'gif'])): ?>
						<img src="<?=$file_rekening?>" alt="Uploaded Image" width="600" height="400">
					<?php endif; ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD KARTU BPJS<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |jpg,png,pdf)</h7></label><br>
					<?php
					$file_path = base_url('uploads/tp/bpjs/'.$tp['bpjs']);
					$file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
					?>
					<?php if ($tp['bpjs'] !== null): ?>
						<?php if ($file_extension == 'pdf'): ?>
							<embed type="application/pdf" src="<?=base_url('uploads/tp/bpjs/'.$tp['bpjs'])?>" width="600" height="400"></embed>
						<?php elseif (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
							<img src="<?=base_url('uploads/tp/bpjs/'.$tp['bpjs'])?>" alt="Uploaded Image" width="600" height="400">
						<?php endif; ?>
					<?php else: ?>
					<!-- Jika $tp['bpjs'] bernilai null -->
					<span class="section-subtitle"><code>Tidak upload KARTU BPJS</code></span>
					<?php endif; ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT KETERANGKAN BISA MENGOPERASIKAN KOMPUTER<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<embed type="application/pdf" src="<?=base_url('uploads/tp/suket_kom/'.$tp['suket_kom'])?>" width="600" height="400"></embed>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT KETERANGKAN KERJA / SURAT PENGALAMAN KERJA<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<embed type="application/pdf" src="<?=base_url('uploads/tp/suket_kerja/'.$tp['suket_kerja'])?>" width="600" height="400"></embed>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SERTIFIKAT KOMPETENSI (JIKA ADA)<h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<?php if ($tp['sertifikat'] !== null): ?>
					<embed type="application/pdf" src="<?=base_url('uploads/tp/sertifikat/'.$tp['sertifikat'])?>" width="600" height="400"></embed>
					<?php else :?>
						<span class="section-subtitle"><code>Tidak upload SERIFIKAT KOMPETENSI</code></span>
					<?php endif; ?>
				</div>
                <div class="input-wrap">
					<label class="col-form-label">UPLOAD SURAT PERNYATAAN TIDAK MENGIKUTI KEGIATAN PARTAI<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf)</h7></label><br>
					<embed type="application/pdf" src="<?=base_url('uploads/tp/pernyataan/'.$tp['pernyataan'])?>" width="600" height="400"></embed>
				</div>				

				<!-- <div class="button-default">
					<button type="submit" name="simpan" class="button">Simpan</button>
				</div> -->
			</div>
		<!-- </form>	 -->
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