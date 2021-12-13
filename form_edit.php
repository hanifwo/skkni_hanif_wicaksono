<?php

require_once("connection.php");

$error = 0;

if ( isset($_GET["id_buku"]) ) $id_buku = $_GET["id_buku"];
else echo "Gagal Mendpatkan id buku <a href='index.php'>Kembali</a>";

$query = "SELECT * FROM buku WHERE id_buku = '{$id_buku}'";

$result = mysqli_query($mysqli, $query);

foreach ( $result as $buku ) {
    $id_buku = $buku["id_buku"];
    $judul = $buku["judul"];
    $penerbit = $buku["penerbit"];
    $kategori = $buku["kategori"];
    $harga = $buku["harga"];
    $stok = $buku["stok"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="method.css"/>
    <title>Form</title>
</head>
<body>
    <div id="form" class="pt-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col col-8 p-4 bg-light">
                    <form action="action/edit.php" method="POST">
                        
                        
                        <div class="form-group mb-2">
                            <label for="id_buku">Id buku</label>
                            <input id="id_buku" class="form-control" value = "<?=$id_buku?>" type="text" name="id_buku" placeholder="Id Buku" readonly>
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="judul">Judul buku</label>
                            <input id="judul" class="form-control" value = "<?=$judul?>" type="text" name="judul" placeholder="Judul Buku">
                        </div>
                        <div class="form-group mb-2">
                            <label for="penerbit">Penerbit buku</label>
                            <input id="penerbit" class="form-control" value = "<?=$penerbit?>" type="text" name="penerbit" placeholder="Penerbit Buku">
                        </div>
                        <div class="form-group mb-2">
                            <label for="kategori">Kategori buku</label>
                            <input id="kategori" class="form-control" value = "<?=$kategori?>" type="text" name="kategori" placeholder="Kategori Buku">
                        </div>
                        <div class="form-group mb-2">
                            <label for="harga">Harga</label>
                            <input id="harga" class="form-control" value = "<?=$harga?>" type="number" name="harga" placeholder="Harga"/>
                        </div>
                        <div class="form-group mb-2">
                            <label for="stok">Stok</label>
                            <input id="stok" class="form-control" value = "<?=$stok?>" type="number" name="stok" placeholder="Stok"/>
                        </div>
                        <input name="submit" type="submit" class="btn btn-primary" value="kirim" />


                    </form>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>