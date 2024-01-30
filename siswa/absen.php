<?php
$title = 'Absen';

require_once "../functions/Siswa.php";

include('../layouts/header.php');
$email = $_SESSION['email'];
$id_siswa = $_SESSION['id'];
$id = $_GET['id'];

$tanggal = date('Y-m-d');
setlocale(LC_ALL, 'id-ID', 'id-ID');
$hari = strftime('%A');

$jadwal_mapel = query("SELECT tb_hari.*, tb_jadwal.* FROM tb_jadwal
 LEFT JOIN tb_hari ON tb_hari.id = tb_jadwal.id_hari
 WHERE tb_jadwal.id = $id")[0];

$query = mysqli_query($connect, "SELECT * FROM tb_absensi WHERE tanggal = '$tanggal' AND id_jadwal = '$id' AND id_siswa = '$id_siswa'");
if (mysqli_affected_rows($connect)) {
  $absen = mysqli_fetch_assoc($query);
} else {
  $absen['keterangan'] = '';
}

$mapel = $_GET['mapel'];
$kelas = $_GET['kelas'];

if (isset($_POST['absen'])) {
  if (absen($_POST) > 0) {
    $_SESSION['message'] = "Berhasil Absen";
    $_SESSION['alert'] = "alert-success";
    echo "
    <script>
    // alert('Berhasil Absen');
    document.location.href = 'absen.php?id=$id&mapel=$mapel&kelas=$kelas';
    </script>";
  } else {
    $_SESSION['message'] = "Gagal Absen";
    $_SESSION['alert'] = "alert-danger";
    echo "
    <script>
        // alert('Gagal Absen');
        document.location.href = 'absen.php?id=$id&mapel=$mapel&kelas=$kelas';
    </script>";
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1"><?= $_GET['mapel']; ?> [<?= $_GET['kelas']; ?>]</h2>
        <?php if (isset($_SESSION['message'])) :
        ?>
          <div class="sufee-alert alert with-close <?= $_SESSION['alert']; ?> alert-dismissible fade show">
            <?= $_SESSION["message"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
        // unset($_SESSION['message']);
        endif;
        ?>
      </div>
    </div>
  </div>
  <div class="row m-t-25">
    <div class="col-md-6">
      <div class="login-content">
        <div class="login-form">
          <form action="" method="post">
            <input type="hidden" name="id_jadwal" value="<?= $_GET['id']; ?>">
            <input type="hidden" name="id_siswa" value="<?= $id_siswa; ?>">
            <?php if ($jadwal_mapel['hari'] != $hari) { ?>
              <label>Keterangan Absen</label>
              <p class="text-danger my-3">Anda tidak dapat absen</p>
              <a class="btn btn-dark m-b-20" href="../dashboard/dashboard_siswa.php">Back</a>
            <?php } else if ($absen['keterangan'] === 'hadir') { ?>
              <label>Keterangan Absen</label>
              <p class="text-success my-3">Anda sudah absen</p>
              <a class="btn btn-dark m-b-20" href="../dashboard/dashboard_siswa.php">Back</a>
            <?php } else { ?>
              <div class="form-group">
                <label>Keterangan Absen</label>
                <div class="form-check-inline form-check m-t-10 m-b-10">
                  <label for="inline-radio1" class="form-check-label mr-2">
                    <input type="radio" id="inline-radio1" name="keterangan" value="hadir" class="form-check-input">Hadir
                  </label>
                  <label for="inline-radio2" class="form-check-label mr-2">
                    <input type="radio" id="inline-radio2" name="keterangan" value="izin" class="form-check-input">Sakit / Izin
                  </label>
                  <label for="inline-radio3" class="form-check-label mr-2">
                    <input type="radio" id="inline-radio3" name="keterangan" value="alpha" class="form-check-input">Alpha
                  </label>
                </div>
              </div>
              <button class="btn btn-success m-b-20" type="submit" name="absen">submit</button>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>