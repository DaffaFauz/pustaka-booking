<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <div class="col">
    <h3 class="mt-2">Form Ubah Buku</h3>
    <form action="/buku/update/<?= $buku['id_buku']; ?>" method="post" class="mt-4" enctype="multipart/form-data">
      <?= csrf_field();  ?>
      <input type="hidden" name="sampulLama" value="<?= $buku['sampul']; ?>">
      <input type="hidden" name="idbuku" value="<?= $buku['id_buku']; ?>">
      <div class="form-group row">
        <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.judul')) ? 'is-invalid' : ''; ?>" id="inputJudul" name="judul" value="<?= (old('judul')) ? old('judul') : $buku['judul']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.judul'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.pengarang')) ? 'is-invalid' : ''; ?>" id="inputPengarang" name="pengarang" value="<?= (old('pengarang')) ? old('pengarang') : $buku['pengarang']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.pengarang'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.penerbit')) ? 'is-invalid' : ''; ?>" id="inputPenerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.penerbit'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputTahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-4">
          <input type="text" class="form-control <?= (session('validation.tahun_terbit')) ? 'is-invalid' : ''; ?>" id="inputTahunTerbit" name="tahun_terbit" value="<?= (old('tahun_terbit')) ? old('tahun_terbit') : $buku['tahun_terbit']; ?>">
          <div class="invalid-feedback">
            <?= session('validation.tahun_terbit'); ?>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputSampul" class="col-sm-2 col-form-label">Sampul</label>
        <div class="col-sm-4">
          <div class="custom-file">
            <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="customFile" name="sampul">
            <div class="invalid-feedback">
              <?= $validation->getError('sampul'); ?>
            </div>
            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
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