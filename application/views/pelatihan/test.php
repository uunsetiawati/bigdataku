<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Saldo Awal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
            <?php
                echo form_open('pelatihan/edit2', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">ID Saldo Awal</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?=$saldoawal['id']; ?>" readonly="true" name="id" class="form-control" placeholder="Masukkan Kode Mapel">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">nama</label>

                      <div class="col-sm-9">

                        <input type="text" name="nama" value="<?=$saldoawal['nama']; ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>" placeholder="Masukkan Jenis">  
                        <?= form_error('nama'); ?>

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">kota</label>

                      <div class="col-sm-9">
                        

                        <input type="text" name="kota" value="<?=$saldoawal['kota']; ?>" class="form-control <?= (form_error('kota') == "" ? '':'is-invalid') ?>" placeholder="Masukkan Jenis">  
                        <?= form_error('kota'); ?>

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      
                  </div>

                </div>
                <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>