<?php
    include "boot.php";
    include "koneksi.php";
    include "session.php";

    if (isset($_POST['add_barang'])) {
        $nama = $_FILES['gambar']['name'];
        $file = $_FILES['gambar']['tmp_name'];
        $id = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga_barang'];
        $tgl = $_POST['tgl_input'];

        move_uploaded_file($file, "image/$nama");

        $simpan = $konek->query("INSERT INTO barang (id_barang, nama_barang, harga_barang, tgl_input, gambar) 
                                VALUES ('$id', '$nama_barang', '$harga', '$tgl', '$nama')")
                                or die(mysqli_error($konek));

        if ($simpan) {
            echo '<script>alert("Data berhasil ditambahkan"); window.location="input.php";</script>';
        } else {
            echo '<script>alert("Gagal menambahkan data"); window.location="input.php";</script>';
        }
    }
    $query = $konek->query("SELECT max(id_barang) as kodeTerbesar FROM barang");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeBarang, 3, 3);
    $urutan++;
    $huruf = "BRG";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

<div class="col-md-9 mb-2">
    <!-- barang -->
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                    <div class="card-title text-dark"><i class="fa fa-shopping-cart"></i> <b>Tambah Menu</b></div>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" target="konten">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <form enctype="multipart/form-data" action="" method="post" target="konten">
                        <label><b>Gambar</b></label> 
                        <input type="file" name="gambar">
                        </div>
                            <div class="form-group col-md-6">
                                <label><b>Kode Menu</b></label>
                                <input type="text" name="id_barang" class="form-control" value="<?php echo $kodeBarang; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Nama Menu</b></label>
                                <input type="text" name="nama_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Harga</b></label>
                                <input type="number" name="harga_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Tanggal Input</b></label>
                                <div class="input-group">
                                    <input type="text" name="tgl_input" class="form-control" value="<?php echo date("j F Y, G:i:s"); ?>" readonly>
                                    <div class="input-group-append">
                                        <button name="add_barang" value="simpan" class="btn btn-success" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end barang -->
</div>
