<!--section title -->
<div class="section-title">
	<h5>Form Peserta Pelatihan </h5>
	<h4><?=$pelatihan['judul_pelatihan'];?> DI <?=$pelatihan['alamat_pelatihan'];?></h4>
	<?php
	$tglmulai = new DateTime($pelatihan['tgl_mulai']);
	$tglakhir = new DateTime($pelatihan['tgl_akhir']);
	?>
	<h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
	<h6>Peserta : <?=$pelatihan['sasaran'];?></h6>
		
</div>
<!-- end section title -->

<!-- separator -->
<div class="separator-large"></div>
<!-- end separator -->

<?php $this->load->view('_FlashAlert/flash_alert') ?>


<div class="container">
	<form action="<?= site_url('peserta/edit_peserta/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">	
	<?php 
	date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
	?>
	<?=form_hidden('now',$now);?>
	<?=form_hidden('id',$peserta['id']);?>
	
		<div class="form-wrapper">            
			<div class="input-wrap">
				<label class="col-form-label">NO. KTP/NIK<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="no_ktp" placeholder="NO. KTP/NIK" value="<?= $this->input->post('no_ktp') ?? $peserta['no_ktp'];?>" class="form-control <?= (form_error('no_ktp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_ktp'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NAMA PESERTA<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="nama_peserta" placeholder="NAMA PESERTA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_peserta') ?? $peserta['nama_peserta']; ?>" class="form-control <?= (form_error('nama_peserta') == "" ? '':'is-invalid') ?>">
				<?= form_error('nama_peserta'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TEMPAT LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="tempat_lahir" placeholder="TEMPAT LAHIR" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('tempat_lahir') ?? $peserta['tempat_lahir']; ?>" class="form-control <?= (form_error('tempat_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tempat_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">TANGGAL LAHIR<span class="section-subtitle"><code>*</code></span></label>				
				<input type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" value="<?= $this->input->post('tgl_lahir') ?? $peserta['tgl_lahir']; ?>" class="form-control <?= (form_error('tgl_lahir') == "" ? '':'is-invalid') ?>">
				<?= form_error('tgl_lahir'); ?> 				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">JENIS KELAMIN<span class="section-subtitle"><code>*</code></span></label>						
				<?php
				echo form_dropdown('jk', array( 'L'=>'LAKI-LAKI', 'P'=>'PEREMPUAN'), $peserta['jk'], "class='form-control'");		
				?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">STATUS PERKAWINAN<span class="section-subtitle"><code>*</code></span></label>		
				<?php
				echo form_dropdown('status', array( 'BELUM MENIKAH'=>'BELUM MENIKAH', 'MENIKAH'=>'MENIKAH', 'CERAI HIDUP' => 'CERAI HIDUP', 'CERAI MATI'=>'CERAI MATI'), $peserta['status'], "class='form-control'");		
				?>		
			</div>
			<div class="input-wrap">
				<label class="col-form-label">PENDIDIKAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
				echo form_dropdown('pendidikan', array( 'SD'=>'SD', 'SMP'=>'SMP', 'SMA/SMK'=>'SMA/SMK', 'S-1'=>'S-1', 'S-2'=>'S-2', 'S-3'=>'S-3', 'TIDAK SEKOLAH'=>'TIDAK SEKOLAH'), $peserta['pendidikan'], "class='form-control'");		
				?>			
			</div>
			<div class="input-wrap">
				<label class="col-form-label">AGAMA<span class="section-subtitle"><code>*</code></span></label>	
				<?php
				echo form_dropdown('agama', array( 'ISLAM'=>'ISLAM', 'KRISTEN'=>'KRISTEN', 'KATOLIK'=>'KATOLIK', 'HINDU'=>'HINDU', 'BUDHA'=>'BUDHA','KONGHUCHU'=>'KONGHUCHU'), $peserta['agama'], "class='form-control'");		
				?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">ALAMAT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="text" name="alamat" placeholder="ALAMAT" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat') ?? $peserta['alamat']; ?>" class="form-control <?= (form_error('alamat') == "" ? '':'is-invalid') ?>">
				<?= form_error('alamat'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rt" placeholder="RT" value="<?= $this->input->post('rt') ?? $peserta['rt']; ?>" class="form-control <?= (form_error('rt') == "" ? '':'is-invalid') ?>">
				<?= form_error('rt'); ?>				
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>				
				<input type="number" name="rw" placeholder="RW" value="<?= $this->input->post('rw') ?? $peserta['rw']; ?>" class="form-control <?= (form_error('rw') == "" ? '':'is-invalid') ?>">
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
                  echo cmb_dinamiskabupaten('kabupaten', 'regencies', 'name', 'id','kota','toggleselect2()', $this->input->post('kabupaten') ?? $peserta['kabupaten']);				
                ?>	
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>				
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskec('kecamatan', 'districts', 'name', 'id','kecamatan','toggleselect3()', $this->input->post('kecamatan') ?? $peserta['kecamatan']);
                ?> 								
				<?= form_error('kecamatan'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
				<?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                  echo cmb_dinamiskel('kelurahan', 'villages', 'name', 'id','kelurahan', $this->input->post('kelurahan') ?? $peserta['kelurahan']);
                ?> 
				<?= form_error('kelurahan'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">NO.TELP/WA<span class="section-subtitle"><code>*</code></span></label>
				<input type="number" name="no_telp" placeholder="NOMOR TELEPON (Cth:081331220006)" value="<?= $this->input->post('no_telp') ?? $peserta['no_telp']; ?>" class="form-control <?= (form_error('no_telp') == "" ? '':'is-invalid') ?>">
				<?= form_error('no_telp'); ?>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH ANDA PENYANDANG DISABILITAS<span class="section-subtitle"><code>*</code></span></label>
				<?php
					echo form_dropdown('disabilitas', array('TIDAK'=>'TIDAK', 'PENYANDANG DISABILITAS FISIK'=>'PENYANDANG DISABILITAS FISIK', 'PENYANDANG DISABILITAS INTELEKTUAL'=>'PENYANDANG DISABILITAS INTELEKTUAL', 'PENYANDANG DISABILITAS MENTAL' => 'PENYANDANG DISABILITAS MENTAL', 'PENYANDANG DISABILITAS SENSORIK' => 'PENYANDANG DISABILITAS SENSORIK'), $peserta['disabilitas'], "class='form-control'");
				?>
			</div>
			<div class="form-wrapper" id="foto" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO DIRI<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<!-- <input type="file" name="foto" class="form-control" required> -->
					<img src="<?=base_url('uploads/peserta/'.$peserta['foto'])?>" style="width: 144px;height: 211px;">
				</div>
			</div>
			<div class="form-wrapper" id="foto_ktp" style="display:block;">
				<div class="input-wrap">
					<label class="col-form-label">UPLOAD FOTO KTP<span class="section-subtitle"><code>*</code></span><h7> (Maksimal file ukuran 3MB)</h7></label>
					<!-- <input type="file" name="foto_ktp" class="form-control" required> -->
					<img src="<?=base_url('uploads/ktp/'.$peserta['ktp'])?>" style="width:323.52px;height:204.01px;">
				</div>
			</div>
			<hr>
			<span class="section-subtitle"><code>.Digitalisasi Usaha</code></span>
			<div class="input-wrap">
				<label class="col-form-label">EMAIL USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="email_usaha" placeholder="MASUKKAN EMAIL USAHA" value="<?= $this->input->post('email_usaha') ?? $peserta['email_usaha']; ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">WEBSITE USAHA<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="web_usaha" placeholder="MASUKKAN WEBSITE USAHA" value="<?= $this->input->post('web_usaha') ?? $peserta['web_usaha']; ?>" class="form-control" required>
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MEDIA SOSIAL USAHA<span class="section-subtitle"><code>*</code></span></label>                
				<input type="text" value="<?=$peserta['sosmed_usaha']?>" class="form-control" readonly />
			</div>
			<div class="input-wrap">
				<label class="col-form-label">MARKETPLACE USAHA<span class="section-subtitle"><code>*</code></span></label>
                
                <input type="text" value="<?= $peserta['market_usaha'] ?>" class="form-control" readonly/>
               
			</div>
			<div class="input-wrap">
				<label class="col-form-label">APAKAH TERDAFTAR DI PLATFORM PENGADAAN BARANG JASA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" value="<?= $peserta['pengadaan'] ?>" class="form-control"  readonly/>	
			</div>			
			<hr>
			<span class="section-subtitle"><code>.Transformasi Usaha</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERIZINAN USAHA YANG DIMILIKI<span class="section-subtitle"><code>*</code></span></label>					
				<input type="text" value="<?=$peserta['izin_usaha'];?>" class="form-control" readonly />
			</div>
			<hr>
			<span class="section-subtitle"><code>.Informasi Lainnya</code></span>
			<div class="input-wrap">
				<label class="col-form-label">PERMASALAHAN YANG DIHADAPI<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" value="<?=$peserta['permasalahan'];?>" class="form-control" readonly />
			</div>
			<div class="input-wrap">
				<label class="col-form-label">KEBUTUHAN DIKLAT / PELATIHAN<span class="section-subtitle"><code>*</code></span></label>					
					<input type="text" value="<?=$peserta['kebutuhan'];?>" class="form-control" readonly/>
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
				if($pelatihan['sasaran']=='KOPERASI'){
					$this->load->view('peserta/edit_peserta_koperasi');
				}else if($pelatihan['sasaran']=='UKM'){
					$this->load->view('peserta/edit_peserta_ukm');
				}else if($pelatihan['sasaran']=='CALON WIRAUSAHA'){
					$this->load->view('peserta/edit_peserta_calon_wirausaha');
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
