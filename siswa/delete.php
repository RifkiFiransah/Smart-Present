<?php

require_once '../functions/Siswa.php';
$id = $_GET['id'];

if (destroy($id) > 0) {
  $_SESSION['message'] = "Data Berhasil di hapus";
  $_SESSION['alert'] = "alert-success";
  echo "
  <script>
      // alert('Data Berhasil dihapus');
      document.location.href = 'index.php';
  </script>";
} else {
  $_SESSION['message'] = "Data Gagal di hapus";
  $_SESSION['alert'] = "alert-danger";
  echo "
  <script>
      // alert('Data Gagal dihapus');
      document.location.href = 'index.php';
  </script>";
}
