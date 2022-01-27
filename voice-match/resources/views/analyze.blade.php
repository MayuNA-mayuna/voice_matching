<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>p5.js Examples</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/p5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.10.2/addons/p5.sound.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="{{ asset('/js/analyze.js') }}"></script>


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
  <form class="d-block p-2" action="">
　　 <p>マッチング相手</p>
      <select name="ご用件">
        <option value="">マッチング相手</option>
        <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
        <option value="リンクについて">リンクについて</option>
      </select>
      <p>最大周波数</p>
      <input type="text" value="">
      <p>最大周波数平均</p>
      <input type="text" value="">
      <input type="submit" value="送信">
  </form>
</body>
</html>
