<?php 
include 'connect.php';

session_start();

$succes = '';
$error = '';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
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

  $succes = "Berhasil menambhakan data!";
  
} }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Data</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-100 min-h-screen">
    <div class="w-200 mx-auto mt-10 bg-white p-6 rounded shadow">
      <h1 class="text-2xl font-semibold mb-6 text-gray-800 text-center">TAMBAHKAN DATA KARYAWAN</h1>
      <?php if (!empty($error)) : ?>
        <div class="win-w-full mx-auto my-2 p-2 bg-red-500 rounded shadow text-white text-lg text-center">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <?php if (empty(!$succes)) : ?>
        <div class="min-w-full mx-auto my-2 p-2 bg-green-500 rounded shadow text-center text-white text-lg ">
          <?= $succes ?>
        </div>
      <?php endif; ?>
      <form action="" method="POST">
        <div class="flex gap-8">
          <div class="w-full">
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">NIP</label>
              <input
                type="text"
                name="nip"
                placeholder="Masukkan NIP"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Nama</label>
              <input
                type="text"
                name="nama"
                placeholder="Masukkan Nama"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Umur</label>
              <input
                type="text"
                name="umur"
                placeholder="Masukkan Umur"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block">Jenis Kelamis</label>
              <select name="jk" id="" class="border rounded p-2 w-full focus:outline-none">
                <option value="" class="text-gray-800">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Departemen</label>
              <input
                type="text"
                name="departemen"
                placeholder="Masukkan Departemen"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>
          <div class="w-full">
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Jabatan</label>
              <input
                type="text"
                name="jabatan"
                placeholder="Masukkan Jabatan"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Asal</label>
              <input
                type="text"
                name="asal"
                placeholder="Masukkan Asal"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Tanggal Absensi</label>
              <input
                type="datetime-local"
                name="date"
                placeholder="Masukkan Tanggal Absensi"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Jam Masuk</label>
              <input
                type="time"
                name="jam_masuk"
                placeholder="Masukkan Jam Masuk"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <div class="mb-4">
              <label for="" class="block text-sm text-gray-700 mb-1">Jam Pulang</label>
              <input
                type="time"
                name="jam_keluar"
                placeholder="Masukkan Jam Pulang"
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>
        </div>
        <div class="flex justify-between">
          <button type="submit" name="submit" class="bg-green-500 p-2 rounded-md text-white hover:bg-green-600">Tambahkan</button>
          <a href="dashboard.php" class="text-gray-600 hover:underline self-center">← Kembali</a>
        </div>
      </form>
    </div>
  </body>
</html>
