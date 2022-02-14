<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>MASYARAKAT UMUM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<header>    
    <div class="container">
        <div class="header-left">
            <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
        </div>
        <div class="header-right">
          <a href="index.php">LAYANAN UMUM</a>
          <a href="LayananKonsolidasi.php">LAYANAN KONSOLIDASI</a>
          <a href="TrackingLayanan.php">TRACKING LAYANAN</a>
        </div>
    </div>
</header>

<div class="main">
<div class="container">
  <form action="proses-kirim.php" method="POST" id="layanan-umum"> 
  <div class="row">
  <div class="row">
    <div class="col-25">
      <label for="country">JENIS LAYANAN</label>
    </div>
  </div>
  <div class="col-75">
      <select id="jenis-layanan" name="jenis_layanan">
        <option value="ktp">KTP</option>
        <option value="kk">Kartu Keluarga(KK)</option>
        <option value="kia">KIA</option>
      </select>
    </div>
    <div class="col-25">
      <label for="fname">NIK</label>
    </div>
    <div class="col-75">
      <input type="text" id="nik" name="nik" placeholder="Masukkan Nik..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">NAMA</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="nama" placeholder="Masukkan Nama..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">UPLOAD FILE</label>
    </div>
    <div class="col-75">
    <input type="file" id="myFile" name="filename">
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="KIRIM" id="btn1" name="kirim">
  </div>
  </form>
</div>
</div>
<div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>

<script src="asset/js/submit.js"></script>
</body>
</html>