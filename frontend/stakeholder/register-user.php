<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="asset/css/style.css?v=1.2">
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
                <li><a href="register-user.php">KELOLA USER CAPIL</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <article>
            <h1>KELOLA USER</h1>

            <form action="" id="form-tambah" method="POST">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name.." style="width:90%">
                        </td>
                        <td>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name.." style="width:90%">
                        </td>
                        <td>
                            <input type="text" name="email" id="email" placeholder="Email.." style="width:90%">
                        </td>
                        <td>
                            <input type="password" name="password" id="password" placeholder="Password.." style="width:90%">
                        </td>
                        <td>
                            <button type="submit" style="width:100%" id="btn1">Tambah User</button>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </form>
            

            <br><br>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel" style="overflow-y: scroll;height: 300px;">
                <div id="result"></div>
            </div>

    </section>
    <div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>


    <?php session_start(); ?>

    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
        
            load_table();       

        });

   
        function load_table() {
       
          $.ajax({
                type: 'POST',
                url: "<?php echo $base_url_backend; ?>/stakeholder-tampil-user.php",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer <?php echo $_SESSION['token_stakeholder']; ?>');
                },
                data: {},
                success: function(res){
                    
                  var tbl = '<table id="customers">'+
                             '<tr>'+
                                 '<th><center>ID USER</th>'+
                                 '<th><center>First Name</th>'+
                                 '<th><center>Last Name</th>'+
                                 '<th><center>Email</th>'+
                             '</tr>';

                for (var i = 0; i < res[0].data.length; i++) {
                    tbl += '<tr>'+
                            '<td><center>'+res[0].data[i].id+'</td>'+
                            '<td>'+res[0].data[i].first_name+'</td>'+
                            '<td>'+res[0].data[i].last_name+'</td>'+
                            '<td>'+res[0].data[i].email+'</td>'+
                          '</tr>';
                }
                  

                  tbl += '</table>';

                  $('#result').html(tbl);

                },  error: function(error){

                }
              });

        }

  $('#form-tambah').on('submit', function (e) {

      e.preventDefault();
      $('#btn1').attr('value', "Mohon Tunggu...");
      document.getElementById('btn1').disabled = true;

       $.ajax({
        type: 'POST',
        url: "<?php echo $base_url_backend; ?>/register.php",
        data: JSON.stringify({
                                "first_name": $('#first_name').val(), 
                                "last_name": $('#last_name').val(), 
                                "email": $('#email').val(), 
                                "password": $('#password').val()
                            }),
        processData: false,
        contentType: false,
        success: function(data){

             if(data.message=="User was successfully registered."){
               $('#form-tambah')[0].reset();
               alert("Berhasil Menambah User Capil Baru!");
               load_table();
             }else{
               alert("Gagal Menambah User Capil Baru!");
             }


            $('#btn1').attr('value', "Tambah User");
            document.getElementById('btn1').disabled = false;
        
        },  error: function(error){
            alert(error.responseJSON.message);
            $('#btn1').attr('value', "Tambah User");
            document.getElementById('btn1').disabled = false;
        }
      });
    
   
  });


    </script>
</body>
</html>