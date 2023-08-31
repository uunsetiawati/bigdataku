
            <?php $this->load->view('_FlashAlert\flash_alert.php') ?>
            <?php
                echo form_open('saldoawal2/edit', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">ID Saldo Awal</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?= $this->input->post('id') ?? $saldoawal['id']; ?>" readonly="true" name="id" class="form-control" placeholder="Masukkan Kode Mapel">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Saldo Awal</label>

                      <div class="col-sm-9">
                        <!-- <input type="text" value="<?php echo $saldoawal['jenis']; ?>" name="jenis" class="form-control" placeholder="Masukkan Jenis Saldo Awal"> -->

                        <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $saldoawal['nama']; ?>" class="form-control <?= (form_error('nama') == "" ? '':'is-invalid') ?>" placeholder="Masukkan Jenis">  
                        <?= form_error('nama'); ?>

                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('saldoawal', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
                      </div>
                  </div>

                </div>
                <!-- /.box-body -->
            </form>
