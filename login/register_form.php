<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = ($_POST['password']);
    $cpass = ($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' &&  password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)> 0){
        $error[] = 'Akun sudah digunakan';
    }
    else
    {
        if($pass != $cpass){
            $error[] = 'password tidak sesuai!';
        }
        else
        {
            // Mengambil ID terakhir dari tabel user_form
            $lastIdQuery = "SELECT MAX(id) AS last_id FROM user_form";
            $lastIdResult = mysqli_query($conn, $lastIdQuery);
            $lastIdRow = mysqli_fetch_assoc($lastIdResult);
            $lastId = $lastIdRow['last_id'];

            // Menambahkan akun baru dengan ID yang sesuai
            $newId = $lastId + 1;
            $insert = "INSERT INTO user_form(id, email, password) VALUES ('$newId', '$email', '$pass')";
            mysqli_query($conn, $insert);
            header('location: login_form.php');
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Register</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>Daftar sekarang</h3>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class=""error-msg">'.$error.'</span>';
                }
            }
        ?>
        <input type="email" name="usermail" placeholder="Masukkan e-mail Anda" class="box" required>
        <input type="password" name="password" placeholder="Masukkan kata sandi" class="box" required>
        <input type="password" name="cpassword" placeholder="Konfirmasi kata sandi" class="box" required>
        <input type="submit" value="Daftar" name="submit" class="form-btn">
        <p>Sudah punya akun? <a href="login_form.php">Masuk sekarang</a></p>
    </form>

</div>

</body>
</html>