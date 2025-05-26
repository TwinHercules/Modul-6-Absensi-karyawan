# Modul-6-Absensi-karyawan
$query = "INSERT INTO karyawan_absensi (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal, tanggal_absensi, jam_masuk, jam_pulang) VALUES ('$nip', '$nama', '$umur', '$jk', '$departemen', '$jabatan', '$asal', '$tanggal', '$jamMasuk', '$jamKeluar')";

mysqli_query($conn, $query); // Gunanya ini suntuk eksekusi query agar bisa masuk ke database

<?php
include 'connect.php';

session_start();
session_destroy(); // gunanya untuk  mengahpsu smeua data session
header('Location: login.php');

?>

$username = htmlspecialchars($_POST["username"]); // untuk keamanan agar terhindar dari seranagan xxs

1. GET
Apa itu?
Metode pengiriman data lewat URL pada HTTP. Data dikirim sebagai bagian query string di URL.
Contoh penggunaan:
example.com/page.php?id=123&name=andi
Karakteristik:
Data terlihat di URL (tidak aman untuk data sensitif).
Terbatas ukuran data (tergantung browser).
Biasanya untuk mengambil data atau navigasi.
Kapan digunakan?
Saat ingin mengirim data yang tidak sensitif, contohnya: pencarian, filter, atau link dengan parameter.

3. POST
Apa itu?
Metode pengiriman data lewat HTTP dengan cara menyembunyikan data di dalam body request.
Karakteristik:
Data tidak terlihat di URL (lebih aman dari GET).
Bisa mengirim data dalam jumlah besar.
Umumnya digunakan untuk mengirim data ke server, seperti submit form, login, registrasi, upload.
Kapan digunakan?
Saat mengirim data yang sensitif (password, data pribadi).
Saat data yang dikirim banyak atau kompleks.

3. SESSION
Apa itu?
Cara menyimpan data sementara di server untuk setiap pengguna yang terhubung.
Karakteristik:
Data disimpan di server, unik untuk tiap user.
Bisa menyimpan info login, preferensi, status user selama browsing.
Kapan digunakan?
Untuk menyimpan status login.
Menyimpan data yang harus bertahan selama user buka halaman web.
Contoh: menyimpan username setelah login agar user tidak perlu login terus-menerus.

4. isset()
Apa itu?
Fungsi PHP untuk memeriksa apakah sebuah variabel sudah di-set dan tidak null.
Karakteristik:
Mengembalikan true jika variabel ada dan tidak null.
Menghindari error saat akses variabel yang belum ada.
Kapan digunakan?
Saat ingin cek apakah form sudah di-submit (misal: if(isset($_POST['submit']))).
Saat ingin memeriksa apakah variabel sudah ada sebelum digunakan.
