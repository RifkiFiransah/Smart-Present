<?php

$title = 'Edit Guru';
require_once '../functions/Guru.php';
require_once '../config.php';

$id = $_GET['id'];
$guru = query("SELECT * FROM tb_guru WHERE id = $id")[0];

include('../layouts/header.php');
if (isset($_POST['edit'])) {
  if (update($_POST) > 0) {
    $_SESSION['message'] = "Data Berhasil di edit";
    $_SESSION['alert'] = "alert-success";
    echo "
    <script>
        // alert('Data Berhasil di edit');
        document.location.href = 'index.php';
    </script>";
  } else {
    $_SESSION['message'] = "Data Gagal di edit";
    $_SESSION['alert'] = "alert-danger";
    echo "
    <script>
        // alert('Data Gagal di edit');
        document.location.href = 'index.php';
    </script>";
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="user-data m-b-10">
        <h3 class="title-1 text-center m-b-20">Edit Data Guru</h3>
        <form action="" method="post" novalidate="novalidate">
          <input type="hidden" name="id" value="<?= $guru['id']; ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nip" class="control-label mb-1">NIP</label>
                  <input id="nip" name="nip" type="number" class="form-control cc-exp" data-val="true" autocomplete="cc-exp" value="<?= $guru['nip']; ?>">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>
              <div class="col-6">
                <label for="nama_guru" class="control-label mb-1">Nama Guru</label>
                <div class="input-group">
                  <input id="nama_guru" name="nama_guru" value="<?= $guru['nama_guru']; ?>" type="text" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="email" class="control-label mb-1">Email</label>
                <div class="input-group">
                  <input id="email" name="email" type="email" class="form-control cc-cvc" value="<?= $guru['email']; ?>" data-val="true" autocomplete="off">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="control-label mb-1">Password</label>
                  <input id="password" name="password" type="password" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="jk" class="control-label mb-1">Jenis Kelamin</label>
                  <select name="jk" id="select" class="form-control">
                    <option disabled>Please select</option>
                    <option value="L" <?= $guru['jk'] == 'L' ? 'selected' : ''; ?>>Laki - laki</option>
                    <option value="P" <?= $guru['jk'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="alamat" class="control-label mb-1">Alamat</label>
                  <div class="input-group">
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"><?= $guru['alamat']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <a href="<?= BASEURL; ?>guru" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="edit">edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>