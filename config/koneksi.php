<?php
date_default_timezone_set('Asia/Jakarta');

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname   = "db_kasir";

$db = new mysqli($hostname, $username, $password, $dbname);

// nota
$karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

$panjang = 3;
$string = "INV".date("dmY"); 

for($i= 0; $i < $panjang; $i++ ) {
    $pos = rand(0, 26 - 1 );

    $string .= $karakter{$pos};
}

// kode barang
$num = "1234567890";
$kode = ""; 

for($i= 0; $i < 10; $i++ ) {
    $rand = rand(0, 10 - 1 );

    $kode .= $num{$rand};
}


// mendapatkan ip user
function ipAddr() {

    $ipaddress = '-';

    if (!empty($_SERVER['HTTP_CLIENT_IP'])){

        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];

    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ipaddress = $_SERVER['REMOTE_ADDR'];

    }

    return $ipaddress;

}