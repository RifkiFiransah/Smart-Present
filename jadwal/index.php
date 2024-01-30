<?php

$title = "Jadwal";
require_once "../functions/Jadwal.php";
$jadwal = query("SELECT tb_jadwal.*, tb_hari.hari, tb_mapel.nama_mapel, tb_guru.nama_guru, tb_kelas.nama_kelas, tb_kelas.category
FROM tb_jadwal LEFT JOIN tb_hari ON tb_hari.id=tb_jadwal.id_hari
LEFT JOIN tb_mapel ON tb_mapel.id=tb_jadwal.id_mapel 
LEFT JOIN tb_guru ON tb_guru.id=tb_jadwal.id_guru
LEFT JOIN tb_kelas ON tb_kelas.id=tb_jadwal.id_kelas ORDER BY id_hari");
include('../layouts/header.php');
if (isset($_POST['submit'])) {
  if (store($_POST) > 0) {
    $_SESSION['message'] = "Data Berhasil di tambahkan";
    $_SESSION['alert'] = "alert-success";
    // echo "<script>alert('Data Berhasil ditambahkan')</script>";
    // header('Location: index.php');
  } else {
    $_SESSION['message'] = "Data Gagal di tambahkan";
    $_SESSION['alert'] = "alert-danger";
    echo "<script>alert('Data Gagal ditambahkan')</script>";
  }
}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Data <?= $title; ?></h2>
        <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
          <i class="zmdi zmdi-plus"></i>add Data</button>
      </div>
    </div>
  </div>
  <div class="row m-t-25">
    <div class="col-md-12 card py-3">
      <?php if (isset($_SESSION['message'])) :
      ?>
        <div class="sufee-alert alert with-close <?= $_SESSION['alert']; ?> alert-dismissible fade show">
          <!-- <span class="badge badge-pill badge-primary">Success</span> -->
          <?= $_SESSION["message"]; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
        unset($_SESSION['message']);
      endif;
      ?>
      <div class="table-responsive m-b-20">
        <table class="table table-borderless table-data3" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Hari</th>
              <th>Mapel</th>
              <th>Guru</th>
              <th>Kelas</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th width="150">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($jadwal as $jwl) :
            ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $jwl['hari']; ?></td>
                <td><?= $jwl['nama_mapel']; ?></td>
                <td><?= $jwl['nama_guru']; ?></td>
                <td><?= $jwl['nama_kelas']; ?>(<?= $jwl['category']; ?>)</td>
                <td><?= $jwl['mulai']; ?></td>
                <td><?= $jwl['selesai']; ?></td>
                <td>
                  <a href="edit.php?id=<?= $jwl['id']; ?>" class="badge btn-success p-2"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Yakin untuk menghapus data?')" href="delete.php?id=<?= $jwl['id']; ?>" class="badge btn-danger p-2"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
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
                    <option value="<?= $hr['id']; ?>"><?= $hr['hari']; ?></option>
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
                  <option value="<?= $mpl['id']; ?>"><?= $mpl['nama_mapel']; ?></option>
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
                    <option value="<?= $gr['id']; ?>"><?= $gr['nama_guru']; ?></option>
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
                  <option value="<?= $kls['id']; ?>"><?= $kls['nama_kelas']; ?> (<?= $kls['category']; ?>)</option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="mulai" class="control-label mb-1">Jam Mulai</label>
                <input type="time" name="mulai" class="form-control cc-cvc">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="selesai" class="control-label mb-1">Jam Selesai</label>
                <input type="time" name="selesai" class="form-control cc-cvc">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="submit">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>