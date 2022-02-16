<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STACKHOLDER</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <header>    
          <div class="container">
                <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
          </div>
    </header>
    <section>
        <nav>
            <ul>
                <li><a href="layananUmum.php">AGGREGAT DATA LAYANAN UMUM</a></li>
                <li><a href="layananKonsolidasi.php">AGGREGAT DATA LAYANAN KONSOLIDASI</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <article>
            <h1>AGGREGAT DATA LAYANAN UMUM</h1>
            <div class="content">
                <div id="piechart"></div>
            </div>
    </section>
    <div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>

    <?php session_start(); ?>

    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">


 var belum_proses, sedang_proses, ditolak, selesai, telah_diserahkan;

    $( document ).ready(function() {
    
        google.charts.load('current', {
          packages: ['corechart']
        }).then(function () {

          // get data for chart 1
          $.ajax({
            type: 'POST',
            url: "<?php echo $base_url_backend; ?>/stakeholder-agg-layanan-umum.php",
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer <?php echo $_SESSION['token_stakeholder']; ?>');
            },
            data: {},
          }).done(function (result) {

            //drawChart1(result.d);
            google.charts.setOnLoadCallback(drawChart(result));

          }).fail(function (jqXHR, status, errorThrown) {
            console.log(errorThrown);
          });

        });

        function drawChart(res) {


            var data = google.visualization.arrayToDataTable([
              ['Aggregat', 'Aggregat Data Layanan Umum Hari Ini'],
              ['BELUM PROSES', parseInt(res[0]['data']['belum_proses'])],
              ['SEDANG PROSES', parseInt(res[0]['data']['sedang_proses'])],
              ['DITOLAK', parseInt(res[0]['data']['ditolak'])],
              ['SELESAI', parseInt(res[0]['data']['selesai'])],
              ['TELAH DISERAHKAN', parseInt(res[0]['data']['telah_diserahkan'])]
            ]);

              // Optional; add a title and set the width and height of the chart
              var options = {'title':'DATA LAYANAN UMUM', 'width':550, 'height':400};

              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);

        }

});

    </script>


</body>
</html>