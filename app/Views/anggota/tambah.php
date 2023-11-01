<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <div class="col">
    <h3 class="mt-2">Form Tambah Anggota</h3>
    <form action="/anggota/simpan" method="post" class="mt-4" enctype="multipart/form-data">
      <?= csrf_field();  ?>
      <div class="form-group row">
        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.nama')) ? 'is-invalid' : ''; ?>" id="inputNama" name="nama" autofocus>
          <div class="invalid-feedback">
            <?= session('validation.nama'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.alamat')) ? 'is-invalid' : ''; ?>" id="inputPengarang" name="alamat" value="<?= old('alamat'); ?>">
          <div class="invalid-feedback">
            <?= session('validation.alamat'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputNo" class="col-sm-2 col-form-label">No. Telpon</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.no')) ? 'is-invalid' : ''; ?>" id="inputPenerbit" name="no" value="<?= old('no'); ?>">
          <div class="invalid-feedback">
            <?= session('validation.no'); ?>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
    </form>

  </div>
</div>
<?= $this->endSection(); ?>