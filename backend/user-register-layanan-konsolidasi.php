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
  $tujuan         = $_POST['tujuan_konsolidasi'];
  $ket_pemohon    = $_POST['ket_pemohon'];

  
  $result = mysqli_query($mysqli, "INSERT INTO layanan_konsolidasi (id, nik, nama, no_hp, tujuan_konsolidasi, ket_pemohon) 
                               VALUES(null, '$nik', '$nama', '$no_hp', '$tujuan', '$ket_pemohon')");
  
  if($result){ 
       
       $res[] = [
            "code" => 200,
            "msg" => "Register Layanan Konsolidasi Berhasil Di input!"
        ];

  }else{

       $res[] = [
            "code" => 500,
            "msg" => "Register Layanan Konsolidasi Gagal Di input! "
        ];
  
  }

  echo json_encode($res);

?>