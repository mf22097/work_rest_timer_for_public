<!--work_rest_timer.php-->
<?php session_start(); ?>   <!-- セッションスタート。ログイン機能とかmysqlへのアクセスができるようになる -->
<?php require 'header.php' ?>
<div id = all>
    <?php 
        $workTime=$restTime='';
        if(isset($_SESSION['customer'])){
            $workTime=$_SESSION['customer']['workTime'];
            $restTime=$_SESSION['customer']['restTime'];
        }else{
            $workTime=$restTime="00:00:00";
        }
        // todo: 後でtotalWorkTimeたちも引っ張ってくることになるかも
    ?>

    <script>
        let workTimeCalc = '<?php echo $workTime; ?>';    //「外部ファイルの」JavaScriptにPHPから変数渡すときはこれ必要ならしい。同じコード内だとまた別の方法
        let restTimeCalc = '<?php echo $restTime; ?>';
    </script>

    <?php 
        if(isset($_SESSION['customer'])){
            $workTime=gmdate("H:i:s", $workTime);       //表記をhh:mm:ssに変更
            $restTime=gmdate("H:i:s", $restTime);
        }
    ?>

    <!-- todo: 改行を直す。休憩時間と平行に表示する -->
    <div id = timeBlock>
        <div id = workTimeBlock>
            <p>作業時間</p>
            <div id = "workTime"><?php echo $workTime; ?></div> <!-- ページ読み込み時（最初）のみ前回の作業時間を引き継ぎ。 -->
        </div>

        <div class="toggle_button">
            <input id="toggle" class="toggle_input" type='checkbox'>  <!--最後についてた/消した。（一個下も）-->
            <label for="toggle" class="toggle_label"> <!--トグルスイッチが押されたときに見た目を変えるために書かれてる（のかも）-->
        </div> 
        
        <div id = restTimeBlock>
            <p>休憩時間</p>
            <div id = "restTime"><?php echo $restTime; ?></div>
        </div>
    </div>

    <div id = buttons>
        <input type = "button" value = "開始" id = "startBtn">
        <input type = "button" value = "一時停止" id = "stopBtn">
        <input type = "button" value = "タイマーをリセット" id = "clearBtn">  <!-- 元リセットボタン -->
        <!-- todo: 「保存して終了」ボタンの実装 -->
        <button><a href="tempSaveValue_input.php" target="_blank" rel="noopener noreferrer">タイマーを保存</a></button>
    </div>

    <br>

    <div id = loginStatus>
        <?php
            if (isset($_SESSION['customer'])){
                echo $_SESSION['customer']['userName'], 'さんでログイン中';
            }else{
                echo '現在ログインしていません';
            }
        ?>
    </div>
</div>
<?php require 'footer.php' ?>