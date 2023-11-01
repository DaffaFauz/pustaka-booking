<?= $this->extend('layout/template'); ?>
<!-- <?= $this->section('style') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<?= $this->endSection(); ?> -->
<?= $this->section('content'); ?>
<div class="container mt-5">
  <div class="col">
    <h3 class="mt-2">Form Tambah Buku</h3>

    <form action="/buku/simpan" method="post" class="mt-4" enctype="multipart/form-data" id="form-buku">
      <?= csrf_field();  ?>
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul') ?>" autofocus>
          <div class="invalid-feedback" id="judul-feedback">
            <?= session('validation.judul'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.pengarang')) ? 'is-invalid' : ''; ?>"" id=" inputPengarang" name="pengarang" value="<?= old('pengarang'); ?>">
          <div class="invalid-feedback" id="inputPengarang-feedback">
            <?= session('validation.pengarang'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.penerbit')) ? 'is-invalid' : ''; ?>"" id=" inputPenerbit" name="penerbit" value="<?= old('penerbit'); ?>">
          <div class="invalid-feedback" id="inputPenerbit-feedback">
            <?= session('validation.penerbit'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputTahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.tahun_terbit')) ? 'is-invalid' : ''; ?>" id="inputTahunTerbit" name="tahun_terbit" value="<?= old('tahun_terbit'); ?>">
          <div class="invalid-feedback" id="inputTahunTerbit-feedback">
            <?= session('validation.tahun_terbit'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputSampul" class="col-sm-2 col-form-label">Sampul</label>
        <div class="col-sm-4">
          <div class="custom-file">
            <input type="file" class="custom-file-input <?= (session('validation.sampul')) ? 'is-invalid' : ''; ?>" id="customFile" name="sampul">
            <div class="invalid-feedback" id="customFile-feedback">
              <?= session('validation.sampul'); ?>
            </div>
            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
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