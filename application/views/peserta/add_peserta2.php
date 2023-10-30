<div class="container">
	<form action="<?= site_url('peserta/add_peserta/'.$this->uri->segment('3')) ?>" enctype="multipart/form-data" method="post" id="add" class="form-outline">
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

		<div class="button-default">
			<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
		</div>
	</form>
</div>