<?php
include_once 'connect-db.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $nik    = $_POST['nik'];
    $no_hp  = $_POST['no_hp'];

    $result = mysqli_query($mysqli, "   
                                    SELECT 
                                      CONCAT('Umum||',a.jenis_layanan,'||',a.created_at,'||',a.status) riwayat
                                    FROM layanan_umum a WHERE a.nik = '$nik' AND a.no_hp = '$no_hp'
                                    UNION ALL
                                   SELECT 
                                      CONCAT('Konsolidasi||',b.tujuan_konsolidasi,'||',b.created_at,'||',b.status)
                                    FROM layanan_konsolidasi b WHERE b.nik = '$nik' AND b.no_hp = '$no_hp' 
                                    ");

    $msg ="<center><h3>Riwayat Layanan:</h3>";
    while($d = mysqli_fetch_array($result)){

        $da = explode('||', $d['riwayat']);

        $msg .= "[".$da[2]."] Layanan ".$da[0]." Untuk Keperluan ".$da[1]." Saat Ini Dalam Tahap ".$da[3]."<br>"; 
    }

    $msg .= "</center>";

       
    $res[] = [
        "code" => 200,
        "data" => $msg
    ];

  

  echo json_encode($res);

?>