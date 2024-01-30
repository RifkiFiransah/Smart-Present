<?php
$title = 'Mata Pelajaran';
require_once "../functions/Pelajaran.php";
include('../layouts/header.php');

$mapel = query("SELECT * FROM tb_mapel");

if (isset($_POST['submit'])) {
  if (store($_POST)) {
    $_SESSION['message'] = "Data Berhasil di tambahkan";
    $_SESSION['alert'] = "alert-success";
    // header('Location: index.php');
  } else {
    $_SESSION['message'] = "Data Gagal di tambahkan";
    $_SESSION['alert'] = "alert-danger";
    // header('Location: index.php');
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
      <div class="table-responsive m-b-20">
        <table class="table table-borderless table-data3" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelajaran</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $i = 1;
            foreach ($mapel as $mpl) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $mpl['nama_mapel']; ?></td>
                <td>
                  <a href="edit.php?id=<?= $mpl['id']; ?>" class="p-2 badge btn-success"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Yakin untuk menghapus data?')" href="delete.php?id=<?= $mpl['id']; ?>" class="p-2 badge btn-danger"><i class="fa fa-trash"></i></a>
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
        <h5 class="modal-title" id="mediumModalLabel">Tambah Mapel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" novalidate="novalidate">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="nama_mapel" class="control-label mb-1">Nama Pelajaran</label>
                <input id="nama_mapel" name="nama_mapel" type="text" class="form-control cc-cvc" autocomplete="off">
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