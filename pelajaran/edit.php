<?php

$title = 'Edit Pelajaran';
require_once '../functions/Pelajaran.php';
require_once '../config.php';

$id = $_GET['id'];
$mapel = query("SELECT * FROM tb_mapel WHERE id = $id")[0];
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
        <h3 class="title-1 text-center m-b-20">Edit Data Mapel</h3>
        <form action="" method="post" novalidate="novalidate">
          <input type="hidden" name="id" value="<?= $mapel['id']; ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nama_mapel" class="control-label mb-1">Nama Pelajaran</label>
                  <input id="nama_mapel" name="nama_mapel" type="text" class="form-control cc-cvc" autocomplete="off" value="<?= $mapel['nama_mapel']; ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?= BASEURL; ?>pelajaran" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="edit">edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>