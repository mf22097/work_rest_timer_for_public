<?php session_start(); ?>
<?php require 'header.php' ?>
<h2>自動保存はまだ開発中です(､  ._.)､</h2>
手入力でお願いします。<br>次回は入力した値からタイマーを開始できます。<br>
なお、前ページで「タイマーをリセット」を押しても、ここで保存した値は保管されます。<br><br>
<?php
$userName=$password='';
if (isset($_SESSION['customer'])){
    echo '<form action="tempSaveValue_output.php" method = "post">';
    echo '作業時間';
    echo '<input type = "number" max = "100000" min = "0" step = "1" name = "workTimeHour" value = "">';   //入力は数字。最大は59(hourでは適当に十万時間)。最小は0。最小単位は1。
    echo ':';
    echo '<input type = "number" max = "59" min = "0" step = "1" name = "workTimeMin" value="">';
    echo ':';
    echo '<input type = "number" max = "59" min = "0" step = "1" name = "workTimeSec" value="">';
    echo '<br>';
    
    echo '休憩時間';
    echo '<input type = "number" max = "100000" min = "0" step = "1" name = "restTimeHour" value = "">';
    echo ':';
    echo '<input type = "number" max = "59" min = "0" step = "1" name = "restTimeMin" value="">';
    echo ':';
    echo '<input type = "number" max = "59" min = "0" step = "1" name = "restTimeSec" value="">';
    echo '<br>';

    echo '<input type = "submit" value = "保存">';
    echo '</form>';
}else{
    echo '<h3>この機能はログイン後にご利用頂けます。</h3>';
}
//todo: 入力されたhhmmssのworkTimeとrestTimeを秒に変換


?>

<?php require 'footer.php' ?>