<?php

include("../database/koneksi.php");

if (isset($_POST['tambahRelawan'])) {

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $keahlian = $_POST['keahlian'];

    // buat query
    $sql = "INSERT INTO relawan (name, alamat, provinsi, email, hp, keahlian) VALUE ('$nama', '$alamat', '$provinsi', '$email', '$hp', '$keahlian')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ../relawan.php?status=sukses');
    } else {
        header('Location: ../relawan.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
