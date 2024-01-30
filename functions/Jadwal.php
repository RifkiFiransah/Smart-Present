<?php

require_once "../koneksi.php";

function query($query)
{
  global $connect;
  $result = mysqli_query($connect, $query);
  $results = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $results[] = $row;
  }
  return $results;
}

function store($data)
{
  global $connect;
  $hari = htmlspecialchars($data['hari']);
  $mapel = htmlspecialchars($data['mapel']);
  $guru = htmlspecialchars($data['guru']);
  $kelas = htmlspecialchars($data['kelas']);
  $mulai = htmlspecialchars($data['mulai']);
  $selesai = htmlspecialchars($data['selesai']);

  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES('', '$hari', '$mapel', '$guru', '$kelas', '$mulai', '$selesai', '')");
  return mysqli_affected_rows($connect);
}

function update($data)
{
  global $connect;
  $id = $_GET['id'];
  $hari = htmlspecialchars($data['hari']);
  $mapel = htmlspecialchars($data['mapel']);
  $guru = htmlspecialchars($data['guru']);
  $kelas = htmlspecialchars($data['kelas']);
  $mulai = htmlspecialchars($data['mulai']);
  $selesai = htmlspecialchars($data['selesai']);
  mysqli_query($connect, "UPDATE tb_jadwal SET id_hari = '$hari', id_mapel = '$mapel', id_guru = '$guru', id_kelas = '$kelas', mulai = '$mulai', selesai = '$selesai' WHERE id = $id");
  return mysqli_affected_rows($connect);
}

function destroy($id)
{
  global $connect;
  mysqli_query($connect, "DELETE FROM tb_jadwal WHERE id = $id");
  return mysqli_affected_rows($connect);
}
