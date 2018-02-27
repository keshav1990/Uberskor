<?php
$myFile = "./uploads/sidebar/futboll.json" ;
$gmData = $arr_data = array() ;
if (!file_exists($myFile)) {
  $handle = fopen($myFile, 'w') ;
  fclose($handle) ;
}
else {
  $jsondata = file_get_contents($myFile) ;
 $gmData =  $arr_data = json_decode($jsondata, true) ;
}
?>
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-1">
 <span class="side_mobile_bx">Takimlarim</span>
   <ul class="menu country-list my-teams">
      <li class="head"><span class="toggleMyLeague"></span>Takımlarım </li>
      <ul id="my-teams-list" class="menu">
         <li class="last myTeamInfo">
		 <?php
		 $value = "Takımlarınızı seçmek için takım isimlerinin yanında bulunan simgeyi tıklayınız." ;
		 echo $value ;
		 ?>
		</li>
      </ul>
   </ul>
</div>
<div class="spacer10"></div>
<div class="mbox0px l-brd mobile-bx-2">
  <b class="clse_mb">X</b>
   <span class="side_mobile_bx ulkeler">Ülkeler</span>
   <ul class="menu country-list mob_lst-cnt">
   <li class="head side_br_ulk">Ülkeler</li>
   <?php
   $i = 0 ;
   $total = count($country) ;
   $leauges = array() ;
   foreach ($country as $c) :
     if ($i < $total && $i < 10) {
       ?>
      <li>
		<a class="a_sub_tg" href="javascript:void(0)">

		<?= $c->name ?>
		<?php if (!empty($c->leagues)) { ?>

		<?php } ?>
		</a>
         <ul class="submenu hidden">
		     <?php
		     if (!empty($c->leagues)) {
		       foreach ($c->leagues as $league1) :
		 // $leauges[$game.'_'.url_title($c->name,"dash",true).'_'.url_title($league1->name,"dash",true)] = $league1->id;
		         $URL = $league1->name ;
		 //$URL = $league1->urlname;
		         $URL = url_converter($URL, "dash", TRUE, $league1->urlname) ;
                 $countryURI = url_converter($c->name, "dash", TRUE, $c->cname) ;
	           $arr_data[$countryURI.'-'.$URL] = $league1->urlname;
	           $arr_data[$URL] = $league1->urlname;
	             $arr_data[$countryURI] = $c->cname;

            ?>


 <li><a title="<?php echo ucwords($c->name) . ': ' . ucwords($league1->name) ?>" href="<?php echo base_url() . $game . '/'.$countryURI.'/' . $URL ?>">
			<?= $league1->name ?></a></li>
			<?php endforeach ; } ?>
         </ul>
      </li>
	      <?php
	    }
	    $i++;
	  endforeach ;
	  // $this->cache->file->save('soccer_country', $leauges, 224888880);
	  ?>
   </ul>

    <ul class="menu country-list mob_lst-cnt">
	   <?php
	   $i = 0 ;
	   foreach ($country as $c2) :
	     $c = $c2 ;
	     if ($i > 10) {
	       ?>
	   <li>
		<a class="a_sub_tg" href="javascript:void(0)">

		<?= $c->name ?>
		<?php if (!empty($c->leagues)) { ?>
		 <img src="<?= base_url('uploads/drp-arrow.png') ?>" alt="" />
		<?php } ?>
		</a>
	   <ul class="submenu hidden">
	       <?php
	       if (!empty($c->leagues)) {
	         foreach ($c->leagues as $league2) :
	           $URL = $league2->name ;
	   //$URL = $league2->urlname;
	   /* $URL = str_replace(".","ererer",$URL); */
	           $URL = url_converter($URL, "dash", TRUE, $league2->urlname) ;
                $countryURI = url_converter($c->name, "dash", TRUE, $c->cname) ;
	           /* if (!array_key_exists($countryURI.$URL, $arr_data)) {
	             $arr_data[$countryURI.$URL] = ($league2->name) ;
	           } */
	   /* $URL = str_replace("ererer",".",$URL); */
	           $arr_data[$countryURI.'-'.$URL] = ($league2->urlname) ;
               $arr_data[$URL] = $league2->urlname;
	           $arr_data[$countryURI] = $c->cname;
                 //print_r($c) ;
               //  exit;
	           ?>

	   <li><a title="<?php echo ucwords($c->name) . ': ' . ucwords($league2->name) ?>" href="<?php echo base_url() . $game . '/' . $countryURI . '/' . $URL ?>">
			<?= $league2->name ?></a></li>
	   <?php endforeach ; } ?>
	   </ul>
	   </li>
	       <?php
	     }
	     $i++;
	   endforeach ;
       if(count($gmData) != count($arr_data)){
	 //  unlink($myFile) ;
       //print_r($arr_data);
	   $arr_data = json_encode($arr_data) ;
	   //$handle = fopen($myFile, 'w') ;
	  // fwrite($handle, $arr_data) ;
	//   fclose($handle) ;
       }
	   ?>
   </ul>


</div>

<div class="spacer10"></div>

<img style="width:140px; height:93px;" src="<?php echo base_url() . 'uploads/banners/' . $banners[5]->image ; ?>" alt="Uberskor.com" >
<!-- - -//iframe css- - -->
<!--div class="mbox0px l-brd flag_side">

</div--->
<div class="spacer10"></div>


<div class="spacer10"></div>
<?php $this->load->view("common/partners") ; ?>

</div>
<?php

function change_acent1($str) {
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë','İ', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','ğ','ı','Ğ','Ş') ;
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E','I', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', 'a', '?', 'e', '?', '?', 'O', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?','g','i','G','S') ;
  return str_replace($a, $b, $str) ;
  }
function url_converter($str, $separator = 'dash', $lowercase = TRUE, $en_val) {
  $CI = & get_instance() ;
//$str = remove_accents($str);
  $str = change_acent1($str) ;
//return $str;
//exit;
  $replace = ($separator == 'dash') ? '-' : '_' ;
  $trans = array('&\#\d+?;' => '', '&\S+?;' => '', '\s+' => $replace, '[^a-z0-9\-\._]' => '', $replace . '+' => $replace, $replace . '$' => $replace, '^' . $replace => $replace, '\.+$' => '') ;
  $str = strip_tags($str) ;
  foreach ($trans as $key => $val) {
    $str = preg_replace("#" . $key . "#i", $val, $str) ;
  }
  if ($lowercase === TRUE) {
    if (function_exists('mb_convert_case')) {
      $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8") ;
    }
    else {
      $str = strtolower($str) ;
    }
  }
  $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str) ;
//create_json(array($str=>$en_val));
  return trim(stripslashes($str)) ;
}
function create_json($formdata) {
//Get form data
/* $formdata = array(
'firstName'=> $_POST['firstName'],
'lastName'=> $_POST['lastName'],
'email'=>$_POST['email'],
'mobile'=> $_POST['mobile']
); */
  $myFile = "./uploads/sidebar/futboll.json" ;
  $arr_data = array() ;
  $jsondata = file_get_contents($myFile) ;
  $arr_data = json_decode($jsondata, true) ;
  if (empty($arr_data)) {
    $arr_data[] = $formdata ;
  }
  else {
    array_push($arr_data, $formdata) ;
  }
  $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT) ;
 // file_put_contents($myFile, $jsondata) ;
}
?>