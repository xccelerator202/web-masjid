  <?php 
    include '../login/config.php'
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
      <link rel="stylesheet" href="css/admin.css">

      <title>Edit Data Akun</title>
    </head>
    <body>
    <div class="container">
      <div class="d-flex justify-content-center">
      <h1>Edit Data Akun</h1>
      </div>

    <div class="container">
        <?php
          $_id = $_GET['id'];
          $query = "SELECT * from user_form WHERE id = $_id ";
          $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_row($result)){
                ?>
                <form action="" method="post">
                  <div class="form-group row">
                      <label for="id" class="col-sm-2 col-form-label">ID</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['0'] ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['1'] ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="pass" value="<?php echo $row['2'] ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="level" class="col-sm-2 col-form-label">Level</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="level" name="level" value="<?php echo $row['3'] ?>">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-10 offset-sm-2">
                          <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                      </div>
                  </div>
                </form>


                  <?php 
                  if(isset($_POST['submit'])){
                      if(mysqli_query($conn, "UPDATE user_form SET 
                      id = '$_POST[id]',
                      email = '$_POST[email]',
                      password = '$_POST[pass]',
                      level = '$_POST[level]'
                      WHERE id ='$_id';
                      ")){
                          echo '<script>
                                  alert("Data berhasil diubah"); 
                                  window.location.href = "kelolaakun.php";
                                  </script>';
                      }else{
                          echo "Failed";
                          header('location:edit.php');
                      }
                  }


              }?>
      
    </div>
    <div class="d-flex justify-content-start mt-4 align-items-end">
    <a href="kelolaakun.php" class="btn btn-primary">Kembali</a>
  </div>

      

      

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
  </html>