<?php
  include "koneksi.php";
  $kode=$_POST['id_barang'];
  $nama=$_POST['nama_barang'];
  $harga=$_POST['harga_barang'];
  $ttl=$_POST['tgl_input'];
  if ($nama== "") {
  echo  "Maaf harus diisi!!!";
  }else {
    
  $simpan =$konek->query("insert into barang (id_barang,nama_barang,harga_barang,tgl_input)values ('$kode','$nama','$harga','$ttl')");
}
?>
<script>
    document.location.href ='input.php';
</script>