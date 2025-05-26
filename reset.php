<?php
include 'connect.php';   
session_start();

if (!isset($_SESSION['reset'])) {
    header('Location: forget.php');
}

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $komfirmasi = $_POST['konfirmasi'];

    if ($password === $komfirmasi) {
        $username = $_SESSION['reset'];
        $acak_password = password_hash($password, PASSWORD_DEFAULT);

        $update = mysqli_query($conn, "UPDATE users SET password = '$acak_password' WHERE username = '$username'");

        if ($update) {
            $_SESSION['success'] = "Berhasil reset password";
            header("Location: login.php");
        } else {
            $error = "Gagal mengubah password!";
        }
    } else {
        $error = "Password dan Konfirmasi tidak valid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <label class="text-lg text-blue-600">Password Baru</label>
            <input
              type="password"
              name="password"
              placeholder="Masukkan Password Baru"
              required
              class="py-2 border-b text-md focus:outline-none focus:border-b-2 focus:border-blue-600"
            />
          </div>
          <div class="flex flex-col py-2">
            <label class="text-lg text-blue-600">Konfirmai Password Baru</label>
            <input
              type="password"
              name="konfirmasi"
              placeholder="Konfirmasi Password Baru"
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