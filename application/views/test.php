<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
            

            <form action="<?= site_url('test/edit') ?>" method="post" id="add" class="form-outline">
            <?=form_hidden('id',$saldoawal['id'])?>

                <div class="box-body">

                <div class="input-wrap">
                    <input type="text" name="nama" placeholder="nama" value="<?= $this->input->post('id') ?? $saldoawal['nama']; ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>">
                    <?= form_error('nama'); ?> 
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