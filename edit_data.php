<?php
include 'connect.php';
$id =  $_GET['id'];
$sql = "SELECT * FROM karyawan_absensi WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jk'];
    $departemen = $_POST['departemen'];
    $jabatan = $_POST['jabatan'];
    $asal = $_POST['asal'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_pulang = $_POST['jam_keluar'];
    $date = $_POST['date'];

    $update = mysqli_query($conn, "UPDATE karyawan_absensi SET 
        nip='$nip',
        nama='$nama',
        umur='$umur',
        jenis_kelamin='$jk',
        departemen='$departemen',
        jabatan='$jabatan',
        kota_asal='$asal',
        jam_masuk='$jam_masuk',
        jam_pulang='$jam_pulang',
        tanggal_absensi='$date'
        WHERE id = $id
    ");
    if ($update) {
        header("Location: dashboard.php?message=updated");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-100 min-h-screen">
    <div class="w-200 mx-auto p-6 mt-3 rounded shadow bg-yellow-300">
      <h1 class="text-2xl font-semibold my-3 text-gray-800 text-center">Edit Data</h1>
    </div>
    <div class="w-200 mx-auto my-2 bg-white rounded shadow">
      <form action="" method="post">
        <div class="flex">
          <div class="w-full">
            <div class="text-gray-800 p-2">
              <label for="" class="block">NIP</label>
              <input type="text" name="nip" value="<?= $data['nip'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan NIP" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Nama</label>
              <input type="text" name="nama" value="<?= $data['nama'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Nama" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Umur</label>
              <input type="text" name="umur" value="<?= $data['umur'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Umur" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jenis Kelamis</label>
              <select name="jk" id="" class="border-b py-2 w-full focus:outline-none">
                <option value="" class="text-gray-800">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
              </select>
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jam Masuk</label>
              <input type="time" name="jam_masuk" value="<?= $data['jam_masuk'] ?>"  class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
          </div>
          <div class="w-full">
            <div class="text-gray-800 p-2">
              <label for="" class="block">Departemen</label>
              <input type="text" name="departemen" value="<?= $data['departemen'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Departemen" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jabatan</label>
              <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Jabatan" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Asal Kota</label>
              <input type="text" name="asal"  value="<?= $data['kota_asal'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="Masukkan Asal Kota" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Tanggal Absensi</label>
              <input type="datetime-local" name="date" value="<?= $data['tanggal_absensi'] ?>" class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
            <div class="text-gray-800 p-2">
              <label for="" class="block">Jam Keluar</label>
              <input type="time" name="jam_keluar" value="<?= $data['jam_pulang'] ?>"  class="border-b py-2 w-full focus:outline-none" placeholder="" />
            </div>
          </div>
        </div>
        <div class="flex justify-center">
          <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 p-2 rounded text-white m-2 w-30">CHANGE</button>
        </div>
      </form>
    </div>
    <div class="w-200 mx-auto my-2 bg-white rounded shadow">
      <div class="p-4 bg-yellow-300 text-right hover:bg-yellow-400 hover:text-white">
        <button><a href="dashboard.php">← Kembali</a></button>
      </div>
    </div>
  </body>
</html>
