            <span class="section-subtitle"><code>.DATA UMKM</code></span>
            <div class="input-wrap">
                <label class="col-form-label">NOMOR NIB<span class="section-subtitle"><code>*</code></span></label>                
                <input type="text" name="nib" placeholder="NOMOR NIB" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nib') ?? $peserta['nib']; ?>" class="form-control" required>                
            </div>
            <div class="input-wrap">
                <label class="col-form-label">NAMA USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nama_usaha" placeholder="NAMA USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('nama_usaha') ?? $peserta['nama_usaha']; ?>" class="form-control" required>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">STATUS USAHA/LEGALITAS USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('status_usaha', 'tb_legalitas_usaha', 'nama', 'id','--PILIH STATUS USAHA--',$this->input->post('status_usaha') ?? $peserta['status_usaha']);
                ?>
			</div>   
            <div class="input-wrap">
				<label class="col-form-label">SERTIFIKASI PRODUK USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sertifikasi', 'tb_sertifikasi', 'nama', 'id','--PILIH SERTIFIKASI--',$this->input->post('sertifikasi') ?? $peserta['sertifikasi']);
                ?>
			</div>  
            <div class="input-wrap">
                <label class="col-form-label">SEKTOR USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha') ?? $peserta['sektor_usaha']);
                ?>
                </div>
            </div> 
            <div class="input-wrap">
                <label class="col-form-label">BIDANG USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('bidang_usaha') ?? $peserta['bidang_usaha']);
                ?>
            </div>     
            <div class="input-wrap">
                <label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('alamat_kopukm') ?? $peserta['alamat_kopukm']; ?>" class="form-control" required>
            </div>  
            <div class="input-wrap">
				<label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rt_kopukm" placeholder="RT" value="<?= $this->input->post('rt_kopukm') ?? $peserta['rt_kopukm']; ?>" class="form-control" required> 
			</div>
			<div class="input-wrap">
				<label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="rw_kopukm" placeholder="RW" value="<?= $this->input->post('rw_kopukm') ?? $peserta['rw_kopukm']; ?>" class="form-control">
			</div>
            <input type="hidden" name="prov_kopukm" value="35">
            <div class="input-wrap">
                <label class="col-form-label">KAB/KOTA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskabupaten('kota_kopukm', 'regencies', 'name', 'id','kota_koperasi','tskota()', $this->input->post('kota_kopukm') ?? $peserta['kota_kopukm']);                
                ?> 
            </div>
            <div class="input-wrap">
                <label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskec('kec_kopukm', 'districts', 'name', 'id','kec_koperasi','tskec()', $this->input->post('kec_kopukm') ?? $peserta['kec_kopukm']);
                ?> 		
            </div>
            <div class="input-wrap">
                <label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskel('kel_kopukm', 'villages', 'name', 'id','kel_koperasi', $this->input->post('kel_kopukm') ?? $peserta['kel_kopukm']);
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">KODE POS<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="kodepos_kopukm" placeholder="KODE POS" value="<?= $this->input->post('kodepos_kopukm') ?? $peserta['kodepos_kopukm']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">MODAL USAHA UMK PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="modal_usaha" value="<?=$peserta['modal_usaha'];?>" class="form-control" readonly />
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI MODAL USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_modalusaha" id="dengan-rupiah" placeholder="NILAI MODAL USAHA" value="<?= $this->input->post('nilai_modalusaha') ?? $peserta['nilai_modalusaha']; ?>" class="form-control" readonly>
            </div>	
            <div class="input-wrap">
				<label class="col-form-label">OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="omzet_usaha" value="<?=$peserta['omzet_usaha'];?>" class="form-control" readonly />
			</div>
            <div class="input-wrap">
                <label class="col-form-label">NILAI OMZET USAHA PER TAHUN<span class="section-subtitle"><code>*</code></span></label>
                <input type="text" name="nilai_omzetusaha" id="dengan-rupiah2" placeholder="NILAI OMZET USAHA" value="<?= $this->input->post('nilai_omzetusaha') ?? $peserta['nilai_omzetusaha']; ?>" class="form-control" readonly>
            </div>	
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN LAKI-LAKI<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjal" placeholder="JUMLAH KARYAWAN LAKI-LAKI" value="<?= $this->input->post('jml_tenaga_kerjal') ?? $peserta['jml_tenaga_kerjal']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JUMLAH KARYAWAN PEREMPUAN<span class="section-subtitle"><code>*</code></span></label>
                <input type="number" name="jml_tenaga_kerjap" placeholder="JUMLAH PEREMPUAN" value="<?= $this->input->post('jml_tenaga_kerjap') ?? $peserta['jml_tenaga_kerjap']; ?>" class="form-control" required>
            </div>
            <div class="input-wrap">
                <label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
                //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
                echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'id','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran') ?? $peserta['wil_pemasaran']);
                ?>
            </div>
            <div class="input-wrap">
				<label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
				<input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('lokasi_pemasaran') ?? $peserta['lokasi_pemasaran']; ?>" class="form-control">
			</div>
            <div class="input-wrap">
				<label class="col-form-label">JABATAN PESERTA DI USAHA<span class="section-subtitle"><code>*</code></span></label>
                <?php
					echo form_dropdown('jabatan', array( 'PEMILIK'=>'PEMILIK', 'KARYAWAN'=>'KARYAWAN'), $peserta['jabatan'], "class='form-control'");
				?>
			</div>            
           
            <div class="button-default">
				<button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
                <?php
					echo anchor('peserta/viewdatapeserta/'.$peserta['kodeunik'], 'Kembali', array('class'=>'button2'));
				?>
			</div>
<!-- <script>
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
  </script> -->