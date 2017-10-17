<?php
if(file_exists('./content/xml/TsunamiEvacuationFacilityList.xml')){
  $xml = simplexml_load_file('./content/xml/TsunamiEvacuationFacilityList.xml');

  /*登録データの数*/
  $efnumber = count($xml->TsunamiEvacuationFacility);
  echo '<div class="ward_box"></h3>
     <ul>';
  for($i = 0;$i < $efnumber ;$i++){
    echo '<li>';
    echo '<a href="facility.php?name="'.$xml->TsunamiEvacuationFacility[$i]->Name.'">';
    echo '<div class="base_name">'.$xml->TsunamiEvacuationFacility[$i]->Name.'</div>';
    echo '<div class="base_address">住所:神奈川県横浜市'.(string)$xml->TsunamiEvacuationFacility[$i]->Ward.(string)$xml->TsunamiEvacuationFacility[$i]->Address.'</div>';
    echo '</a></li>';
  }
  echo '</ul><div class="return"><p><a href="#0">ページ上へ</a></p></div></div>';
}else{
  exit('Failed to open TsunamiEvacuationFacilityList.xml');
}
?>
