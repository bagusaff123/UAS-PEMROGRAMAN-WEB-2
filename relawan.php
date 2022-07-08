<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Data Relawan</title>
</head>

<body>
    <?php include("database/koneksi.php"); ?>
    <h1 class="text-center">DATA RELAWAN</h1>
    <?php if (isset($_GET['status'])) : ?>
        <p>
            <?php
            if ($_GET['status'] == 'sukses') {
                echo "Pendaftaran baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
            ?>
        </p>
    <?php endif; ?>
    <div class="container">
        <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">no hp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Keahlian</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM relawan";
                $query = mysqli_query($db, $sql);
                $number = 1;
                while ($relawan = mysqli_fetch_array($query)) {
                    echo "<tr>";

                    echo "<td>" . $number . "</td>";
                    echo "<td>" . $relawan['name'] . "</td>";
                    echo "<td>" . $relawan['alamat'] . "</td>";
                    echo "<td>" . $relawan['provinsi'] . "</td>";
                    echo "<td>" . $relawan['hp'] . "</td>";
                    echo "<td>" . $relawan['email'] . "</td>";
                    echo "<td>" . $relawan['keahlian'] . "</td>";

                    echo "<td>";
                    echo "<a href='./editRelawan.php?id=" . $relawan['id'] . "'>Edit</a> | ";
                    echo "<a href='./controller/deleteData.php?id=" . $relawan['id'] . "'>Hapus</a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controller/addDataRelawan.php" method="POST">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
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
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="hp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Keahlian</label>
                            <input type="text" class="form-control" name="keahlian">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Tambah Data" name="tambahRelawan" />
                        </div>

                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
</body>

</html>