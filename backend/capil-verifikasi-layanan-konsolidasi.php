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

        $id      = $_POST['id'];
        $proses  = $_POST['proses'];

  
        $result = mysqli_query($mysqli, "UPDATE layanan_konsolidasi set status = '$proses' WHERE id = '$id'");
        
        if($result){

            $res[] = [
                "code" => 200,
                "msg" => "Layanan Konsolidasi Berhasil Mengubah Status!"
            ];

        }else{

            $res[] = [
                "code" => 200,
                "msg" => "Layanan Konsolidasi Gagal Mengubah Status!"
            ];

        }


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