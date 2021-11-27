<style>
#nav-top, #nav-left {
    display: none;
}
body {
    background: #fff;
}

.belanja {
    width: 100%;
}

.belanja th, .belanja td {
    border: 1px solid #000;
    padding: 7px;
}
.belanja thead {
    background-color: #ccc;
}

</style>

<?php 
unset($_SESSION['nota']);

$nota = $_GET['nota'];

$cek = $db->query("SELECT * FROM tb_histori_transaksi WHERE nota = '$nota' ");
$data1 = $cek->fetch_assoc();
?>


<div class="table-responsive">
    
    <table class="belanja">
        <thead>
            <th class="text-center">#</th>
            <th>Nama Barang</th>
            <th class="text-center">qty</th>
            <th>Harga</th>
            <th>Subharga</th>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $totalbelanja = 0;
            
            
            $cek = $db->query("SELECT * FROM tb_laporan JOIN tb_barang ON tb_laporan.kode_brg = tb_barang.kode_brg  WHERE nota = '$nota'");
            while($data = $cek->fetch_assoc()) {
                $subharga = $data['harga'] * $data['jumlah'];
                $totalbelanja += $subharga;
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $data['nama_brg'] ?></td>
                <td class="text-center"><?= $data['jumlah']; ?>x</td>
                <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($subharga, 0, ',', '.'); ?></td>
                
            </tr>

            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total Belanja</th>
                <th colspan="2">Rp <?= number_format($totalbelanja, 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <th colspan="4" class="text-right">Tunai</th>
                <th colspan="2">
                    Rp 
                    <?php 
                        echo number_format($data1['bayar'], 0, ',', '.');
                    ?>
                </th>
            </tr>
            <tr>
                <th colspan="4" class="text-right">Kembalian</th>
                <th colspan="2">
                    Rp 
                    <?php 
                        $kembalian = $data1['bayar'] - $totalbelanja;
                        echo number_format($kembalian, 0, ',', '.');
                    ?>
                </th>
            </tr>
        </tfoot>
        
    </table>
</div>

<!-- <script>
print();
</script> -->