<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type:application/json");
include("database.php");
$response = [];
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $input = file_get_contents('php://input'); // returns string

    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];

    include("connection.php");
    $connection=new dbConnection();
    $connection->connect();

    $res=$connection->deleteUser($id);    
    $response["result"]="Success";

} else {
    $response["result"] = "Error Only Get Allow";
}


echo json_encode($response);

?>