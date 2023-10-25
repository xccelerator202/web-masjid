<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['usermail'])){
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Header</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<div class="container">
    
    <div class="content">
    <h3>welcome!</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eveniet deleniti, sed illo quam, dicta corporis dolore aliquam, dignissimos delectus dolorum repellendus ab esse? Consequatur tempora enim recusandae vel laboriosam.</p>
    <p>E-mail Anda: <span><?php echo $_SESSION['usermail']; ?></span></p>
    <a href="logout.php" class="logout">logout</a>
    </div>

</div>

</body>
</html>