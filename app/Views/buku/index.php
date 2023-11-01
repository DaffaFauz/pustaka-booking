<?= $this->extend('layout/template');?>
<?= $this->section('content');?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Daftar Buku</h1>
            <a href="/buku/tambah" class="btn btn-primary mb-2">Tambah Data Buku</a>
            <?php if(session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
              </div>
              <?php endif; ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Sampul</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                if(!$buku == null){
                foreach ($buku as $b) : ?>
                <tr>
                  <th scope="row"><?= $i++?></th>
                  <td><img src="/img/<?= $b['sampul']; ?>" alt="" width="75"></td>
                  <td><?= $b['judul']; ?></td>
                  <td><a href="/buku/<?= $b['id_buku']; ?>" class="btn btn-success">Detail</a></td>
                </tr>
                <?php endforeach;
                }else{ ?>
                <tr>
                  <td colspan="4" class="text-center">Data Tidak Ditemukan.</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>