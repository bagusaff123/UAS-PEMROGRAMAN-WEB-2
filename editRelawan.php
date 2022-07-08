<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Edit Data</title>
</head>

<body>
    <div class="container">
        <h1>Edit Data</h1>
        <?php include("database/koneksi.php"); ?>
        <?php


        if (!isset($_GET['id'])) {
            header('Location: ./relawan.php');
        }

        //ambil id dari query string
        $id = $_GET['id'];

        // buat query untuk ambil data dari database
        $sql = "SELECT * FROM relawan WHERE id=$id";
        $query = mysqli_query($db, $sql);
        $relawan = mysqli_fetch_assoc($query);

        // jika data yang di-edit tidak ditemukan
        if (mysqli_num_rows($query) < 1) {
            die("data tidak ditemukan...");
        }

        ?>
        <form action="controller/editData.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $relawan['id'] ?>" />
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $relawan['name'] ?>" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo $relawan['alamat'] ?>" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Provinsi</label>
                        <select name="provinsi" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih Provinsi</option>
                            <?php
                            $sql = "SELECT * FROM provinsi";
                            $query = mysqli_query($db, $sql);
                            while ($provinsi = mysqli_fetch_array($query)) {
                                echo "<option value='" . $provinsi['provinsi'] . "'>" . $provinsi['provinsi'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $relawan['email'] ?>" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" class="form-control" value="<?php echo $relawan['hp'] ?>" name="hp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keahlian</label>
                        <input type="text" class="form-control" value="<?php echo $relawan['keahlian'] ?>" name="keahlian">
                    </div>

                    <input type="submit" value="Tambah Data" class="btn btn-primary" name="editRelawan" />
                </div>
            </div>

        </form>
    </div>
</body>

</html>