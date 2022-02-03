<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>p5.js Examples</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/p5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.10.2/addons/p5.sound.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

  <style>
    .graph-area{
        margin: 10px;
        width: 500px;
        height:500px;
        border: 1px solid black;
      }
      .container{
       display: flex;
      }
      #sketch-holder{
        margin-top:10px;
      }
  </style>
</head>
<body>
  <div class="container">
    <!-- <div id="chart" class="graph-area"></div> -->
  <div id="sketch-holder"></div>
  </div>
  <div id="result">
    <p id="result_max"></p>
    <p id="result_max_average"></p>
  </div>
  <form class="d-block p-2" method="post" action="{{ route('match_id', ['id'=>Auth::user()->id]) }}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
　　　{{-- 隠しフィールド --}}
　　　<input type="hidden" name="_method" value="PATCH">
　　 <p>マッチング相手</p>
      <select name="matching_id">
      @foreach($items as $item)
        <option value="{{Auth::user()->id}}_{{$item->id}}">{{$item->name}}</option>
      @endforeach
      </select>
      <p>最大周波数</p>
      <input type="text" value="" name="max_f">
      <p>最大周波数平均</p>
      <input type="text" value="" name="max_average_f">
      <input type="submit" value="送信">
  </form>

  <script>
      // FFTのwaveform()

let sound, fft;
let timeCount = 0;
// グラフ描画に使う配列
let xArray = [];
let yArray = [];
var max_array = [];
var min_array = [];
var sum = 0;
var max = document.getElementById('result_max');
var max_average = document.getElementById('result_max_average');


function preload() {
    sound = loadSound('{{ asset("storage/$voice->voicedata") }}');
}

function setup() {
    const canvas = createCanvas(400, 300);
    canvas.parent('sketch-holder');
    textSize(20);
    stroke(255, 255, 0);
    strokeWeight(2);
    noFill();
    fft = new p5.FFT();
    sound.setVolume(0.2);

    // キャンバスのクリックで再生のオン/オフを切り替え
    canvas.mouseClicked(togglePlay);
}


function draw() {
    background(0);
    if (sound.isPlaying()) {
        drawWaveform();
    }
    text('click to play/pause', 4, 20);
}

// 1/60 秒に1回呼び出される
function drawWaveform() {

    const spectrum = fft.analyze();
    const len = spectrum.length;
    // キャンバスにwaveform値を描画
    beginShape();
    // 1/60 秒の間に、1024回実行する
    for (var i = 0; i < len; i++) {
       //秒数
        let x = map(i, 0, len, 0, width);
        // waveformは-1から1の値。これを0から300の数値に換算する
        let y = map(spectrum[i], 0, 100, 0, height);
        // console.log('スペクトラム' + spectrum[i]);
        vertex(x, y);
        timeCount++;
    }
    endShape();

    //max_array：約0.02秒の中での最大周波数の配列
    let max_val = Math.max.apply(null, spectrum);
    max_array.push(max_val);
    // let min_val = Math.min.apply(null, spectrum);
    // min_array.push(min_val);

    // 1分ほどで止まる仕組み→３にする
    if (timeCount > 400000) {

        noLoop();
        sound.stop();

        const max = document.getElementById('result_max');
        const max_average = document.getElementById('result_max_average');

        let MAX = Math.max.apply(null, max_array);
        for (let i=0; i<max_array.length; i++) {
            sum += max_array[i];
        }

        //HTMLに表示
        max.innerHTML = '最大周波数:' + MAX;
        //最大周波数が外れ値なことを避けるため、平均的な大きな周波数を取得
        max_average.innerHTML = '大きい周波数の平均:' + (sum / max_array.length);
      }

}

// サウンドの再生/停止、グラフの描画/停止を切り替える
function togglePlay() {
    if (sound.isPlaying()) {
        sound.pause();

    }
    else {
        sound.play();
        timeCount = 0;
        xArray = [];
        yArray = [];
        loop();
    }
}


  </script>


</body>
</html>
