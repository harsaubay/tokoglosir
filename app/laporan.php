<?php 
include "koneksi.php";
include "session.php";
include "boot.php";
$query = $konek->query("SELECT * FROM laporanku");
$tot_bayar = 0; 


function format_ribuan($nilai) {
    return number_format($nilai, 0, ',', '.');
}

while ($d = $query->fetch_assoc()) {
    $total = $d['harga_barang'] * $d['quantity'];
    $tot_bayar += $total;
}
?>
    <form action="" method="GET">
        <div class="row g-3 align-items-center mt-3">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label"></label>
            </div>
            <div class="col-auto">
                <input type="date" name="awal" class="form-control" aria-describedby="">
            </div>
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label"></label>
            </div>
            <div class="col-auto">
                <input type="date" name="akhir" class="form-control" aria-describedby="">
            </div>

            <div class="col-auto">
                <button type="submit" name="cari" value="<?php echo $id_cart; ?>" class="btn btn-info">cari</button>
            </div>
        </div>
    </form>

    <div id="div1">
    <button class="btn" onclick="printDiv('div1')"><i class="bi bi-printer-fill fs-1"></i></button>
    <div class="col-md-12 mb-2">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title text-dark"><i class="fa fa-table"></i> <b>Data Laporan</b></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table"
                            width="100%">
                            <thead class="thead-purple">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Nota</th>
                                    <th>Tgl Input</th>
                                    <th>Nama Menu</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Sub-Total</th>
                                    <th>Waktu</th>
                                    <th>Opsi</th>
                                </tr>
                                <tr>
                                    <th colspan="6" class="text-right"><b>TOTAL :</b></th>
                                    <th><b>Rp. <?php echo isset($tot_bayar) ? format_ribuan($tot_bayar) : '0'; ?></b>
                                    </th>
                                </tr>
                                <?php 
                                @$cari =$_GET['awal'];
                                if ($cari== "") {
                                   $query = $konek->query("SELECT * FROM laporanku");
                                    while ($d = $query->fetch_assoc()) {
                                        @$no++;
                                        ?>
                                        <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['no_transaksi']; ?></td>
                                <td><?php echo $d['tgl_input']; ?></td>
                                <td><?php echo $d['nama_barang']; ?></td>
                                <td><?php echo $d['quantity']; ?></td>
                                <td>Rp. <?php echo $d['harga_barang']; ?></td>
                                <td>Rp. <?php echo $d['subtotal']; ?></td>
                                <td><?php echo $d['waktu']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_cart']; ?>"
                                        onclick="javascript:return confirm('Hapus Data Laporan??');">
                                        <i class="fa fa-trash fa-xs"></i> Hapus
                                    </a>
                                </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    $carii = $_GET['cari'];
                                    $query = $konek->query("SELECT * FROM laporanku where waktu between'$_GET[awal]' and '$_GET[akhir]'");
                                    while ($d = $query->fetch_assoc()) {
                                        @$no++;
                                        ?>
                                    <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['no_transaksi']; ?></td>
                                <td><?php echo $d['tgl_input']; ?></td>
                                <td><?php echo $d['nama_barang']; ?></td>
                                <td><?php echo $d['quantity']; ?></td>
                                <td>Rp. <?php echo $d['harga_barang']; ?></td>
                                <td>Rp. <?php echo $d['subtotal']; ?></td>
                                <td><?php echo $d['waktu']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id_cart']; ?>"
                                        onclick="javascript:return confirm('Hapus Data Laporan??');">
                                        <i class="fa fa-trash fa-xs"></i> Hapus
                                    </a>
                                </td>
                                </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $hapus_data = $konek->query("DELETE FROM laporanku WHERE id_cart ='$id'");
        echo '<script>window.location="laporan.php"</script>';
    }
    ?>

</div>

<script>
function printDiv(el) {
    var a = document.body.innerHTML;
    var b = document.getElementById(el).innerHTML;

    document.body.innerHTML = b;
    window.print();
    document.body.innerHTML = a;
}
</script>