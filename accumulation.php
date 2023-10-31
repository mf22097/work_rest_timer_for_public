<?php session_start(); ?>   <!-- セッションスタート。ログイン機能とかmysqlへのアクセスができるようになる -->
<?php require 'header.php' ?>

<br><br>

<?php 
    $workTime=$restTime=$totalWorkTime=$totalRestTime='';
    if(isset($_SESSION['customer'])){
        require 'accumulationTable.php';
    }else{
        echo "この機能はログイン後ご利用頂けます";
    }
?>

<?php require 'footer.php' ?>