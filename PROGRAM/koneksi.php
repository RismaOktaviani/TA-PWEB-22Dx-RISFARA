<?php

// Membuat koneksi
$koneksi = mysqli_connect("localhost", "root", "", "reservasi");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo("Koneksi gagal: " . mysqli_connect_error());
}
?>