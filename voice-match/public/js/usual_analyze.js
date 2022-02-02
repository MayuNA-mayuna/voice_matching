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
    sound = loadSound('../assets/Fallin_For_You.mp3');
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
    if (timeCount > 1000000) {

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

