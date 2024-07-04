<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika Data tiket diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data tiket dari tanggal 
    $sql = "SELECT * FROM tiket WHERE tanggal = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                       
                         <tr>
                            <th width="40%">Nama Acara</th>
                            <td width="60%">' . $row['nama_acara'] . '</td>
                        </tr>
                         <tr>
                            <th width="40%">Tanggal</th>
                            <td width="60%">' . $row['tanggal'] . '</td>
                        </tr>
                        <tr>s
                            <th width="40%">Waktu</th>
                            <td width="60%">' . $row['waktu'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Harga</th>
                            <td width="60%">' . $row['harga'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Sisa Tiket</th>
                            <td width="60%">' . $row['sisa_tiket'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
