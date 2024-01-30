<?php
$title = 'Dashboard Guru';
require_once "../functions/Dashboard.php";
?>
<?php include('../layouts/header.php'); ?>
<?php
$nama = $_SESSION['nama'];
$guru = query("SELECT * FROM tb_guru WHERE nama_guru = '$nama'")[0];
$id_guru = $guru['id'];
$jadwal = query("SELECT tb_jadwal.*, tb_mapel.*, tb_guru.*, tb_kelas.*, tb_hari.* FROM tb_jadwal
 LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel
 LEFT JOIN tb_guru ON tb_guru.id=tb_jadwal.id_guru
 LEFT JOIN tb_kelas ON tb_kelas.id=tb_jadwal.id_kelas
 LEFT JOIN tb_hari ON tb_hari.id=tb_jadwal.id_hari
 WHERE id_guru = $id_guru ORDER BY id_hari");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Dashboard</h2>
        <?php if (isset($_SESSION['message'])) : ?>
          <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <!-- <span class="badge badge-pill badge-primary">Success</span> -->
            <?= $_SESSION["message"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
          unset($_SESSION['message']);
        endif; ?>
      </div>
    </div>
  </div>
  <div class="row m-t-25">
    <?php foreach ($jadwal as $jwl) : ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="https://ui-avatars.com/api/?background=random&name=<?= $jwl['nama_mapel']; ?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title mb-3"><?= $jwl['nama_mapel']; ?> [<?= $jwl['nama_guru']; ?>]</h4>
            <p class="card-title mb-3">
              [<?= $jwl['nama_kelas']; ?> (<?= $jwl['category']; ?>)]
            </p>
            <p class="card-text">
              <?= $jwl['hari']; ?> :
              <?= $jwl['mulai']; ?> - <?= $jwl['selesai']; ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>