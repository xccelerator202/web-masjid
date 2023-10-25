<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = ($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['usermail'] = $email;

        if($row['level'] === 'admin'){
            header('location: ../admin/admin.php');
            exit();
        }
        else{
            header('location: ../user/navbar/landing_page.php');
            exit();
        }
    }
    else{
        $error[] = 'Email/password salah!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>Masuk sekarang</h3>
        <?php
            if(isset($error)){
                foreach($error as $errorMsg){
                    echo '<span class="error-msg">'.$errorMsg.'</span>';
                }
            }
        ?>
        <input type="email" name="usermail" placeholder="Masukkan e-mail Anda" class="box" required>
        <input type="password" name="password" placeholder="Masukkan kata sandi" class="box" required>
        <input type="submit" value="Masuk" name="submit" class="form-btn">
        <p>Belum punya akun? <a href="register_form.php">Daftar sekarang</a></p>
    </form>

</div>

</body>
</html>
