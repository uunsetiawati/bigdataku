            <span class="section-subtitle"><code>.DATA UMKM</code></span>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">NOMOR NIB</label>
                <div class="col-9">
                <input type="text" name="nib" placeholder="NOMOR NIB" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nib'); ?>" class="form-control" required>
                </div>
            </div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">NAMA USAHA</label>
                <div class="col-9">
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('nama_usaha'); ?>" class="form-control" required>
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
				<label class="col-3 col-form-label">SERTIFIKASI PRODUK USAHA</label>
				<div class="col-9">
					<?php
					foreach($sertifikasi as $row){?>
						<label class="form-control2">
						<input type="checkbox" name="sertifikasi[]" value="<?=$row->nama;?>" <?= (!empty($this->input->post('sertifikasi')) && in_array($row->nama,$this->input->post('sertifikasi', true))) ? 'checked' : ''; ?> /><?=$row->nama;?>
						</label>
					<?php }
					?>
                </div>
			</div>  
            <div class="input-wrap row">
                <label class="col-3 col-form-label">SEKTOR USAHA</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha'));
                ?>
                </div>
            </div> 
            <div class="input-wrap row">
                <label class="col-3 col-form-label">BIDANG USAHA</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('bidang_usaha'));
                ?>
                </div>
            </div>     
            <div class="input-wrap row">
                <label class="col-3 col-form-label">ALAMAT USAHA</label>
                <div class="col-9">
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_kopukm'); ?>" class="form-control" required>
                </div>
            </div>  
            <div class="input-wrap row">
				<label class="col-3 col-form-label">RT</label>
				<div class="col-9">
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= set_value('rt_kopukm'); ?>" class="form-control" required> 
				</div>
			</div>
			<div class="input-wrap row">
				<label class="col-3 col-form-label">RW</label>
				<div class="col-9">
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= set_value('rw_kopukm'); ?>" class="form-control">
				</div>
			</div>
            <input type="hidden" name="prov_kopukm" value="35">
            <div class="input-wrap row">
                <label class="col-3 col-form-label">KAB/KOTA</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskabupaten('kota_kopukm', 'regencies', 'name', 'id','kota_koperasi','tskota()');
                
                ?> 
                </div>
            </div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">KECAMATAN</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskec('kec_kopukm', 'districts', 'id', 'id','kec_koperasi','tskec()');
                ?> 				
                </div>
            </div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">KELURAHAN</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskel('kel_kopukm', 'villages', 'id', 'id','kel_koperasi');
                ?>
                </div>
            </div>
            <div class="input-wrap row">
				<label class="col-3 col-form-label">KODE POS</label>
				<div class="col-9">
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= set_value('kodepos_kopukm'); ?>" class="form-control">
				</div>
			</div>
            <div class="input-wrap row">
				<label class="col-3 col-form-label">MODAL USAHA UMK PER TAHUN</label>
				<div class="col-9">
				<select name="modal_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH MODAL USAHA--</option>
					<option value="< 1M" <?=$this->input->post('modal_usaha') == '< 1M' ? 'selected':''?>>< 1M</option>
					<option value="1M-5M" <?=$this->input->post('modal_usaha') == '1M-5M' ? 'selected':''?>>1M-5M</option>
					<option value="5M-10M" <?=$this->input->post('modal_usaha') == '5M-10M' ? 'selected':''?>>5M-10M</option>										
				</select>
				</div>
			</div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">NILAI MODAL USAHA PER TAHUN</label>
                <div class="col-9">
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= set_value('nilai_modalusaha'); ?>" class="form-control" required>
                </div>
            </div>	
            <div class="input-wrap row">
				<label class="col-3 col-form-label">OMZET USAHA PER TAHUN</label>
				<div class="col-9">
				<select name="omzet_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH OMZET USAHA--</option>
					<option value="< 2M" <?=$this->input->post('omzet_usaha') == '< 2M' ? 'selected':''?>>< 2M</option>
					<option value="2M-15M" <?=$this->input->post('omzet_usaha') == '2M-15M' ? 'selected':''?>>2M-15M</option>
					<option value="15M-50M" <?=$this->input->post('omzet_usaha') == '15M-50M' ? 'selected':''?>>15M-50M</option>										
				</select>
				</div>
			</div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">NILAI OMZET USAHA PER TAHUN</label>
                <div class="col-9">
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah2" placeholder="NILAI OMZET USAHA" value="<?= set_value('nilai_omzetusaha'); ?>" class="form-control" required>
                </div>
            </div>	
            <div class="input-wrap row">
                <label class="col-3 col-form-label">JUMLAH KARYAWAN LAKI-LAKI</label>
                <div class="col-9">
                <input type="number" name="jml_tenaga_kerjal" placeholder="JUMLAH KARYAWAN LAKI-LAKI" value="<?= set_value('jml_tenaga_kerjal'); ?>" class="form-control" required>
                </div>
            </div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">JUMLAH KARYAWAN PEREMPUAN</label>
                <div class="col-9">
                <input type="number" name="jml_tenaga_kerjap" placeholder="JUMLAH PEREMPUAN" value="<?= set_value('jml_tenaga_kerjap'); ?>" class="form-control" required>
                </div>
            </div>
            <div class="input-wrap row">
                <label class="col-3 col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA</label>
                <div class="col-9">
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'id','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran'));
                ?>
                </div>
            </div>
            <div class="input-wrap row">
				<label class="col-3 col-form-label">LOKASI PEMASARAN</label>
				<div class="col-9">
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('lokasi_pemasaran'); ?>" class="form-control">
				</div>
			</div>
            <div class="input-wrap row">
				<label class="col-3 col-form-label">JABATAN PESERTA DI USAHA</label>
				<div class="col-9">
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