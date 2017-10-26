<?php
  $mode = null;
  if($_GET){
    $mode = $_GET["mode"];
  }

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_dptutorial.css">
		<title>防災チュートリアル-Yokohama Disaster Prevention</title>
	</head>
	<body>
			<?php
				$page = "防災チュートリアル";
				include "./header.php";
			?>
		<main>
      <div class="box">
        <h2>
          防災チュートリアル
        </h2>
        <p>
          知りたい対策情報を選んでください
        </p>
        <ul>
          <li>
            <a href="./dptutorial.php?mode=1">
              暴風
            </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=2">
            豪雨
          </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=3">
            豪雪
          </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=4">
            洪水
          </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=5">
            地震
          </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=6">
            津波
          </a>
          </li>
          <li>
            <a href="./dptutorial.php?mode=7">
            火災
          </a>
          </li>
        </ul>
        <div id="info">
          <?php
            if($mode != null){
              switch ($mode) {
                case '1':
                  echo '<h3><span>暴風のとき</span></h3>';
                  echo '<p>外出は避けましょう、外出中の場合は近くの建物に避難しましょう。
                  <br>さらに、停電や断水に備えて懐中電灯の準備やお風呂への水張りをしましょう。</p>';
                  break;
                case '2':
                    echo '<h3><span>豪雨のとき</span></h3>';
                    echo '<p>道路が冠水していたら建物の上階に避難しましょう。
                    <br>また、地下街やアンダーパス(地下立体交差点)などを通るのは避けましょう。</p>';
                    break;
                case '3':
                  echo '<h3><span>豪雪のとき</span></h3>';
                  echo '<p>外出は避けましょう
                  <br>さらに、停電や断水に備えて懐中電灯の準備やお風呂への水張りをしましょう。</p>';
                  break;
                case '4':
                  echo '<h3><span>洪水</span></h3>';
                  echo '<p>河川からすぐに離れましょう。
                  <br>また、浸水している場所は、傘や棒などで地面を探りながら移動しましょう。</p>';
                  break;
                case '5':
                  echo '<h3><span>地震のとき</span></h3>';
                  echo '<p>1. 揺れが収まってから、火を消す。
                  <br>2. むやみに外へ飛び出さない
                  <br>3. 机やテーブルの下に入る
                  <br>4. 揺れが収まるまで、じっとしている
                  <br>5. 大きな災害の可能性がある場合は、正確な情報や指示があるまでむやみに避難行動に移らない
                  <br>6. 揺れが収まり余裕があったら、ガスの元栓、ブレーカーなどを止めて避難する
                  <br>7. 運転中は、緊急車両の邪魔にならないよう道路の端に停車し、クルマにキーをつけたまま避難する
                  <br>8. 街中ではビルや高速道路など倒壊する可能性のある構造物から離れる
                  <br>9. 野外では、崖崩れや川の増水に注意して指定された安全な場所へ避難する
                  <br>10. 避難警報などが解除されるまで移動しない</p>';
                  break;
                case '6':
                  echo '<h3><span>津波のとき</span></h3>';
                  echo '<p>高台や山へ避難しましょう。</p>';
                  break;
                case '7';
                  echo '<h3><span>火災のとき</span></h3>';
                  echo '1. まず、119番通報をしましょう。
                  <br>2. 次に、消火器で消火を行いましょう。
                  <br>3. 火が天井まで昇っていたら消化を諦め、すぐに避難しましょう。</p>';
                  break;
              }
            }
           ?>
        </div>
      </div>
		</main>
	</body>
</html>
