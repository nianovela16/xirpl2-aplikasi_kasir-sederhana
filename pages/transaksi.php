<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <?php 
                    if(isset($_SESSION['nota'])) {
                    ?>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <?php 
                        if(isset($_SESSION['plg'])) {
                        ?>
                            <input type="text" class="form-control form-control-sm" name="nama_plg" readonly value="<?= $_SESSION['plg']; ?>" />
                        <?php } else { ?>

                        <input type="text" class="form-control form-control-sm" name="nama_plg" required />

                        <?php }  ?>

                    </div>

                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" class="form-control form-control-sm" name="kode_prd" required />
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control form-control-sm" name="jml" required />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" name="add_cart">add to cart</button>
                        <a href="?page=reset_cart" class="btn btn-danger btn-sm reset" name="cetak">Reset Cart</a>
                    </div>

                    <?php } else { ?>
                        
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control form-control-sm" disabled />
                    </div>
                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" class="form-control form-control-sm" disabled />
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control form-control-sm" disabled />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-sm" name="new">New Cart</button>
                    </div>

                    <?php } ?>
                </form>

                <?php 
                if(isset($_POST['add_cart'])) {
                    $nama_plg = $_POST['nama_plg'];
                    $kode_prd = $_POST['kode_prd'];
                    $jml      = $_POST['jml'];

                    $cek = $db->query("SELECT * FROM tb_barang WHERE kode_brg = '$kode_prd' ");
                    $rows = $cek->num_rows;
                    $_SESSION['plg'] = $nama_plg; 

                    if($rows > 0) {

                    $_SESSION['cart'][$kode_prd] = $jml; 

                    header('location: ?page=transaksi');

                    } else {

                        echo "
                        <script>
                        alert('Produk tidak ditemukan!');
                        window.location.href='?page=transaksi';
                        </script>
                        ";

                    }

                } else if (isset($_POST['new'])) {
                    $_SESSION['nota'] = $string; 

                    unset($_SESSION['cart']);
                    unset($_SESSION['tunai']);
                    unset($_SESSION['plg']);

                    echo "
                    <script>
                    window.location.href='?page=transaksi';
                    </script>
                    ";
                }

                ?>
            </div>
        </div>
    </div>

    <div class="col-sm-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <i class="fa fa-shopping-cart mr-2"></i> Keranjang Belanja
                </h5>

                <div class="table-responsive">
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Nama Barang</th>
                            <th class="text-center">qty</th>
                            <th>Harga</th>
                            <th>Subharga</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $totalbelanja = 0;
                            if(isset($_SESSION['cart']) AND !empty($_SESSION['cart'])) {

                            $sess_cart = $_SESSION['cart'];

                                
                            foreach($sess_cart as $kode => $jumlah) {
                                $cek = $db->query("SELECT * FROM tb_barang WHERE kode_brg = '$kode'");
                                while($data = $cek->fetch_assoc()) {
                                    $subharga = $data['harga'] * $jumlah;
                                    $totalbelanja += $subharga;
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data['nama_brg'] ?></td>
                                <td class="text-center"><?= $jumlah; ?>x</td>
                                <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($subharga, 0, ',', '.'); ?></td>
                                <td class="text-center">
                                    <a href="?page=hps_cart&brg=<?= $data['kode_brg']; ?>" class="text-danger fa fa-times tmb_hps"></a>
                                </td>
                            </tr>

                                <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Belanja</th>
                                <th colspan="2">Rp <?= number_format($totalbelanja, 0, ',', '.'); ?></th>
                            </tr>

                            <?php  
                            if(isset($_SESSION['tunai'])) {
                            ?>        

                            <tr>
                                <th colspan="4" class="text-right">Tunai</th>
                                <th colspan="2">
                                    Rp 
                                    <?php 
                                        if(isset($_SESSION['tunai'])) {
                                            echo number_format($_SESSION['tunai'], 0, ',', '.');
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                </th>
                            </tr>
                            <tr class="text-success">
                                <th colspan="4" class="text-right">Kembalian</th>
                                <th colspan="2">
                                    Rp 
                                    <?php 
                                        if(isset($_SESSION['tunai'])) {
                                            $sess_bayar = $_SESSION['tunai'];
                                            $kembalian = $sess_bayar - $totalbelanja;
                                            echo number_format($kembalian, 0, ',', '.');
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                </th>
                            </tr>

                            <?php } ?>
                        </tfoot>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">Keranjang kosong!</td>
                            </tr>
                        <?php }  ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
    if(isset($_SESSION['cart'])) {
    ?>
    <div class="col-sm-2">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Tunai</label>
                        <?php if(isset($_SESSION['tunai'])) { ?>
                        <input type="number" class="form-control form-control-sm" name="tunai" value="<?= $_SESSION['tunai'] ?>" />
                        <?php } else { ?>
                        <input type="number" class="form-control form-control-sm" name="tunai" />
                        <?php }  ?>

                    </div>
                    <hr />
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-success w-100 mb-3" name="bayar">Bayar</button>
                        <?php if(isset($_SESSION['tunai'])) { ?>
                        <button type="submit" class="btn btn-sm btn-outline-dark w-100" name="cetak">simpan</button>
                        <?php } ?>
                    </div>
                </form>
                <?php  
                if(isset($_POST['bayar'])) {
                    $tunai = $_POST['tunai'];
                    $_SESSION['tunai'] = $tunai;
                    echo "
                    <script>
                    window.location.href='?page=transaksi';
                    </script>
                    ";
                } else if (isset($_POST['cetak'])) {

                    $sess_nota  = $_SESSION['nota'];
                    $sess_cart  = $_SESSION['cart'];
                    $sess_tunai = $_SESSION['tunai'];
                    $sess_plg   = $_SESSION['plg'];

                    foreach($sess_cart as $kode_brg => $jml) {
                        $db->query("INSERT INTO tb_laporan (nota, nama_plg, kode_brg, jumlah) VALUE('$sess_nota', '$sess_plg', '$kode_brg', '$jml')");

                        $db->query("UPDATE tb_barang SET stok = stok - $jml WHERE kode_brg = '$kode_brg' ");
                    }

                    $db->query("INSERT INTO tb_histori_transaksi (nota, bayar) VALUE('$sess_nota', '$sess_tunai')");

                    unset($_SESSION['cart']);
                    unset($_SESSION['tunai']);
                    unset($_SESSION['plg']);
                    unset($_SESSION['nota']);
                   
                    echo "
                    <script>
                    alert('Transaksi sudah disimpan');
                    window.location.href='?page=transaksi';
                    </script>
                    ";
                }

                ?>
            </div>
        </div>
    </div> 

    <?php } ?>
</div>

