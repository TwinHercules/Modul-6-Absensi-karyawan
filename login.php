<?php
include 'connect.php';

session_start();

$success = '';
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $error = '';

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user["password"])) {
      if ($user["username"] === "AdminAbsen") {
        $_SESSION["username"] = $user["username"];
        header("Location: dashboard.php");
      } else {
        $_SESSION["username"] = $user["username"];
        header("Location: index.php");
      }
    } else {
      $error = "Password salah!";
    }
  } else {
    $error = "Username tidak ditemukan!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-blue-400 min-h-screen">
    <div class="flex justify-center items-center">
      <div class="my-20 w-120 bg-white rounded-xl">
        <h1 class="font-bold text-center text-4xl py-4">LOGIN</h1>
        <h2 class="border-b border-blue-300 text-center pb-3">Selamat datang di Absensi Karyawan</h2>
        <div class="mx-8">
          <?php if (!empty($success)) : ?>
            <div class="bg-green-600 text-white my-1 text-center p-2 rounded-md mb-4">
              <?= $success ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($error)) : ?>
            <div class="bg-red-100 text-red-700 text-center p-2 rounded-md mb-4">
              <?= $error ?>
            </div>
          <?php endif; ?>
          <form action="" method="POST">
            <div class="flex flex-col py-2">
              <label for="" class="text-lg text-blue-600">Username</label>
              <input type="text" placeholder="Username" name="username" class="py-2 border-b text-md focus:outline-none focus:border-b focus:ring-0" />
            </div>
            <div class="flex flex-col py-2">
              <label for="" class="text-lg text-blue-600">Password</label>
              <input type="password" placeholder="Password" name="password" class="py-2 border-b text-md focus:outline-none focus:border-b focus:ring-0" />
            </div>
            <div class="py-5 text-gray-500">
              <p><a href="forget.php">Lupa Password?</a></p>
            </div>
            <button type="submit" name="submit" class="bg-blue-600 w-full my-2 p-2 rounded-xl text-white">Login</button>
            <p class="text-center py-5">
              Belum Punya Akun? <span class="text-blue-600"><a href="registrasi.php" class="font-bold hover:underline">Daftar</a></span>
            </p>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
