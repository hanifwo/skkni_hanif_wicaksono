<?php

require_once("connection.php");

$query = "SELECT * FROM buku ORDER BY stok ASC";

$result = mysqli_query($mysqli, $query);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet" />
    <script type="text/javascript">
    function confirm_delete() {
        return confirm ("Are you sure you want to delete");
    }
    </script>
    <title>UNIBOOKSTORE</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UNIBOOKSTORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="topnav">
            <a href="index.php">Home</a>
            <a href="admin.php">Admin</a>
            <a class="active" href="pengadaan.php">Pengadaan</a>
            <div class="search-container">
                <form method="GET">
                    <input type="text" required value = "<?php if ( isset($_GET['search']) ) {echo $_GET['search']; } ?>"placeholder="Search.." name="search">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
     </div>
    </div>
    </nav>

    <div id="buku-list">

        <div class="container">

            
                <div class="row mb-4">
                    
                    <div class="col">
                        
                        <h2>Daftar buku</h2>

                    </div>

                    <div class="col text-end mt-2">

                        <a href="form.php" class="btn btn-primary" role="button">Tambah buku</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Buku</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                <?php

                                    $i = 1;

                                    
                                    if(isset($_GET['search']) ) {
                                        $filtervalues = $_GET['search'];
                                            
                                            $query = "SELECT * FROM buku WHERE CONCAT(judul) LIKE '%$filtervalues%' ";

                                            $result = mysqli_query($mysqli, $query);

                                            if(mysqli_num_rows($result) > 0)
                                            {
                                                
                                            }
                                            else
                                            {
                                                ?>
                                                
                                                <tr>
                                                    <td colspan="6">No Record Found</td>
                                                </tr>
                                                
                                                <?php
                                            }
                                        }
                                        
                                    foreach ( $result as $buku ) {
                                        
                                        echo '<tr>
                                            <th scope="row">' . $i++. '</th>
                                            <td>' . $buku["kategori"] . '</td>
                                            <td>' . $buku["judul"] . '</td>
                                            <td>' . $buku["harga"] . '</td>
                                            <td>' . $buku["stok"] . '</td>
                                            <td>' . $buku["penerbit"] . '</td>
                                            </tr>';

                                    }

                                ?>


                            </tbody>
                        </table>

                    </div>
        
                </div>
             
        </div>
    </div>

</body>
</html>