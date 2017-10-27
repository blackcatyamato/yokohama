<?php
	$path = "";

	$id_test = "%";
	$type = "shelter";
	$lang = "jp";
	$ku = "1";


	if(isset($_GET["type"])){
		$type = $_GET["type"];
	}


	$pdo = new PDO("sqlite:{$path}content/db/sqlite.db");
	require_once("{$path}content/php/table_select.php");

	$stmt = null;
	$pdo = null;






?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title><?=$facility_title?>-Yokohama Disaster Prevention</title>
		<link rel="stylesheet" href="./content/css/reset.css">
		<link rel="stylesheet" href="./content/css/style_common.css">
		<link rel="stylesheet" href="./content/css/style_1.css">
		<link rel="stylesheet" href="<?=$path?>content/css/jquery.mmenu.all.css">

		<style>
		header{
			background:white;
			height: 70px;
			text-align: center;
			border-bottom: 1px solid gray;
		}

		header h1{
			padding-top: 5px;
			padding-left: 5px;
		}

		header a{
			display: inline-block;
			line-height: 0;
		}

		header picture source{
			height: 60px;
			max-width: 100%;
		}

		header picture img{
			height: 60px;
			width: 90%;
		}
		</style>


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
		<p class="pagetop"><a href="#">▲</a></p>
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

			<?php
				$page = "<?=$facility_title?>";
				include "./header.php";
			?>
		<main id="0">
			<div class="base_list">
				<h2>
					<span style="margin-right:20px;"><?=$facility_title?>一覧</span><!--<span>Disaster&nbspPrevention&nbspBase</span>//-->
				</h2>
				<div class="ward_link">
				<ul>
					<?php foreach(range(1, $ward_count) as $i): ?>
						<li><a href="#<?=$wardCode_list[$i]?>"><?=$ward_list[$i]?></a></li>
					<?php endforeach; ?>
				</ul>
				</div>
				<div class="print">
				<?php
					$definition = "{$type}_{$lang}";
					include "print_1_base.php";
				 ?>
				</div>
			</div>
		</main>
	</div>
	</body>
</html>
