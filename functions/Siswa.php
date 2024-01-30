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

function store($data)
{
  global $connect;
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $nis = htmlspecialchars($data['nis']);
  $jk = htmlspecialchars($data['jk']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $id_kelas = htmlspecialchars($data['id_kelas']);
  $password = mysqli_escape_string($connect, $data['password']);
  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO tb_siswa VALUES('', '$nis', '$nama', '$email', '$jk', '$telp', '$alamat', '$password', '$id_kelas')";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function update($data)
{
  global $connect;
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $nis = htmlspecialchars($data['nis']);
  $jk = htmlspecialchars($data['jk']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $id_kelas = htmlspecialchars($data['id_kelas']);
  if ($data['password'] == '') {
    $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', email = '$email', jk = '$jk', telp = '$telp', alamat = '$alamat', id_kelas = '$id_kelas' WHERE id = $id ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
  }
  $password = mysqli_escape_string($connect, $data['password']);
  $password_baru = password_hash($password, PASSWORD_DEFAULT);

  $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', email = '$email', jk = '$jk', telp = '$telp', alamat = '$alamat', id_kelas = '$id_kelas', password = '$password_baru' WHERE id = $id ";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function destroy($id)
{
  global $connect;
  mysqli_query($connect, "DELETE FROM tb_siswa WHERE id = $id");
  return mysqli_affected_rows($connect);
}


function absen($data)
{
  global $connect;
  // setlocale(LC_ALL, 'id-ID', 'id-ID');
  // $hari = strftime('%A,' . $date);
  $hari = date('Y-m-d');
  $jadwal = $data['id_jadwal'];
  $siswa = $data['id_siswa'];
  $keterangan = $data['keterangan'];
  mysqli_query($connect, "INSERT INTO tb_absensi VALUES('', '$siswa', '$jadwal', '$hari', '$keterangan')");
  return mysqli_affected_rows($connect);
}

function rekap_absen($data)
{
  global $connect;
  $id = $data['id'];
  $mapel = $data['mapel'];
  $kelas = query("SELECT * FROM tb_siswa WHERE id = '$id'")[0];
  $id_kelas = $kelas['id_kelas'];
  $jadwal = mysqli_query($connect, "SELECT *  FROM tb_jadwal WHERE id_mapel = '$mapel' AND id_kelas = '$id_kelas'");
  $jadwal = mysqli_fetch_assoc($jadwal);
  $id_jadwal = $jadwal['id'];
  $absen = query("SELECT tb_absensi.*, tb_siswa.nama 
  FROM tb_absensi LEFT JOIN tb_siswa ON tb_siswa.id=tb_absensi.id_siswa 
  WHERE id_siswa = '$id' AND id_jadwal = '$id_jadwal'");
  return $absen;
}
