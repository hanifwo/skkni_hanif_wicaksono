<?php 
$mysqli = new mysqli("localhost", "root", "", "bookstore");

// check
if ( $mysqli -> connect_errno) {
    echo "Gagal Menyambungkan ke MySQL: " .  $mysqli -> connect_errno;
    exit();
}

?>