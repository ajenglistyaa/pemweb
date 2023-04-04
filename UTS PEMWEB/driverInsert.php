<?php
include ('connection.php');

// Cek jika form telah di-submit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    // Query ke database
    $sql = "INSERT INTO driver (id_driver,nama, no_sim, alamat) VALUES ('$nama', '$no_sim', '$alamat')";
    $result = mysqli_query($conn, $sql);

    // Cek jika query berhasil dijalankan
    if ($result) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>UTS Program CRUD PHP</title>
</head>
<body>
    <h1>Tambah Data Driver</h1>

    <form method="POST">
        Id Driver: <input type="text" name="id_driver"><br>
        Nama: <input type="text" name="nama"><br>
        No. SIM: <input type="text" name="no_sim"><br>
        Alamat: <textarea name="alamat"></textarea><br>
        <input type="submit" name="submit" value="Tambahkan">
    </form>
</body>
</html>
