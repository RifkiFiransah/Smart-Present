<?php
$title = 'Edit Jadwal';
require_once "../functions/Jadwal.php";
$id = $_GET['id'];
$jadwal = query("SELECT tb_jadwal.*, tb_hari.*, tb_mapel.*, tb_guru.*, tb_kelas.*
FROM tb_jadwal LEFT JOIN tb_hari ON tb_hari.id=tb_jadwal.id_hari
LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel 
LEFT JOIN tb_guru ON tb_guru.id=tb_jadwal.id_guru
LEFT JOIN tb_kelas ON tb_kelas.id=tb_jadwal.id_kelas WHERE tb_jadwal.id = $id")[0];

include('../layouts/header.php');

if (isset($_POST['edit'])) {
  if (update($_POST) > 0) {
    $_SESSION['message'] = "Data Berhasil di edit";
    $_SESSION['alert'] = "alert-success";
    echo "
    <script>
        document.location.href = 'index.php';
    </script>";
  } else {
    $_SESSION['message'] = "Data Gagal di edit";
    $_SESSION['alert'] = "alert-danger";
    echo "
    <script>
        document.location.href = 'index.php';
    </script>";
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="user-data m-b-10">
        <h3 class="title text-center m-b-20">Edit Jadwal</h3>
        <form action="" method="post" novalidate="novalidate">
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="hari" class="control-label mb-1">Hari</label>
                  <select name="hari" id="hari" class="form-control">
                    <option disabled selected>Please Select</option>
                    <?php
                    $hari = query("SELECT * FROM tb_hari");
                    foreach ($hari as $hr) : ?>
                      <option value="<?= $hr['id']; ?>" <?= $hr['id'] == $jadwal['id_hari'] ? 'selected' : ''; ?>><?= $hr['hari']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <label for="mapel" class="control-label mb-1">Mapel</label>
                <select name="mapel" id="mapel" class="form-control">
                  <option disabled selected>Please Select</option>
                  <?php
                  $mapel = query("SELECT * FROM tb_mapel");
                  foreach ($mapel as $mpl) : ?>
                    <option value="<?= $mpl['id']; ?>" <?= $mpl['id'] == $jadwal['id_mapel'] ? 'selected' : ''; ?>><?= $mpl['nama_mapel']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="guru" class="control-label mb-1">Guru</label>
                  <select name="guru" id="guru" class="form-control">
                    <option disabled selected>Please Select</option>
                    <?php
                    $guru = query("SELECT * FROM tb_guru");
                    foreach ($guru as $gr) : ?>
                      <option value="<?= $gr['id']; ?>" <?= $gr['id'] == $jadwal['id_guru'] ? 'selected' : ''; ?>><?= $gr['nama_guru']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <label for="kelas" class="control-label mb-1">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                  <option disabled selected>Please Select</option>
                  <?php
                  $kelas = query("SELECT * FROM tb_kelas");
                  foreach ($kelas as $kls) : ?>
                    <option value="<?= $kls['id']; ?>" <?= $kls['id'] == $jadwal['id_kelas'] ? 'selected' : ''; ?>><?= $kls['nama_kelas']; ?> (<?= $kls['category']; ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="mulai" class="control-label mb-1">Jam Mulai</label>
                  <input type="time" name="mulai" class="form-control cc-cvc" value="<?= $jadwal['mulai']; ?>">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="selesai" class="control-label mb-1">Jam Selesai</label>
                  <input type="time" name="selesai" class="form-control cc-cvc" value="<?= $jadwal['selesai']; ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?= BASEURL; ?>jadwal" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('../layouts/footer.php') ?>