<?php
$title = 'Profile Siswa';
require_once '../functions/Siswa.php';

include('../layouts/header.php');

$id = $_SESSION['id'];
$siswa = query("SELECT * FROM tb_siswa WHERE id = $id")[0];

if (isset($_POST['edit'])) {
  if (update($_POST) > 0) {
    $_SESSION['message'] = "Data Berhasil di edit";
    $_SESSION['alert'] = "alert-success";
    // header('Location: profile.php');
    // header("Refresh:0");
  } else {
    $_SESSION['message'] = "Data Gagal di edit";
    $_SESSION['alert'] = "alert-danger";
    // header('Location: profile.php');
    // header("Refresh:0");
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Account</h2>
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
      </div>
    </div>
  </div>
  <div class="row m-t-20">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-user"></i>
          <strong class="card-title pl-2">Profile</strong>
        </div>
        <div class="card-body">
          <div class="mx-auto d-block">
            <img class="rounded-circle mx-auto d-block" src="https://ui-avatars.com/api/?length=1&background=random&name=<?= $_SESSION['nama']; ?>" alt="Card image cap">
            <h5 class="text-sm-center mt-2 mb-1"><?= $_SESSION['nama']; ?></h5>
            <div class="location text-sm-center">
              <i class="fa fa-map-marker"></i> <?= $_SESSION['email']; ?>
            </div>
          </div>
          <hr>
          <div class="card-text">
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
                <a href="<?= BASEURL; ?>dashboard/dashboard_siswa.php" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" name="edit">update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('../layouts/footer.php'); ?>