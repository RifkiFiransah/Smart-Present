<?php

$title = 'Edit Kelas';
require_once '../functions/Kelas.php';
require_once '../config.php';

$id = $_GET['id'];
$kelas = query("SELECT * FROM tb_kelas WHERE id = $id")[0];
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
        <h3 class="title-1 text-center m-b-20">Edit Data Kelas</h3>
        <form action="" method="post" novalidate="novalidate">
          <input type="hidden" name="id" value="<?= $kelas['id']; ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nama_kelas" class="control-label mb-1">Kelas</label>
                  <select name="nama_kelas" id="select" class="form-control">
                    <option disabled>Please select</option>
                    <option value="X" <?= $kelas['nama_kelas'] == 'X' ? 'selected' : ''; ?>>X</option>
                    <option value="XI" <?= $kelas['nama_kelas'] == 'XI' ? 'selected' : ''; ?>>XI</option>
                    <option value="XII" <?= $kelas['nama_kelas'] == 'XII' ? 'selected' : ''; ?>>XII</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <label for="category" class="control-label mb-1">Kategori</label>
                <div class="input-group">
                  <input id="category" name="category" type="text" class="form-control cc-cvc" placeholder="Masukan abjad A - Z" autocomplete="off" value="<?= $kelas['category']; ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?= BASEURL; ?>kelas" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="edit">edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>