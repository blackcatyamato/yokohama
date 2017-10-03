<?php
    $path="";
	$aa = null;
    $dbh = new PDO("sqlite:{$path}content/db/sqlite.db");

    /*区の数の算出*/
    $sql = "SELECT MAX(WardCode) as wardnumber FROM hinanjo";
		$stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $wardnumber = $result["wardnumber"];

    /*区ごとに防災拠点を出力*/
    for($i=1;$i<=$wardnumber;$i++){
      $sql = "SELECT Name,Address,Ward,WardCode FROM hinanjo WHERE Type = \"地域防災拠点\" AND WardCode=".$i;
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
		</ul></div>
		<?php } ?>
		<div id="ward_box"><h3 id="<?=$result['WardCode']?>"><?=$result["Ward"]?><a href="map.php?ku=<?=$result['Ward']?>">→マップから探す</a></h3>
       <ul>
		<?php } ?>
		<li>
			<a href="#">
				<div class="base_name"><?=$result["Name"]?></div>
				<div class="base_address">住所:<?=$result["Address"]?></div>
			</a>
		</li>
<?php
	}
     if($i==18){
    	   print("</ul></div>");
      }
    }

$dbh = null;
?>
