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
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Data Absensi</h1>
      <div class="flex justify-between">
        <div class="">
            <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="add_data.php">+ Tambah</a></button>
            <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="dashboard.php">Dashboard Data</a></button>
        </div>
        <button class="bg-blue-500 p-2 my-2 rounded-md text-white hover:bg-blue-600"><a href="logout.php">← Logout</a></button>
      </div>

      <div class="bg-white shadow-md rounded overflow-hidden">
        <table class="min-w-full table-auto">
          <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <tr>
              <th class="py-3 px-4 text-left">Nama</th>
              <th class="py-3 px-4 text-left">Tanggal Masuk</th>
              <th class="py-3 px-4 text-left">Masuk</th>
              <th class="py-3 px-4 text-left">Keluar</th>
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
              <td class="py-3 px-4 text-left"><?= $data['nama']?></td>
              <td class="py-3 px-4 text-left"><?= $data['tanggal_absensi']?></td>
              <td class="py-3 px-4 text-left"><?= $data['jam_masuk']?></td>
              <td class="py-3 px-4 text-left"><?= $data['jam_pulang']?></td>
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
