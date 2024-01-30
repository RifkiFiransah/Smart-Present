<?php

require_once "../functions/Guru.php";
$id = $_GET['id'];
session_start();
if (destroy($id) > 0) {
  $_SESSION['message'] = "Data Berhasil di hapus";
  $_SESSION['alert'] = "alert-success";
  echo "
  <script>
    // alert('Data Berhasil Dihapus')
    document.location.href = 'index.php'
  </script>
  ";
} else {
  $_SESSION['message'] = "Data gagal di hapus";
  $_SESSION['alert'] = "alert-danger";
  echo "
  <script>
    // alert('Data Berhasil Dihapus')
    document.location.href = 'index.php'
  </script>
  ";
}
