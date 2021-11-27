<?php 

$cek = $db->query("SELECT * FROM tb_admin ");
$data = $cek->fetch_assoc();

?>

<form action="" method="post">

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                <h5>Edit Akun</h5>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" class="form-control form-control-sm" name="username" value="<?= $data['username'] ?>" />
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="text" class="form-control form-control-sm" name="password" value="<?= $data['password'] ?>" />
                </div>
                
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary" name="simpan">simpan</button>
                <a href="?page=beranda" class="btn btn-sm btn-outline-dark float-right">kembali</a>
            </div>
        </div>
    </div>
</div>

</form>

<?php
if(isset($_POST['simpan'])) {
    $user   = $_POST['username'];
    $pass   = $_POST['password'];

    if(empty($user)) {
        echo "
        <script>
        alert('username harus diisi!');
        </script>
        ";
    } else {
        
        $db->query("UPDATE tb_admin SET username='$user', password='$pass' ");

        echo "
        <script>
        alert('Akun sudah diubah');
        window.location.href='?page=akun';
        </script>
        ";

    }

}