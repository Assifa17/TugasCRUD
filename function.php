<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_tiket");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nama_acara = htmlspecialchars($data['nama_acara']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $waktu = htmlspecialchars($data['waktu']);
    $harga = htmlspecialchars($data['harga']);
    $sisa_tiket = htmlspecialchars($data['sisa_tiket']);

    $sql = "INSERT INTO tiket(nama_acara, tanggal, waktu, harga, sisa_tiket) VALUES ('$nama_acara','$tanggal','$waktu','$harga','$sisa_tiket')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($tanggal)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM tiket WHERE tanggal = $tanggal");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nama_acara = htmlspecialchars($data['nama_acara']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $waktu = htmlspecialchars($data['waktu']);
    $harga = htmlspecialchars($data['harga']);
    $sisa_tiket = htmlspecialchars($data['sisa_tiket']);

    $sql = "UPDATE tiket SET nama_acara = '$nama_acara', waktu = '$waktu', harga = '$harga', sisa_tiket = '$sisa_tiket' WHERE tanggal = $tanggal";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

