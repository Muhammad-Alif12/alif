<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>MASYARAKAT UMUM</title>
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
  <form method="POST" id="tracing-layanan" enctype="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="fname">NIK</label>
    </div>
    <div class="col-75">
      <input type="text" id="nik" name="nik" placeholder="Masukkan NIK..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">NO HP</label>
    </div>
    <div class="col-75">
      <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No Hp..">
    </div>
  </div>
  <br>
    <div class="button-cari">
    <input type="submit" value="KIRIM" id="btn1" name="kirim">
    </div>
  </form>
</div>

<span style="text-align:center;" id="hasil"></span>

</div>

<div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
</div>
</body>

<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript">
 


  $('#tracing-layanan').on('submit', function (e) {

      e.preventDefault();
      $('#btn1').attr('value', "Mohon Tunggu...");
      document.getElementById('btn1').disabled = true;

       $.ajax({
        type: 'POST',
        url: "<?php echo $base_url_backend; ?>/user-tracking-layanan.php",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            
             $('#hasil').html(data[0]['data']);

            $('#btn1').attr('value', "Kirim");
            document.getElementById('btn1').disabled = false;
        
        },  error: function(error){

            $('#btn1').attr('value', "Kirim");
            document.getElementById('btn1').disabled = false;
        }
      });
    
   
  });
</script>
</html>