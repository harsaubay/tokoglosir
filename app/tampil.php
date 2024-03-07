<?php
include "boot.php";
include "session.php";
include "koneksi.php";

$searchterm = isset($_GET['nama_barang']) ? $_GET['nama_barang'] : '';
$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$searchterm%'";
$result = $konek->query($tampil);

function format_ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h3>Data Menu</h3>
        </div>
    </div>
</div>
</div>
<table class="table table-bordered">
    <thead class=" table-info">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">gambar</th>
            <th scope="col">Nama menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Waktu</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tampil = $konek->query("select * from barang");
        $no = 1; 
        while ($s = $result->fetch_array()) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $s['id_barang'] ?></td>
                <td><?= "<img src='image/" . $s['gambar'] . "' width=100 height=100>"; ?></td>
                <td><?= $s['nama_barang'] ?></td>
                <td><?= format_ribuan($s['harga_barang']) ?></td>
                <td><?= $s['tgl_input'] ?></td>
                <td>
                    <a class="btn btn-danger btn-xs" href="hapus.php?id=<?php echo $s['id']; ?>" onclick="javascript:return confirm('Hapus Data Menu??');"><i class="bi bi-trash-fill"></i></a>
                    <button class="btn btn-info" onclick="document.location.href='update.php?id=<?= $s['id'] ?>'"><i class="bi bi-pencil-fill"></i></button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
