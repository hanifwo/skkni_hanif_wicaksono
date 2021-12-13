<?php 

require_once("../connection.php");

//Mendapatkan Data barang
if ( isset ($_GET["id_buku"]) ) $id_buku = $_GET["id_buku"];
else {
    echo "ID Buku tidak ditemukan <a href='../index.php'>Kembali</a>";
    exit();
}

//Query get data barang
$query = "DELETE FROM buku WHERE id_buku = '{$id_buku}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);
// var_dump($result);
// die;
if ( ! $result ) {
    exit("Gagal menghapus data!");
}

header("Location: ../index.php");

?>