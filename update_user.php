<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type:application/json");

include("database.php");
$response = [];
if ($_SERVER["REQUEST_METHOD"] == "PUT" || $_SERVER["REQUEST_METHOD"] == "PATCH") {

    $input = file_get_contents('php://input'); // returns string

    parse_str($input, $_UPDATE);

    $id = $_UPDATE["id"];
    $name = $_UPDATE["name"];
    $email = $_UPDATE["email"];
    $pass = $_UPDATE["password"];

   
    $connection=new dbConnection();
    $connection->connect();

    $connection->updateUser($id,$name,$email,$pass);    
    $response["result"]="Success";

} else {
    $response["result"] = "Error Only Get Allow";
    
}


echo json_encode($response);

?>