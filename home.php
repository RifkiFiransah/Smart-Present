<?php

require_once "./config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Present</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;800&display=swap" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="<?= BASEURL; ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .wrapped {
      height: 89vh;
      background-image: url('<?= BASEURL; ?>assets/images/Asset 1.png');
      background-size: 60%;
      background-repeat: no-repeat;
      background-position-x: 110%;
    }

    .smart {
      font-size: 4em !important;
    }
  </style>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg bg-transparent border-bottom">
      <div class="container container-fluid">
        <!-- <a class="navbar-brand" href="./home.php">Smart Present</a> -->
        <img src="<?= BASEURL; ?>assets/images/icon/logo-v1.png" width="100" class="navbar-brand">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex">
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active btn py-2 px-3 rounded-5" style="border: 2px solid rgba(0, 0, 0, .1);background-color: rgba(245, 245, 245, 0.5);" aria-current="page" href="./login.php">
                <i class="fa fa-user me-2"></i> Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <main id="content" class="wrapped">
      <div class="container">
        <div class="row py-5">
          <div class="col-md-6 content-description d-flex flex-column justify-content-center">
            <h2 class="text-uppercase fs-1 fw-bold mb-4 text-primary smart">Smart Present</h2>
            <p>Kelola waktu pendidikanmu dengan lebih aktif Smart Present <br> - Absensi Online yang ramah siswa</p>
            <div class="d-flex flex-wrap gap-4 my-3">
              <div class="button">
                <a href="./login.php" class="btn btn-primary shadow-lg py-2 px-5 rounded-5">Login</a>
              </div>
              <div class="deskripsi">
                <span class="fw-bold">Anda ingin bergabung?</span>
                <br>
                <a href="./login.php" class="text-decoration-none fw-bold text-primary">Daftar Gratis Disini</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 content-image d-flex justify-content-end">
            <img class="img-fluid" src="<?= BASEURL; ?>assets/images/Asset 3.png" width="480">
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>