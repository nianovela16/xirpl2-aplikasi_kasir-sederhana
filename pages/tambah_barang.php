<form action="" method="post">

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Barang</h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label> Nama Barang </label>
                    <input type="text" class="form-control form-control-sm" name="nama_brg" />
                </div>
                <div class="form-group">
                    <label> Stok </label>
                    <input type="text" class="form-control form-control-sm" name="stok" />
                </div>
                <div class="form-group">
                    <label> Harga </label>
                    <input type="text" class="form-control form-control-sm" name="harga" />
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
       
        $db->query("INSERT INTO tb_barang (kode_brg, nama_brg, stok, harga) VALUES ('$kode','$nama_brg', '$stok', '$harga') ");

        echo "
        <script>
        alert('Barang telah ditambahkan!');
        window.location.href='?page=data_barang';
        </script>
        ";

    }

}