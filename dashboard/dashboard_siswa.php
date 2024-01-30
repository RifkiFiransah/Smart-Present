<?php
$title = 'Dashboard Siswa';
require_once "../functions/Dashboard.php";
?>
<?php include('../layouts/header.php'); ?>
<?php
$nama = $_SESSION['nama'];
$siswa = query("SELECT * FROM tb_siswa WHERE nama = '$nama'")[0];
$id_kelas = $siswa['id_kelas'];
$jadwal = query("SELECT tb_mapel.nama_mapel, tb_guru.nama_guru, tb_kelas.*, tb_hari.hari, tb_jadwal.* FROM tb_jadwal
 LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel
 LEFT JOIN tb_guru ON tb_guru.id=tb_jadwal.id_guru
 LEFT JOIN tb_kelas ON tb_kelas.id=tb_jadwal.id_kelas
 LEFT JOIN tb_hari ON tb_hari.id=tb_jadwal.id_hari
 WHERE id_kelas = $id_kelas ORDER BY id_hari");
// var_dump($jadwal);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Dashboard</h2>
        <?php if (isset($_SESSION['message'])) : ?>
          <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
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
          <img class="card-img-top" src="https://ui-avatars.com/api/?size=50&background=random&name=<?= $jwl['nama_mapel']; ?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title mb-3"><?= $jwl['nama_mapel']; ?> [<?= $jwl['nama_guru']; ?>]</h4>
            <p class="card-title mb-3">
              [<?= $jwl['nama_kelas']; ?> (<?= $jwl['category']; ?>)]
            </p>
            <p class="card-text">
              <?= $jwl['hari']; ?>: <?= $jwl['mulai']; ?> - <?= $jwl['selesai']; ?>
            </p>
          </div>
          <div class="card-footer">
            <?php
            // setlocale(LC_ALL, 'id-ID', 'id_ID');
            // $hari = strftime("%A");
            // if ($jwl['hari'] == $hari) {
            //   echo '<a href="#" class="btn btn-warning">Absen</a>';
            // }
            ?>
            <a href="<?= BASEURL; ?>siswa/absen.php?id=<?= $jwl['id']; ?>&mapel=<?= $jwl['nama_mapel']; ?>&kelas=<?= $jwl['nama_kelas']; ?> (<?= $jwl['category']; ?>)" class="btn btn-warning">Absen</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>