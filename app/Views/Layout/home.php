<?= $this->extend('layout/template');?>
<?= $this->section('style'); ?>
<link rel="stylesheet" href="style.css">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="jumbotron m-0">
    <div class="text-center">
  <h1 class="display-4 text-light align-items-center">Selamat Datang di Pustaka Booking</h1>
  <a class="btn btn-primary btn-lg mt-2" href="/buku" role="button">Lihat Daftar Buku</a>
  </div>
</div>
<?= $this->endSection();?>