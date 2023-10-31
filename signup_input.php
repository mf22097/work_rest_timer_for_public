<?php session_start(); ?>
<?php require 'header.php' ?>
<h2>新規登録</h2>
<?php
$userName=$password='';
if (isset($_SESSION['customer'])){
    $userName=$_SESSION['customer']['userName'];
    $password=$_SESSION['customer']['password'];
}
echo 'パスワードは8文字以上で、英小文字、英大文字、数字を各一文字以上含めてください。';

echo '<form action="signup_output.php" method = "post">';
echo '<table>';
echo '<tr><td>ユーザー名</td><td>';
echo '<input type="text" name="userName" value="', $userName, '">';
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
?>

<?php require 'footer.php' ?>