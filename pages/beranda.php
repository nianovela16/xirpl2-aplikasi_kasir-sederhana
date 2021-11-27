<style>
.log {
    font-size: 13px;
    width: 100%;
    border-top: 1px solid rgba(0,0,0,0.14);
}
.log th {
    font-weight: 600;
    text-align: right;
}
.log th, .log td {
    padding: 7px 5px;
    vertical-align: baseline;
}
.log tr {
    border-bottom: 1px solid rgba(0,0,0,0.14);
}
</style>

<h2 class="mb-5"><i class="fa fa-home mr-2"></i>  Beranda</h2>

<section class="row mb-5">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Log Login
                </h5>

                <table class="log">
                    
                    <tr>
                        <th style="width: 100px;">waktu</th>
                        <td style="width: 20px;"> : </td>
                        <td> <?= $_SESSION['admin']['time'] ?> </td>
                    </tr>
                    <tr>
                        <th style="width: 100px;">Alamat IP</th>
                        <td style="width: 20px;"> : </td>
                        <td> <?= $_SESSION['admin']['ip'] ?> </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

    
</section>

<section class="row">

    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Histori Transaksi</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Nota</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $cek = $db->query("SELECT * FROM tb_histori_transaksi ORDER BY tanggal DESC LIMIT 5");
                            $rows = $cek->num_rows;

                            if ($rows > 0) {
                                while($data = $cek->fetch_assoc()) {
                            ?>

                            <tr>
                                <td style="width: 30px;text-align: center;"><?= $no++ ?></td>
                                <td><?= $data['nota'] ?></td>
                                <td style="width: 200px"><?= $data['tanggal'] ?></td>
                            </tr>

                            <?php 

                                }
                            } else {    
                            
                            ?>

                                <tr>
                                    <td colspan="3" class="text-center">Belum ada transaksi</td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="?page=laporan" class="btn btn-sm btn-outline-dark">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Barang Baru</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Stok</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $cek = $db->query("SELECT * FROM tb_barang ORDER BY tanggal DESC LIMIT 5");
                            $rows = $cek->num_rows;

                            if ($rows > 0) {
                                while($data = $cek->fetch_assoc()) {
                            ?>

                            <tr>
                                <td style="width: 30px;text-align: center;"><?= $no++ ?></td>
                                <td><?= $data['nama_brg'] ?></td>
                                <td style="width: 80px;text-align:center;"><?= $data['stok'] ?></td>
                                <td style="width: 180px">Rp <?= number_format($data['harga'], 0, ',', '.') ?></td>
                            </tr>

                            <?php 

                                }
                            } else {    
                            
                            ?>

                                <tr>
                                    <td colspan="6" class="text-center">Stok Barang Kosong!</td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <a href="?page=data_barang" class="btn btn-sm btn-outline-dark">Selengkapnya</a>
                </div>

            </div>
        </div>
    </div>
</section>