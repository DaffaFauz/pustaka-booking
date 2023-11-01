<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <div class="col">
    <h3 class="mt-2">Form Ubah Anggota</h3>
    <form action="/anggota/update/<?= $anggota['id_anggota']; ?>" method="post" class="mt-4" enctype="multipart/form-data">
      <?= csrf_field();  ?>
      <div class="form-group row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.nama')) ? 'is-invalid' : ''; ?>" id="inputNama" name="nama" value="<?= (old('nama')) ? old('nama') : $anggota['nama']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.nama'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.alamat')) ? 'is-invalid' : ''; ?>" id="inputAlamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $anggota['alamat']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.alamat'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputNo" class="col-sm-2 col-form-label">No. Telpon</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.no')) ? 'is-invalid' : ''; ?>" id="inputNo" name="no" value="<?= (old('no')) ? old('no') : $anggota['telp']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.no'); ?>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </div>
    </form>

  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?= $this->endSection(); ?>