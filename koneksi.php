<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'absensi_db';

$connect = mysqli_connect($host, $username, $password, $db);

if (!$connect) {
  echo mysqli_connect_errno();
}
