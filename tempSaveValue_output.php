<?php session_start(); ?>
<?php require 'header.php' ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=SECRET;charset=utf8', 'SECRET', 'SECRET');

if(isset($_SESSION['customer'])){
    $id = $_SESSION['customer']['id'];
    $userName = $_SESSION['customer']['userName'];
    $password = $_SESSION['customer']['password'];
    $totalWorkTime = $_SESSION['customer']['totalWorkTime'];
    $totalRestTime = $_SESSION['customer']['totalRestTime'];
}

//hh:mm:ssを秒に変換してから保存
$workTime = (int)$_REQUEST['workTimeHour'] * 3600 + (int)$_REQUEST['workTimeMin'] * 60 + (int)$_REQUEST['workTimeSec'];   //(int)は後の文字列をintに変換する役割
$restTime = (int)$_REQUEST['restTimeHour'] * 3600 + (int)$_REQUEST['restTimeMin'] * 60 + (int)$_REQUEST['restTimeSec'];    //動作確認済み

$totalWorkTime = $totalWorkTime + $workTime;
$totalRestTime = $totalRestTime + $restTime;

if(isset($_SESSION['customer'])){
        $sql=$pdo->prepare('update customer set totalWorkTime=?, totalRestTime=?, workTime=?, restTime=? where id=?');
        $sql->execute([$totalWorkTime, $totalRestTime, $workTime, $restTime, $id]);
        $_SESSION['customer']=['id'=>$id, 'userName'=>$userName, 'password'=>$password, 'totalWorkTime'=>$totalWorkTime, 'totalRestTime'=>$totalRestTime, 'workTime'=>$workTime, 'restTime'=>$restTime];
        echo '保存しました';
    }
?>

<?php require 'footer.php' ?>