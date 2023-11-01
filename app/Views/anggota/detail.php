<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row gy-3">
    <div class="col-md-3">
      <h3 class="p-2">Detail Anggota</h3>
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="card-body">
              <p class="card-title">Nama: <?= $anggota['nama']; ?></p>
              <p class="card-text">Alamat: <?= $anggota['alamat']; ?></p>
              <p class="card-text">No. Telpon: <?= $anggota['telp']; ?></p>
              <a href="ubah/<?= $anggota['id_anggota']; ?>" class="btn btn-warning">Ubah</a>
              <form action="/anggota/<?= $anggota['id_anggota']; ?>" method="post" class="d-inline form">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="button" class="btn btn-danger" onclick="hapus(<?= $anggota['id_anggota'] ?>)">Hapus</button>
              </form>
              <br><br>
              <a href="/anggota">Kembali Ke Daftar anggota</a>
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
      text: "Data Anggota akan dihapus!",
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