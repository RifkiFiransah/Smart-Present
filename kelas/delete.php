<?php

require_once "../functions/Kelas.php";
$id = $_GET['id'];
session_start();
if (destroy($id) > 0) {
  $_SESSION['message'] = "Data Berhasil di Hapus";
  $_SESSION['alert'] = "alert-success";
  echo "
  <script>
    // alert('Data Berhasil Dihapus')
    document.location.href = 'index.php'
  </script>
  ";
} else {
  $_SESSION['message'] = "Data Gagal di hapus";
  $_SESSION['alert'] = "alert-success";
  echo "
  <script>
    // alert('Data Berhasil Dihapus')
    document.location.href = 'index.php'
  </script>
  ";
}
