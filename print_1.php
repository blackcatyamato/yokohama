<?php
  try{
    $path="";
    $dbh = new PDO("sqlite:{$path}content/db/sqlite.db");

    /*区の数の算出*/
    $sql = "SELECT MAX(WardCode) as wardnumber FROM hinanjo";
		$stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $wardnumber = $result["wardnumber"];

    /*区ごとに防災拠点を出力*/
    for($i=1;$i<=$wardnumber;$i++){
      if($i<10){
        $wc = "0".$i;
      }
      $sql = "SELECT Name,Address,Ward FROM hinanjo WHERE Type = \"地域防災拠点\" AND WardCode=".$wc;
		  $stmt = $dbh->query($sql);
      if($i>=2){
        print("</ul>");
      }
      $j=0;
      while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $j++;
        if($j==1){
          print("<h3>".$result["Ward"]."</h3>");
          print("<ul>");
        }
        print("<li>".$result["Name"]."</li>");
      }
      if($i==18){
        print("</ul>");
      }
    }
  }catch(PDOException $e){
		print("Connection failed:".$e->getMessage());
		die();
	}

	$dbh = null;
?>
