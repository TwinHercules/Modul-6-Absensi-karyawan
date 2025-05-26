<?php 
include 'connect.php';

session_start();

$succes = '';
$error = '';

if (!isset($_SESSION['username'])) {
  header('Location: Login.php');
} else {
  if (isset($_POST['submit'])) {
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $jk = $_POST['jk'];
  $departemen = $_POST['departemen'];
  $jabatan = $_POST['jabatan'];
  $asal = $_POST['asal'];
  $tanggal = $_POST['date'];
  $jamMasuk = $_POST['jam_masuk'];
  $jamKeluar = $_POST['jam_keluar'];

  if (empty($nip) || empty($nama) || empty($umur) || empty($jk) || empty($departemen) || empty($jabatan) || empty($asal) || empty($tanggal) || empty($jamMasuk) || empty($jamKeluar)) {
    $error = "Semua data wajib diisi sebelum absensi!";
  } else {
    $query = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES ('$nip', '$nama', '$umur', '$jk', '$departemen', '$jabatan', '$asal', '$tanggal', '$jamMasuk', '$jamKeluar')";

  mysqli_query($conn, $query);

  $succes = "Berhasil Absensi!";
} }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Presensi Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-100 min-h-screen">
    <div class="w-200 mx-auto p-6 mt-3 rounded shadow bg-yellow-300">
      <h1 class="text-2xl font-semibold my-3 text-gray-800 text-center">PRESENSI</h1>
    </div>
    <?php if (!empty($error)) : ?>
      <div class="w-200 mx-auto my-2 p-2 bg-red-500 rounded shadow text-white text-lg text-center">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <?php if (empty(!$succes)) : ?>
      <div class="w-200 mx-auto my-2 p-2 bg-green-500 rounded shadow text-center text-white text-lg ">
        <?= $succes ?>
      </div>
    <?php endif; ?>
    <div class="w-200 mx-auto my-2 bg-white rounded shadow">
      <form action="" method="post">
        <div class="flex">
          <div class="w-full">
            <div class="text-gray-800 p-2">
              <label for="" class="block">NIP</label>
              <input type="text" name="nip" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan NIP" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Nama</label>
              <input type="text" name="nama" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Nama" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Umur</label>
              <input type="text" name="umur" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Umur" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jenis Kelamis</label>
              <select name="jk" id="" class="border-b py-2 w-full focus:outline-none">
                <option value="" class="text-gray-800">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jam Masuk</label>
              <input type="time" name="jam_masuk" class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
          </div>
          <div class="w-full">
            <div class="text-gray-800 p-2">
              <label for="" class="block">Departemen</label>
              <input type="text" name="departemen" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Departemen" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jabatan</label>
              <input type="text" name="jabatan" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Jabatan" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Asal Kota</label>
              <input type="text" name="asal" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Asal Kota" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Tanggal Absensi</label>
              <input type="datetime-local" name="date" class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jam Kelaur</label>
              <input type="time" name="jam_keluar" class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
          </div>
        </div>
        <div class="flex justify-center">
          <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 p-2 rounded text-white m-2 w-30">PRESENT</button>
        </div>
      </form>
    </div>
    <div class="w-200 mx-auto my-2 bg-white rounded shadow">
      <div class="p-4 bg-yellow-300 text-right hover:bg-yellow-400 hover:text-white">
        <button><a href="logout.php">← Logout</a></button>
      </div>
    </div>
  </body>
</html>
