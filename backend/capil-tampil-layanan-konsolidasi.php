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
  
        $result = mysqli_query($mysqli, "SELECT * FROM layanan_konsolidasi");
        
        while($d = mysqli_fetch_array($result)){
            $dt[]=[
                    "id"=>$d["id"],
                    "tujuan_konsolidasi"=>$d["tujuan_konsolidasi"],
                    "nik"=>$d["nik"],
                    "nama"=>$d["nama"],
                    "no_hp"=>$d["no_hp"],
                    "status"=>$d["status"],
                    "feedback_capil"=>$d["feedback_capil"]
                  ];
        }
        
        $res[] = [
            "code" => 200,
            "data" => $dt
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