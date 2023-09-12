                <div class="input-wrap row">
					<label class="col-3 col-form-label">JABATAN</label>
					<div class="col-9">
					<input type="text" name="jabatan" placeholder="JABATAN DI KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('jabatan'); ?>" class="form-control" required>
					</div>
				</div>	
				<div class="input-wrap row">
					<label class="col-3 col-form-label">NAMA KOPERASI</label>
					<div class="col-9">
					<input type="text" name="nama_kop" placeholder="NAMA KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_kop'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">NIK KOPERASI</label>
					<div class="col-9">
					<input type="text" name="nik_koperasi" placeholder="NIK KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nik_koperasi'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">NO. BADAN HUKUM KOPERASI</label>
					<div class="col-9">
					<input type="text" name="no_badan_hukum" placeholder="NO. BADAN HUKUM KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('no_badan_hukum'); ?>" class="form-control" required>
					</div>
				</div>		
				<div class="input-wrap row">
					<label class="col-3 col-form-label">ALAMAT KOPERASI</label>
					<div class="col-9">
					<input type="text" name="alamat_koperasi" placeholder="ALAMAT KOPERASI" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_koperasi'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">PROVINSI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamisprov('prov_koperasi', 'provinces', 'name', 'id','prov_koperasi','tsprov()',$this->input->post('prov_koperasi'));
					?> 
					</div>
				</div>				
				<div class="input-wrap row">
					<label class="col-3 col-form-label">KAB/KOTA</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskab('kota_koperasi', 'regencies', 'id', 'id','kota_koperasi','tskota()');
					
					?> 
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">KECAMATAN</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskec('kec_koperasi', 'districts', 'id', 'id','kec_koperasi','tskec()');
					?> 				
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">KELURAHAN</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskel('kel_koperasi', 'villages', 'id', 'id','kel_koperasi');
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">JUMLAH ANGGOTA KOPERASI</label>
					<div class="col-9">
					<input type="number" name="jml_anggota" placeholder="JUMLAH ANGGOTA KOPERASI" value="<?= set_value('jml_anggota'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">JUMLAH ANGGOTA LAKI-LAKI</label>
					<div class="col-9">
					<input type="number" name="anggota_l" placeholder="JUMLAH ANGGOTA KOPERASI LAKI-LAKI" value="<?= set_value('anggota_l'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">JUMLAH ANGGOTA PEREMPUAN</label>
					<div class="col-9">
					<input type="number" name="anggota_p" placeholder="JUMLAH ANGGOTA KOPERASI PEREMPUAN" value="<?= set_value('anggota_p'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">BENTUK KOPERASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('bentuk_koperasi', 'tb_bentuk_koperasi', 'nama', 'id','--PILIH BENTUK KOPERASI--', $this->input->post('bentuk_koperasi'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">JENIS KOPERASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('jenis_koperasi', 'tb_jenis_koperasi', 'nama', 'id','--PILIH JENIS KOPERASI--',$this->input->post('jenis_koperasi'));
					?>
					</div>
				</div>				
				<div class="input-wrap row">
					<label class="col-3 col-form-label">KELOMPOK KOPERASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('kelompok_koperasi', 'tb_kelompok_koperasi', 'nama', 'id','--PILIH KELOMPOK KOPERASI--', $this->input->post('kelompok_koperasi'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">SEKTOR USAHA KOPERASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">JENIS PRODUK USAHA KOPERASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('jenis_produk', 'tb_jenis_produk', 'nama', 'id','--PILIH JENIS PRODUK USAHA KOPERASI--',$this->input->post('jenis_produk'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">VOLUME USAHA</label>
					<div class="col-9">
					<input type="text" id="dengan-rupiah" name="volume_usaha" placeholder="MASUKKAN VOLUME USAHA 1 TAHUN" value="<?= set_value('volume_usaha'); ?>" class="form-control" required>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">STATUS USAHA/LEGALITAS USAHA</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('status_usaha', 'tb_legalitas_usaha', 'nama', 'id','--PILIH STATUS USAHA--',$this->input->post('status_usaha'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">SERTIFIKASI</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('sertifikasi', 'tb_sertifikasi', 'nama', 'id','--PILIH SERTIFIKASI--',$this->input->post('sertifikasi'));
					?>
					</div>
				</div>
				<div class="input-wrap row">
					<label class="col-3 col-form-label">WILAYAH PEMASARAN</label>
					<div class="col-9">
					<?php
					//function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
					echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'id','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran'));
					?>
					</div>
				</div>
