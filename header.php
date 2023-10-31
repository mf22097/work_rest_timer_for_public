<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="sidemenu.css">
    <link rel="stylesheet" href="work_rest_timer.css">
    <!-- google fonts を使うためのやつ。実際にフォントを使用したい部分では、cssのほうに追記をする（詳細はcss参照）。 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">

    <!-- トグル用のcss。あとでコメント解除する -->
    <link rel="stylesheet" href="statusToggle.css"> 
    <!-- レスポンシブwebデザインにするために、端末情報を取得する記述 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>work rest timer</title>
</head>
<body>
    <div class="cp_cont">
        <div class="cp_offcm01">
            <input type="checkbox" id="cp_toggle01">
            <label for="cp_toggle01"><span></span></label>
            <div class="cp_menu">
            <ul>
            <li><a href="work_rest_timer.php">トップ画面</a></li>
            <li><a href="login_input.php">ログイン</a></li>
            <li><a href="accumulation.php">累積確認</a></li>
            <li><a href="logout_output.php">ログアウト</a></li>
            </ul>
            </div>
        </div>
        <div class="mainContents">
            <a href="work_rest_timer.php"><h1>Work Rest Timer</h1></a>