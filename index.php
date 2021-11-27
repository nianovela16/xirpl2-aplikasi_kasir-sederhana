<?php

// header
include "templates/header.php";

// content
// ketika ada url ?page
if(isset($_GET['page'])) {
    // tampung url dalam variabel "page"
    $page = $_GET['page'];
    
    switch($page) {
        // halaman utama / beranda
        case 'beranda': 
            include "pages/beranda.php";
            break;
        
        // halaman data barang
        case 'data_barang': 
            include "pages/data_barang.php";
            break;
        
        // halaman tambah barang
        case 'tambah_barang': 
            include "pages/tambah_barang.php";
            break;
        
        // halaman edit barang 
        case 'edit_barang': 
            include "pages/edit_barang.php";
            break;
        
        // hapus barang
        case 'hps_barang': 
           $id = $_GET['brg'];

           $db->query("DELETE FROM tb_barang WHERE kode_brg = '$id' ");

            echo "
            <script>
            window.location.href='?page=data_barang';
            </script>
            ";

           break;
        
        // hapus keranjang
        case 'hps_cart': 
           $id = $_GET['brg'];

           unset($_SESSION['cart'][$id]);

            echo "
            <script>
            window.location.href='?page=transaksi';
            </script>
            ";

           break;
        
        // halaman transaksi
        case 'transaksi': 
            include "pages/transaksi.php";
            break;
        
        // halaman laporan    
        case 'laporan': 
            include "pages/laporan.php";
            break;
        
        // reset ulang transaksi 
        case 'reset_cart': 

            unset($_SESSION['cart']);
            unset($_SESSION['tunai']);
            unset($_SESSION['plg']);
            unset($_SESSION['nota']);

            echo "
            <script>
            window.location.href='?page=transaksi';
            </script>
            ";
            break;

        // halaman akun
        case 'akun': 
            include "pages/akun.php";
            break;
        
        // logout
        case 'logout': 
            session_destroy();

            echo "
            <script>
            alert('Anda sudah logout, silahkan login kembali');
            window.location.href = 'login.php';
            </script>
            ";

            break;
        
    }

} else {

    include "pages/beranda.php";

}

// footer
include "templates/footer.php";