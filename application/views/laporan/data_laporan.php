		<!-- about us -->
		<div class="about-us">					

				<!-- separator -->
				<div class="separator-small"></div>
				<!-- end separator -->

				<div class="header-about">
                    <div class="container">
                        <div class="social-media-icon socmed-for-about shadow-sm">
                            <div class="coming-soon-word text-center">
                                <h4>DATA LAPORAN PELATIHAN</h4>
                                <?=$pelatihan['judul_pelatihan']?> DI <?=$pelatihan['alamat_pelatihan'];?>
                                <?php
                                $tglmulai = new DateTime($pelatihan['tgl_mulai']);
                                $tglakhir = new DateTime($pelatihan['tgl_akhir']);
                                ?>
                                <h6>Tanggal Pelatihan : <?=$tglmulai->format("d-m-Y");?> s.d <?=$tglakhir->format("d-m-Y")?></h6>
                                <h6>Peserta : <?=$pelatihan['sasaran'];?></h6>

                            </div>                          
                        </div>
                    </div>
                </div>

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->

            <div class="content">
				<div class="container">
					<div class="row">
                        <div class="col-6">                           
                            <div class="button-default">   
                                <?php    
                                
                                if(!empty($laporan)){
                                    if(!empty($laporan['sk']&&$laporan['tor']&&$laporan['laporan']&&$laporan['undangan']&&$laporan['jadwal'])){
                                        $fullversion=base_url('uploads/laporan/'.$laporan['fullversion']);
                                        if(!empty($laporan['fullversion'])){
                                            echo anchor($fullversion, 'Download FULL PDF', array('class'=>'button', 'target'=>'_blank'));
                                        }
                                        else{
                                            echo anchor('pelatihan/downloadfull/'.$this->uri->segment(3), 'Download FULL PDF', array('class'=>'button', 'target'=>'_blank'));
                                        }                            
                                        
                                    }else{
                                        echo anchor('pelatihan/laporan/'.$pelatihan['kodeunik'],'Download FULL PDF','class="button" onclick="return confirm(\'upload semua leporan terlebih dahulu\')"');
                                    } 
                                }else{
                                    echo anchor('pelatihan/laporan/'.$pelatihan['kodeunik'],'Download FULL PDF','class="button" onclick="return confirm(\'upload semua leporan terlebih dahulu\')"');
                                }

                                
                                
                                ?>
                                
                            </div>
                        </div> 
                        <div class="col-6">                           
                            <div class="button-default">   
                                <?php                                    
                                    echo anchor('peserta/viewdatapeserta/'.$this->uri->segment(3), 'Kembali', array('class'=>'button2'));
                                ?>
                            </div>
                        </div> 
                    </div>                    
                    
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead class="table-success">
									<tr>
                                        <th width="5px">No</th>
										<th style="text-align: center;">JENIS</th>
                                        <th style="text-align: center;">STATUS</th>
										<th width="15px" style="text-align: center;">UPLOAD</th>
									</tr>
                                    
								</thead>	
                                    <tr>
                                        <td>1</td>
                                        <td>SK</td>
                                        <td>
                                        <?php 
                                            // Check if the 'sk' file exists and is not empty
                                            if (!empty($laporan['sk'])) {
                                                // Define the file path
                                                $file_path = base_url('uploads/laporan/sk/' . $laporan['sk']);
                                                
                                                // Check if the file physically exists on the server
                                                if (!empty($file_path)) {
                                                    // Display the download link if the file exists
                                                    echo 'Dokumen SK sudah diupload ';
                                                    echo '<a href="'.$file_path.'" download="' . $laporan['sk'] . '" class="btn btn-xs btn-success">Download SK</a>'.'&nbsp;';
                                                    echo '<a href="'.$file_path.'" class="btn btn-xs btn-primary" target="_blank">Lihat SK</a>';
                                                } else {
                                                    // Display a message if the file path is set but the file does not exist
                                                    echo 'File not found';
                                                }
                                            } else {
                                                // Display an empty cell or a message if the file path is empty
                                                echo 'Dokumen SK belum diupload';
                                            }
                                        ?>
                                        <td>
                                            <!-- Upload Button Trigger Modal -->
                                            <?php
                                            if(!empty($laporan['sk'])){?>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#editModalSK" title="Edit" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?PHP }else{?>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uploadModalSK" title="Upload" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?php }?>
                                            
                                        </td>
                                    </tr>		
                                    <tr>
                                        <td>2</td>
                                        <td>TOR</td>
                                        <td>
                                        <?php 
                                            // Check if the 'sk' file exists and is not empty
                                            if (!empty($laporan['tor'])) {
                                                // Define the file path
                                                $file_path = base_url('uploads/laporan/tor/' . $laporan['tor']);
                                                
                                                // Check if the file physically exists on the server
                                                if (!empty($file_path)) {
                                                    // Display the download link if the file exists
                                                    echo 'Dokumen TOR sudah diupload ';
                                                    echo '<a href="'.$file_path.'" download="' . htmlspecialchars($laporan['tor'], ENT_QUOTES) . '" class="btn btn-xs btn-success">Download TOR</a>'.'&nbsp;';
                                                    echo '<a href="'.$file_path.'" class="btn btn-xs btn-primary" target="_blank">Lihat TOR</a>';
                                                } else {
                                                    // Display a message if the file path is set but the file does not exist
                                                    echo 'File not found';
                                                }
                                            } else {
                                                // Display an empty cell or a message if the file path is empty
                                                echo 'Dokumen SK belum diupload';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <!-- Upload Button Trigger Modal -->
                                            <?php
                                            if(!empty($laporan['tor'])){?>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#uploadModalTOR" title="Edit" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?PHP }else{?>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uploadModalTOR" title="Upload" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?php }?>

                                        </td>
                                    </tr>	
                                    <tr>
                                        <td>3</td>
                                        <td>LAPORAN</td>
                                        <td>
                                        <?php 
                                            // Check if the 'sk' file exists and is not empty
                                            if (!empty($laporan['laporan'])) {
                                                // Define the file path
                                                $file_path = base_url('uploads/laporan/laporan/' . $laporan['laporan']);
                                                
                                                // Check if the file physically exists on the server
                                                if (!empty($file_path)) {
                                                    // Display the download link if the file exists
                                                    echo 'Dokumen LAPORAN sudah diupload ';
                                                    echo '<a href="'.$file_path.'" download="' . htmlspecialchars($laporan['laporan'], ENT_QUOTES) . '" class="btn btn-xs btn-success">Download LAPORAN</a>'.'&nbsp;';
                                                    echo '<a href="'.$file_path.'" class="btn btn-xs btn-primary" target="_blank">Lihat LAPORAN</a>';
                                                } else {
                                                    // Display a message if the file path is set but the file does not exist
                                                    echo 'File not found';
                                                }
                                            } else {
                                                // Display an empty cell or a message if the file path is empty
                                                echo 'Dokumen LAPORAN belum diupload';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <!-- Upload Button Trigger Modal -->
                                            <?php
                                            if(!empty($laporan['laporan'])){?>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#uploadModalLAPORAN" title="Edit" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?PHP }else{?>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uploadModalLAPORAN" title="Upload" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?php }?>

                                        </td>
                                    </tr>	
                                    <tr>
                                        <td>4</td>
                                        <td>UNDANGAN</td>
                                        <td>
                                        <?php 
                                            // Check if the 'sk' file exists and is not empty
                                            if (!empty($laporan['undangan'])) {
                                                // Define the file path
                                                $file_path = base_url('uploads/laporan/undangan/' . $laporan['undangan']);
                                                
                                                // Check if the file physically exists on the server
                                                if (!empty($file_path)) {
                                                    // Display the download link if the file exists
                                                    echo 'Dokumen UNDANGAN sudah diupload ';
                                                    echo '<a href="'.$file_path.'" download="' . htmlspecialchars($laporan['undangan'], ENT_QUOTES) . '" class="btn btn-xs btn-success">Download UNDANGAN</a>'.'&nbsp;';
                                                    echo '<a href="'.$file_path.'" class="btn btn-xs btn-primary" target="_blank">Lihat UNDANGAN</a>';
                                                } else {
                                                    // Display a message if the file path is set but the file does not exist
                                                    echo 'File not found';
                                                }
                                            } else {
                                                // Display an empty cell or a message if the file path is empty
                                                echo 'Dokumen UNDANGAN belum diupload';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <!-- Upload Button Trigger Modal -->
                                            <?php
                                            if(!empty($laporan['undangan'])){?>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#uploadModalUNDANGAN" title="Edit" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?PHP }else{?>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uploadModalUNDANGAN" title="Upload" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?php }?>

                                        </td>
                                    </tr>	
                                    <tr>
                                        <td>5</td>
                                        <td>JADWAL</td>
                                        <td>
                                        <?php 
                                            // Check if the 'sk' file exists and is not empty
                                            if (!empty($laporan['jadwal'])) {
                                                // Define the file path
                                                $file_path = base_url('uploads/laporan/jadwal/' . $laporan['jadwal']);
                                                
                                                // Check if the file physically exists on the server
                                                if (!empty($file_path)) {
                                                    // Display the download link if the file exists
                                                    echo 'Dokumen JADWAL sudah diupload ';
                                                    echo '<a href="'.$file_path.'" download="' . htmlspecialchars($laporan['jadwal'], ENT_QUOTES) . '" class="btn btn-xs btn-success">Download JADWAL</a>'.'&nbsp;';
                                                    echo '<a href="'.$file_path.'" class="btn btn-xs btn-primary" target="_blank">Lihat JADWAL</a>';
                                                } else {
                                                    // Display a message if the file path is set but the file does not exist
                                                    echo 'File not found';
                                                }
                                            } else {
                                                // Display an empty cell or a message if the file path is empty
                                                echo 'Dokumen JADWAL belum diupload';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                            <!-- Upload Button Trigger Modal -->
                                            <?php
                                            if(!empty($laporan['jadwal'])){?>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#uploadModalJADWAL" title="Edit" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?PHP }else{?>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#uploadModalJADWAL" title="Upload" data-placement="top">
                                                <i class="icon ion-ios-create"></i> 
                                            </button>
                                            <?php }?>

                                        </td>
                                    </tr>				
							</table>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
                </div>
            </div>

           
<!-- Upload Modal SK-->
<div class="modal fade" id="uploadModalSK" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File SK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/upload_sk/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="sk"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal SK-->
<div class="modal fade" id="editModalSK" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit File SK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/edit_sk/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>            
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="sk"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Modal TOR-->
<div class="modal fade" id="uploadModalTOR" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File TOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/upload_tor/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="tor"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Modal LAPORAN-->
<div class="modal fade" id="uploadModalLAPORAN" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File LAPORAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/upload_laporan/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="laporan"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Modal UNDANGAN-->
<div class="modal fade" id="uploadModalUNDANGAN" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File UNDANGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/upload_undangan/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="undangan"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Modal JAFDWAL-->
<div class="modal fade" id="uploadModalJADWAL" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File JADWAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('pelatihan/upload_jadwal/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
            <?php 
            date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
            $now = date('Y-m-d H:i:s');
            ?>
            <?=form_hidden('now',$now);?>
            <?=form_hidden('id_pelatihan',$pelatihan['id']);?>
            <?=form_hidden('kodeunik',$pelatihan['kodeunik']);?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File:</label>
                        <input type="file" class="form-control" name="jadwal"  accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>