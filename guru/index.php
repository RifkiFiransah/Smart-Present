<?php
$title = 'Guru';
require_once "../functions/Guru.php";

$guru = query("SELECT * FROM tb_guru");

include('../layouts/header.php');
if (isset($_POST['submit'])) {
  if (store($_POST)) {
    // echo "<script>alert('Data Berhasil ditambahkan')</script>";
    $_SESSION['message'] = "Data Berhasil Ditambahkan";
    $_SESSION['alert'] = "alert-success";
    // header('Location: index.php');
  } else {
    $_SESSION['message'] = "Data Gagal Ditambahkan";
    $_SESSION['alert'] = "alert-danger";
    // header('Location: index.php');
    // echo "<script>alert('Data Gagal ditambahkan')</script>";
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Data Guru</h2>
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
              <th>NIP</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Gender</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $i = 1;
            foreach ($guru as $gr) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $gr['nip']; ?></td>
                <td><?= $gr['nama_guru']; ?></td>
                <td><?= $gr['email']; ?></td>
                <td><?= $gr['alamat']; ?></td>
                <td><?= $gr['jk'] == 'P' ? 'Perempuan' : 'Laki-laki'; ?></td>
                <td>
                  <a href="edit.php?id=<?= $gr['id']; ?>" class="p-2 badge btn-success"><i class="fa fa-edit"></i></a>
                  <a href="delete.php?id=<?= $gr['id']; ?>" class="p-2 badge btn-danger" onclick="return confirm('Yakin untuk menghapus data?')"><i class="fa fa-trash"></i></a>
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

<!-- Start Form Insert Data Guru -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" novalidate="novalidate">
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nip" class="control-label mb-1">NIP</label>
                <input id="nip" name="nip" type="number" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
              </div>
            </div>
            <div class="col-6">
              <label for="nama_guru" class="control-label mb-1">Nama Guru</label>
              <div class="input-group">
                <input id="nama_guru" name="nama_guru" type="text" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="jk" class="control-label mb-1">Jenis Kelamin</label>
                <select name="jk" id="select" class="form-control">
                  <option disabled selected>Please select</option>
                  <option value="L">Laki - laki</option>
                  <option value="P">Perempuan</option>
                </select>
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
              <label for="email" class="control-label mb-1">Email</label>
              <div class="input-group">
                <input id="email" name="email" type="email" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="alamat" class="control-label mb-1">Alamat</label>
                <div class="input-group">
                  <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                </div>
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
<!-- End Form Insert Data Guru -->