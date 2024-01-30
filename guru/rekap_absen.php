<?php
$title = 'Rekap Absensi';

include('../layouts/header.php');
require_once "../functions/Guru.php";
$nama = $_SESSION['nama'];
$id = $_SESSION['id'];
$jadwal = query("SELECT tb_mapel.nama_mapel, tb_kelas.nama_kelas, tb_kelas.category, tb_jadwal.* FROM tb_jadwal
LEFT JOIN tb_kelas ON tb_kelas.id=tb_jadwal.id_kelas
LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel
WHERE id_guru = $id");
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
    <div class="col-md-12">
      <div class="login-content">
        <div class="login-form">
          <form action="" method="get">
            <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select name="kelas" id="kelas" class="form-control m-b-30 m-t-20">
                    <option disabled selected>Please Select</option>
                    <?php
                    $i = 0;
                    $kelas = "";
                    foreach ($jadwal as $jwl) :
                    ?>
                      <?php if (isset($_GET['kelas']) && $_GET['kelas'] == $jwl['id_kelas']) { ?>
                        <option value="<?= $jwl['id_kelas']; ?>" selected><?= $jwl['nama_kelas']; ?> (<?= $jwl['category']; ?>)</option>
                        <?php } else {
                        if ($kelas != $jwl['id_kelas']) {
                        ?>
                          <option value="<?= $jwl['id_kelas']; ?>"><?= $jwl['nama_kelas']; ?> (<?= $jwl['category']; ?>)</option>
                      <?php
                        }
                        $kelas = $jwl['id_kelas'];
                      } ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <select name="mapel" id="mapel" class="form-control m-b-30 m-t-20">
                    <option disabled selected>Please Select</option>
                    <?php foreach ($jadwal as $jwl) : ?>
                      <?php if (isset($_GET['mapel']) && $_GET['mapel'] == $jwl['id_mapel']) { ?>
                        <option value="<?= $jwl['id_mapel']; ?>" selected><?= $jwl['nama_mapel']; ?></option>
                      <?php } else { ?>
                        <option value="<?= $jwl['id_mapel']; ?>"><?= $jwl['nama_mapel']; ?></option>
                      <?php } ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="mapel">Tanggal</label>
                  <?php if (isset($_GET['tanggal'])) { ?>
                    <input type="date" name="tanggal" class="form-control m-b-30 m-t-20" value="<?= $_GET['tanggal']; ?>">
                  <?php } else { ?>
                    <input type="date" name="tanggal" class="form-control m-b-30 m-t-20">
                  <?php } ?>
                </div>
              </div>
            </div>
            <a href="../dashboard/dashboard_guru.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_GET['submit'])) :
    $rekaps = rekap_absen_guru($_GET);
    // var_dump($rekaps);
  ?>
    <div class="row m-t-25">
      <div class="col-md-12">
        <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($rekaps as $rekap) :
              ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $rekap['nama']; ?></td>
                  <?php if ($rekap['keterangan'] == 'hadir') { ?>
                    <td>
                      <p class="p-2 badge btn-primary"><?= $rekap['keterangan']; ?></p>
                    </td>
                  <?php } else if ($rekap['keterangan'] == 'izin') { ?>
                    <td>
                      <p class="p-2 badge btn-warning"><?= $rekap['keterangan']; ?></p>
                    </td>
                  <?php } else if ($rekap['keterangan'] == 'alpha') { ?>
                    <td>
                      <p class="p-2 badge btn-danger"><?= $rekap['keterangan']; ?></p>
                    </td>
                  <?php } ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<?php endif; ?>
</div>
<?php include('../layouts/footer.php'); ?>