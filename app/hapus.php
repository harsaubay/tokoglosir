<?php

    include "koneksi.php";

    $id =$_GET['id'];
    $hapus = $konek->query("delete from barang WHERE id ='$id'");

?>
<script>
document.location.href = 'tampil.php';
</script>