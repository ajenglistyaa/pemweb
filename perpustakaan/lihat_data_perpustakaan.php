<?php
if ($_GET) {
    // Mendapatkan nilai yang dikirim melalui metode GET
    $kode_buku = $_GET['kode_buku'];
    $judul_buku = $_GET['judul_buku'];
    $pengarang = $_GET['pengarang'];
    $penerbit = $_GET['penerbit'];
    $tahun_terbit = $_GET['tahun_terbit'];
    $cover_buku = $_GET['cover_buku'];

    // Membentuk baris data dalam format CSV
    $data = $kode_buku . ',' . $judul_buku . ',' . $pengarang . ',' . $penerbit . ',' . $tahun_terbit . ',' . $cover_buku . PHP_EOL;

    // Menyimpan data ke dalam file
    $file = 'data_perpustakaan.txt';
    if (file_put_contents($file, $data, FILE_APPEND) !== false) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Data gagal disimpan.";
    }

}
?>
