<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('simpanan/edit', 'role="form" class="form-horizontal"');
                echo form_hidden('id_user', $this->session->userdata('id_user'));
                echo 'id', $simpanan['id'];
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Anggota</label>

                      <div class="col-sm-9">
                        <input type="text" readonly="true" name="id_anggota" value="<?= $this->input->post('id_anggota') ?? $simpanan['nama']; ?>" class="form-control <?= (form_error('id_anggota') == "" ? '':'is-invalid') ?>" placeholder="Masukkan Nama Akun">  
                       
                        <?= form_error('id_anggota'); ?>
                      </div>
                  </div>                 

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal bayar</label>                     

                      <div class="col-sm-5">                        

                        <input type="date" value="<?= $this->input->post('tanggal_bayar') ?? $simpanan['tanggal']; ?>" name="tanggal_bayar" class="form-control" placeholder="Masukkan nomor akun"> 
                        <?= form_error('tanggal_bayar'); ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Simpanan</label>                     

                      <div class="col-sm-5">
                      <?php
                          echo cmb_dinamis('jenis_simpanan', 'tbl_simpanan_jenis', 'jenis_simpanan', 'id',$this->input->post('id') ?? $simpanan['jenis_simpanan']);
                        ?>
                         <?= form_error('jenis_simpanan'); ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jumlah Bayar</label>

                      <div class="col-sm-5">
                      <input type="number" value="<?= $this->input->post('jumlah_bayar') ?? $simpanan['jumlah_bayar']; ?>" name="jumlah_bayar" class="form-control" placeholder="Masukkan saldo">  
                      <?= form_error('jumlah_bayar'); ?>
                      </div>
                  </div>

                  

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('simpanan', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
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