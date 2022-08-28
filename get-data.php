<?php
include_once 'includes/dbh.inc.php';

$data = json_decode(file_get_contents("php://input"));
$jurck = $data->jurck;

get($conn, $jurck);
