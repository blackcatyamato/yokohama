<?php
    $path="";
	$aa = null;
    $dbh = new PDO("sqlite:{$path}content/db/sqlite.db");

    /*区の数の算出*/
    $sql = "SELECT MAX(WardCode) as wardnumber FROM ".$definition;
		$stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $wardnumber = $result["wardnumber"];

    /*区ごとに防災拠点を出力*/
    for($i=1;$i<=$wardnumber;$i++){
      $sql = "SELECT id,Name,Address,Ward,WardCode FROM ".$definition." WHERE WardCode=".$i;
		  $stmt = $dbh->query($sql);
      if($i>=2){
        print("</ul>");
      }
      $j=0;
      while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $j++;
        if($j==1){
?>
		<?php if($i>=2){ ?>
		</ul><div class="return"><p><a href="#0">ページ上へ</a></p></div></div>
		<?php } ?>
		<div class="ward_box"><h3 id="<?=$result['WardCode']?>"><span><?=$result["Ward"]?></span>
		<?php
			if($definition == "shelter_jp"){
				echo '<a href="map.php?ku='.$result['Ward'].'">→マップから探す</a>';
			}
		?>
		</h3>
       <ul>
		<?php } ?>
		<li>
      <?php
      echo $definition;
        if($definition == "shelter_jp"){
          $type="shelter";
          $lang="jp";
        }
        if($definition == "temporary_jp"){
          $type="temporary";
          $lang="jp";
        }
        if($definition == "tsunami_jp"){
          $type="tsunami";
          $lang="jp";
        }
        if($definition == "water_jp"){
          $type="water";
          $lang="jp";
        }
        echo $type;
        echo $lang;
        ?>
			<a href="facility.php?id=<?=$result['id']?>&ku=<?=$result['Ward']?>&type=<?=$type?>&lang=<?=$lang?>">
				<div class="base_name"><?=$result["Name"]?></div>
				<div class="base_address">住所:<?=$result["Address"]?></div>
			</a>
		</li>
<?php
	}
     if($i==18){
    	   print('</ul><div class="return"><p><a href="#0">ページ上へ</a></p></div></div>');
      }
    }

$dbh = null;
?>
