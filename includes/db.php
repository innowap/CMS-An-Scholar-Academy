<?php
ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$query = "SELECT * FROM settings";
$select_all_settings = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_settings)) {

    $siteemail = $row['email'];
    $siteaddress = $row['address'];
    $sitephone = $row['phone'];
    $sitefb = $row['fb'];
    $sitetw = $row['tw'];
    $siteins = $row['ins'];
}