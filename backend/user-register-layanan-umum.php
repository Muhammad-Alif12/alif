<?php
include_once 'connect-db.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  $jenis_layanan  = $_POST['jenis_layanan'];
  $nik            = $_POST['nik'];
  $nama           = $_POST['nama'];
  $no_hp          = $_POST['no_hp'];

  $berkas1        = $_FILES['file']['name'];
  $tmp_berkas1    = $_FILES['file']['tmp_name'];
  $gambar         = "gambar/".$berkas1;
  
  if (move_uploaded_file($tmp_berkas1, $gambar)) {
    $gambar = $gambar;
  } else {
    $gambar = '-';
  }
  
  $result = mysqli_query($mysqli, "INSERT INTO layanan_umum (id, jenis_layanan, nik, nama, no_hp, file) 
                               VALUES(null, '$jenis_layanan', '$nik', '$nama', '$no_hp', '$gambar')");
  
  if($result){ 
       
       $res[] = [
            "code" => 200,
            "msg" => "Register Layanan Umum Berhasil Di input!"
        ];

  }else{

       $res[] = [
            "code" => 500,
            "msg" => "Register Layanan Umum Gagal Di input! "
        ];
  
  }

  echo json_encode($res);

?>