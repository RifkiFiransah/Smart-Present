<?php
$title = 'Siswa';

require_once '../functions/Siswa.php';

$students = query("SELECT tb_siswa.*, tb_kelas.nama_kelas FROM tb_siswa LEFT JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id");
$kelas = query("SELECT * FROM tb_kelas");

include('../layouts/header.php');

if (isset($_POST['submit'])) {
  if (store($_POST) > 0) {
    $_SESSION['message'] = "Data berhasil ditambahkan";
    $_SESSION['alert'] = "alert-success";

    // echo "
    //     <script>
    //         document.location.href = 'index.php';
    //     </script>";
    // header("Refresh:0");
  } else {
    $_SESSION['message'] = "Data gagal ditambahkan";
    $_SESSION['alert'] = "alert-danger";

    // echo "
    //     <script>
    //         // alert('Data Gagal ditambahkan');
    //         document.location.href = 'index.php';
    //     </script>";
  }
}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="overview-wrap">
        <h2 class="title-1">Data Siswa</h2>
        <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal">
          <i class="zmdi zmdi-plus"></i>add item</button>
      </div>
    </div>
  </div>
  <div class="row m-t-25">
    <div class="col-md-12">
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
      <div class="table-responsive m-b-40 bg-light p-4">
        <table class="table table-borderless table-data3" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Kelas</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($students as $student) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $student['nis']; ?></td>
                <td><?= $student['nama']; ?></td>
                <td><?= $student['email']; ?></td>
                <td><?= $student['nama_kelas']; ?></td>
                <td><?= $student['alamat']; ?></td>
                <td>
                  <a href="edit.php?id=<?= $student['id']; ?>" class="badge btn-success p-2"><i class="fa fa-edit"></i></a>
                  <a href="delete.php?id=<?= $student['id']; ?>" class="badge btn-danger p-2" onclick="return confirm('Yakin untuk menghapus data?')"><i class="fa fa-trash"></i></a>
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
<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mediumModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" novalidate="novalidate">
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nis" class="control-label mb-1">NIS</label>
                <input id="nis" name="nis" type="number" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
              </div>
            </div>
            <div class="col-6">
              <label for="nama" class="control-label mb-1">Nama Lengkap</label>
              <div class="input-group">
                <input id="nama" name="nama" type="text" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="jk" class="control-label mb-1">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control">
                  <option disabled selected>Please select</option>
                  <option value="L">Laki - laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <label for="id_kelas" class="control-label mb-1">Kelas</label>
              <div class="input-group">
                <select name="id_kelas" id="id_kelas" class="form-control">
                  <option selected disabled>Please select</option>
                  <?php foreach ($kelas as $kls) : ?>
                    <option value="<?= $kls['id']; ?>"><?= $kls['nama_kelas']; ?> (<?= $kls['category']; ?>)</option>
                  <?php endforeach; ?>
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
                <input id="email" name="email" type="email" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="telp" class="control-label mb-1">telp</label>
                <input id="telp" name="telp" type="tel" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
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
<!-- end modal medium -->