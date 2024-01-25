
		
		<!-- about us -->
		<div class="about-us">
			<div class="header-about">
				<div class="container">
					<img src="<?=base_url('assets/images/logoupt.png')?>" alt="image-demo">
					<div class="about-title">
						<h4 class="mb-1">Terimakasih</h4>
						<span class="text-small"></span>
					</div>
					<p>Telah mendaftar pada <?=$pelatihan['judul_pelatihan']?></p>
                    <p>Yang diadakan di <?=$pelatihan['alamat_pelatihan']?></p>
					<?php
					$tglmulai = new DateTime($pelatihan['tgl_mulai']);
					$tglakhir = new DateTime($pelatihan['tgl_akhir']);
					// Array of month names in alphabet format
					$monthNames = [
						"Januari", "Februari", "Maret", "April",
						"Mei", "Juni", "Juli", "Agustus",
						"September", "Oktober", "November", "Desember"
					];
					?>
                    <p>Pada Tanggal Pelatihan: <?=$tglmulai->format("d") . " " . $monthNames[$tglmulai->format("n") - 1] . " " . $tglmulai->format("Y");?> s.d <?=$tglakhir->format("d") . " " . $monthNames[$tglakhir->format("n") - 1] . " " . $tglakhir->format("Y");?></p>
                    <h6>Apabila mengundurkan diri harap menghubungi panitia di nomor berikut H-2 sebelum tanggal kegiatan</h6>
					<!-- separator -->
					<div class="separator-medium"></div>
					<!-- end separator -->
                    
                    <a href="https://wa.me/6285235142348">
                        <div class="row">
                            <div class="col-12">
                                <button class="button button-fill button-rounded">Chat Admin</button>
                            </div>                            
                        </div>
                    </a>
					
				</div>
			</div>
			

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->

			<hr>

			<!-- separator -->
			<div class="separator-small"></div>
			<!-- end separator -->

		</div>
		<!-- end about us -->

	</div>
	<!-- end pages wrapper -->

