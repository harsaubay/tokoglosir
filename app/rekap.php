<button class="btn" onclick="printDiv('div1')">
    <i class="bi bi-printer-fill fs-1"></i>
</button>

<div id="div1">


    <!-- tampil -->
<?php
include "boot.php";
include "session.php";
include "koneksi.php";

$searchterm = isset($_GET['nama_barang']) ? $_GET['nama_barang'] : '';
$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$searchterm%'";
$result = $konek->query($tampil);
?>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h3>Data Menu</h3>
        </div>
        </form>

    </div>
</div>
</div>
<table class="table">
    <thead class=" table-info">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Waktu</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no =0;
        while ($s = $result->fetch_assoc()) {
            $no++;
        ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $s['id_barang'] ?></td>
                <td><?= $s['nama_barang'] ?></td>
                <td><?= $s['harga_barang'] ?></td>
                <td><?= $s['tgl_input'] ?></td>
                <td>
                    <button class="btn btn-danger" onclick="document.location.href='hapus.php?id=<?= $s['id_barang'] ?>'"><i class="bi bi-trash-fill"></i></button>

                    <button class="btn btn-info" onclick="document.location.href='update.php?id=<?= $s['id_barang'] ?>'"><i class="bi bi-pencil-fill"></i></button>
                </td>

            </tr>
        <?php
        }

        ?>
    </tbody>

</table>
</div>
<!-- tutup tampil -->
<script>
    function printDiv(el) {
        var a = document.body.innerHTML;
        var b = document.getElementById(el).innerHTML;

        document.body.innerHTML = b;
        window.print();
        document.body.innerHTML = a;
    }
</script>