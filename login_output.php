<!-- login_output.php -->
<!-- todo: ログイン後の画面だからトップ画面にしたい -->
<?php session_start(); ?><!-- セッションを開始。セッションIDあげたりするやつ。 -->
<?php require 'header.php' ?>

<?php
unset($_SESSION['customer']);   //他にログインしてる端末があれば落とす
$pdo=new PDO('mysql:host=localhost;dbname=SECRET;charset=utf8', 'SECRET', 'SECRET');
$sql=$pdo->prepare('select * from customer where userName=? and password=?');  //sql文を用意
$sql->execute([$_REQUEST['userName'], $_REQUEST['password']]);
foreach ($sql as $row){ //ユーザーネームとパスワードの組み合わせが見つかった場合はforeachループの内部が実行される。$_SESSION['customer']は配列
    $_SESSION['customer']=[ //変数$rowにはデータベースから取得した顧客テーブルの行が格納されている。例えば、顧客番号（id）は$row['id']という式で取得出来る。
        'id'=>$row['id'],
        'userName'=>$row['userName'],
        'password'=>$row['password'],
        'totalWorkTime'=>$row['totalWorkTime'],
        'totalRestTime'=>$row['totalRestTime'],
        'workTime'=>$row['workTime'],
        'restTime'=>$row['restTime']];
}

if (isset($_SESSION['customer'])){
    // echo 'おかえりなさい！', $_SESSION['customer']['userName'], 'さん';
    header('Location:work_rest_timer.php'); //トップページに飛ぶ
    exit;
}else{
    echo 'ログイン名またはパスワードが違います。';
    echo '<br>';
    echo '戻って再入力してください。';
    // これだけ表示するの物足りないというか不便感ある。理想は打った内容そのままで、上に「ログイン名またはパスワードが違います」を表示させる。
}
?>

<?php require 'footer.php' ?>