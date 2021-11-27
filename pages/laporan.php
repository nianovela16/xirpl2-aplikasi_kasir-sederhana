<h3 class="mb-5"><i class="fa fa-file mr-2"></i> Laporan</h3>

<section class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Filter</h5>   
                <?php 
                $mulai = @$_POST['tgl_mulai'];
                $akhir = @$_POST['tgl_akhir'];
                ?> 
                <form action="" method="POST" class="mb-5">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal mulai</label>
                                <input type="date" class="form-control form-control-sm" name="tgl_mulai" value="<?= $mulai; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Tanggal akhir</label>
                                <input type="date" class="form-control form-control-sm" name="tgl_akhir" value="<?= $akhir; ?>" />
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-sm btn-primary" name="telusuri">Telusuri</button>
                            </div>
                        </div>
                    </div>
                    
                </form>

                <?php 
                    if(isset($_POST['telusuri'])) {
                       
                        $cek = $db->query("SELECT * FROM tb_laporan lap JOIN tb_barang brg ON lap.kode_brg = brg.kode_brg WHERE lap.tanggal BETWEEN '$mulai' AND '$akhir' ");
                        $rows = $cek->num_rows;

                ?>
                <h5 class="mb-3">
                    Hasil penelusuran: <?= $rows ?> data transaksi ditemukan.
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Nota</th>
                            <th>Nama Brg</th>
                            <th class="text-center">Qty</th>
                            <th>Harga</th>
                            <th>subharga</th>
                            <th>Nama Pelanggan</th>
                        </thead>
                        <tbody>

                            <?php   
                            $no = 1;

                            while($data = $cek->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="width: 50px;text-align: center;"><?= $no++ ?></td>
                                <td style="width: 180px;"><?= $data['nota'] ?></td>
                                <td><?= $data['nama_brg'] ?></td>
                                <td style="width: 80px;text-align: center;"><?= $data['jumlah'] ?></td>
                                <td style="width: 110px;">Rp <?= $data['harga'] ?></td>
                                <td style="width: 110px;">Rp <?= $data['harga'] ?></td>
                                <td><?= $data['nama_plg'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>