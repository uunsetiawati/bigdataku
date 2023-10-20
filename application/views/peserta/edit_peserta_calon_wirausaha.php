<span class="section-subtitle"><code>.DATA CALON WIRAUSAHA</code></span>
    
    <div class="input-wrap">  
    <label class="col-form-label">IDE BISNIS<span class="section-subtitle"><code>*</code></span></label>
        <input type="text" name="idebisnis" placeholder="Tuliskan Ide Bisnis yang akan dibuat" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('idebisnis') ?? $peserta['idebisnis']; ?>" class="form-control" required>        
    </div>
    <div class="input-wrap">  
    <label class="col-form-label">SEKTOR CALON USAHA<span class="section-subtitle"><code>*</code></span></label>
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha') ?? $peserta['sektor_usaha']);
        ?>      
    </div>
    <div class="input-wrap">  
    <label class="col-form-label">BIDANG CALON USAHA<span class="section-subtitle"><code>*</code></span></label>
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
        <input type="number" name="rt_kopukm" placeholder="RT" value="<?= $this->input->post('rt_kopukm') ?? $peserta['rt_kopukm']; ?>" class="form-control" required>         
    </div>
    <div class="input-wrap">
        <label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>        
        <input type="number" name="rw_kopukm" placeholder="RW" value="<?= $this->input->post('rw_kopukm') ?? $peserta['rw_kopukm']; ?>" class="form-control" required>        
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
        <input type="number" name="kodepos_kopukm" placeholder="KODE POS" value="<?= $this->input->post('kodepos_kopukm') ?? $peserta['kodepos_kopukm']; ?>" class="form-control" required>
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
        <input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= $this->input->post('lokasi_pemasaran') ?? $peserta['lokasi_pemasaran']; ?>" class="form-control" required>
    </div>

    <div class="button-default">
        <button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
    </div>