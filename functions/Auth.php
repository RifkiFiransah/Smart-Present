<?php

require_once "./koneksi.php";

function register($data)
{
  global $connect;
  $nama = mysqli_escape_string($connect, htmlspecialchars($data['nama']));
  $username = mysqli_escape_string($connect, htmlspecialchars($data['username']));
  $email = mysqli_escape_string($connect, htmlspecialchars($data['email']));
  $password = password_hash($data['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO tb_admin VALUES('', '$nama', '$username', '$email', '$password')";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function login_admin($data)
{
  // session_start();
  global $connect;
  $email = mysqli_escape_string($connect, htmlspecialchars($data['email']));
  $password = mysqli_escape_string($connect, $data['password']);

  $cek_email = mysqli_query($connect, "SELECT * FROM tb_admin WHERE email = '$email'");
  if (mysqli_num_rows($cek_email)) {
    $data = mysqli_fetch_assoc($cek_email);
    if (password_verify($password, $data['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['role'] = 'admin';
      return true;
    } else {
      return false;
    }
  }
  return false;
}

function login($data)
{
  global $connect;
  // session_start();
  $nomor_induk = mysqli_escape_string($connect, htmlspecialchars($data['nomor_induk']));
  $password = mysqli_escape_string($connect, $data['password']);

  $cek_siswa = mysqli_query($connect, "SELECT * FROM tb_siswa WHERE nis = $nomor_induk");
  $cek_guru = mysqli_query($connect, "SELECT * FROM tb_guru WHERE nip = $nomor_induk");

  if (mysqli_num_rows($cek_siswa)) {
    $data = mysqli_fetch_assoc($cek_siswa);
    if (password_verify($password, $data['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['role'] = 'siswa';
      return true;
    }
  } else if (mysqli_num_rows($cek_guru)) {
    $data = mysqli_fetch_assoc($cek_guru);
    if (password_verify($password, $data['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['nama'] = $data['nama_guru'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['role'] = 'guru';
      return true;
    }
  }
  return false;
}
