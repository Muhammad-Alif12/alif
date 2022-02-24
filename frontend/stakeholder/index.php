<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAKEHOLDER</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <header>    
          <div class="container">
                <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
          </div>
    </header> 
    <div class="login">
        <div class="container">
            <form method="POST" id="login" enctype="multipart/form-data"> 
                <h2>LOGIN</h2>
                <input type="text" placeholder="Enter Username" id="email" name="email" required> <br>
                <input type="password" placeholder="Enter Password" id="password" name="password" required><br>
                
                <input type="text" placeholder="Token" id="token"><br>
                <center>
                <input type="submit" value="LOGIN" id="btn1" style="display:block;">
                <input type="button" value="LOGIN" id="btn2" style="display:none;">
                </center>

            </form>
        </div>
    </div>
    <div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>
</body>


<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript">
 
  $('#login').on('submit', function (e) {

      e.preventDefault();
      $('#btn1').attr('value', "Mohon Tunggu...");
      document.getElementById('btn1').disabled = true;

       $.ajax({
        type: 'POST',
        url: "<?php echo $base_url_backend; ?>/login.php",
        data: JSON.stringify( {"email": $('#email').val(), "password": $('#password').val() } ),
        processData: false,
        contentType: false,
        success: function(data){
            
            if(data.message == "Successful login."){
                // alert("TOKEN JWT : "  +"\n"
                // +"\n"
                // +data.jwt);

                $('#btn1').attr('style', 'display:none;');
                $('#btn2').attr('style', 'display:block;');
                $('#token').val(data.jwt);
                set_session_token(data.jwt);

            }else{
                alert("Maaf Username Atau Password Yang Anda Masukkan Salah!");
                window.location.href = "index.php";
            }

            $('#btn1').attr('value', "LOGIN");
            document.getElementById('btn1').disabled = false;
        
        },  error: function(error){

            $('#btn1').attr('value', "LOGIN");
            document.getElementById('btn1').disabled = false;
        }
      });
    
   
  });


  $('#btn2').on('click', function (e) {
      alert("Berhasil Login, Selamat Datang!");
      window.location.href = "layananUmum.php";
      e.preventDefault();
  });


  function set_session_token(jwt) {
       $.ajax({
        type: 'GET',
        url: "set-session-token.php?jwt="+jwt,
        success: function(data){


        },  error: function(error){
            alert(error);
        }
      });
    
  }
</script>


</html>