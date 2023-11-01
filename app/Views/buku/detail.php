<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row gy-3">
    <div class="col-md-6">
      <h3 class="p-2">Detail Buku</h3>
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="/img/<?= $buku['sampul']; ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $buku['judul']; ?></h5>
              <p class="card-text"><b>Pengarang: <?= $buku['pengarang']; ?></b></p>
              <p class="card-text">Penerbit: <?= $buku['penerbit']; ?></p>
              <p class="card-text">Tahun Terbit: <?= $buku['tahun_terbit']; ?></p>
              <a href="ubah/<?= $buku['id_buku']; ?>" class="btn btn-warning">Ubah</a>
              <form action="/buku/<?= $buku['id_buku']; ?>" method="post" class="d-inline form">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="button" class="btn btn-danger" onclick="hapus(<?= $buku['id_buku'] ?>)">Hapus</button>
              </form>
              <br><br>
              <a href="/buku">Kembali Ke Daftar Buku</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function hapus(id) {
    var form = $('.form');
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data buku akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
        Swal.fire({
          title: 'Data berhasil Dihapus',
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
        })

      }
    })
  }
</script>
<?= $this->endSection(); ?>