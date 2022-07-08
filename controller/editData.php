<?php

include("../database/koneksi.php");

if (isset($_POST['editRelawan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $keahlian = $_POST['keahlian'];

    $sql = "UPDATE relawan SET name='$nama', alamat='$alamat', provinsi='$provinsi', email='$email', hp='$hp', keahlian='$keahlian' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: ../relawan.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
