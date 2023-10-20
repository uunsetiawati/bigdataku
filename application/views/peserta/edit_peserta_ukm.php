            <span class="section-subtitle"><code>.DATA UMKM</code></span>
            <div class="input-wrap">
                <label class="col-form-label">NOMOR NIB</label>                
                <input type="text" name="nib" placeholder="NOMOR NIB" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nib') ?? $peserta['nib']; ?>" class="form-control" required>                
            </div>
            <div class="input-wrap">
                <label class="col-form-label">NAMA USAHA</label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_usaha') ?? $peserta['nama_usaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">STATUS USAHA/LEGALITAS USAHA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('status_usaha', 'tb_legalitas_usaha', 'nama', 'id','--PILIH STATUS USAHA--',$this->input->post('status_usaha') ?? $peserta['status_usaha']);
                ?>
			</div>   
            <div class="input-wrap">
				<label class="col-form-label">SERTIFIKASI PRODUK USAHA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sertifikasi', 'tb_sertifikasi', 'nama', 'id','--PILIH SERTIFIKASI--',$this->input->post('sertifikasi') ?? $peserta['sertifikasi']);
                ?>
			</div>  
            <div class="input-wrap">
                <label class="col-form-label">SEKTOR USAHA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha') ?? $peserta['sektor_usaha']);
                ?>
                </div>
            </div> 
            <div class="input-wrap">
                <label class="col-form-label">BIDANG USAHA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('bidang_usaha') ?? $peserta['bidang_usaha']);
                ?>
            </div>     
            <div class="input-wrap">
                <label class="col-form-label">ALAMAT USAHA</label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat_kopukm') ?? $peserta['alamat_kopukm']; ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT</label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= $this->input->post('rt_kopukm') ?? $peserta['rt_kopukm']; ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW</label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= $this->input->post('rw_kopukm') ?? $peserta['rw_kopukm']; ?>" class="form-control">
			</div>
            <input type="hidden" name="prov_kopukm" value="35">
            <div class="input-wrap">
                <label class="col-form-label">KAB/KOTA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskabupaten('kota_kopukm', 'regencies', 'name', 'id','kota_koperasi','tskota()');                
                ?> 
            </div>
            <div class="input-wrap">
                <label class="col-form-label">KECAMATAN</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskec('kec_kopukm', 'districts', 'id', 'id','kec_koperasi','tskec()');
                ?> 		
            </div>
            <div class="input-wrap">
                <label class="col-form-label">KELURAHAN</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskel('kel_kopukm', 'villages', 'id', 'id','kel_koperasi');
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODE POS</label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= $this->input->post('kodepos_kopukm') ?? $peserta['kodepos_kopukm']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">MODAL USAHA UMK PER TAHUN</label>
				<select name="modal_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH MODAL USAHA--</option>
					<option value="< 1M" <?=$this->input->post('modal_usaha') == '< 1M' ? 'selected':''?>>< 1M</option>
					<option value="1M-5M" <?=$this->input->post('modal_usaha') == '1M-5M' ? 'selected':''?>>1M-5M</option>
					<option value="5M-10M" <?=$this->input->post('modal_usaha') == '5M-10M' ? 'selected':''?>>5M-10M</option>										
				</select>
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI MODAL USAHA PER TAHUN</label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= $this->input->post('nilai_modalusaha') ?? $peserta['nilai_modalusaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
				<label class="col-form-label">OMZET USAHA PER TAHUN</label>
				<select name="omzet_usaha" class="form-control" required>
					<option value="" selected disabled>--PILIH OMZET USAHA--</option>
					<option value="< 2M" <?=$this->input->post('omzet_usaha') == '< 2M' ? 'selected':''?>>< 2M</option>
					<option value="2M-15M" <?=$this->input->post('omzet_usaha') == '2M-15M' ? 'selected':''?>>2M-15M</option>
					<option value="15M-50M" <?=$this->input->post('omzet_usaha') == '15M-50M' ? 'selected':''?>>15M-50M</option>										
				</select>
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI OMZET USAHA PER TAHUN</label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah2" placeholder="NILAI OMZET USAHA" value="<?= $this->input->post('nilai_omzetusaha') ?? $peserta['nilai_omzetusaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN LAKI-LAKI</label>
                <input type="number" name="jml_tenaga_kerjal" placeholder="JUMLAH KARYAWAN LAKI-LAKI" value="<?= $this->input->post('jml_tenaga_kerjal') ?? $peserta['jml_tenaga_kerjal']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN PEREMPUAN</label>
                <input type="number" name="jml_tenaga_kerjap" placeholder="JUMLAH PEREMPUAN" value="<?= $this->input->post('jml_tenaga_kerjap') ?? $peserta['jml_tenaga_kerjap']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA</label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'id','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran') ?? $peserta['wil_pemasaran']);
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN</label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('lokasi_pemasaran') ?? $peserta['lokasi_pemasaran']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA</label>
				<select name="jabatan" class="form-control" required>
					<option value="" selected disabled>--PILIH JABATAN PESERTA--</option>
					<option value="PEMILIK" <?=$this->input->post('jabatan') == 'PEMILIK' ? 'selected':''?>>PEMILIK</option>
					<option value="KARYAWAN" <?=$this->input->post('jabatan') == 'KARYAWAN' ? 'selected':''?>>KARYAWAN</option>									
				</select>
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