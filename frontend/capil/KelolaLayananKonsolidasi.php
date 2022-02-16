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
<h1>LAYANAN KONSOLIDASI</h1>
<div id="result"></div>
</div>
<div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>
</body>


    <?php session_start(); ?>

    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
        
           $.ajax({
            type: 'POST',
            url: "<?php echo $base_url_backend; ?>/capil-tampil-layanan-konsolidasi.php",
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer <?php echo $_SESSION['token_stakeholder']; ?>');
            },
            data: {},
            success: function(res){
                
              var tbl = '<table id="customers">'+
                         '<tr>'+
                             '<th><center>NIK</th>'+
                             '<th><center>NAMA</th>'+
                             '<th><center>NO HP</th>'+
                             '<th><center>TUJUAN KONSOLIDASI</th>'+
                             '<th><center>STATUS</th>'+
                         '</tr>';

            for (var i = 0; i < res[0].data.length; i++) {
                tbl += '<tr>'+
                        '<td>'+res[0].data[i].nik+'</td>'+
                        '<td>'+res[0].data[i].nama+'</td>'+
                        '<td>'+res[0].data[i].no_hp+'</td>'+
                        '<td><center>'+res[0].data[i].tujuan_konsolidasi+'</td>'+
                        '<td><center>'+res[0].data[i].status+'</td>'+
                      '</tr>';
            }
              

              tbl += '</table>';

              $('#result').html(tbl);

            },  error: function(error){

            }
          });

        });

    </script>



</html>