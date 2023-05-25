<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Perpustakaan</title>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="file"] {
            padding: 5px;
            width: 300px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Form Input Data Perpustakaan</h1>

    <form action="proses_perpustakaan.php" method="GET">
        <label for="kode_buku">Kode Buku:</label>
        <input type="text" id="kode_buku" name="kode_buku" required><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" id="judul_buku" name="judul_buku" required><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" id="pengarang" name="pengarang" required><br>

        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" required><br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" id="tahun_terbit" name="tahun_terbit" required><br>

        <label for="cover_buku">Cover Buku:</label>
        <input type="file" id="cover_buku" name="cover_buku" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
