<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type:application/json");

include ("database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
   

    
    $errorMessage = "";

    if (move_uploaded_file($myFilePath, $imgToPath)) {
        $errorMessage = $errorMessage . " upload complete,";
    } else {
        $errorMessage = $errorMessage . " move_uploaded_file failed,";
    }

    if ($name == null) {
        $errorMessage = $errorMessage . " name,";
    }
    if ($email == null) {
        $errorMessage = $errorMessage . " email,";
    }
    if ($pass == null) {
        $errorMessage = $errorMessage . " password,";
    }
    

    if ($name != null && $email != null && $pass != null ) {
        $con = new dbConnection();
        $con->connect();
        $con->insertUser($name, $email, $pass, );

        $res["data"] = "Successfully added";
        $usersData = [];
        
        while ($s = mysqli_fetch_assoc($sRec)) {
            array_push($usersData, $s);
        }
        // $user=$gsbd;
        $res["result"] = true;

        $user["name"] = $name;
        $user["email"] = $email;
        $user["password"] = $pass;
        $user["number"] = $num;
        $user["marks"] = $marks;
        $user["insert_by"] = $iby;
        $res["user"] = $usersData;
    } else {
        $res["result"] = false;
        $res["message"] = $errorMessage . " parameter is missing";
    }





} else {
    $res["data"] = "Allow only Post";
}

echo json_encode($res);
?>