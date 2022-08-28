<?php
    $dbServername = "localhost";//zamenjati potrebuješ te štiri spremenjivke glede na podatkovno bazo
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "veselica";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $pijaca = [
        'pivo', 'pivo_piksna', 'belo_vino', 'rdece_vino',
        'vodka', 'jager', 'stock', 'gin',
        'borovnicke', 'smrekuc', 'leskovec', 'radler',
        'pepsi', 'pepsi_mala', 'cocacola', 'schweppes',
        'voda', 'voda_z_okusom', 'multisola', 'sok',
        'radenska', 'radenska_mala', 'malt_1', 'malt_2',
        'redbull', 'kozarec_0.5', 'kozarec_0.3', 'kozarec_0.03'
    ];
    
    function ech($ar1, $ar2, $ar3){
        if ($ar2 == 0)
            for ($i = 1; $i <= 28; $i++)
                echo ($ar1['a'.$i]);
        else {
            for ($i = 1; $i <= 28; $i++)
                echo ($ar1['a'.$i] + $ar2['a'.$i] * 2 + $ar3['a'.$i] * 4);
        }
    }
    function get($conn, $jurck){
        if ($jurck) 
            $sql = "SELECT * FROM pijaca WHERE id=$jurck;";
        else 
            $sql = "SELECT * FROM pijaca;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            if ($jurck)
                ech(mysqli_fetch_assoc($result), 0, 0);
            else
                ech(mysqli_fetch_assoc($result), mysqli_fetch_assoc($result), mysqli_fetch_assoc($result));
        }
    }
