<?php
    include "boot.php";
    include "koneksi.php";
    include "session.php";

    $id =$_GET['id'];
    $panggil=$konek->query("select * from barang where id ='$id'");
    $s=$panggil->fetch_array();
?>


  <div class="col-md-9 mb-2">
    <div class="row">
    <!-- barang -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header">
                <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Tambah Barang</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label><b>Kode Barang</b></label>
                        <input type="text" name="id_barang" class="form-control" value="<? $s['id_barang'] ?>" >
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Nama Barang</b></label>
                        <input type="text" name="nama_barang" class="form-control" value="<? $s['nama_barang'] ?> ">
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Barang</b></label>
                        <input type="number" name="harga_barang" class="form-control" value="<? $s['harga_barang'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i");?>" readonly>
                                <div class="input-group-append">
                                    <button name="add_barang" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
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
        <?php
        if (isset($_POST['edit'])) {
        } else {

            @$ubah = $konek->query("update barang set nama_barang='$_POST[nama_barang]',harga_barang='$_POST[harga_barang]',tgl_input='$_POST[tgl_input]' where no='$id'");
            // echo "data berhasil diubah <a href='tampil.php'>kembali<?a>";
        }
        ?>