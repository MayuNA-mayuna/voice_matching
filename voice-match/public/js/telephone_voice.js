let mic, recorder, soundFile;
let isUserStarted = false;
let canvas;

// 録音、停止、再生の状態を表す
let state = 0;

function setup() {
    canvas = createCanvas(400, 400);
    background(200);
    fill(0);
    text('Enable mic and click the mouse to begin recording', 20, 20);

    // p5.AudioInオブジェクトを作成
    mic = new p5.AudioIn();
    // p5.SoundRecorderオブジェクトを作成
    recorder = new p5.SoundRecorder();
    // 空のp5.SoundFileオブジェクトを作成。録音した音の再生に使用する
    soundFile = new p5.SoundFile();
}

function touchStarted() {
    if (!isUserStarted) {
        userStartAudio().then(() => {
            // オーディオ入力処理を開始
            mic.start();
            // マイクをレコーダーに接続
            recorder.setInput(mic);
            canvas.mousePressed(recordAndSave)
        });
        isUserStarted = true;
    }
}

function recordAndSave() {
    // p5.AudioInオブジェクトのenabledプロパティを使って、ユーザーがマイクを有効にしていることを確認
    // (有効担っていない場合には無音が録音される)
    if (state === 0 && mic.enabled) {
        // この後再生に使用するp5.SoundFileオブジェクトに録音するよう、レコーダーに伝える
        recorder.record(soundFile);
        background(255, 0, 0);
        text('Recording now! Click to stop.', 20, 20);
        // 状態が0から1に進む
        state++;
    }
    else if (state === 1) {
        // レコーダーを停止し、結果をsoundFileに送る
        recorder.stop();

        background(0, 255, 0);
        text('Recording stopped. Click to play & save', 20, 20);
        // 状態が1から2に進む
        state++;
    }
    else if (state === 2) {
        // 結果を再生する
        soundFile.play();
        // ファイルを保存する
        saveSound(soundFile, 'mySound.wav');
        // 状態が2から3に進む => 終了
        state++;
    }
}