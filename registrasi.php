<?php
include "connect.php";

if (isset($_POST["submit"])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: login.php"); 
    
  } else {
    echo "Gagal Registrasi";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-blue-400 min-h-screen">
    <div class="flex justify-center items-center">
      <div class="my-20 w-120 bg-white rounded-xl px-10 py-6">
        <h1 class="font-bold text-center text-4xl py-4">REGISTRASI</h1>
        <h2 class="border-b border-blue-300 text-center pb-3">Selamat datang di Registrasi Absensi Karyawan</h2>
        <form method="POST" action="">
          <div class="flex flex-col py-2">
            <label class="text-lg text-blue-600">Username Baru</label>
            <input
              type="text"
              name="username"
              placeholder="Username Baru"
              required
              class="py-2 border-b text-md focus:outline-none focus:border-b-2 focus:border-blue-600"
            />
          </div>
          <div class="flex flex-col py-2">
            <label class="text-lg text-blue-600">Password Baru</label>
            <input
              type="password"
              name="password"
              placeholder="Password Baru"
              required
              class="py-2 border-b text-md focus:outline-none focus:border-b-2 focus:border-blue-600"
            />
          </div>
          <button type="submit" name="submit" class="bg-blue-600 w-full my-2 p-2 rounded-xl text-white hover:bg-blue-700">Registrasi</button>
          <p class="text-center py-5">Sudah Punya Akun? <a href="login.php" class="text-blue-600 font-semibold hover:underline">Login</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
