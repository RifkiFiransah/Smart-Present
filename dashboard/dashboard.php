<?php
$title = 'Dashboard';

require_once('../functions/Dashboard.php');
$siswa = count_data("SELECT * FROM tb_siswa");
$guru = count_data("SELECT * FROM tb_guru");
$kelas = count_data("SELECT * FROM tb_kelas");
$mapel = count_data("SELECT * FROM tb_mapel");
$jadwal = count_data("SELECT * FROM tb_jadwal");

?>

<?php include('../layouts/header.php'); ?>
<?php
switch ($_SESSION['role']) {
  case 'siswa':
    echo "<script>document.location.href = 'dashboard_siswa.php'</script>";
    header('Location: dashboard_siswa.php');
    break;
  case 'guru':
    echo "<script>document.location.href = 'dashboard_guru.php'</script>";
    break;
  default:
    break;
}
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
    <div class="col-sm-6 col-lg-4">
      <div class="overview-item overview-item--c1 py-5">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-account-o"></i>
            </div>
            <div class="text">
              <h2><?= $siswa; ?></h2>
              <span class="text-light" style="font-weight: bold;">Siswa</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="overview-item overview-item--c2 py-5">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-accounts"></i>
            </div>
            <div class="text">
              <h2><?= $guru; ?></h2>
              <span class="text-light" style="font-weight: bold;">Guru</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="overview-item overview-item--c3 py-5">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-city"></i>
            </div>
            <div class="text">
              <h2><?= $kelas; ?></h2>
              <span class="text-light" style="font-weight: bold;">Kelas</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="overview-item overview-item--c4 py-5">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-book"></i>
            </div>
            <div class="text">
              <h2><?= $mapel; ?></h2>
              <span class="text-light" style="font-weight: bold;">Pelajaran</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="overview-item overview-item--c4 py-5">
        <div class="overview__inner">
          <div class="overview-box clearfix">
            <div class="icon">
              <i class="zmdi zmdi-border-all"></i>
            </div>
            <div class="text">
              <h2><?= $jadwal; ?></h2>
              <span class="text-light" style="font-weight: bold;">Jadwal</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>