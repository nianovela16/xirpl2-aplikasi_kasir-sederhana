<h3 class="mb-5"><i class="fa fa-box-open mr-2"></i>  
    Data Barang
</h3>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <a href="?page=tambah_barang" class="btn btn-sm btn-success mb-4">Tambah Barang</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Kode Brg</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Stok</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>

                            <?php 

                            $cek = $db->query("SELECT * FROM tb_barang ORDER BY kode_brg DESC");
                            $rows = $cek->num_rows;
                            $no = 1;

                            if($rows > 0) {

                                while($data = $cek->fetch_assoc()) {

                            ?>                                   

                                <tr>
                                    <td class="text-center" style="width: 50px;"><?= $no++ ?></td>
                                    <td style="width: 130px"><?= $data['kode_brg']; ?></td>
                                    <td><?= $data['nama_brg']; ?></td>
                                    <td class="text-center" style="width: 100px;"><?= $data['stok']; ?></td>
                                    <td style="width: 180px">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                                    <td style="width: 200px;"><?= $data['tanggal']; ?></td>
                                    <td class="text-center" style="width: 130px;">
                                        <a href="?page=edit_barang&brg=<?= $data['kode_brg']; ?>" class="badge badge-info badge-pill">edit</a>
                                        <a href="?page=hps_barang&brg=<?= $data['kode_brg']; ?>" class="badge badge-danger badge-pill tmb_hps">hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>
                            
                            <?php } else { ?>

                                <tr>
                                    <td colspan="7" class="text-center">Stok Barang Kosong!</td>
                                </tr>

                            <?php }  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>