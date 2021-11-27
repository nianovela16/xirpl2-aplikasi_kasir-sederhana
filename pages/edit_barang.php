<?php 

$id = $_GET['brg'];

$cek = $db->query("SELECT * FROM tb_barang WHERE kode_brg = '$id' ");
$data = $cek->fetch_assoc();

?>

<form action="" method="post">

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                <h5>Edit data Barang</h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label> Nama Barang </label>
                    <input type="text" class="form-control form-control-sm" name="nama_brg" value="<?= $data['nama_brg'] ?>" />
                </div>
                <div class="form-group">
                    <label> Stok </label>
                    <input type="text" class="form-control form-control-sm" name="stok" value="<?= $data['stok'] ?>" />
                </div>
                <div class="form-group">
                    <label> Harga </label>
                    <input type="text" class="form-control form-control-sm" name="harga" value="<?= $data['harga'] ?>" />
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary" name="simpan">simpan</button>
                <a href="?page=data_barang" class="btn btn-sm btn-outline-dark float-right">kembali</a>
            </div>
        </div>
    </div>
</div>

</form>

<?php
if(isset($_POST['simpan'])) {
    $nama_brg   = $_POST['nama_brg'];
    $stok       = $_POST['stok'];
    $harga      = $_POST['harga'];

    if(empty($nama_brg)) {
        echo "
        <script>
        alert('Nama Barang harus diisi!');
        </script>
        ";
    } else {
        
        $db->query("UPDATE tb_barang SET nama_brg='$nama_brg', stok='$stok', harga='$harga' WHERE kode_brg = '$id' ");

        echo "
        <script>
        alert('Data barang sudah diubah');
        window.location.href='?page=data_barang';
        </script>
        ";

    }

}