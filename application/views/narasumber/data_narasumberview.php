<!-- separator -->
<div class="separator-small"></div>
	<!-- end separator -->

	<div class="header-about">
		<div class="container">
			<div class="social-media-icon socmed-for-about shadow-sm">
				<div class="coming-soon-word text-center">
					<h4>DATA NARASUMBER</h4>
					<?=$pelatihan['judul_pelatihan']?><br><?=$pelatihan['alamat_pelatihan'];?>
					<?php
					$tglmulai = new DateTime($pelatihan['tgl_mulai']);
					$tglakhir = new DateTime($pelatihan['tgl_akhir']);
					?>
					<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
					<h6>Peserta : <?=$pelatihan['sasaran'];?></h6>
					
				</div>                          
			</div>
		</div>
	</div>
	<!-- separator -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<!-- <form action="<?= site_url('narasumber/edit') ?>" method="post" id="add" class="form-outline"> -->
	<?php 
	date_default_timezone_set('Asia/Jakarta');
	$now=date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$narsum['id']);?>
		<div class="form-wrapper">            
			<div class="input-wrap">
				<label class="col-form-label">NIK NARASUMBER<span class="section-subtitle"><code>*</code></span></label>	
				<input type="number" name="nik" placeholder="NIK / NO. KTP" value="<?= $this->input->post('nik') ?? $narsum['nik'] ?>" class="form-control" readonly>				
			</div>            
			<div class="input-wrap">
				<label class="col-form-label">NAMA NARASUMBER<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="nama" placeholder="NAMA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama') ?? $narsum['nama']; ?>" class="form-control" readonly> 
			</div>		
			
			<div class="input-wrap">	
				<label class="col-form-label">INSTANSI NARASUMBER<span class="section-subtitle"><code>*</code></span></label>			
				<input type="text" name="instansi" placeholder="ASAL INSTANSI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('instansi') ?? $narsum['instansi'] ?>" class="form-control" readonly>					
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JUDUL MATERI<span class="section-subtitle"><code>*</code></span></label>	
				<input type="text" name="materi_judul" placeholder="JUDUL MATERI" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('materi_judul') ?? $narsum['materi_judul']?>" class="form-control" readonly>						
			</div>			
			<hr>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>	
				<input type="text" name="jk" placeholder="JENIS KELAMIN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('jk') ?? $narsum['jk']?>" class="form-control" readonly>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO. TELP / HP<span class="section-subtitle"><code>*</code></span></label>	
				<input type="number" name="hp" placeholder="NO. TELP/HP" value="<?= $this->input->post('hp') ?? $narsum['hp']; ?>" class="form-control" readonly>
			</div>

			<div class="input-wrap">
				<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maks Foto 3MB | JPEG,JPG,PNG,PDF)</h7></label><br>
				<?php
					$file_ktp = base_url('uploads/narasumber/ktp/'.$narsum['ktp']);
					$file_extension_ktp = pathinfo($file_ktp, PATHINFO_EXTENSION);
					?>
				<?php if (in_array($file_extension_ktp, ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG'])): ?>
					<img src="<?=base_url('uploads/narasumber/ktp/'.$narsum['ktp'])?>" width="30%">	
				<?php elseif ($file_extension_ktp == 'pdf'): ?>
					<embed type="application/pdf" src="<?=$file_ktp?>" width="600" height="400"></embed>
				<?php endif; ?>
				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">UPLOAD FOTO NPWP<span class="section-subtitle"><code>*</code></span><h7> (Maks Foto 3MB | JPEG,JPG,PNG,PDF)</h7></label><br>
				<?php
					$file_npwp = base_url('uploads/narasumber/npwp/'.$narsum['npwp']);
					$file_extension_npwp = pathinfo($file_npwp, PATHINFO_EXTENSION);
					?>
				<?php if (in_array($file_extension_npwp, ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG'])): ?>
					<img src="<?=base_url('uploads/narasumber/npwp/'.$narsum['npwp'])?>" width="30%">	
				<?php elseif ($file_extension_npwp == 'pdf'): ?>
					<embed type="application/pdf" src="<?=$file_npwp?>" width="600" height="400"></embed>
				<?php endif; ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">UPLOAD CV<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | pdf)</h7></label><br>
				<?php
					$file_cv = base_url('uploads/narasumber/cv/'.$narsum['cv']);
					$file_extension_cv = strtolower(pathinfo($file_cv, PATHINFO_EXTENSION)); // Menggunakan strtolower untuk case-insensitive
					?>
				<?php if ($file_extension_cv == 'pdf'): ?>
					<embed type="application/pdf" src="<?=base_url('uploads/narasumber/cv/'.$narsum['cv'])?>" width="600" height="400"></embed>
				<?php elseif (in_array($file_extension_cv, ['doc', 'docx'])): ?>
					<div class="col-4">	
					<?php
					echo anchor('uploads/narasumber/cv/' . $narsum['cv'], 'Download CV', array('class'=>'button2'));
					?>
					</div>
				<?php endif; ?>
				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">UPLOAD MATERI<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 10MB | pdf,ppt)</h7></label><br>
				<?php
					$file_materi = base_url('uploads/narasumber/materi/'.$narsum['materi']);
					$file_extension_materi = pathinfo($file_materi, PATHINFO_EXTENSION);
					?>
				<?php if ($file_extension_materi == 'pdf'): ?>
					<embed type="application/pdf" src="<?=$file_materi?>" width="600" height="400"></embed>
				<?php elseif (in_array($file_extension_materi, ['ppt', 'PPT', 'pptx', 'PPTX'])): ?>
					<div class="col-4">	
					<?php
					echo anchor('uploads/narasumber/materi/' . $narsum['materi'], 'Download PPT', array('class'=>'button2'));
					?>
					</div>
				<?php endif; ?>
			</div>
			<div class="input-wrap">
					<label class="col-form-label">UPLOAD SPT (SURAT PERINTAH TUGAS)<span class="section-subtitle"><code>*</code></span><h7> (Mak file ukuran 3MB |pdf|doc|docx)</h7></label><br>
					<?php
					$file_spt = base_url('uploads/narasumber/spt/'.$narsum['spt']);
					$file_extension_spt = strtolower(pathinfo($file_spt, PATHINFO_EXTENSION)); // Menggunakan strtolower untuk case-insensitive
					?>
					<?php if ($file_extension_spt == 'pdf'): ?>
						<embed type="application/pdf" src="<?=base_url('uploads/narasumber/spt/'.$narsum['spt'])?>" width="600" height="400"></embed>
					<?php elseif (in_array($file_extension_spt, ['doc', 'docx'])): ?>
						<div class="col-4">	
						<?php
						echo anchor('uploads/narasumber/spt/' . $narsum['spt'], 'Download SPT', array('class'=>'button2'));
						?>
						</div>
					<?php endif; ?>
			</div>
			<div class="input-wrap">
					<label class="col-form-label">UPLOAD REKENING<span class="section-subtitle"><code>*</code></span><h7> (Maks file ukuran 3MB | jpg,jpeg,png,pdf)</h7></label><br>
					<?php
					$file_rekening = base_url('uploads/narasumber/rekening/'.$narsum['rekening']);
					$file_extension_rekening = pathinfo($file_rekening, PATHINFO_EXTENSION);
					?>
					<?php if ($file_extension_rekening == 'pdf'): ?>
						<embed type="application/pdf" src="<?=$file_rekening?>" width="600" height="400"></embed>
					<?php elseif (in_array($file_extension_rekening, ['jpg', 'JPG', 'jpeg','JPEG', 'png', 'PNG','gif'])): ?>
						<img src="<?=$file_rekening?>" alt="Uploaded Image" width="600" height="400">
					<?php endif; ?>
			</div>
			<div class="button-default">
				<!-- <button type="submit" name="simpan" class="button">Simpan</button> -->
				<?php
					echo anchor('narasumber/viewdatanarsum/'.$narsum['kodeunik'], 'Kembali', array('class'=>'button2'));
				?>
			</div>
		</div>
	<!-- </form> -->
</div>

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator