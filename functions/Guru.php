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
  $nip = htmlspecialchars($data['nip']);
  $nama_guru = htmlspecialchars($data['nama_guru']);
  $email = htmlspecialchars($data['email']);
  $jk = htmlspecialchars($data['jk']);
  $alamat = htmlspecialchars($data['alamat']);
  $password = password_hash($data['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO tb_guru VALUES('', '$nip','$nama_guru', '$email', '$jk','$alamat', '$password')";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function update($data)
{
  global $connect;
  $id =  $data['id'];
  $nip = htmlspecialchars($data['nip']);
  $nama_guru = htmlspecialchars($data['nama_guru']);
  $email = htmlspecialchars($data['email']);
  $jk = htmlspecialchars($data['jk']);
  $alamat = htmlspecialchars($data['alamat']);
  if ($data['password'] == '') {
    $query = "UPDATE tb_guru SET nip = $nip, nama_guru = '$nama_guru', email = '$email', jk = '$jk', alamat = '$alamat' WHERE id = $id ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
  }
  $password = password_hash($data['password'], PASSWORD_DEFAULT);

  $query = "UPDATE tb_guru SET nip = $nip, nama_guru = '$nama_guru', email = '$email', jk = '$jk', alamat = '$alamat', password = '$password' WHERE id = $id ";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function destroy($id)
{
  global $connect;
  mysqli_query($connect, "DELETE FROM tb_guru WHERE id = $id");

  return mysqli_affected_rows($connect);
}

function rekap_absen_guru($data)
{
  $tanggal = $data['tanggal'];
  $mapel = $data['mapel'];
  $kelas = $data['kelas'];
  $id_guru = $data['id'];
  $jadwal = query("SELECT * FROM tb_jadwal WHERE id_guru = '$id_guru' AND id_kelas = '$kelas' AND id_mapel = '$mapel'");
  if (!empty($jadwal)) {
    $id_jadwal = $jadwal[0]['id'];
    $hasil = query("SELECT tb_siswa.*, tb_absensi.* FROM tb_absensi 
    LEFT JOIN tb_siswa ON tb_siswa.id = tb_absensi.id_siswa
    WHERE tanggal = '$tanggal' AND id_jadwal = '$id_jadwal'");
    // var_dump($hasil);
    // var_dump($id_jadwal);
    // var_dump($tanggal);
    return $hasil;
  }
  $hasil = [];
  return $hasil;
}
