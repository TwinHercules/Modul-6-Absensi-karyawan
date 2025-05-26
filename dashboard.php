<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-10">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Data Karyawan</h1>
      <div class="flex justify-between">
        <div class="">
          <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="add_data.php">+ Tambah</a></button>
          <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="absensi.php">Dashboard Absensi</a></button>
        </div>
        
        <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="logout.php">← Logout</a></button>
      </div>
      
      <?php if (isset($_GET['message']) && $_GET['message'] == 'updated') : ?>
        <div class="min-w-full mx-auto px-4 py-2">
          <div class="bg-green-500 text-white text-center p-2 rounded-md shadow">
            Data berhasil diubah!
          </div>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['message']) && $_GET['message'] == 'deleted') : ?>
        <div class="min-w-full mx-auto px-4 py-2">
          <div class="bg-green-500 text-white text-center p-2 rounded-md shadow">
            Data berhasil dihapus!
          </div>
        </div>
      <?php endif; ?>

      <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <tr>
              <th class="py-3 px-4 text-left">NIP</th>
              <th class="py-3 px-4 text-left">Nama</th>
              <th class="py-3 px-4 text-left">Umur</th>
              <th class="py-3 px-4 text-left">Jenis Kelamin</th>
              <th class="py-3 px-4 text-left">Departemen</th>
              <th class="py-3 px-4 text-left">Jabatan</th>
              <th class="py-3 px-4 text-left">Asal</th>
              <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700 text-sm font-light">
            <?php
            include 'connect.php';

            $sql = mysqli_query($conn, "SELECT * FROM karyawan_absensi" );

            while ($data = mysqli_fetch_assoc($sql)) {
            
            ?>
            <tr class="border-b hover:bg-gray-100">
              <td class="py-3 px-4 text-left"><?= $data['nip']?></td>
              <td class="py-3 px-4 text-left"><?= $data['nama']?></td>
              <td class="py-3 px-4 text-left"><?= $data['umur']?></td>
              <td class="py-3 px-4 text-left"><?= $data['jenis_kelamin']?></td>
              <td class="py-3 px-4 text-left"><?= $data['departemen']?></td>
              <td class="py-3 px-4 text-left"><?= $data['jabatan']?></td>
              <td class="py-3 px-4 text-left"><?= $data['kota_asal']?></td>
              <td class="py-3 px-4 text-center">
                <div class="flex item-center justify-center space-x-2">
                  <button class="text-blue-500 hover:underline"><a href="edit_data.php?id=<?php echo $data["id"] ?>">Edit</a></button>
                  <button class="text-red-500 hover:underline"><a href="delete.php?id=<?php echo $data["id"] ?>">Hapus</a></button>
                </div>
              </td>
            </tr>
            <?php
            };
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
