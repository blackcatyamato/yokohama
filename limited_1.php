<?php
$dbh = new PDO("sqlite:./content/db/sqlite.db");

if(file_exists('./content/xml/TsunamiEvacuationFacilityList.xml')){
  $xml = simplexml_load_file('./content/xml/TsunamiEvacuationFacilityList.xml');
  $efnum = count($xml->TsunamiEvacuationFacility);

  for($i=0;$i<$efnum;$i++){
    $value = $xml->TsunamiEvacuationFacility[$i];
    switch($xml->TsunamiEvacuationFacility[$i]->Ward){
      case "鶴見区":
        $wc=1;
        break;
      case "神奈川区":
        $wc=2;
        break;
      case "西区":
        $wc=3;
        break;
      case "中区":
        $wc=4;
        break;
      case "南区":
        $wc=5;
        break;
      case "港南区":
        $wc=6;
        break;
      case "保土ヶ谷区":
        $wc=7;
        break;
      case "旭区":
        $wc=8;
        break;
      case "磯子区":
        $wc=9;
        break;
      case "金沢区":
        $wc=10;
        break;
      case "港北区":
        $wc=11;
        break;
      case "緑区":
        $wc=12;
        break;
      case "青葉区":
        $wc=13;
        break;
      case "都筑区":
        $wc=14;
        break;
      case "戸塚区":
        $wc=15;
        break;
      case "栄区":
        $wc=16;
        break;
      case "泉区":
        $wc=17;
        break;
      case "瀬谷区":
        $wc=18;
        break;
    }
    $sql = 'INSERT INTO shelter_jp(Name,Definition,Address,Ward,WardCode)
    VALUES("'.$value->Name.'","津波避難施設","'.$value->Address.'","'.$value->Ward.'","'.$wc.'")';
    $stmt = $dbh->query($sql);
  }
}else{
  exit('Failed to open TsunamiEvacuationFacilityList.xml');
}
$dbh = null;
?>
