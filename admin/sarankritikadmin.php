<?php
// Koneksi ke database
include '../login/config.php';

if (isset($_GET['id'])) {
    $deleteId = $_GET['id'];

    // Menghapus akun dengan ID yang dipilih
    $deleteQuery = "DELETE FROM kritik_saran WHERE id = '$deleteId'";
    mysqli_query($conn, $deleteQuery);

    // Mengatur ulang ID agar sesuai dengan urutan
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $updateQuery = "UPDATE kritik_saran SET id = '$count' WHERE id = '$id'";
        mysqli_query($conn, $updateQuery);
        $count++;
    }
}

// Mendapatkan data kritik & saran dari tabel
$query = "SELECT * FROM kritik_saran";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kritik & Saran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/sarankritikadmin.css">

</head>

<body>
    <div class="container">
        <h1>Data Kritik & Saran</h1>

        <?php
        // Menampilkan data kritik & saran dalam tabel
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kritik & Saran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['kritik_saran'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "Tidak ada kritik & saran yang dikirim.";
        }

        // Menutup koneksi database
        mysqli_close($conn);
        ?>

    <!-- Button Kembali -->
    <div class="d-flex justify-content-start mt-4 align-items-end">
    <a href="admin.php" class="btn btn-primary">Kembali</a>
    </div>

    </div>

    

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLTm4+ERf6x5d06V5TIx0Kw6v1p0q4E1KaB9bi+R0d"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8kHp6Vl+NMq+eD6hjbOv4u4BaaN6E3d5o5y6v/DHDxrsjNN7xeOtF5Kt7CGI"
        crossorigin="anonymous"></script>

        
</body>

</html>
