<?php
$title = 'Profile Admin';
require_once '../functions/Dashboard.php';

include('../layouts/header.php');

$id = $_SESSION['id'];
$admin = query("SELECT * FROM tb_admin WHERE id = $id")[0];

if (isset($_POST['edit'])) {
  if (update($_POST) > 0) {
    $_SESSION['message'] = "Data Berhasil di edit";
    $_SESSION['alert'] = "alert-success";
  } else {
    $_SESSION['message'] = "Data Gagal di edit";
    $_SESSION['alert'] = "alert-danger";
    echo "
    <script>
    //     // alert('Data Gagal di edit');
        document.location.href = 'profile.php';
    </script>";
  }
}

function update($data)
{
  global $connect;
  $id = $data['id'];
  $nama = mysqli_escape_string($connect, htmlspecialchars($data['nama']));
  $username = mysqli_escape_string($connect, htmlspecialchars($data['username']));
  $email = mysqli_escape_string($connect, htmlspecialchars($data['email']));
  if (!empty($data['password'])) {
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = "UPDATE tb_admin SET nama = '$nama', username = '$username', email = '$email', password =  '$password' WHERE id = $id";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
  }
  $query = "UPDATE tb_admin SET nama = '$nama', username = '$username', email = '$email' WHERE id = $id";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
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
              <input type="hidden" name="id" value="<?= $admin['id']; ?>">
              <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="username" class="control-label mb-1">Username</label>
                      <input id="username" name="username" type="text" class="form-control cc-exp" data-val="true" autocomplete="cc-exp" value="<?= $admin['username']; ?>">
                      <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="nama" class="control-label mb-1">Nama Lengkap</label>
                    <div class="input-group">
                      <input id="nama" name="nama" value="<?= $admin['nama']; ?>" type="text" class="form-control cc-cvc" value="" data-val="true" autocomplete="off">
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
                      <input id="email" name="email" value="<?= $admin['email']; ?>" type="tel" class="form-control cc-exp" value="" data-val="true" autocomplete="cc-exp">
                      <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?= BASEURL; ?>dashboard/dashboard.php" class="btn btn-secondary">Back</a>
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