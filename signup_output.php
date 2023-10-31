<?php session_start(); ?>
<?php require 'header.php' ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=SECRET;charset=utf8', 'SECRET', 'SECRET');
// まず指定されたログイン名が既に使われているか調べる
if (isset($_SESSION['customer'])){  //今ログインしている場合（セッションがクライアントに与えられている？場合）
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from customer where id!=? and userName=?');    //「！＝」はノットイコール
    $sql->execute([$_REQUEST['userName']]);
}else { //ログインしていない場合
    $sql=$pdo->prepare('select * from customer where userName=?');
    $sql->execute([$_REQUEST['userName']]);
}
if(empty($sql->fetchAll())){    //検索結果が空ならば（指定されたログイン名が使われていないならば）。なお、fetchAllは検索結果の取得を行っている（検索結果は配列で返す）。
    if(isset($_SESSION['customer'])){   //ログイン済みならば。
        $sql=$pdo->prepare('update customer set userName=?, password=? where id=?');
        $sql->execute([$_REQUEST['userName'], $_REQUEST['password'], $id]);
        $_SESSION['customer']=['id'=>$id, 'userName'=>$_REQUEST['userName'], 'password'=>$_REQUEST['password']];
        echo 'ユーザ情報を更新しました';
    }else{  //（ログイン名使われてなくて）未ログインならば
        //パスワードが適切かどうかも調べる
        $password = $_REQUEST['password'];
        if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/',$password)){   //パスワードが条件を満たしてるなら
            $sql=$pdo->prepare('insert into customer values(null,?,?,0,0,0,0)');
            $sql->execute([$_REQUEST['userName'], $_REQUEST['password']]);
            echo '登録が完了しました。ログイン後すべての機能がご利用頂けます。';
            echo '<br><br>';
            echo '<a href="login_input.php">ログインはコチラ</a>';
        }else{
            echo 'パスワードが条件を満たしていません';
        }
    }
}else{  //検索結果が空でなければ（指定されたログイン名が使われていたら）
        echo 'ユーザ名がすでに使われています';
    }


?>
<?php require 'footer.php' ?>