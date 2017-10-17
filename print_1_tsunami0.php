<?php
if(file_exists('./content/xml/TsunamiEvacuationFacilityList.xml')){
  $xml = simplexml_load_file('./content/xml/TsunamiEvacuationFacilityList.xml');

  /*登録データの数*/
  $efnumber = count($xml->TsunamiEvacuationFacility);
  /*区の数の算出*/
  $wardnumber=1;//少なくとも1区はあることとする

  for($i = 0;$i < $efnumber ;$i++){
    $now_ward = (string)($xml->TsunamiEvacuationFacility[$i]->Ward);
    if($i==0){
      echo '<div class="ward_box"><h3 id="'.($i+1).'">'.$xml->TsunamiEvacuationFacility[$i]->Ward.'<a href="map.php?ku='.$xml->TsunamiEvacuationFacility[$i]->Ward.'">→マップから探す</a></h3>
         <ul>';
    }
    if($i>=1){
      $mae_ward = (string)($xml->TsunamiEvacuationFacility[$i-1]->Ward);
      if($mae_ward != $now_ward){
        echo '</ul><div class="return"><p><a href="#0">ページ上へ</a></p></div></div>';
        echo '<div class="ward_box"><h3 id="'.($i+1).'">'.$xml->TsunamiEvacuationFacility[$i]->Ward.'<a href="map.php?ku='.$xml->TsunamiEvacuationFacility[$i]->Ward.'">→マップから探す</a></h3>
             <ul>';
      }
    }
    echo '<li>';
    echo '<a href="facility.php?name="'.$xml->TsunamiEvacuationFacility[$i]->Name.'">';
    echo '<div class="base_name">'.$xml->TsunamiEvacuationFacility[$i]->Name.'</div>';
    echo '<div class="base_address">住所:神奈川県横浜市'.(string)$xml->TsunamiEvacuationFacility[$i]->Ward.(string)$xml->TsunamiEvacuationFacility[$i]->Address.'</div>';
    echo '</a></li>';
    /*if($mae_ward != $now_ward){
      $wardnumber++;
    }*/
  }
  echo '</ul><div class="return"><p><a href="#0">ページ上へ</a></p></div></div>';
  echo '<p style="background:yellow;">'.$wardnumber.'</p>';
  echo '<p style="background:yellow;">'.$efnumber.'</p>';
}else{
  exit('Failed to open TsunamiEvacuationFacilityList.xml');
}
?>
