<?php
include_once 'database.php';
include_once 'connect-db.php';
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$secret_key = "MbQeThWmZq4t7w!z%C*F-JaNdRfUjXn2";
$jwt = null;
$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));


$authHeader = $_SERVER['HTTP_AUTHORIZATION'];

$arr = explode(" ", $authHeader);

$jwt = $arr[1];

if($jwt){

    try {

        $decoded = JWT::decode($jwt, $secret_key, array('HS256'));
  
        $result = mysqli_query($mysqli, "SELECT 
                                          SUM(if(a.status = 'BELUM PROSES', 1, 0)) belum_proses,
                                          SUM(if(a.status = 'SEDANG PROSES', 1, 0)) sedang_proses,
                                          SUM(if(a.status = 'DITOLAK', 1, 0)) ditolak,
                                          SUM(if(a.status = 'SELESAI', 1, 0)) selesai,
                                          SUM(if(a.status = 'TELAH DISERAHKAN', 1, 0)) telah_diserahkan
                                        FROM layanan_umum a;");
        $data = mysqli_fetch_array($result);

            $res[] = [
                "code" => 200,
                "data" => [
                           "belum_proses"=>$data["belum_proses"],
                           "sedang_proses"=>$data["sedang_proses"],
                           "ditolak"=>$data["ditolak"],
                           "selesai"=>$data["selesai"],
                           "telah_diserahkan"=>$data["telah_diserahkan"]
                         ]
            ];


    }catch (Exception $e){

    http_response_code(401);

    $res[] = [
               "code" => 401,
               "msg" => $e->getMessage()
             ];


}
  echo json_encode($res);

}
?>