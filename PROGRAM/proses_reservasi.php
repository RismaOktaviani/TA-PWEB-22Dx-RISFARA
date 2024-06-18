<?php
    // Koneksi ke database
    include 'koneksi.php';

    // Memeriksa apakah data dari form sudah dikirim sebelum menampilkan informasi reservasi
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
    $waktu = isset($_POST['waktu']) ? $_POST['waktu'] : '';
    $jumlah_orang = isset($_POST['jumlah_orang']) ? $_POST['jumlah_orang'] : '';
    $pesan_tambahan = isset($_POST['pesan_tambahan']) ? $_POST['pesan_tambahan'] : '';

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO tbl_reservasi (nama, tanggal, waktu, jumlah_orang, pesan_tambahan) VALUES ('$nama', '$tanggal', '$waktu', '$jumlah_orang', '$pesan_tambahan')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil disimpan, tampilkan informasi reservasi
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head
          <meta charset='UTF-8'>
          <title>Reservasi Diterima</title>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        </head>
        <body>
          <div class='container mt-5'>
            <h1>Informasi Reservasi yang Diterima</h1>
            <table class='table  table-striped'>
              <tr>
                <th>Nama</th>
                <td>$nama</td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td>$tanggal</td>
              </tr>
              <tr>
                <th>Waktu</th>
                <td>$waktu</td>
              </tr>
              <tr>
                <th>Jumlah Orang</th>
                <td>$jumlah_orang</td>
              </tr>
              <tr>
                <th>Pesan Tambahan</th>
                <td>$pesan_tambahan</td>
              </tr>
            </table>
          </div>

          <!-- Scripts Bootstrap -->
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
        </body>
        </html>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi
    mysqli_close($koneksi);
?>
