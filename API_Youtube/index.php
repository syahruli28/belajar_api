<!-- YT API Key = AIzaSyAqnHor3najM-bstKsRfrIek4R_mpd8Edo -->

<?php

function get_CURL($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}


// fetch data
$dataThree = 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&key=AIzaSyAqnHor3najM-bstKsRfrIek4R_mpd8Edo&id=UCkXmLjEr95LVtGuIm3l2dPg';
$result = get_CURL($dataThree);
$youtubePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$youtubeTitle = $result['items'][0]['snippet']['title'];
$youtubeSubsCount = $result['items'][0]['statistics']['subscriberCount'];

// latestVideo
$latestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAqnHor3najM-bstKsRfrIek4R_mpd8Edo&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&order=date&part=snippet';
$result = get_CURL($latestVideo);
$video = $result['items'][0]['id']['videoId'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!--  CSS Dewe -->
    <style>
      section {
        min-height: 420px;
      }
    </style>  


    <title>Bootstrap 4</title>
<body class="mt-5">
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="#">Aqil Emeraldi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Profile</a>
      <a class="nav-item nav-link" href="#">About</a>
      <a class="nav-item nav-link disabled" href="#">Contact</a>
    </div>
  </div>
  </div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <img src="img/profile1.png" width="25%" class="rounded-circle img-thumbnail">
    <h1 class="display-4">Muhammad Aqil Emeraldi</h1>
    <p class="lead">Mahasiswa | Teknik Komputer UNISMA '45' Bekasi</p>
  </div>
</div>


<!-- About -->
<section id="about" class="about">
<div class="container text-center">
  <div class="row mb-4">
    <div class="col">
      <h2>About</h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5 text-center">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat.</p>
    </div>
    <div class="col-md-5 text-center">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat.</p>
    </div>
  </div>
</div>
</section>

<!-- API Youtube -->
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center pt-4">
        <h2>Youtube</h2>
      </div>
    </div>
    
    <div class="row justify-content-center pb-4 mb-4">
      <div class="col-md-5">
        <img class="rounded-circle" src="<?= $youtubePicture; ?>" width="350">
      </div>
      <div class="col-md-5">
        <h4 class="mb-3"><?= $youtubeTitle; ?></h4>
        <b><?= $youtubeSubsCount; ?> Subscribers</b><br>
        <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-count="hidden"></div>
        <iframe class="mt-3" width="420" height="200"
          src="https://www.youtube.com/embed/<?= $video; ?>?controls=0">
        </iframe>
      </div>
    </div>
  </div>
</section>


<!-- Card -->
<section id="portfolio" class="portfolio">
<div class="container">
  <div class="row mb-4 pt-4">
    <div class="col text-center">
      <h2>Portfolio</h2>
    </div>
  </div>


<!-- Kolom 1 Portfolio -->
  <div class="row mb-4">
    <div class="col-md">
      <div class="card">
        <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  </div>

<!-- Kolom 2 Portfolio -->
  <div class="row mb-4 pb-5">
    <div class="col-md">
      <div class="card">
        <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    <div class="col-md">
     <div class="card">
        <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- Contact Kebawah -->
<section id="contact" class="contact mb-5 bg-light">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Contact Us</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body text-center">
            <h5 class="card-title">Contact Us</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, .</p>
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><h2>Location</h2></li>
          <li class="list-group-item">My Office</li>
          <li class="list-group-item">Perum Kodam Mustika Jaya 21</li>
          <li class="list-group-item">West Java, Indonesia</li>
        </ul>
      </div>
<!-- Form -->
      <div class="col-lg-6">
        <form>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda..">
          </div>
           <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="Masukan E-mail Anda..">
          </div> <div class="form-group">
            <label for="notelp">No Telp.</label>
            <input type="text" class="form-control" id="notelp" placeholder="Masukan No Telp Anda..">
          </div>
           <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control" placeholder="Masukan Pesan Anda.."></textarea>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary">Kirim Pesan</button>
          </div>
        </form>
      </div>     
    </div>
  </div>
</section>

<footer class="bg-dark text-white">
  <div class="row pt-3">
    <div class="col text-center">
      <p>@Copyright 2018, Muhammad Aqil Emeraldi</p>
    </div>
  </div>
</footer>


    <!-- Optional JavaScript -->
    <!-- youtube js -->
    <script src="https://apis.google.com/js/platform.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>