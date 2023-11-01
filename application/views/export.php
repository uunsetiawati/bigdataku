<!DOCTYPE html>
<html>
<head>
     <title>Tutorial Export Dengan Codeigniter</title>
</head>
<body>
     <a href="<?php echo base_url('export/export'); ?>">Export Data</a>
     <table border="1" cellspacing="0">
          <thead>
               <tr>
                    <th style="width: 7%; text-align: center;">No Urut</th>
                    <th style="width: 30%">No KTP</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
               </tr>
          </thead>
          <tbody>
               <?php $index = 1; ?>
               <?php foreach($semua_pengguna as $pengguna): ?>
                    <tr>
                         <td style="width: 7%; text-align: center;"><?php echo $pengguna->no_urut; ?></td>
                         <td style="width: 30%"><?php echo $pengguna->no_ktp; ?></td>
                         <td><?php echo $pengguna->nama_peserta; ?></td>
                         <td><?php echo date('j F Y', strtotime($pengguna->tempat_lahir)); ?></td>
                         <td style="text-align: center;"><?php echo date('d-m-Y', strtoTime($pengguna->tgl_lahir)); ?></td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</body>
</html>