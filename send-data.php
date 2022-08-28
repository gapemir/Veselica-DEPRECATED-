<?php
    include_once 'includes/dbh.inc.php';

    $data = json_decode(file_get_contents("php://input"));

    $kaj = $data->kaj;
    $jurck = $data->jurck;
    $host = $data->host;

    if($jurck)
        $sql = "UPDATE pijaca SET $kaj = 1 WHERE id=$jurck;";
    /*else 
        $sql = "UPDATE pijaca SET $kaj = 0;";*/
    else
        $sql = "UPDATE pijaca SET $kaj = 0 WHERE id=$host;";
        
    mysqli_query($conn,$sql);

