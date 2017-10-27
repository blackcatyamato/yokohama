<?php
	$path = "";
	$stmt = null;
	$pdo = null;


	require_once("{$path}content/php/phpQuery-onefile.php");
	$html = file_get_contents("http://www.city.yokohama.lg.jp/ex/kikikanri/weather/.cgi/yokohama/warning.cgi?cache=%27+(new%20Date()).getTime()");
	$doc = phpQuery::newDocument($html);
	$saigai = $doc["marquee"]->text();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>横浜防災案内-Yokohama Disaster Prevention</title>
		<link rel="stylesheet" href="<?=$path?>content/css/reset.css">

		<link rel="stylesheet" href="<?=$path?>content/css/jquery.mmenu.all.css">
		<link rel="stylesheet" href="<?=$path?>content/css/style.css">


		<style>
		.pagetop {
		    display: none;
		    position: fixed;
		    bottom: 30px;
		    right: 15px;
		}
		.pagetop a {
		    display: block;
		    background-color: #555;
		    text-align: center;
		    color: #222;
		    font-size: 12px;
		    text-decoration: none;
		    padding: 5px 10px;
			filter:alpha(opacity=50);
		    -moz-opacity: 0.5;
		    opacity: 0.5;
		}
		.pagetop a:hover {
		    display: block;
		    background-color: #b2d1fb;
		    text-align: center;
		    color: #fff;
		    font-size: 12px;
		    text-decoration: none;
		    padding:5px 10px;
			filter:alpha(opacity=50);
		    -moz-opacity: 0.5;
		    opacity: 0.5;
		}
		</style>


		<style>
		.menu-btn {
			position: fixed;
			top: 0;
			right: 20px;
			width: 60px;
			height: 60px;
			display: block;
			z-index: 50;
		}

		.menu-btn span{
			position: absolute;
			left: 10px;
			width: 40px;
			height: 6px;
			background: #777;
			border-radius: 2px;
		}

		.menu_border1 {
			top:9px;
		}

		.menu_border2 {
			top:24px;
		}

		.menu_border3 {
			top:39px;
		}

		#menu a:hover{
/*			background: #AAA;*/
		}

		.menu-btn:hover{
/*			background: #AAA;*/
		}
		</style>

		<script src="<?=$path?>content/js/jquery-3.2.1.min.js"></script>
		<script src="<?=$path?>content/js/jquery.mmenu.all.js"></script>

		<script src="<?=$path?>content/js/script.js"></script>
	</head>

	<body>
		<div class="wrap">
			<nav id="menu">
				<ul>
					<li><span style="color: #BBB;">リスト</span></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=tsunami">津波避難</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=water">医療・避難道具</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=temporary">帰宅困難者避難所</a></li>
					<li><a href="<?=$path?>region_dp_base_list.php?type=shelter">地域防災拠点</a></li>
					<li><span style="color: #BBB;">マップ</span></li>
					<li><a href="<?=$path?>map.php?type=tsunami" target="_blank">津波避難</a></li>
					<li><a href="<?=$path?>map.php?type=water" target="_blank">医療・避難道具</a></li>
					<li><a href="<?=$path?>map.php?type=temporary" target="_blank">帰宅困難者避難所</a></li>
					<li><a href="<?=$path?>map.php?type=shelter" target="_blank">地域防災拠点</a></li>
				</ul>
			</nav>

			<a class="menu-btn" href="#menu">
				<span class="menu_border1"></span>
				<span class="menu_border2"></span>
				<span class="menu_border3"></span>
			</a>

			<p class="pagetop"><a href="#">▲</a></p>

			<?php
				$page = "トップ";
				include "./header.php";
			?>

			<main>
				<h2>
					<marquee>まずは落ち着きましょう…</marquee>
				</h2>
				<div class="inner">
					<div class="Flowing-alert">
						<div class="panel-heading">
							<h3 class="panel-title"><a name="warn"></a>横浜市域の警報・注意報</h3>
						</div>
						<div class="panel-body">
							<div id="warning2"></div>
								<div><marquee><?=$saigai?></marquee></div>
						</div>
					</div>

					<div class="box_menu">
						<h4>案内</h4>
						<ul>
							<li class="Tunami">
								<a href="<?=$path?>region_dp_base_list.php?type=tsunami">津波避難
									<img src="<?=$path?>content/img/Tsunami.jpg">
								</a>
							</li>
							<li class="Item">
								<a href="<?=$path?>region_dp_base_list.php?type=water">医療・避難道具
									<img src="<?=$path?>content/img/Medical.jpg">
								</a>
							</li>
							<li class="Hinan">
								<a href="<?=$path?>region_dp_base_list.php?type=temporary">帰宅困難者避難所
									<img src="<?=$path?>content/img/Kitaku_Konnan.jpg">
								</a>
							</li>
							<li class="Tbousai">
								<a href="<?=$path?>region_dp_base_list.php?type=shelter">地域防災拠点
									<img src="<?=$path?>content/img/Ti-ki_Bousai.jpg">
								</a>
							</li>
						</ul>
					</div>

					<div class="box_tutorial">
							<a href="<?=$path?>dptutorial.php">
								防災チュートリアル
							</a>
					</div>

					<div class="box_twitter">
						<a class="twitter-timeline" href="https://twitter.com/yokohama_saigai">Tweets by yokohama_saigai</a>
						<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</main>
		</div>
	</body>
</html>
