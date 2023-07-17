<?php

$set_pajak_bandara_asal = [
  'Soekarno Hatta' => 65000,
  'Husein Sastranegara' => 50000,
  'Abdul Rachman Saleh' => 40000,
  'Juanda' => 30000
];

$set_pajak_bandara_tujuan = [
  'Ngurah Rai' => 85000,
  'Hasanuddin' => 70000,
  'Inanwatan' => 90000,
  'Sultan Iskandar Muda' => 60000
];

if ($_POST) {
  
  $waktu_submit     = time();
  $nama_maskapai    = $_POST['nama_maskapai'];
  $asal_bandara     = $_POST['bandara_asal'];
  $tujuan_bandara   = $_POST['bandara_tujuan'];
  
  $pajak_bandara_asal     = $set_pajak_bandara_asal[$asal_bandara];
  $pajak_bandara_tujuan   = $set_pajak_bandara_tujuan[$tujuan_bandara];
  
  $total_pajak  = $pajak_bandara_asal + $pajak_bandara_tujuan;
  $harga_tiket  = isset($_POST['harga_tiket']) ? ($_POST['harga_tiket'] != '' ? $_POST['harga_tiket'] : 0) : 0;
  $total_harga_tiket  = $harga_tiket + $total_pajak;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--font link-->
  <link rel="stylesheet" href="style.css">
  <title>Pemesanan Tiket Pesawat</title>
</head>

<body style="background-image: url(latar1.jpg); background-attachment: fixed; background-size: cover;">

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Berliana Airport
    </a>
  </div>
</nav>

  <header id="header" class="jumbotron">
    <div class="container py-5">
      <h2 class="text-center" style="color: white;">Pendaftaran Rute Penerbangan</h2>
        <section id="tiket" class="tiket">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card">
                <div class="card-body">
                  <form method="POST">
                    <div class="mb-3">
                     <label for="input-nama-maskapai" class="form-label">Nama Maskapai</label>
                    <input name="nama_maskapai" type="text" class="form-control" id="input-nama-maskapai" placeholder="Nama Maskapai" required>
                       
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-asal" class="form-label">Bandara Asal</label>
                      <select id="input-bandara-asal" name="bandara_asal" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($set_pajak_bandara_asal as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-tujuan" class="form-label">Bandara Tujuan</label>
                      <select id="input-bandara-tujuan" name="bandara_tujuan" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($set_pajak_bandara_tujuan as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="input-harga-tiket" class="form-label">Harga Tiket</label>
                      <input name="harga_tiket" type="number" class="form-control" id="input-harga-tiket" placeholder="Harga Tiket" required>
                    </div>
                    <button class="btn w-100" style="background-color:pink;"><script>
                      alert("Tiket berhasil dipesan, Klik ok untuk melanjutkan");
                    </script>  Daftar</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-3">
              <div class="card h-100">
                <div class="card-body">
                  <table class="table table-borderless table-hover my-5">
                    <tbody>
                        <tr>
                          <th scope="row">Nama Maskapai</th>
                          <td>:</td>
                          <td><?= isset($nama_maskapai) ? $nama_maskapai : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Asal Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($asal_bandara) ? $asal_bandara : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tujuan Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($tujuan_bandara) ? $tujuan_bandara : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($harga_tiket) ? 'Rp ' . number_format($harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Pajak</th>
                          <td>:</td>
                          <td><?= isset($total_pajak) ? 'Rp ' . number_format($total_pajak) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr class="border-top">
                          <th scope="row">Total Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($total_harga_tiket) ? 'Rp ' . number_format($total_harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div> 
  </header>
          <div class="navbar-dark" style="background-color: pink;">
          <div class="copyright" style="color: black; text-align: center; padding-top:5px; padding-bottom:5px; bottom:60px; width:100%; height:30px;">Berliana Airport Copyright © 2023</div>
          </div>

 </html>