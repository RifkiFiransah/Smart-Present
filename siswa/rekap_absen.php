<?php
$title = 'Rekap Absensi';

include('../layouts/header.php');
require_once "../functions/Siswa.php";
$nama = $_SESSION['nama'];
$id_kelas = query("SELECT * FROM tb_siswa WHERE nama = '$nama'")[0]['id_kelas'];
$mapel = query("SELECT tb_mapel.nama_mapel, tb_jadwal.* FROM tb_jadwal
LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel
WHERE id_kelas = $id_kelas");
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Rekap Absensi</h2>
      </div>
    </div>
  </div>
  <div class="row m-t-25">
    <div class="col-md-8">
      <div class="login-content">
        <div class="login-form">
          <form action="" method="get">
            <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
            <div class="form-group">
              <label for="mapel">Mata Pelajaran</label>
              <select name="mapel" id="mapel" class="form-control m-b-30 m-t-20">
                <option disabled selected>Please Select</option>
                <?php foreach ($mapel as $mpl) : ?>
                  <option value="<?= $mpl['id_mapel']; ?>"><?= $mpl['nama_mapel']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <a href="../dashboard/dashboard_siswa.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_GET['submit'])) :
    $rekap = rekap_absen($_GET);
  ?>
    <div class="row m-t-25">
      <div class="col-md-12">
        <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelajaran</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              $id_mapel = $_GET['mapel'];
              $pelajaran = query("SELECT * FROM tb_mapel WHERE id = $id_mapel")[0];
              ?>
              <?php foreach ($rekap as $rkp) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $rkp['tanggal']; ?></td>
                  <td><?= $pelajaran['nama_mapel']; ?></td>
                  <?php if ($rkp['keterangan'] == 'hadir') { ?>
                    <td>
                      <p class="p-2 badge btn-primary"><?= $rkp['keterangan']; ?></p>
                    </td>
                  <?php } else if ($rkp['keterangan'] == 'izin') { ?>
                    <td>
                      <p class="p-2 badge btn-warning"><?= $rkp['keterangan']; ?></p>
                    </td>
                  <?php } else if ($rkp['keterangan'] == 'alpha') { ?>
                    <td>
                      <p class="p-2 badge btn-danger"><?= $rkp['keterangan']; ?></p>
                    </td>
                  <?php } ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
<?php include('../layouts/footer.php'); ?>