<?php
  $mode = null;
  if(isset($_GET)){
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
                  echo '<h3>暴風のとき</h3>';
                  echo '<p>外出は避けましょう、外出中の場合は近くの建物に避難しましょう。
                  <br>さらに、停電や断水に備えて懐中電灯の準備やお風呂への水張りをしましょう。</p>';
                  break;
                case '2':
                    echo '<h3>豪雨のとき</h3>';
                    echo '<p>道路が冠水していたら建物の上階に避難しましょう。
                    <br>また、地下街やアンダーパス(地下立体交差点)などを通るのは避けましょう。</p>';
                    break;
                case '3':
                  echo '<h3>豪雪のとき</h3>';
                  echo '<p>外出は避けましょう
                  <br>さらに、停電や断水に備えて懐中電灯の準備やお風呂への水張りをしましょう。</p>';
                  break;
                case '4':
                  echo '<h3>洪水</h3>'
                  echo '<p>河川からすぐに離れましょう。
                  <br>また、浸水している場所は、傘や棒などで地面を探りながら移動しましょう。</p>';
                  break;
                echo '5':
                  echo '<h3>地震のとき</h3>'
              }
            }
           ?>
        </div>
      </div>
		</main>
	</body>
</html>
