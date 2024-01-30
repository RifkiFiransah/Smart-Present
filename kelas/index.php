<?php
$title = 'Kelas';
require_once "../functions/Kelas.php";

$kelas = query("SELECT * FROM tb_kelas");

include('../layouts/header.php');

if (isset($_POST['submit'])) {
  if (store($_POST)) {
    $_SESSION['message'] = "Data Berhasil di tambahkan";
    $_SESSION['alert'] = "alert-success";
    // echo "<script>alert('Data Berhasil ditambahkan')</script>";
    // header('Location: index.php');
  } else {
    $_SESSION['message'] = "Data Gagal di tambahkan";
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
          <?= $_SESSION["message"]; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
        unset($_SESSION['message']);
      endif;
      ?>
      <div class="table-responsive m-b-40 bg-light p-4">
        <table class="table table-borderless table-data3" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th class="pl-2">Nama Kelas</th>
              <th class="pl-2">Kategori Abjad</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $i = 1;
            foreach ($kelas as $kls) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $kls['nama_kelas']; ?></td>
                <td><?= $kls['category']; ?></td>
                <td>
                  <a href="edit.php?id=<?= $kls['id']; ?>" class="p-2 badge btn-success"><i class="fa fa-edit"></i></a>
                  <a href="delete.php?id=<?= $kls['id']; ?>" class="p-2 badge btn-danger" onclick="return confirm('Yakin untuk menghapus data?')"><i class="fa fa-trash"></i></a>
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

<!-- Start Form Insert Data Kelas -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" novalidate="novalidate">
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nama_kelas" class="control-label mb-1">Kelas</label>
                <select name="nama_kelas" id="select" class="form-control">
                  <option disabled selected>Please select</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="category" class="control-label mb-1">Kategori</label>
              <div class="input-group">
                <input id="category" name="category" type="text" class="form-control cc-cvc" placeholder="Masukan abjad A - Z" autocomplete="off">
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