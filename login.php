<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Login</title>

<link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css" />

<style>
body {
    background-color: #e7e7e7;
}
.login_wrap {
    width: 280px;
    margin: 100px auto;
    background-color: #fff;
    padding: 15px;
    overflow: hidden
}
.login_wrap h2 {
    margin-bottom: 30px;
    font-weight: 300;
}
</style>
</head>
<body>

   <div class="login_wrap">
        <h2>Login</h2>
        <div class="login_content">
            <form action="" method="POST">
                <div class="form-group">
                    <label> Username </label>
                    <input type="text" class="form-control form-control-sm" name="username" />
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="password" class="form-control form-control-sm" name="password" />
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-sm btn-primary w-100" name="login">Login</button>
                </div>
            </form>

            <?php 
            require_once("config/koneksi.php");
            if(isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(empty($username)) {
                    echo "
                    <script>
                    alert('Username harus diisi!');
                    </script>
                    ";
                } else if (empty($password)) {
                    echo "
                    <script>
                    alert('Password harus diisi!');
                    </script>
                    ";
                } else {

                    $cek = $db->query("SELECT * FROM tb_admin WHERE username = '$username' ");
                    $data = $cek->fetch_assoc();
                    $rows = $cek->num_rows;

                    if($rows == 0) {
                        echo "
                        <script>
                        alert('Usename dan password salah!');
                        </script>
                    ";
                    } else {
                        if($password <> $data['password']) {
                            echo "
                            <script>
                            alert('Usename dan password salah!');
                            </script>
                            ";
                        } else {
                            $_SESSION['admin']['username'] = $data['username'];
                            $_SESSION['admin']['ip'] = ipAddr();
                            $_SESSION['admin']['time'] = date('d-m-Y G:i:s');
                            
                            echo "
                            <script>
                            alert('Login berhasil');
                            window.location.href = 'index.php';
                            </script>
                            ";
                        }
                    }

                }
            }
            ?>
        </div>
        <hr>
        <div>
            <b>Login akun: </b>
            <hr>
            Username: Admin
            <br>
            password: Admin909
        </div>
   </div>

</body>
</html>