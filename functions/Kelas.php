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
  $nama_kelas = htmlspecialchars($data['nama_kelas']);
  $category = htmlspecialchars($data['category']);

  mysqli_query($connect, "INSERT INTO tb_kelas VALUES('', '$nama_kelas', '$category')");

  return mysqli_affected_rows($connect);
}

function update($data)
{
  global $connect;
  $id = $data['id'];
  $nama_kelas = htmlspecialchars($data['nama_kelas']);
  $category = htmlspecialchars($data['category']);

  mysqli_query($connect, "UPDATE tb_kelas SET nama_kelas = '$nama_kelas', category = '$category' WHERE id = '$id'");

  return mysqli_affected_rows($connect);
}

function destroy($id)
{
  global $connect;
  mysqli_query($connect, "DELETE FROM tb_kelas WHERE id = $id");
  return mysqli_affected_rows($connect);
}
