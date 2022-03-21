<?php
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu['menu'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan API</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a>
                <img src="img/logo.png" width=140px>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">All Menu</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- h2 -->
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <h2>All Menu</h2>
            </div>
        </div>
    <!-- Akhir h2 -->

    <!-- Card -->
        <div class="row mt-2">
        <?php foreach( $menu as $m ) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="img/menu/<?= $m["gambar"]; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $m["nama"]; ?></h5>
                    <p class="card-text"><?= $m["deskripsi"]; ?></p>
                    <p class="card-text text-muted">Rp. <?= $m["harga"]; ?></p>
                    <a href="#" class="btn btn-primary">Beli Sekarang</a>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <!-- Akhir Card -->

    
    <!-- Script Js -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
</body>
</html>