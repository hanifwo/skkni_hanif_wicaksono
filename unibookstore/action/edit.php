<?php 
require_once("../connection.php");

// Mendapatkan Daaptkan id_buku

if ( isset($_POST["id_buku"]) ) $id_buku = $_POST["id_buku"];
else {
    echo "id_buku tidak ditemukan! <a href='index_sekolah.php'>kembali</a>";
    exit();

}


if ( isset($_POST['judul']) ) $judul = $_POST['judul'];
if ( isset($_POST['kategori']) ) $kategori = $_POST['kategori'];
if ( isset($_POST['penerbit']) ) $penerbit = $_POST['penerbit'];
if ( isset($_POST['harga']) ) $harga = $_POST['harga'];
if ( isset($_POST['stok']) ) $stok = $_POST['stok'];



// Menyiapkan Query MySQL untuk dieksekusi
$query = "
    UPDATE buku SET
        judul = '{$judul}',
        kategori = '{$kategori}',
        penerbit = '{$penerbit}',
        harga = '{$harga}',
        stok = '{$stok}'
    WHERE id_buku = '{$id_buku}'";



// Mengesekusi MySQL Query
$insert = mysqli_query($mysqli, $query);

// Menangani ketika error pada saat eksekusi query
if ( $insert === false) {
    echo "Error dalam mengubah data. <a href='../index.php'>Kembali</a>";
}
else {
    header("Location: ../index.php");
}
?>