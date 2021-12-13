<?php

require_once("../connection.php");

// status tidak error
$error = 0;

//Memvalidasi Inputan

if ( isset($_POST['id_buku']) ) $id_buku = $_POST['id_buku'];
else $error = 1; //Status error
if ( isset($_POST['judul']) ) $judul = $_POST['judul'];
else $error = 1; //Status error
if ( isset($_POST['penerbit']) ) $penerbit = $_POST['penerbit'];
else $error = 1; //Status error
if ( isset($_POST['kategori']) ) $kategori = $_POST['kategori'];
else $error = 1; //Status error
if ( isset($_POST['harga']) ) $harga = $_POST['harga'];
else $error = 1; //Status error
if ( isset($_POST['stok']) ) $stok = $_POST['stok'];
else $error = 1; //Status error

if ( $error == 1 ) {
    echo "Terjadi kesalahan pada proses input data";
    exit();

}


$query = "
    INSERT INTO buku
    (id_buku, judul, penerbit, kategori, harga, stok)
    VALUES
    ('{$id_buku}', '{$judul}', '{$penerbit}', '{$kategori}', '{$harga}', '{$stok}');";

//Mengkseksekusi MsSQL query
$insert = mysqli_query($mysqli, $query);

//Menangani ketika error pada saaat eksekusi query

if ( $insert == false ) {
    echo "Error dalam menambahkan data <a href='../index.php'>Kembali</a>";
} 
else {
    header("Location: ../index.php");
}
?>