<?php 
  include '../login/config.php';

  session_start();

if (isset($_GET['id'])) {
    $deleteId = $_GET['id'];

    // Menghapus akun dengan ID yang dipilih
    $deleteQuery = "DELETE FROM user_form WHERE id = '$deleteId'";
    mysqli_query($conn, $deleteQuery);

    // Mengambil semua data akun setelah penghapusan
    $selectQuery = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $selectQuery);

    // Mengatur ulang ID agar sesuai dengan urutan
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $updateQuery = "UPDATE user_form SET id = '$count' WHERE id = '$id'";
        mysqli_query($conn, $updateQuery);
        $count++;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/kelolaakun.css">

    <title>Kelola Akun</title>
  </head>
  <body>
  <div class="container">
    <div class="d-flex justify-content-center">
    <h1>Kelola Akun</h1>
    </div>

  <div class="container">
      <?php
        $query = "SELECT * from user_form";
        $result = mysqli_query($conn,$query);

        if ($result) {
          ?>

          <table class="table table-striped">
            <tr> 
              <th>ID</th>
              <th>Email</th>
              <th>Password</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
            <?php
            while($row = mysqli_fetch_row($result)){
              ?>
              <tr>
                <?php 
                $id = $row[0];
                $email = $row[1];
                $pw = $row[2];
                $lvl = $row[3];?>
                <td><?php echo $id ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $pw ?></td>
                <td><?php echo $lvl ?></td>
                <td>
                
                <!-- Fitur Edit Akun -->
                <a href="edit.php?id=<?php echo $id ?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-fill"></i> Edit
                </a>
                
                <!-- Fitur Delete Akun -->
                <a href="delete.php?id=<?php echo $id ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');" class="btn btn-danger btn-sm">
                <i class="bi bi-trash-fill"></i> Delete
              </a>
                </td>
              </tr><?php
            }?>
          </table>
  </div>
        <?php
        } ?>

    
  <!-- Fitur Kembali Ke Halaman Sebelumnya -->
  <div class="d-flex justify-content-start mt-4 align-items-end">
    <a href="admin.php" class="btn btn-primary">Kembali</a>
  </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>