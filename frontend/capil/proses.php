<?php session_start(); ?>
<?php include '../base_url.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPIL</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<header>    
    <div class="container">
        <div class="header-left">
            <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
        </div>
        <div class="header-right">
          <a href="KelolaLayananUmum.php">KELOLA LAYANAN UMUM</a>
          <a href="KelolaLayananKonsolidasi.php">KELOLA LAYANAN KONSOLIDASI</a>
          <a href="logout.php">LOGOUT</a>
        </div>
    </div>
</header>
<div class="container">
<br><br><br>
<h1>PROSES LAYANAN</h1>


        <div class="main">
          
          <div class="container">
            <form method="POST" id="tracing-layanan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="row">
              <div class="col-25">
                <label for="fname">Nama Pegawai Yang Bertugas</label>
              </div>
              <div class="col-75">
                <input type="text" id="nama_pegawai" name="nama_pegawai" value="<?php echo  $_SESSION['user_info']; ?>" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Feedback Capil</label>
              </div>
              <div class="col-75">
                <input type="text" id="feedback_capil" name="feedback_capil" placeholder="Masukkan Feedback Capil..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Tahap Layanan (Status)</label>
              </div>
              <div class="col-75">
                <select id="status" name="status" class="form-control">
                  <option value="BELUM PROSES">BELUM PROSES</option>
                  <option value="SEDANG PROSES">SEDANG PROSES</option>
                  <option value="DITOLAK">DITOLAK</option>
                  <?php 
                   if($_GET['hal'] == "konsolidasi"){
                    $page = "capil-verifikasi-layanan-konsolidasi.php";
                    $redirect = "KelolaLayananKonsolidasi.php";
                   ?>
                  <option value="ANTRI VERIFIKASI PUSAT">ANTRI VERIFIKASI PUSAT</option>
                  <option value="SELESAI">SELESAI</option>
                  <?php 
                   }else{ 
                    $page = "capil-verifikasi-layanan-umum.php";
                    $redirect = "KelolaLayananUmum.php";
                  ?>
                  <option value="SELESAI">SELESAI</option>
                  <option value="TELAH DISERAHKAN">TELAH DISERAHKAN</option>
                  <?php } ?>
                </select>
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
        url: "<?php echo $base_url_backend; ?>/<?php echo $page; ?>",
        data: new FormData(this),
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer <?php echo $_SESSION['token_stakeholder']; ?>');
        },
        processData: false,
        contentType: false,
        success: function(data){
            
             if(data[0]["code"]==200){
               $('#tracing-layanan')[0].reset();
               window.location.href = "<?php echo $redirect; ?>";
             }

             alert(data[0]["msg"]);

            $('#btn1').attr('value', "KIRIM");
            document.getElementById('btn1').disabled = false;
        
        },  error: function(error){

            $('#btn1').attr('value', "KIRIM");
            document.getElementById('btn1').disabled = false;
        }
      });
    
   
  });
</script>
</html>