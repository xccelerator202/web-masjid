<?php 
    include '../login/config.php';
    $id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM user_form where id='$id';");
    header('location:kelolaakun.php');
?>