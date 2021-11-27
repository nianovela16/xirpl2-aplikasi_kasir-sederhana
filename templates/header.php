<?php
require_once('config/koneksi.php');

if(!isset($_SESSION['admin']['username'])) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>KASIR</title>

<link rel="shortcut icon" href="" type="image/x-icon">

<!-- css -->
<link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css" />
<link rel="stylesheet" href="assets/vendors/fontAwesome/css/all.min.css" />
<link rel="stylesheet" href="assets/css/main.css" />

</head>
<body>

<!-- nav top -->
<nav id="nav-top">

    <h1 class="webTitle float-left">
        <a href="?page=beranda">KASIR SEDERHANA</a>
    </h1>
    

    <div class="nav-ico float-right">
        <div class="ico">
            <img src="assets/img/avatar/profile.png" />
            <span class="fa fa-chevron-down arrdwn"></span>
        </div>
        <div class="submenu">
            <ul>
                <li>
                    <a href="?page=akun">
                        <i class="fa fa-user mr-1"></i> Kelola akun
                    </a>
                </li>
                <li>
                    <a href="?page=logout" class="logOut">
                        <i class="fa fa-sign-out-alt mr-1"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<nav id="nav-left">
    
    <ul id="list-menu">
        <li class="homepage">
            <a href="?page=beranda">
                <i class="fa fa-home mr-1"></i> 
                Beranda
            </a>
        </li>
    
        <li>
            <a href="?page=data_barang">
                <i class="fa fa-box-open mr-1"></i> 
                Data Barang
            </a>
        </li>
    
        <li>
            <a href="?page=transaksi">
                <i class="fa fa-shopping-cart mr-1"></i> 
                Transaksi
            </a>
        </li>
    
        <li>
            <a href="?page=laporan">
                <i class="fa fa-file mr-1"></i> 
                Laporan
            </a>
        </li>

        <li>
            <a href="?page=logout" class="logOut">
                <i class="fa fa-sign-out-alt mr-1"></i> Keluar
            </a>
        </li>
    
    </ul>

</nav>

<main>
    <div class="content-wrapper">