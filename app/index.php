<?php
session_start();
$user = $_SESSION['user'];
if ($user == "") {
    
?>
<script>
    document.location='../index.php';
</script>
<?php
}else {
    

include "boot.php"
?>

<body>
    <!-- ini navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <h2 class="text-info">
                    <i class="bi bi-person-circle"></i>
                    <i>TOKO GROSIR</i>
                </h2>
                <form class="d-flex" role="search" method="GET" action="tampil.php" target="konten">
                    <input class="form-control me-2" type="search" name="nama_barang" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
    </div>
    <!-- tutup navbar -->

    <!-- ini halaman -->
    <div class="container">
        <div class="row">
            <div class="col-3 mt-5">
                <div class="list-group shadow-lg">

                    <a href="input.php" target="konten">
                        <button type="button" class="list-group-item list-group-item-action" aria-current="true">
                           <b><i class="bi bi-cart-plus"></i>  Input</b>
                            </button>
                    </a>
                    <a href="kasir.php" target="konten">
                        <button type="button" class="list-group-item list-group-item-action"><b><i class="bi bi-person-add"></i>   Kasir </b></button>
                    </a>

                    <a href="tampil.php" target="konten">
                        <button type="button" class="list-group-item list-group-item-action"><b><i class="bi bi-file-earmark-text"></i> Data </b></button>
                    </a>
                    <a href="laporan.php" target="konten">
                    <button type="button" class="list-group-item list-group-item-action"><b><i class="bi bi-card-checklist"></i> Laporan </b></button>
                    </a>
                    <a href="rekap.php" target="konten">
                        <button type="button" class="list-group-item list-group-item-action"><b><i class="bi bi-printer"></i> Print </b></button>
                    </a>
                <a href="logout.php">
                    <button type="button" class="list-group-item list-group-item-action" onclick="javascript:return confirm('Anda yakin ingin keluar ?');"><b><i class="bi bi-box-arrow-left"></i> Logout </b></button>
                    </a>
                </div>
            </div>
            <div class="col mt-2">
                <iframe src="tampil.php" name="konten" frameborder="0" width="100%" height="800"></iframe>
            </div>
        </div>
    </div>
    <!-- tutup halaman -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
}
?>
<footer class="text-center mb-0 py-3">
    <p class="text-muted small mb-0"><i>Harsa Ubay</i></p>
</footer>