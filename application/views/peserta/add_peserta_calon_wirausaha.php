<span class="section-subtitle"><code>.DATA CALON WIRAUSAHA</code></span>
    
    <div class="input-wrap">  
    <label class="col-form-label">IDE BISNIS<span class="section-subtitle"><code>*</code></span></label>
        <input type="text" name="idebisnis" placeholder="Tuliskan Ide Bisnis yang akan dibuat" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('idebisnis'); ?>" class="form-control" required>        
    </div>
    <div class="input-wrap">  
    <label class="col-form-label">SEKTOR CALON USAHA<span class="section-subtitle"><code>*</code></span></label>
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskop('sektor_usaha', 'tb_sektor_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('sektor_usaha'));
        ?>      
    </div>
    <div class="input-wrap">  
    <label class="col-form-label">BIDANG CALON USAHA<span class="section-subtitle"><code>*</code></span></label>
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskop('bidang_usaha', 'tb_bidang_usaha', 'nama', 'id','--PILIH SEKTOR USAHA KOPERASI--', $this->input->post('bidang_usaha'));
        ?>
    </div>
    <div class="input-wrap">
        <label class="col-form-label">ALAMAT USAHA<span class="section-subtitle"><code>*</code></span></label>        
        <input type="text" name="alamat_kopukm" placeholder="ALAMAT USAHA" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('alamat_kopukm'); ?>" class="form-control" required>        
    </div>  
    <div class="input-wrap">
        <label class="col-form-label">RT<span class="section-subtitle"><code>*</code></span></label>        
        <input type="text" name="rt_kopukm" placeholder="RT" value="<?= set_value('rt_kopukm'); ?>" class="form-control" required>         
    </div>
    <div class="input-wrap">
        <label class="col-form-label">RW<span class="section-subtitle"><code>*</code></span></label>        
        <input type="text" name="rw_kopukm" placeholder="RW" value="<?= set_value('rw_kopukm'); ?>" class="form-control" required>        
    </div>
    <input type="hidden" name="prov_kopukm" value="35">
    <div class="input-wrap">
        <label class="col-form-label">KAB/KOTA<span class="section-subtitle"><code>*</code></span></label>        
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskabupaten('kota_kopukm', 'regencies', 'name', 'id','kota_koperasi','tskota()');
        ?>         
    </div>
    <div class="input-wrap">
        <label class="col-form-label">KECAMATAN<span class="section-subtitle"><code>*</code></span></label>        
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskec('kec_kopukm', 'districts', 'id', 'id','kec_koperasi','tskec()');
        ?> 			        
    </div>
    <div class="input-wrap">
        <label class="col-form-label">KELURAHAN<span class="section-subtitle"><code>*</code></span></label>
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskel('kel_kopukm', 'villages', 'id', 'id','kel_koperasi');
        ?>
    </div>
    <div class="input-wrap">
        <label class="col-form-label">KODE POS<span class="section-subtitle"><code>*</code></span></label>
        <input type="number" name="kodepos_kopukm" placeholder="KODE POS" value="<?= set_value('kodepos_kopukm'); ?>" class="form-control" required>
    </div>
    <div class="input-wrap">
        <label class="col-form-label">JANGKAUAN PEMASARAN PRODUK/LAYANAN USAHA<span class="section-subtitle"><code>*</code></span></label>        
        <?php
        //function cmb_dinamisprov($name, $table, $field, $pk, $id, $selected=null, $extra=null)
        echo cmb_dinamiskop('wil_pemasaran', 'tb_pemasaran', 'nama', 'id','--PILIH WILAYAH PEMASARAN--',$this->input->post('wil_pemasaran'));
        ?>
    </div>
    <div class="input-wrap">
        <label class="col-form-label">LOKASI PEMASARAN<span class="section-subtitle"><code>*</code></span></label>
        <input type="text" name="lokasi_pemasaran" placeholder="LOKASI PEMASARAN" onkeyup="this.value = this.value.toUpperCase()" value="<?= set_value('lokasi_pemasaran'); ?>" class="form-control" required>
    </div>

    <div class="button-default">
        <button type="submit" name="simpan" class="button" id="btnsubmit" style="display:block">Simpan</button>
    </div>