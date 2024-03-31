<?php
    require 'koneksi.php';

    // Pastikan formulir sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $no_hp = $_POST["no_hp"];
        $jumlah_pesenan = $_POST["jumlah_pesenan"];

        // Buat dan jalankan query SQL untuk memasukkan data ke database
        $query_sql = "INSERT INTO kopi (nama, email, no_hp, jumlah_pesenan) 
                    VALUES ('$nama','$email', '$no_hp', '$jumlah_pesenan')";

        if (mysqli_query($conn, $query_sql)) {
            // Jika pemasukan data berhasil, arahkan kembali ke halaman beranda
            header("Location: index.html");
            exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error
            echo "Pendaftaran Gagal : " . mysqli_error($conn);
        }
    } else {
        // Jika formulir tidak disubmit, tampilkan pesan kesalahan
        echo "<p>Maaf, terjadi kesalahan. Silakan coba lagi.</p>";
    }
?>
