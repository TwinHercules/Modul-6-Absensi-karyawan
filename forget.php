<?php
include 'connect.php';
session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($query) > 0) {
    $_SESSION['reset'] = $username;
    header('Location: reset.php');
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
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-blue-400 min-h-screen">
    <div class="flex justify-center items-center">
      <div class="my-20 w-120 bg-white rounded-xl px-10 py-6">
        <h1 class="font-bold text-center text-4xl py-4">RESET PASSWORD</h1>
        <h2 class="border-b border-blue-300 text-center pb-3">Selamat datang di Reset Rassword Absensi Karyawan</h2>

        <?php if (isset($error)) : ?>
          <div class="bg-red-500 rounded my-1 text-white p-2 text-sm text-center mb-3"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
          <div class="flex flex-col py-2">
            <label class="text-lg text-blue-600">Username</label>
            <input
              type="text"
              name="username"
              placeholder="Masukkan Username"
              required
              class="py-2 border-b text-md focus:outline-none focus:border-b-2 focus:border-blue-600"
            />
          </div>
          <button type="submit" name="submit" class="bg-blue-600 w-full my-2 p-2 rounded-xl text-white hover:bg-blue-700">Continue</button>
          <p class="text-center py-5">Sudah Punya Akun? <a href="login.php" class="text-blue-600 font-semibold hover:underline">Login</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
