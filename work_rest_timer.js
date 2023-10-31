//work_rest_timer.js
//2023/09/14以前の、旧コードがコメントアウトに残ってるやつが見たければ、プロトタイプフォルダにある。

let timerId = null;
let formattedWorkTime;
let formattedRestTime;

var mainContents = document.getElementsByClassName("mainContents")[0]; //背景色変更用に要素取ってきてる。classNameで持ってくるときは配列でくるから、何個目か指定しなきゃいけない
var workTimeBlock = document.getElementById("workTimeBlock");
var restTimeBlock = document.getElementById("restTimeBlock");

const startBtn = document.querySelector('#startBtn');
const stopBtn = document.querySelector('#stopBtn');  
const clearBtn = document.querySelector('#clearBtn');  

stopBtn.disabled = "disabled"; //起動時は一時停止ボタンを見えなくしておく
document.getElementsByClassName("toggle_button")[0].style.visibility = "hidden";    //タイマー動作時以外はトグルを隠す。classNameで持ってくるときは配列でくるから、何個目か指定しなきゃいけない
mainContents.style = "background-image: linear-gradient(to top, white 0%, white 100%);";  //背景を白のグラデーションにする

//「開始」が押されたときのイベント  
startBtn.addEventListener('click', function(){
    timerId = setInterval(execIntervalFunc, 1000);    //意味：1000ms毎にexecIntervalFuncを実行
    startBtn.disabled = "disabled"; //開始ボタンを何回も押されるとバグるので、押せなくする
    stopBtn.disabled = null; //一時停止ボタンを押せるようにする

    // mainContents.style.backgroundColor = '#ffffff'; //画面を白にする
    document.getElementsByClassName("toggle_button")[0].style.visibility = "visible";   //タイマー動作時はトグルを見せる
});

//setIntervalで行う処理
function execIntervalFunc(){
    const toggleStatus = document.querySelector('#toggle');
    if (toggleStatus.checked){      //チェック判定なら休憩中
        restTimeCalc = parseInt(restTimeCalc) + 1;
        formattedRestTime = hhmmss(restTimeCalc);   //hhmmss関数にhh:mm:ss表示に変換してもらう
        restTime.textContent = formattedRestTime;

        // mainContents.style.backgroundColor = '#E6E6E6'; //画面を灰色にする
        mainContents.style = "background-image: linear-gradient(to bottom, #ffecd2 0%, #fff0eb 100%);";    //04 juisyPeachもっと薄め
        restTimeBlock.style = "color:#000000;";     //「休憩中」の文字を濃くする
        workTimeBlock.style = "color:#E0E0E0;";     //「作業中」の文字を薄くする
    }else{      //未チェック判定なら作業中
        workTimeCalc = parseInt(workTimeCalc) + 1;
        formattedWorkTime = hhmmss(workTimeCalc);
        workTime.textContent = formattedWorkTime;
        
        // mainContents.style.backgroundColor = '#F8FF6A'; //画面を黄色にする
        mainContents.style = "background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);";    //43 newYork
        workTimeBlock.style = "color:#000000;";     //「作業中」の文字を濃くする
        restTimeBlock.style = "color:#E0E0E0;";     //「休憩中」の文字を薄くする
    }   
}

function hhmmss(seconds){   //もらった整数をhh:mm:ss方式に変換して返す関数
    const hour = Math.floor(seconds / 3600);
    const min = Math.floor(seconds % 3600 /60);
    const sec = seconds % 60;
    let hh;
    
    //hourの左0詰めの例外処理。3桁以上の場合は左0埋めをしない
    if(hour < 100){
        hh = (`00${hour}`).slice(-2);
    }else{
        hh = hour;
    }
    const mm = (`00${min}`).slice(-2);
    const ss = (`00${sec}`).slice(-2);

    let time = '';
    time = `${hh}:${mm}:${ss}`;
    console.log(time);

    return time;
}


//「一時停止」が押されたときのイベント
stopBtn.addEventListener('click', function(){
    clearInterval(timerId);
    stopBtn.disabled = "disabled"; //一時停止ボタンを押せなくする
    startBtn.disabled = null; //開始ボタンを押せるようにする

    // mainContents.style.backgroundColor = '#ffffff'; //画面を白にする
    mainContents.style = "background-image: linear-gradient(to top, white 0%, white 100%);";  //背景を白のグラデーションにする
    document.getElementsByClassName("toggle_button")[0].style.visibility = "hidden";    //タイマー動作時以外はトグルを隠す。
    workTimeBlock.style = "color:#000000;";     //「作業中」の文字を濃くする
    restTimeBlock.style = "color:#000000;";     //「休憩中」の文字を濃くする
});


//「タイマーをリセット」が押されたときのイベント
clearBtn.addEventListener('click', function(){
    clearInterval(timerId);
    
    //todo: workTimeとrestTimeを保存する処理必要　＆ totalWorkTimeとtotalRestTimeの加算も必要

    workTime.textContent = "00:00:00";
    restTime.textContent = "00:00:00";

    workTimeCalc = 0;
    restTimeCalc = 0;

    startBtn.disabled = null; //開始ボタンを押せるようにする
    mainContents.style.backgroundColor = '#ffffff'; //画面を白にする
    document.getElementsByClassName("toggle_button")[0].style.visibility = "hidden";    //タイマー動作時以外はトグルを隠す。
    mainContents.style = "background-image: linear-gradient(to top, white 0%, white 100%);";  //背景を白のグラデーションにする
    workTimeBlock.style = "color:#000000;";     //「作業中」の文字を濃くする
    restTimeBlock.style = "color:#000000;";     //「休憩中」の文字を濃くする
});

//todo:
//「保存して終了」が押されたときのイベント
//todo: 最初にどっかでDBとの接続の必要あり
//todo: workTimeとrestTimeを保存する ＆ totalWorkTimeとtotalRestTimeの加算も必要あり