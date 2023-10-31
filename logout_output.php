<!-- logout_output.php -->
<!-- logout_input.phpは存在しない。login_output.phpから繋がってる -->
<?php session_start(); ?>
<?php require 'header.php' ?>

<?php
if(isset($_SESSION['customer'])){
    unset($_SESSION['customer']);   //セッションを落とす
    echo 'ログアウトしました';
}else{
    echo 'すでにログアウトしています';
}
?>

<?php require 'footer.php' ?>