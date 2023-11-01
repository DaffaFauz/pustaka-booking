<?= $this->extend('layout/template');?>
<?= $this->section('content');?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Daftar Anggota</h1>
            <a href="/anggota/tambah" class="btn btn-primary mb-2">Tambah Data Anggota</a>
            <?php if(session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
              </div>
              <?php endif; ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                if(!$anggota == null){
                foreach ($anggota as $b) : ?>
                <tr>
                  <th scope="row"><?= $i++?></th>
                  <td><?= $b['nama']; ?></td>
                  <td><?= $b['alamat']; ?></td>
                  <td><a href="/anggota/<?= $b['id_anggota']; ?>" class="btn btn-success">Detail</a></td>
                </tr>
                <?php endforeach;
                }else{ ?>
                <tr>
                  <td colspan="4" class="text-center">Data Tidak ditemukan.</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>