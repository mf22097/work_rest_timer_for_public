<!-- login_input.php -->
<?php session_start(); ?>
<?php require 'header.php' ?>

<?php
    $userName=$password='';
    if (isset($_SESSION['customer'])){
        echo 'ログイン済みです';
    }else{
        echo '<form action="login_output.php" method = "post">';
        echo '<table>';
        echo '<tr><td>ユーザー名</td><td>';
        echo '<input type="text" name="userName" value="', $userName, '">';
        echo '<tr><td>パスワード</td><td>';
        echo '<input type="password" name="password" value="', $password, '">';
        echo '</td></tr>';
        echo '</table>';
        echo '<input type="submit" value="確定">';
        echo '<br><br><br>';
        echo '<a href="signup_input.php">新規登録はコチラ</a>';
    }

?>

<!-- <form action = "login_output.php" method = "post">
    ログイン名<input type = "text" name = "userName"><br>
    パスワード<input type = "password" name = "password"><br>
    <input type = "submit" value = "ログイン">
</form> -->
<br>

<?php require 'footer.php' ?>