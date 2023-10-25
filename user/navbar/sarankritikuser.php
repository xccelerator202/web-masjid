<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style_pelayanan.css">
    
    <title>Saran & Kritik</title>
  </head>
  <body>
   
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">Masjid Al Syakur</a> <!-- Nama Website -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto  ">
            <a class="nav-item nav-link active" href="landing_page.php">Beranda</a>
            <a class="nav-item nav-link" href="program.php">Program</a>
            <a class="nav-item nav-link" href="kepengurusan.php">Kepengurusan</a>
            <a class="nav-item nav-link" href="sarankritikuser.php">Saran & Kritik <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="tentang.php">Tentang</a>
            <a class="nav-item btn btn-primary tombol logout" href="../../login/logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </nav>


    <!-- Akhir Navigation Bar -->


    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Saran & Kritik <br><span> Web Masjid Al Syakur</span></h1>
      </div>
    </div>

    <!-- Akhir Jumbotron -->

    <?php
    // Memeriksa apakah tombol "Kirim" diklik
    if (isset($_POST['submit'])) {
        // Mengambil nilai inputan dari form
        $nama = $_POST['nama'];
        $kritik_saran = $_POST['kritik_saran'];

        // Koneksi ke database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "dbkeluarga";

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Menyimpan data ke dalam tabel kritik_saran
        $query = "INSERT INTO kritik_saran (nama, kritik_saran) VALUES ('$nama', '$kritik_saran')";
        if (mysqli_query($conn, $query)) {
            // Notifikasi bahwa data berhasil dikirim
            echo "<script>alert('Data berhasil dikirim.\\nTerima kasih atas saran dan kritikan Anda.');</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Menutup koneksi database
        mysqli_close($conn);
    }
    ?>

    <!-- SARAN & KRITIK -->
    <div class="container">
    <h1>Form Kritik & Saran</h1>
    <form id="kritikForm" action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
        </div>
        <div class="form-group">
            <label for="kritik_saran">Kritik & Saran</label>
            <textarea class="form-control" id="kritik_saran" name="kritik_saran" rows="5"
                placeholder="Tulis Kritik & Saran Anda" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-2">Kirim</button>
    </form>
    </div>





    <!-- Footer -->
    <div class="row footer">
      <div class="col text-center">
        <p>2023 Copyright@Jovan</p>
      </div>
    </div>











</body>

</html>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>