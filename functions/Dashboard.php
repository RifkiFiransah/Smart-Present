<?php
require_once '../koneksi.php';

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

function count_data($query)
{
  global $connect;
  $data = mysqli_query($connect, $query);
  return mysqli_num_rows($data);
}
