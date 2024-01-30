<?php

$title = 'Edit Siswa';
require_once '../functions/Siswa.php';
require_once '../config.php';

$id = $_GET['id'];
$siswa = query("SELECT * FROM tb_siswa WHERE id = $id")[0];

include('../layouts/header.php');
if (isset($_POST['edit'])) {
  if (update($_POST) > 0) {
    $_SESSION['message'] = "Data berhasil di edit";
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
        <h3 class="title-1 text-center m-b-20">Edit Data Siswa</h3>
        <form action="" method="post" novalidate="novalidate">
          <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nis" class="control-label mb-1">NIS</label>
                  <input id="nis" name="nis" type="number" class="form-control cc-exp" data-val="true" autocomplete="cc-exp" value="<?= $siswa['nis']; ?>">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>
              <div class="col-6">
                <label for="nama" class="control-label mb-1">Nama Lengkap</label>
                <div class="input-group">
                  <input id="nama" name="nama" value="<?= $siswa['nama']; ?>" type="text" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="jk" class="control-label mb-1">Jenis Kelamin</label>
                  <select name="jk" id="select" class="form-control">
                    <option disabled>Please select</option>
                    <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : ''; ?>>Laki - laki</option>
                    <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <label for="id_kelas" class="control-label mb-1">Kelas</label>
                <div class="input-group">
                  <select name="id_kelas" id="select" class="form-control">
                    <option selected disabled>Please select</option>
                    <option value="1" <?= $siswa['id_kelas'] == '1' ? 'selected' : ''; ?>>X</option>
                    <option value="2" <?= $siswa['id_kelas'] == '2' ? 'selected' : ''; ?>>XI</option>
                    <option value="3" <?= $siswa['id_kelas'] == '3' ? 'selected' : ''; ?>>XII</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="control-label mb-1">Password</label>
                  <input id="password" name="password" type="password" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="email" class="control-label mb-1">Email</label>
                  <input id="email" name="email" value="<?= $siswa['email']; ?>" type="tel" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="telp" class="control-label mb-1">telp</label>
                  <input id="telp" name="telp" value="<?= $siswa['telp']; ?>" type="tel" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                  <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="alamat" class="control-label mb-1">Alamat</label>
                  <div class="input-group">
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"><?= $siswa['alamat']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?= BASEURL; ?>siswa" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="edit">edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../layouts/footer.php'); ?>