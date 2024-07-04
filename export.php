<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table tiket berdasarkan nim secara Descending
$siswa = query("SELECT * FROM tiket ORDER BY tanggal DESC");

// Membuat nama file
$filename = "data tiket fti-" . date('Ymd') . ".xls";

// export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama_Acara</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Harga</th>
            <th>Sisa Tiket</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($siswa as $row) : ?>
            <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_acara']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['waktu']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['sisa_tiket']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>