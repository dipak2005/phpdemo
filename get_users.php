<?php

    header ("Access-Control-Allow-Methods: GET");
    header("Content-Type:application/json");

    include("database.php");
    $response=[];
    if($_SERVER["REQUEST_METHOD"]=="GET"){
       

        $connection=new dbConnection();
        $connection->connect();
    
        $res=$connection->getData();
        
        $sData=[];
        while ($s=mysqli_fetch_assoc($res)) {
            array_push($sData,$s);
        }
    
        
        $response["result"]="Success";
        $response["data"]=$sData;
    }else{
        $response["result"]="Error Only Get Allow";
    }


    echo json_encode($response);

?>