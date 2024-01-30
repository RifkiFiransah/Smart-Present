<?php

require_once "../functions/Pelajaran.php";
$id = $_GET['id'];

session_start();
if (destroy($id) > 0) {
  $_SESSION['message'] = "Data Berhasil di hapus";
  $_SESSION['alert'] = "alert-success";
  echo "
  <script>
    document.location.href = 'index.php'
  </script>
  ";
} else {
  $_SESSION['message'] = "Data Gagal di hapus";
  $_SESSION['alert'] = "alert-danger";
  echo "
  <script>
    document.location.href = 'index.php'
  </script>
  ";
}
