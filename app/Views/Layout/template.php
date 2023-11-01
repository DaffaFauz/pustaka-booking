<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <?= $this->renderSection('style'); ?>
  <title><?= $title; ?></title>
</head>
<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  footer {
    margin-top: auto;
  }
</style>

<body>

  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Pustaka Booking</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item <?= ($active == 'Home') ? 'active' : ''; ?>">
            <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?= ($active == 'Buku') ? 'active' : ''; ?>">
            <a class="nav-link" href="/buku">Daftar Buku</a>
          </li>
          <li class="nav-item <?= ($active == 'Anggota') ? 'active' : ''; ?>">
            <a class="nav-link" href="/anggota">Daftar Anggota</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <?= $this->renderSection('content'); ?>

  <footer class="bg-primary p-2 text-white text-center">Copyright &copy;2023. Daffa Fauzul Hakim</footer>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <?= $this->renderSection('script'); ?>

</body>

</html>