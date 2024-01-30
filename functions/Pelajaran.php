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
  $nama_mapel = htmlspecialchars($data['nama_mapel']);
  mysqli_query($connect, "INSERT INTO tb_mapel VALUES('', '$nama_mapel')");
  return mysqli_affected_rows($connect);
}

function update($data)
{
  global $connect;
  $id = $_GET['id'];
  $nama_mapel = htmlspecialchars($data['nama_mapel']);
  mysqli_query($connect, "UPDATE tb_mapel SET nama_mapel = '$nama_mapel' WHERE id = $id");
  return mysqli_affected_rows($connect);
}

function destroy($id)
{
  global $connect;
  mysqli_query($connect, "DELETE FROM tb_mapel WHERE id = $id");
  return mysqli_affected_rows($connect);
}
