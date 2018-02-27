<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('change_acent'))
{
	function change_acent($str)
	{
$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '?', 'a', '?', 'e', '?', '?', 'O', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
  return  str_replace($a, $b, $str);
	}
} 
 if ( ! function_exists('url_title1'))
{
function seems_utf8( $str ) {
    //mbstring_binary_safe_encoding();
    $length = strlen($str);
    //reset_mbstring_encoding();
    for ($i=0; $i < $length; $i++) {
        $c = ord($str[$i]);
        if ($c < 0x80) $n = 0; // 0bbbbbbb
        elseif (($c & 0xE0) == 0xC0) $n=1; // 110bbbbb
        elseif (($c & 0xF0) == 0xE0) $n=2; // 1110bbbb
        elseif (($c & 0xF8) == 0xF0) $n=3; // 11110bbb
        elseif (($c & 0xFC) == 0xF8) $n=4; // 111110bb
        elseif (($c & 0xFE) == 0xFC) $n=5; // 1111110b
        else return false; // Does not match any model
        for ($j=0; $j<$n; $j++) { // n bytes matching 10bbbbbb follow ?
            if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                return false;
        }
    }
    return true;
}

function remove_accents( $string ) {
    if ( !preg_match('/[\x80-\xff]/', $string) )
        return $string;

    $turkish = array("i", "g", "ü", "s", "ö", "ç");//turkish letters
$english   = array("i", "g", "u", "s", "o", "c");//english cooridinators letters
   //  return str_replace($turkish,$english,$string);
    if (seems_utf8($string)) {
        $chars = array(
        // Decompositions for Latin-1 Supplement
        'ª' => 'a', 'º' => 'o',
        'À' => 'A', 'Á' => 'A',
        'Â' => 'A', 'Ã' => 'A',
        'Ä' => 'A', 'Å' => 'A',
        'Æ' => 'AE','Ç' => 'C',
        'È' => 'E', 'É' => 'E',
        'Ê' => 'E', 'Ë' => 'E',
        'Ì' => 'I', 'Í' => 'I',
        'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N',
        'Ò' => 'O', 'Ó' => 'O',
        'Ô' => 'O', 'Õ' => 'O',
        'Ö' => 'O', 'Ù' => 'U',
        'Ú' => 'U', 'Û' => 'U',
        'Ü' => 'U', 'Ý' => 'Y',
        'Þ' => 'TH','ß' => 's',
        'à' => 'a', 'á' => 'a',
        'â' => 'a', 'ã' => 'a',
        'ä' => 'a', 'å' => 'a',
        'æ' => 'ae','ç' => 'c',
        'è' => 'e', 'é' => 'e',
        'ê' => 'e', 'ë' => 'e',
        'ì' => 'i', 'í' => 'i',
        'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n',
        'ò' => 'o', 'ó' => 'o',
        'ô' => 'o', 'õ' => 'o',
        'ö' => 'o', 'ø' => 'o',
        'ù' => 'u', 'ú' => 'u',
        'û' => 'u', 'ü' => 'u',
        'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y', 'Ø' => 'O',
        // Decompositions for Latin Extended-A
        'A' => 'A', 'a' => 'a',
        'A' => 'A', 'a' => 'a',
        'A' => 'A', 'a' => 'a',
        'C' => 'C', 'c' => 'c',
        'C' => 'C', 'c' => 'c',
        'C' => 'C', 'c' => 'c',
        'C' => 'C', 'c' => 'c',
        'D' => 'D', 'd' => 'd',
        'Ð' => 'D', 'd' => 'd',
        'E' => 'E', 'e' => 'e',
        'E' => 'E', 'e' => 'e',
        'E' => 'E', 'e' => 'e',
        'E' => 'E', 'e' => 'e',
        'E' => 'E', 'e' => 'e',
        'G' => 'G', 'g' => 'g',
        'G' => 'G', 'g' => 'g',
        'G' => 'G', 'g' => 'g',
        'G' => 'G', 'g' => 'g',
        'H' => 'H', 'h' => 'h',
        'H' => 'H', 'h' => 'h',
        'I' => 'I', 'i' => 'i',
        'I' => 'I', 'i' => 'i',
        'I' => 'I', 'i' => 'i',
        'I' => 'I', 'i' => 'i',
        'I' => 'I', 'i' => 'i',
        '?' => 'IJ','?' => 'ij',
        'J' => 'J', 'j' => 'j',
        'K' => 'K', 'k' => 'k',
        '?' => 'k', 'L' => 'L',
        'l' => 'l', 'L' => 'L',
        'l' => 'l', 'L' => 'L',
        'l' => 'l', '?' => 'L',
        '?' => 'l', 'L' => 'L',
        'l' => 'l', 'N' => 'N',
        'n' => 'n', 'N' => 'N',
        'n' => 'n', 'N' => 'N',
        'n' => 'n', '?' => 'n',
        '?' => 'N', '?' => 'n',
        'O' => 'O', 'o' => 'o',
        'O' => 'O', 'o' => 'o',
        'O' => 'O', 'o' => 'o',
        'Œ' => 'OE','œ' => 'oe',
        'R' => 'R','r' => 'r',
        'R' => 'R','r' => 'r',
        'R' => 'R','r' => 'r',
        'S' => 'S','s' => 's',
        'S' => 'S','s' => 's',
        'S' => 'S','s' => 's',
        'Š' => 'S', 'š' => 's',
        'T' => 'T', 't' => 't',
        'T' => 'T', 't' => 't',
        'T' => 'T', 't' => 't',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        'W' => 'W', 'w' => 'w',
        'Y' => 'Y', 'y' => 'y',
        'Ÿ' => 'Y', 'Z' => 'Z',
        'z' => 'z', 'Z' => 'Z',
        'z' => 'z', 'Ž' => 'Z',
        'ž' => 'z', '?' => 's',
        // Decompositions for Latin Extended-B
        '?' => 'S', '?' => 's',
        '?' => 'T', '?' => 't',
        // Euro Sign
        '€' => 'E',
        // GBP (Pound) Sign
        '£' => '',
        // Vowels with diacritic (Vietnamese)
        // unmarked
        'O' => 'O', 'o' => 'o',
        'U' => 'U', 'u' => 'u',
        // grave accent
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'E', '?' => 'e',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'U', '?' => 'u',
        '?' => 'Y', '?' => 'y',
        // hook
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'E', '?' => 'e',
        '?' => 'E', '?' => 'e',
        '?' => 'I', '?' => 'i',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'U', '?' => 'u',
        '?' => 'U', '?' => 'u',
        '?' => 'Y', '?' => 'y',
        // tilde
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'E', '?' => 'e',
        '?' => 'E', '?' => 'e',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'U', '?' => 'u',
        '?' => 'Y', '?' => 'y',
        // acute accent
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'E', '?' => 'e',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'U', '?' => 'u',
        // dot below
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'A', '?' => 'a',
        '?' => 'E', '?' => 'e',
        '?' => 'E', '?' => 'e',
        '?' => 'I', '?' => 'i',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'O', '?' => 'o',
        '?' => 'U', '?' => 'u',
        '?' => 'U', '?' => 'u',
        '?' => 'Y', '?' => 'y',
        // Vowels with diacritic (Chinese, Hanyu Pinyin)
        '?' => 'a',
        // macron
        'U' => 'U', 'u' => 'u',
        // acute accent
        'U' => 'U', 'u' => 'u',
        // caron
        'A' => 'A', 'a' => 'a',
        'I' => 'I', 'i' => 'i',
        'O' => 'O', 'o' => 'o',
        'U' => 'U', 'u' => 'u',
        'U' => 'U', 'u' => 'u',
        // grave accent
        'U' => 'U', 'u' => 'u',
        );

        //  var_dump($string) ;
        $string = str_replace(array_keys($chars),array_values($chars),$string );

    } else {
        $chars = array();
        // Assume ISO-8859-1 if not UTF-8
        $chars['in'] = "\x80\x83\x8a\x8e\x9a\x9e"
            ."\x9f\xa2\xa5\xb5\xc0\xc1\xc2"
            ."\xc3\xc4\xc5\xc7\xc8\xc9\xca"
            ."\xcb\xcc\xcd\xce\xcf\xd1\xd2"
            ."\xd3\xd4\xd5\xd6\xd8\xd9\xda"
            ."\xdb\xdc\xdd\xe0\xe1\xe2\xe3"
            ."\xe4\xe5\xe7\xe8\xe9\xea\xeb"
            ."\xec\xed\xee\xef\xf1\xf2\xf3"
            ."\xf4\xf5\xf6\xf8\xf9\xfa\xfb"
            ."\xfc\xfd\xff";

        $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

        $string = strtr($string, $chars['in'], $chars['out']);
        $double_chars = array();
        $double_chars['in'] = array("\x8c", "\x9c", "\xc6", "\xd0", "\xde", "\xdf", "\xe6", "\xf0", "\xfe");
        $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
        $string = str_replace($double_chars['in'], $double_chars['out'], $string);
    }

    return $string;
}


    function url_title1($str, $separator = 'dash', $lowercase = TRUE)
    {
        $CI =& get_instance();
       //$str = remove_accents($str);
       $str = change_acent($str);
       //return $str;
       //exit;
        $replace = ($separator == 'dash') ? '-' : '_';

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace.'+' => $replace,
            $replace.'$' => $replace,
            '^'.$replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val)
        {
            $str = preg_replace("#".$key."#i", $val, $str);
        }

        if ($lowercase === TRUE)
        {
            if( function_exists('mb_convert_case') )
            {
                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
            }
            else
            {
                $str = strtolower($str);
            }
        }

        $str = preg_replace('#[^'.$CI->config->item('permitted_uri_chars').']#i', '', $str);

        return trim(stripslashes($str));
    }
}

function get_time_in_minute($from_time,$country){
// $date = new DateTime("now", new DateTimeZone(get_time_zone($country)) );
 $date = new DateTime("now", new DateTimeZone('Europe/Berlin') );
    $to_time = $date->format('Y-m-d H:i:s');
 //   echo $country." ".$to_time." <br>\n";
$to_time = strtotime($to_time) ;
//echo $to_time;
$from_time = strtotime($from_time);
return round(abs($to_time - $from_time) / 60,2);
}

/**
 * Get time zone
 * @param string $country
 * @param string $region
 * @return string If the timezone is not found, returns null`
 */
function get_time_zone($country, $region="")
{
    $timezone = null;
    switch ($country) {
        case "AD":
            $timezone = "Europe/Andorra";
            break;
        case "AE":
            $timezone = "Asia/Dubai";
            break;
        case "AF":
            $timezone = "Asia/Kabul";
            break;
        case "AG":
            $timezone = "America/Antigua";
            break;
        case "AI":
            $timezone = "America/Anguilla";
            break;
        case "AL":
            $timezone = "Europe/Tirane";
            break;
        case "AM":
            $timezone = "Asia/Yerevan";
            break;
        case "AN":
            $timezone = "America/Curacao";
            break;
        case "AO":
            $timezone = "Africa/Luanda";
            break;
        case "AQ":
            $timezone = "Antarctica/South_Pole";
            break;
        case "AR":
            switch ($region) {
                case "01":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "02":
                    $timezone = "America/Argentina/Catamarca";
                    break;
                case "03":
                    $timezone = "America/Argentina/Tucuman";
                    break;
                case "04":
                    $timezone = "America/Argentina/Rio_Gallegos";
                    break;
                case "05":
                    $timezone = "America/Argentina/Cordoba";
                    break;
                case "06":
                    $timezone = "America/Argentina/Tucuman";
                    break;
                case "07":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "08":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "09":
                    $timezone = "America/Argentina/Tucuman";
                    break;
                case "10":
                    $timezone = "America/Argentina/Jujuy";
                    break;
                case "11":
                    $timezone = "America/Argentina/San_Luis";
                    break;
                case "12":
                    $timezone = "America/Argentina/La_Rioja";
                    break;
                case "13":
                    $timezone = "America/Argentina/Mendoza";
                    break;
                case "14":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "15":
                    $timezone = "America/Argentina/San_Luis";
                    break;
                case "16":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "17":
                    $timezone = "America/Argentina/Salta";
                    break;
                case "18":
                    $timezone = "America/Argentina/San_Juan";
                    break;
                case "19":
                    $timezone = "America/Argentina/San_Luis";
                    break;
                case "20":
                    $timezone = "America/Argentina/Rio_Gallegos";
                    break;
                case "21":
                    $timezone = "America/Argentina/Buenos_Aires";
                    break;
                case "22":
                    $timezone = "America/Argentina/Catamarca";
                    break;
                case "23":
                    $timezone = "America/Argentina/Ushuaia";
                    break;
                case "24":
                    $timezone = "America/Argentina/Tucuman";
                    break;
                default:
                    $timezone = "America/Argentina/Tucuman";
                    break;

        }
        break;
        case "AS":
            $timezone = "Pacific/Pago_Pago";
            break;
        case "AT":
            $timezone = "Europe/Vienna";
            break;
        case "AU":
            switch ($region) {
                case "01":
                    $timezone = "Australia/Sydney";
                    break;
                case "02":
                    $timezone = "Australia/Sydney";
                    break;
                case "03":
                    $timezone = "Australia/Darwin";
                    break;
                case "04":
                    $timezone = "Australia/Brisbane";
                    break;
                case "05":
                    $timezone = "Australia/Adelaide";
                    break;
                case "06":
                    $timezone = "Australia/Hobart";
                    break;
                case "07":
                    $timezone = "Australia/Melbourne";
                    break;
                case "08":
                    $timezone = "Australia/Perth";
                    break;
                    default:
                    $timezone = "Australia/Perth";
                    break;
        }
        break;
        case "AW":
            $timezone = "America/Aruba";
            break;
        case "AX":
            $timezone = "Europe/Mariehamn";
            break;
        case "AZ":
            $timezone = "Asia/Baku";
            break;
        case "BA":
            $timezone = "Europe/Sarajevo";
            break;
        case "BB":
            $timezone = "America/Barbados";
            break;
        case "BD":
            $timezone = "Asia/Dhaka";
            break;
        case "BE":
            $timezone = "Europe/Brussels";
            break;
        case "BF":
            $timezone = "Africa/Ouagadougou";
            break;
        case "BG":
            $timezone = "Europe/Sofia";
            break;
        case "BH":
            $timezone = "Asia/Bahrain";
            break;
        case "BI":
            $timezone = "Africa/Bujumbura";
            break;
        case "BJ":
            $timezone = "Africa/Porto-Novo";
            break;
        case "BL":
            $timezone = "America/St_Barthelemy";
            break;
        case "BM":
            $timezone = "Atlantic/Bermuda";
            break;
        case "BN":
            $timezone = "Asia/Brunei";
            break;
        case "BO":
            $timezone = "America/La_Paz";
            break;
        case "BQ":
            $timezone = "America/Curacao";
            break;
 default:
            $timezone = "America/Curacao";
            break;
     case "BR":
            switch ($region) {
                case "01":
                    $timezone = "America/Rio_Branco";
                    break;
                case "02":
                    $timezone = "America/Maceio";
                    break;
                case "03":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "04":
                    $timezone = "America/Manaus";
                    break;
                case "05":
                    $timezone = "America/Bahia";
                    break;
                case "06":
                    $timezone = "America/Fortaleza";
                    break;
                case "07":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "08":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "11":
                    $timezone = "America/Campo_Grande";
                    break;
                case "13":
                    $timezone = "America/Belem";
                    break;
                case "14":
                    $timezone = "America/Cuiaba";
                    break;
                case "15":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "16":
                    $timezone = "America/Belem";
                    break;
                case "17":
                    $timezone = "America/Recife";
                    break;
                case "18":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "20":
                    $timezone = "America/Fortaleza";
                    break;
                case "21":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "22":
                    $timezone = "America/Recife";
                    break;
                case "23":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "24":
                    $timezone = "America/Porto_Velho";
                    break;
                case "25":
                    $timezone = "America/Boa_Vista";
                    break;
                case "26":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "27":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "28":
                    $timezone = "America/Maceio";
                    break;
                case "29":
                    $timezone = "America/Sao_Paulo";
                    break;
                case "30":
                    $timezone = "America/Recife";
                    break;
                case "31":
                    $timezone = "America/Araguaina";
                    break;
        default:
                    $timezone = "America/Araguaina";
                    break;
        }
        break;
        case "BS":
            $timezone = "America/Nassau";
            break;
        case "BT":
            $timezone = "Asia/Thimphu";
            break;
        case "BV":
            $timezone = "Antarctica/Syowa";
            break;
        case "BW":
            $timezone = "Africa/Gaborone";
            break;
        case "BY":
            $timezone = "Europe/Minsk";
            break;
        case "BZ":
            $timezone = "America/Belize";
            break;
        case "CA":
            switch ($region) {
                case "AB":
                    $timezone = "America/Edmonton";
                    break;
                case "BC":
                    $timezone = "America/Vancouver";
                    break;
                case "MB":
                    $timezone = "America/Winnipeg";
                    break;
                case "NB":
                    $timezone = "America/Halifax";
                    break;
                case "NL":
                    $timezone = "America/St_Johns";
                    break;
                case "NS":
                    $timezone = "America/Halifax";
                    break;
                case "NT":
                    $timezone = "America/Yellowknife";
                    break;
                case "NU":
                    $timezone = "America/Rankin_Inlet";
                    break;
                case "ON":
                    $timezone = "America/Toronto";
                    break;
                case "PE":
                    $timezone = "America/Halifax";
                    break;
                case "QC":
                    $timezone = "America/Montreal";
                    break;
                case "SK":
                    $timezone = "America/Regina";
                    break;
                case "YT":
                    $timezone = "America/Whitehorse";
                    break;
                default:
                    $timezone = "America/Whitehorse";
                    break;
        }
        break;
        case "CC":
            $timezone = "Indian/Cocos";
            break;
        case "CD":
            switch ($region) {
                case "01":
                    $timezone = "Africa/Kinshasa";
                    break;
                case "02":
                    $timezone = "Africa/Kinshasa";
                    break;
                case "03":
                    $timezone = "Africa/Kinshasa";
                    break;
                case "04":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "05":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "06":
                    $timezone = "Africa/Kinshasa";
                    break;
                case "07":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "08":
                    $timezone = "Africa/Kinshasa";
                    break;
                case "09":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "10":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "11":
                    $timezone = "Africa/Lubumbashi";
                    break;
                case "12":
                    $timezone = "Africa/Lubumbashi";
                    break;
                default:
                    $timezone = "Africa/Lubumbashi";
                    break;
        }
        break;
        case "CF":
            $timezone = "Africa/Bangui";
            break;
        case "CG":
            $timezone = "Africa/Brazzaville";
            break;
        case "CH":
            $timezone = "Europe/Zurich";
            break;
        case "CI":
            $timezone = "Africa/Abidjan";
            break;
        case "CK":
            $timezone = "Pacific/Rarotonga";
            break;
        case "CL":
            $timezone = "America/Santiago";
            break;
        case "CM":
            $timezone = "Africa/Lagos";
            break;
        case "CN":
            switch ($region) {
                case "01":
                    $timezone = "Asia/Shanghai";
                    break;
                case "02":
                    $timezone = "Asia/Shanghai";
                    break;
                case "03":
                    $timezone = "Asia/Shanghai";
                    break;
                case "04":
                    $timezone = "Asia/Shanghai";
                    break;
                case "05":
                    $timezone = "Asia/Harbin";
                    break;
                case "06":
                    $timezone = "Asia/Chongqing";
                    break;
                case "07":
                    $timezone = "Asia/Shanghai";
                    break;
                case "08":
                    $timezone = "Asia/Harbin";
                    break;
                case "09":
                    $timezone = "Asia/Shanghai";
                    break;
                case "10":
                    $timezone = "Asia/Shanghai";
                    break;
                case "11":
                    $timezone = "Asia/Chongqing";
                    break;
                case "12":
                    $timezone = "Asia/Shanghai";
                    break;
                case "13":
                    $timezone = "Asia/Urumqi";
                    break;
                case "14":
                    $timezone = "Asia/Chongqing";
                    break;
                case "15":
                    $timezone = "Asia/Chongqing";
                    break;
                case "16":
                    $timezone = "Asia/Chongqing";
                    break;
                case "18":
                    $timezone = "Asia/Chongqing";
                    break;
                case "19":
                    $timezone = "Asia/Harbin";
                    break;
                case "20":
                    $timezone = "Asia/Harbin";
                    break;
                case "21":
                    $timezone = "Asia/Chongqing";
                    break;
                case "22":
                    $timezone = "Asia/Harbin";
                    break;
                case "23":
                    $timezone = "Asia/Shanghai";
                    break;
                case "24":
                    $timezone = "Asia/Chongqing";
                    break;
                case "25":
                    $timezone = "Asia/Shanghai";
                    break;
                case "26":
                    $timezone = "Asia/Chongqing";
                    break;
                case "28":
                    $timezone = "Asia/Shanghai";
                    break;
                case "29":
                    $timezone = "Asia/Chongqing";
                    break;
                case "30":
                    $timezone = "Asia/Chongqing";
                    break;
                case "31":
                    $timezone = "Asia/Chongqing";
                    break;
                case "32":
                    $timezone = "Asia/Chongqing";
                    break;
                case "33":
                    $timezone = "Asia/Chongqing";
                    break;
                default:
                    $timezone = "Asia/Chongqing";
                    break;
        }
        break;
        case "CO":
            $timezone = "America/Bogota";
            break;
        case "CR":
            $timezone = "America/Costa_Rica";
            break;
        case "CU":
            $timezone = "America/Havana";
            break;
        case "CV":
            $timezone = "Atlantic/Cape_Verde";
            break;
        case "CW":
            $timezone = "America/Curacao";
            break;
        case "CX":
            $timezone = "Indian/Christmas";
            break;
        case "CY":
            $timezone = "Asia/Nicosia";
            break;
        case "CZ":
            $timezone = "Europe/Prague";
            break;
        case "DE":
            $timezone = "Europe/Berlin";
            break;
        case "DJ":
            $timezone = "Africa/Djibouti";
            break;
        case "DK":
            $timezone = "Europe/Copenhagen";
            break;
        case "DM":
            $timezone = "America/Dominica";
            break;
        case "DO":
            $timezone = "America/Santo_Domingo";
            break;
        case "DZ":
            $timezone = "Africa/Algiers";
            break;
        case "EC":
            switch ($region) {
                case "01":
                    $timezone = "Pacific/Galapagos";
                    break;
                case "02":
                    $timezone = "America/Guayaquil";
                    break;
                case "03":
                    $timezone = "America/Guayaquil";
                    break;
                case "04":
                    $timezone = "America/Guayaquil";
                    break;
                case "05":
                    $timezone = "America/Guayaquil";
                    break;
                case "06":
                    $timezone = "America/Guayaquil";
                    break;
                case "07":
                    $timezone = "America/Guayaquil";
                    break;
                case "08":
                    $timezone = "America/Guayaquil";
                    break;
                case "09":
                    $timezone = "America/Guayaquil";
                    break;
                case "10":
                    $timezone = "America/Guayaquil";
                    break;
                case "11":
                    $timezone = "America/Guayaquil";
                    break;
                case "12":
                    $timezone = "America/Guayaquil";
                    break;
                case "13":
                    $timezone = "America/Guayaquil";
                    break;
                case "14":
                    $timezone = "America/Guayaquil";
                    break;
                case "15":
                    $timezone = "America/Guayaquil";
                    break;
                case "17":
                    $timezone = "America/Guayaquil";
                    break;
                case "18":
                    $timezone = "America/Guayaquil";
                    break;
                case "19":
                    $timezone = "America/Guayaquil";
                    break;
                case "20":
                    $timezone = "America/Guayaquil";
                    break;
                case "22":
                    $timezone = "America/Guayaquil";
                    break;
                case "24":
                    $timezone = "America/Guayaquil";
                    break;
                default:
                    $timezone = "America/Guayaquil";
                    break;
        }
        break;
        case "EE":
            $timezone = "Europe/Tallinn";
            break;
        case "EG":
            $timezone = "Africa/Cairo";
            break;
        case "EH":
            $timezone = "Africa/El_Aaiun";
            break;
        case "ER":
            $timezone = "Africa/Asmara";
            break;
        case "ES":
            switch ($region) {
                case "07":
                    $timezone = "Europe/Madrid";
                    break;
                case "27":
                    $timezone = "Europe/Madrid";
                    break;
                case "29":
                    $timezone = "Europe/Madrid";
                    break;
                case "31":
                    $timezone = "Europe/Madrid";
                    break;
                case "32":
                    $timezone = "Europe/Madrid";
                    break;
                case "34":
                    $timezone = "Europe/Madrid";
                    break;
                case "39":
                    $timezone = "Europe/Madrid";
                    break;
                case "51":
                    $timezone = "Africa/Ceuta";
                    break;
                case "52":
                    $timezone = "Europe/Madrid";
                    break;
                case "53":
                    $timezone = "Atlantic/Canary";
                    break;
                case "54":
                    $timezone = "Europe/Madrid";
                    break;
                case "55":
                    $timezone = "Europe/Madrid";
                    break;
                case "56":
                    $timezone = "Europe/Madrid";
                    break;
                case "57":
                    $timezone = "Europe/Madrid";
                    break;
                case "58":
                    $timezone = "Europe/Madrid";
                    break;
                case "59":
                    $timezone = "Europe/Madrid";
                    break;
                case "60":
                    $timezone = "Europe/Madrid";
                    break;
                default:
                    $timezone = "Europe/Madrid";
                    break;
        }
        break;
        case "ET":
            $timezone = "Africa/Addis_Ababa";
            break;
        case "FI":
            $timezone = "Europe/Helsinki";
            break;
        case "FJ":
            $timezone = "Pacific/Fiji";
            break;
        case "FK":
            $timezone = "Atlantic/Stanley";
            break;
        case "FM":
            $timezone = "Pacific/Pohnpei";
            break;
        case "FO":
            $timezone = "Atlantic/Faroe";
            break;
        case "FR":
            $timezone = "Europe/Paris";
            break;
        case "FX":
            $timezone = "Europe/Paris";
            break;
        case "GA":
            $timezone = "Africa/Libreville";
            break;
        case "GB":
            $timezone = "Europe/London";
            break;
        case "GD":
            $timezone = "America/Grenada";
            break;
        case "GE":
            $timezone = "Asia/Tbilisi";
            break;
        case "GF":
            $timezone = "America/Cayenne";
            break;
        case "GG":
            $timezone = "Europe/Guernsey";
            break;
        case "GH":
            $timezone = "Africa/Accra";
            break;
        case "GI":
            $timezone = "Europe/Gibraltar";
            break;
        case "GL":
            switch ($region) {
                case "01":
                    $timezone = "America/Thule";
                    break;
                case "02":
                    $timezone = "America/Godthab";
                    break;
                case "03":
                    $timezone = "America/Godthab";
                    break;
                    default:
                    $timezone = "America/Godthab";
                    break;
        }
        break;
        case "GM":
            $timezone = "Africa/Banjul";
            break;
        case "GN":
            $timezone = "Africa/Conakry";
            break;
        case "GP":
            $timezone = "America/Guadeloupe";
            break;
        case "GQ":
            $timezone = "Africa/Malabo";
            break;
        case "GR":
            $timezone = "Europe/Athens";
            break;
        case "GS":
            $timezone = "Atlantic/South_Georgia";
            break;
        case "GT":
            $timezone = "America/Guatemala";
            break;
        case "GU":
            $timezone = "Pacific/Guam";
            break;
        case "GW":
            $timezone = "Africa/Bissau";
            break;
        case "GY":
            $timezone = "America/Guyana";
            break;
        case "HK":
            $timezone = "Asia/Hong_Kong";
            break;
        case "HN":
            $timezone = "America/Tegucigalpa";
            break;
        case "HR":
            $timezone = "Europe/Zagreb";
            break;
        case "HT":
            $timezone = "America/Port-au-Prince";
            break;
        case "HU":
            $timezone = "Europe/Budapest";
            break;
        case "ID":
            switch ($region) {
                case "01":
                    $timezone = "Asia/Pontianak";
                    break;
                case "02":
                    $timezone = "Asia/Makassar";
                    break;
                case "03":
                    $timezone = "Asia/Jakarta";
                    break;
                case "04":
                    $timezone = "Asia/Jakarta";
                    break;
                case "05":
                    $timezone = "Asia/Jakarta";
                    break;
                case "06":
                    $timezone = "Asia/Jakarta";
                    break;
                case "07":
                    $timezone = "Asia/Jakarta";
                    break;
                case "08":
                    $timezone = "Asia/Jakarta";
                    break;
                case "09":
                    $timezone = "Asia/Jayapura";
                    break;
                case "10":
                    $timezone = "Asia/Jakarta";
                    break;
                case "11":
                    $timezone = "Asia/Pontianak";
                    break;
                case "12":
                    $timezone = "Asia/Makassar";
                    break;
                case "13":
                    $timezone = "Asia/Makassar";
                    break;
                case "14":
                    $timezone = "Asia/Makassar";
                    break;
                case "15":
                    $timezone = "Asia/Jakarta";
                    break;
                case "16":
                    $timezone = "Asia/Makassar";
                    break;
                case "17":
                    $timezone = "Asia/Makassar";
                    break;
                case "18":
                    $timezone = "Asia/Makassar";
                    break;
                case "19":
                    $timezone = "Asia/Pontianak";
                    break;
                case "20":
                    $timezone = "Asia/Makassar";
                    break;
                case "21":
                    $timezone = "Asia/Makassar";
                    break;
                case "22":
                    $timezone = "Asia/Makassar";
                    break;
                case "23":
                    $timezone = "Asia/Makassar";
                    break;
                case "24":
                    $timezone = "Asia/Jakarta";
                    break;
                case "25":
                    $timezone = "Asia/Pontianak";
                    break;
                case "26":
                    $timezone = "Asia/Pontianak";
                    break;
                case "28":
                    $timezone = "Asia/Jayapura";
                    break;
                case "29":
                    $timezone = "Asia/Makassar";
                    break;
                case "30":
                    $timezone = "Asia/Jakarta";
                    break;
                case "31":
                    $timezone = "Asia/Makassar";
                    break;
                case "32":
                    $timezone = "Asia/Jakarta";
                    break;
                case "33":
                    $timezone = "Asia/Jakarta";
                    break;
                case "34":
                    $timezone = "Asia/Makassar";
                    break;
                case "35":
                    $timezone = "Asia/Pontianak";
                    break;
                case "36":
                    $timezone = "Asia/Jayapura";
                    break;
                case "37":
                    $timezone = "Asia/Pontianak";
                    break;
                case "38":
                    $timezone = "Asia/Makassar";
                    break;
                case "39":
                    $timezone = "Asia/Jayapura";
                    break;
                case "40":
                    $timezone = "Asia/Pontianak";
                    break;
                case "41":
                    $timezone = "Asia/Makassar";
                    break;
                default:
                    $timezone = "Asia/Makassar";
                    break;
        }
        break;
        case "IE":
            $timezone = "Europe/Dublin";
            break;
        case "IL":
            $timezone = "Asia/Jerusalem";
            break;
        case "IM":
            $timezone = "Europe/Isle_of_Man";
            break;
        case "IN":
            $timezone = "Asia/Kolkata";
            break;
        case "IO":
            $timezone = "Indian/Chagos";
            break;
        case "IQ":
            $timezone = "Asia/Baghdad";
            break;
        case "IR":
            $timezone = "Asia/Tehran";
            break;
        case "IS":
            $timezone = "Atlantic/Reykjavik";
            break;
        case "IT":
            $timezone = "Europe/Rome";
            break;
        case "JE":
            $timezone = "Europe/Jersey";
            break;
        case "JM":
            $timezone = "America/Jamaica";
            break;
        case "JO":
            $timezone = "Asia/Amman";
            break;
        case "JP":
            $timezone = "Asia/Tokyo";
            break;
        case "KE":
            $timezone = "Africa/Nairobi";
            break;
        case "KG":
            $timezone = "Asia/Bishkek";
            break;
        case "KH":
            $timezone = "Asia/Phnom_Penh";
            break;
        case "KI":
            $timezone = "Pacific/Tarawa";
            break;
        case "KM":
            $timezone = "Indian/Comoro";
            break;
        case "KN":
            $timezone = "America/St_Kitts";
            break;
        case "KP":
            $timezone = "Asia/Pyongyang";
            break;
        case "KR":
            $timezone = "Asia/Seoul";
            break;
        case "KW":
            $timezone = "Asia/Kuwait";
            break;
        case "KY":
            $timezone = "America/Cayman";
            break;
        case "KZ":
            switch ($region) {
                case "01":
                    $timezone = "Asia/Almaty";
                    break;
                case "02":
                    $timezone = "Asia/Almaty";
                    break;
                case "03":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "04":
                    $timezone = "Asia/Aqtobe";
                    break;
                case "05":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "06":
                    $timezone = "Asia/Aqtau";
                    break;
                case "07":
                    $timezone = "Asia/Oral";
                    break;
                case "08":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "09":
                    $timezone = "Asia/Aqtau";
                    break;
                case "10":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "11":
                    $timezone = "Asia/Almaty";
                    break;
                case "12":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "13":
                    $timezone = "Asia/Aqtobe";
                    break;
                case "14":
                    $timezone = "Asia/Qyzylorda";
                    break;
                case "15":
                    $timezone = "Asia/Almaty";
                    break;
                case "16":
                    $timezone = "Asia/Aqtobe";
                    break;
                case "17":
                    $timezone = "Asia/Almaty";
                    break;
                default:
                    $timezone = "Asia/Almaty";
                    break;
        }
        break;
        case "LA":
            $timezone = "Asia/Vientiane";
            break;
        case "LB":
            $timezone = "Asia/Beirut";
            break;
        case "LC":
            $timezone = "America/St_Lucia";
            break;
        case "LI":
            $timezone = "Europe/Vaduz";
            break;
        case "LK":
            $timezone = "Asia/Colombo";
            break;
        case "LR":
            $timezone = "Africa/Monrovia";
            break;
        case "LS":
            $timezone = "Africa/Maseru";
            break;
        case "LT":
            $timezone = "Europe/Vilnius";
            break;
        case "LU":
            $timezone = "Europe/Luxembourg";
            break;
        case "LV":
            $timezone = "Europe/Riga";
            break;
        case "LY":
            $timezone = "Africa/Tripoli";
            break;
        case "MA":
            $timezone = "Africa/Casablanca";
            break;
        case "MC":
            $timezone = "Europe/Monaco";
            break;
        case "MD":
            $timezone = "Europe/Chisinau";
            break;
        case "ME":
            $timezone = "Europe/Podgorica";
            break;
        case "MF":
            $timezone = "America/Marigot";
            break;
        case "MG":
            $timezone = "Indian/Antananarivo";
            break;
        case "MH":
            $timezone = "Pacific/Kwajalein";
            break;
        case "MK":
            $timezone = "Europe/Skopje";
            break;
        case "ML":
            $timezone = "Africa/Bamako";
            break;
        case "MM":
            $timezone = "Asia/Rangoon";
            break;
        case "MN":
            switch ($region) {
                case "06":
                    $timezone = "Asia/Choibalsan";
                    break;
                case "11":
                    $timezone = "Asia/Ulaanbaatar";
                    break;
                case "17":
                    $timezone = "Asia/Choibalsan";
                    break;
                case "19":
                    $timezone = "Asia/Hovd";
                    break;
                case "20":
                    $timezone = "Asia/Ulaanbaatar";
                    break;
                case "21":
                    $timezone = "Asia/Ulaanbaatar";
                    break;
                case "25":
                    $timezone = "Asia/Ulaanbaatar";
                    break;
                default:
                    $timezone = "Asia/Ulaanbaatar";
                    break;
        }
        break;
        case "MO":
            $timezone = "Asia/Macau";
            break;
        case "MP":
            $timezone = "Pacific/Saipan";
            break;
        case "MQ":
            $timezone = "America/Martinique";
            break;
        case "MR":
            $timezone = "Africa/Nouakchott";
            break;
        case "MS":
            $timezone = "America/Montserrat";
            break;
        case "MT":
            $timezone = "Europe/Malta";
            break;
        case "MU":
            $timezone = "Indian/Mauritius";
            break;
        case "MV":
            $timezone = "Indian/Maldives";
            break;
        case "MW":
            $timezone = "Africa/Blantyre";
            break;
        case "MX":
            switch ($region) {
                case "01":
                    $timezone = "America/Mexico_City";
                    break;
                case "02":
                    $timezone = "America/Tijuana";
                    break;
                case "03":
                    $timezone = "America/Hermosillo";
                    break;
                case "04":
                    $timezone = "America/Merida";
                    break;
                case "05":
                    $timezone = "America/Mexico_City";
                    break;
                case "06":
                    $timezone = "America/Chihuahua";
                    break;
                case "07":
                    $timezone = "America/Monterrey";
                    break;
                case "08":
                    $timezone = "America/Mexico_City";
                    break;
                case "09":
                    $timezone = "America/Mexico_City";
                    break;
                case "10":
                    $timezone = "America/Mazatlan";
                    break;
                case "11":
                    $timezone = "America/Mexico_City";
                    break;
                case "12":
                    $timezone = "America/Mexico_City";
                    break;
                case "13":
                    $timezone = "America/Mexico_City";
                    break;
                case "14":
                    $timezone = "America/Mazatlan";
                    break;
                case "15":
                    $timezone = "America/Chihuahua";
                    break;
                case "16":
                    $timezone = "America/Mexico_City";
                    break;
                case "17":
                    $timezone = "America/Mexico_City";
                    break;
                case "18":
                    $timezone = "America/Mazatlan";
                    break;
                case "19":
                    $timezone = "America/Monterrey";
                    break;
                case "20":
                    $timezone = "America/Mexico_City";
                    break;
                case "21":
                    $timezone = "America/Mexico_City";
                    break;
                case "22":
                    $timezone = "America/Mexico_City";
                    break;
                case "23":
                    $timezone = "America/Cancun";
                    break;
                case "24":
                    $timezone = "America/Mexico_City";
                    break;
                case "25":
                    $timezone = "America/Mazatlan";
                    break;
                case "26":
                    $timezone = "America/Hermosillo";
                    break;
                case "27":
                    $timezone = "America/Merida";
                    break;
                case "28":
                    $timezone = "America/Monterrey";
                    break;
                case "29":
                    $timezone = "America/Mexico_City";
                    break;
                case "30":
                    $timezone = "America/Mexico_City";
                    break;
                case "31":
                    $timezone = "America/Merida";
                    break;
                case "32":
                    $timezone = "America/Monterrey";
                    break;
        }
        break;
        case "MY":
            switch ($region) {
                case "01":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "02":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "03":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "04":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "05":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "06":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "07":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "08":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "09":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "11":
                    $timezone = "Asia/Kuching";
                    break;
                case "12":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "13":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "14":
                    $timezone = "Asia/Kuala_Lumpur";
                    break;
                case "15":
                    $timezone = "Asia/Kuching";
                    break;
                case "16":
                    $timezone = "Asia/Kuching";
                    break;
                default:
                    $timezone = "Asia/Kuching";
                    break;
        }
        break;
        case "MZ":
            $timezone = "Africa/Maputo";
            break;
        case "NA":
            $timezone = "Africa/Windhoek";
            break;
        case "NC":
            $timezone = "Pacific/Noumea";
            break;
        case "NE":
            $timezone = "Africa/Niamey";
            break;
        case "NF":
            $timezone = "Pacific/Norfolk";
            break;
        case "NG":
            $timezone = "Africa/Lagos";
            break;
        case "NI":
            $timezone = "America/Managua";
            break;
        case "NL":
            $timezone = "Europe/Amsterdam";
            break;
        case "NO":
            $timezone = "Europe/Oslo";
            break;
        case "NP":
            $timezone = "Asia/Kathmandu";
            break;
        case "NR":
            $timezone = "Pacific/Nauru";
            break;
        case "NU":
            $timezone = "Pacific/Niue";
            break;
        case "NZ":
            switch ($region) {
                case "85":
                    $timezone = "Pacific/Auckland";
                    break;
                case "E7":
                    $timezone = "Pacific/Auckland";
                    break;
                case "E8":
                    $timezone = "Pacific/Auckland";
                    break;
                case "E9":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F1":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F2":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F3":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F4":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F5":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F6":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F7":
                    $timezone = "Pacific/Chatham";
                    break;
                case "F8":
                    $timezone = "Pacific/Auckland";
                    break;
                case "F9":
                    $timezone = "Pacific/Auckland";
                    break;
                case "G1":
                    $timezone = "Pacific/Auckland";
                    break;
                case "G2":
                    $timezone = "Pacific/Auckland";
                    break;
                case "G3":
                    $timezone = "Pacific/Auckland";
                    break;
                default:
                    $timezone = "Pacific/Auckland";
                    break;
        }
        break;
        case "OM":
            $timezone = "Asia/Muscat";
            break;
        case "PA":
            $timezone = "America/Panama";
            break;
        case "PE":
            $timezone = "America/Lima";
            break;
        case "PF":
            $timezone = "Pacific/Marquesas";
            break;
        case "PG":
            $timezone = "Pacific/Port_Moresby";
            break;
        case "PH":
            $timezone = "Asia/Manila";
            break;
        case "PK":
            $timezone = "Asia/Karachi";
            break;
        case "PL":
            $timezone = "Europe/Warsaw";
            break;
        case "PM":
            $timezone = "America/Miquelon";
            break;
        case "PN":
            $timezone = "Pacific/Pitcairn";
            break;
        case "PR":
            $timezone = "America/Puerto_Rico";
            break;
        case "PS":
            $timezone = "Asia/Gaza";
            break;
        case "PT":
            switch ($region) {
                case "02":
                    $timezone = "Europe/Lisbon";
                    break;
                case "03":
                    $timezone = "Europe/Lisbon";
                    break;
                case "04":
                    $timezone = "Europe/Lisbon";
                    break;
                case "05":
                    $timezone = "Europe/Lisbon";
                    break;
                case "06":
                    $timezone = "Europe/Lisbon";
                    break;
                case "07":
                    $timezone = "Europe/Lisbon";
                    break;
                case "08":
                    $timezone = "Europe/Lisbon";
                    break;
                case "09":
                    $timezone = "Europe/Lisbon";
                    break;
                case "10":
                    $timezone = "Atlantic/Madeira";
                    break;
                case "11":
                    $timezone = "Europe/Lisbon";
                    break;
                case "13":
                    $timezone = "Europe/Lisbon";
                    break;
                case "14":
                    $timezone = "Europe/Lisbon";
                    break;
                case "16":
                    $timezone = "Europe/Lisbon";
                    break;
                case "17":
                    $timezone = "Europe/Lisbon";
                    break;
                case "18":
                    $timezone = "Europe/Lisbon";
                    break;
                case "19":
                    $timezone = "Europe/Lisbon";
                    break;
                case "20":
                    $timezone = "Europe/Lisbon";
                    break;
                case "21":
                    $timezone = "Europe/Lisbon";
                    break;
                case "22":
                    $timezone = "Europe/Lisbon";
                    break;
                case "23":
                    $timezone = "Atlantic/Azores";
                    break;
                default:
                    $timezone = "Atlantic/Azores";
                    break;
        }
        break;
        case "PW":
            $timezone = "Pacific/Palau";
            break;
        case "PY":
            $timezone = "America/Asuncion";
            break;
        case "QA":
            $timezone = "Asia/Qatar";
            break;
        case "RE":
            $timezone = "Indian/Reunion";
            break;
        case "RO":
            $timezone = "Europe/Bucharest";
            break;
        case "RS":
            $timezone = "Europe/Belgrade";
            break;
        case "RU":
            switch ($region) {
                case "01":
                    $timezone = "Europe/Volgograd";
                    break;
                case "02":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "03":
                    $timezone = "Asia/Novokuznetsk";
                    break;
                case "04":
                    $timezone = "Asia/Novosibirsk";
                    break;
                case "05":
                    $timezone = "Asia/Vladivostok";
                    break;
                case "06":
                    $timezone = "Europe/Moscow";
                    break;
                case "07":
                    $timezone = "Europe/Volgograd";
                    break;
                case "08":
                    $timezone = "Europe/Samara";
                    break;
                case "09":
                    $timezone = "Europe/Moscow";
                    break;
                case "10":
                    $timezone = "Europe/Moscow";
                    break;
                case "11":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "12":
                    $timezone = "Europe/Volgograd";
                    break;
                case "13":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "14":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "15":
                    $timezone = "Asia/Anadyr";
                    break;
                case "16":
                    $timezone = "Europe/Samara";
                    break;
                case "17":
                    $timezone = "Europe/Volgograd";
                    break;
                case "18":
                    $timezone = "Asia/Krasnoyarsk";
                    break;
                case "20":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "21":
                    $timezone = "Europe/Moscow";
                    break;
                case "22":
                    $timezone = "Europe/Volgograd";
                    break;
                case "23":
                    $timezone = "Europe/Kaliningrad";
                    break;
                case "24":
                    $timezone = "Europe/Volgograd";
                    break;
                case "25":
                    $timezone = "Europe/Moscow";
                    break;
                case "26":
                    $timezone = "Asia/Kamchatka";
                    break;
                case "27":
                    $timezone = "Europe/Volgograd";
                    break;
                case "28":
                    $timezone = "Europe/Moscow";
                    break;
                case "29":
                    $timezone = "Asia/Novokuznetsk";
                    break;
                case "30":
                    $timezone = "Asia/Vladivostok";
                    break;
                case "31":
                    $timezone = "Asia/Krasnoyarsk";
                    break;
                case "32":
                    $timezone = "Asia/Omsk";
                    break;
                case "33":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "34":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "35":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "36":
                    $timezone = "Asia/Anadyr";
                    break;
                case "37":
                    $timezone = "Europe/Moscow";
                    break;
                case "38":
                    $timezone = "Europe/Volgograd";
                    break;
                case "39":
                    $timezone = "Asia/Krasnoyarsk";
                    break;
                case "40":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "41":
                    $timezone = "Europe/Moscow";
                    break;
                case "42":
                    $timezone = "Europe/Moscow";
                    break;
                case "43":
                    $timezone = "Europe/Moscow";
                    break;
                case "44":
                    $timezone = "Asia/Magadan";
                    break;
                case "45":
                    $timezone = "Europe/Samara";
                    break;
                case "46":
                    $timezone = "Europe/Samara";
                    break;
                case "47":
                    $timezone = "Europe/Moscow";
                    break;
                case "48":
                    $timezone = "Europe/Moscow";
                    break;
                case "49":
                    $timezone = "Europe/Moscow";
                    break;
                case "50":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "51":
                    $timezone = "Europe/Moscow";
                    break;
                case "52":
                    $timezone = "Europe/Moscow";
                    break;
                case "53":
                    $timezone = "Asia/Novosibirsk";
                    break;
                case "54":
                    $timezone = "Asia/Omsk";
                    break;
                case "55":
                    $timezone = "Europe/Samara";
                    break;
                case "56":
                    $timezone = "Europe/Moscow";
                    break;
                case "57":
                    $timezone = "Europe/Samara";
                    break;
                case "58":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "59":
                    $timezone = "Asia/Vladivostok";
                    break;
                case "60":
                    $timezone = "Europe/Kaliningrad";
                    break;
                case "61":
                    $timezone = "Europe/Volgograd";
                    break;
                case "62":
                    $timezone = "Europe/Moscow";
                    break;
                case "63":
                    $timezone = "Asia/Yakutsk";
                    break;
                case "64":
                    $timezone = "Asia/Sakhalin";
                    break;
                case "65":
                    $timezone = "Europe/Samara";
                    break;
                case "66":
                    $timezone = "Europe/Moscow";
                    break;
                case "67":
                    $timezone = "Europe/Samara";
                    break;
                case "68":
                    $timezone = "Europe/Volgograd";
                    break;
                case "69":
                    $timezone = "Europe/Moscow";
                    break;
                case "70":
                    $timezone = "Europe/Volgograd";
                    break;
                case "71":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "72":
                    $timezone = "Europe/Moscow";
                    break;
                case "73":
                    $timezone = "Europe/Samara";
                    break;
                case "74":
                    $timezone = "Asia/Krasnoyarsk";
                    break;
                case "75":
                    $timezone = "Asia/Novosibirsk";
                    break;
                case "76":
                    $timezone = "Europe/Moscow";
                    break;
                case "77":
                    $timezone = "Europe/Moscow";
                    break;
                case "78":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "79":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "80":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "81":
                    $timezone = "Europe/Samara";
                    break;
                case "82":
                    $timezone = "Asia/Irkutsk";
                    break;
                case "83":
                    $timezone = "Europe/Moscow";
                    break;
                case "84":
                    $timezone = "Europe/Volgograd";
                    break;
                case "85":
                    $timezone = "Europe/Moscow";
                    break;
                case "86":
                    $timezone = "Europe/Moscow";
                    break;
                case "87":
                    $timezone = "Asia/Novosibirsk";
                    break;
                case "88":
                    $timezone = "Europe/Moscow";
                    break;
                case "89":
                    $timezone = "Asia/Vladivostok";
                    break;
                case "90":
                    $timezone = "Asia/Yekaterinburg";
                    break;
                case "91":
                    $timezone = "Asia/Krasnoyarsk";
                    break;
                case "92":
                    $timezone = "Asia/Anadyr";
                    break;
                case "93":
                    $timezone = "Asia/Irkutsk";
                    break;
                default:
                    $timezone = "Asia/Irkutsk";
                    break;
        }
        break;
        case "RW":
            $timezone = "Africa/Kigali";
            break;
        case "SA":
            $timezone = "Asia/Riyadh";
            break;
        case "SB":
            $timezone = "Pacific/Guadalcanal";
            break;
        case "SC":
            $timezone = "Indian/Mahe";
            break;
        case "SD":
            $timezone = "Africa/Khartoum";
            break;
        case "SE":
            $timezone = "Europe/Stockholm";
            break;
        case "SG":
            $timezone = "Asia/Singapore";
            break;
        case "SH":
            $timezone = "Atlantic/St_Helena";
            break;
        case "SI":
            $timezone = "Europe/Ljubljana";
            break;
        case "SJ":
            $timezone = "Arctic/Longyearbyen";
            break;
        case "SK":
            $timezone = "Europe/Bratislava";
            break;
        case "SL":
            $timezone = "Africa/Freetown";
            break;
        case "SM":
            $timezone = "Europe/San_Marino";
            break;
        case "SN":
            $timezone = "Africa/Dakar";
            break;
        case "SO":
            $timezone = "Africa/Mogadishu";
            break;
        case "SR":
            $timezone = "America/Paramaribo";
            break;
        case "SS":
            $timezone = "Africa/Juba";
            break;
        case "ST":
            $timezone = "Africa/Sao_Tome";
            break;
        case "SV":
            $timezone = "America/El_Salvador";
            break;
        case "SX":
            $timezone = "America/Curacao";
            break;
        case "SY":
            $timezone = "Asia/Damascus";
            break;
        case "SZ":
            $timezone = "Africa/Mbabane";
            break;
        case "TC":
            $timezone = "America/Grand_Turk";
            break;
        case "TD":
            $timezone = "Africa/Ndjamena";
            break;
        case "TF":
            $timezone = "Indian/Kerguelen";
            break;
        case "TG":
            $timezone = "Africa/Lome";
            break;
        case "TH":
            $timezone = "Asia/Bangkok";
            break;
        case "TJ":
            $timezone = "Asia/Dushanbe";
            break;
        case "TK":
            $timezone = "Pacific/Fakaofo";
            break;
        case "TL":
            $timezone = "Asia/Dili";
            break;
        case "TM":
            $timezone = "Asia/Ashgabat";
            break;
        case "TN":
            $timezone = "Africa/Tunis";
            break;
        case "TO":
            $timezone = "Pacific/Tongatapu";
            break;
        case "TR":
            $timezone = "Asia/Istanbul";
            break;
        case "TT":
            $timezone = "America/Port_of_Spain";
            break;
        case "TV":
            $timezone = "Pacific/Funafuti";
            break;
        case "TW":
            $timezone = "Asia/Taipei";
            break;
        case "TZ":
            $timezone = "Africa/Dar_es_Salaam";
            break;
        case "UA":
            switch ($region) {
                case "01":
                    $timezone = "Europe/Kiev";
                    break;
                case "02":
                    $timezone = "Europe/Kiev";
                    break;
                case "03":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "04":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "05":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "06":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "07":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "08":
                    $timezone = "Europe/Simferopol";
                    break;
                case "09":
                    $timezone = "Europe/Kiev";
                    break;
                case "10":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "11":
                    $timezone = "Europe/Simferopol";
                    break;
                case "12":
                    $timezone = "Europe/Kiev";
                    break;
                case "13":
                    $timezone = "Europe/Kiev";
                    break;
                case "14":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "15":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "16":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "17":
                    $timezone = "Europe/Simferopol";
                    break;
                case "18":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "19":
                    $timezone = "Europe/Kiev";
                    break;
                case "20":
                    $timezone = "Europe/Simferopol";
                    break;
                case "21":
                    $timezone = "Europe/Kiev";
                    break;
                case "22":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "23":
                    $timezone = "Europe/Kiev";
                    break;
                case "24":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "25":
                    $timezone = "Europe/Uzhgorod";
                    break;
                case "26":
                    $timezone = "Europe/Zaporozhye";
                    break;
                case "27":
                    $timezone = "Europe/Kiev";
                    break;
                default:
                    $timezone = "Europe/Kiev";
                    break;
        }
        break;
        case "UG":
            $timezone = "Africa/Kampala";
            break;
        case "UM":
            $timezone = "Pacific/Wake";
            break;
        case "US":
            switch ($region) {
                case "AK":
                    $timezone = "America/Anchorage";
                    break;
                case "AL":
                    $timezone = "America/Chicago";
                    break;
                case "AR":
                    $timezone = "America/Chicago";
                    break;
                case "AZ":
                    $timezone = "America/Phoenix";
                    break;
                case "CA":
                    $timezone = "America/Los_Angeles";
                    break;
                case "CO":
                    $timezone = "America/Denver";
                    break;
                case "CT":
                    $timezone = "America/New_York";
                    break;
                case "DC":
                    $timezone = "America/New_York";
                    break;
                case "DE":
                    $timezone = "America/New_York";
                    break;
                case "FL":
                    $timezone = "America/New_York";
                    break;
                case "GA":
                    $timezone = "America/New_York";
                    break;
                case "HI":
                    $timezone = "Pacific/Honolulu";
                    break;
                case "IA":
                    $timezone = "America/Chicago";
                    break;
                case "ID":
                    $timezone = "America/Denver";
                    break;
                case "IL":
                    $timezone = "America/Chicago";
                    break;
                case "IN":
                    $timezone = "America/Indiana/Indianapolis";
                    break;
                case "KS":
                    $timezone = "America/Chicago";
                    break;
                case "KY":
                    $timezone = "America/New_York";
                    break;
                case "LA":
                    $timezone = "America/Chicago";
                    break;
                case "MA":
                    $timezone = "America/New_York";
                    break;
                case "MD":
                    $timezone = "America/New_York";
                    break;
                case "ME":
                    $timezone = "America/New_York";
                    break;
                case "MI":
                    $timezone = "America/New_York";
                    break;
                case "MN":
                    $timezone = "America/Chicago";
                    break;
                case "MO":
                    $timezone = "America/Chicago";
                    break;
                case "MS":
                    $timezone = "America/Chicago";
                    break;
                case "MT":
                    $timezone = "America/Denver";
                    break;
                case "NC":
                    $timezone = "America/New_York";
                    break;
                case "ND":
                    $timezone = "America/Chicago";
                    break;
                case "NE":
                    $timezone = "America/Chicago";
                    break;
                case "NH":
                    $timezone = "America/New_York";
                    break;
                case "NJ":
                    $timezone = "America/New_York";
                    break;
                case "NM":
                    $timezone = "America/Denver";
                    break;
                case "NV":
                    $timezone = "America/Los_Angeles";
                    break;
                case "NY":
                    $timezone = "America/New_York";
                    break;
                case "OH":
                    $timezone = "America/New_York";
                    break;
                case "OK":
                    $timezone = "America/Chicago";
                    break;
                case "OR":
                    $timezone = "America/Los_Angeles";
                    break;
                case "PA":
                    $timezone = "America/New_York";
                    break;
                case "RI":
                    $timezone = "America/New_York";
                    break;
                case "SC":
                    $timezone = "America/New_York";
                    break;
                case "SD":
                    $timezone = "America/Chicago";
                    break;
                case "TN":
                    $timezone = "America/Chicago";
                    break;
                case "TX":
                    $timezone = "America/Chicago";
                    break;
                case "UT":
                    $timezone = "America/Denver";
                    break;
                case "VA":
                    $timezone = "America/New_York";
                    break;
                case "VT":
                    $timezone = "America/New_York";
                    break;
                case "WA":
                    $timezone = "America/Los_Angeles";
                    break;
                case "WI":
                    $timezone = "America/Chicago";
                    break;
                case "WV":
                    $timezone = "America/New_York";
                    break;
                case "WY":
                    $timezone = "America/Denver";
                    break;
                default:
                    $timezone = "America/Denver";
                    break;
        }
        break;
        case "UY":
            $timezone = "America/Montevideo";
            break;
        case "UZ":
            switch ($region) {
                case "01":
                    $timezone = "Asia/Tashkent";
                    break;
                case "02":
                    $timezone = "Asia/Samarkand";
                    break;
                case "03":
                    $timezone = "Asia/Tashkent";
                    break;
                case "05":
                    $timezone = "Asia/Samarkand";
                    break;
                case "06":
                    $timezone = "Asia/Tashkent";
                    break;
                case "07":
                    $timezone = "Asia/Samarkand";
                    break;
                case "08":
                    $timezone = "Asia/Samarkand";
                    break;
                case "09":
                    $timezone = "Asia/Samarkand";
                    break;
                case "10":
                    $timezone = "Asia/Samarkand";
                    break;
                case "12":
                    $timezone = "Asia/Samarkand";
                    break;
                case "13":
                    $timezone = "Asia/Tashkent";
                    break;
                case "14":
                    $timezone = "Asia/Tashkent";
                    break;
                default:
                    $timezone = "Asia/Tashkent";
                    break;
        }
        break;
        case "VA":
            $timezone = "Europe/Vatican";
            break;
        case "VC":
            $timezone = "America/St_Vincent";
            break;
        case "VE":
            $timezone = "America/Caracas";
            break;
        case "VG":
            $timezone = "America/Tortola";
            break;
        case "VI":
            $timezone = "America/St_Thomas";
            break;
        case "VN":
            $timezone = "Asia/Phnom_Penh";
            break;
        case "VU":
            $timezone = "Pacific/Efate";
            break;
        case "WF":
            $timezone = "Pacific/Wallis";
            break;
        case "WS":
            $timezone = "Pacific/Pago_Pago";
            break;
        case "YE":
            $timezone = "Asia/Aden";
            break;
        case "YT":
            $timezone = "Indian/Mayotte";
            break;
        case "YU":
            $timezone = "Europe/Belgrade";
            break;
        case "ZA":
            $timezone = "Africa/Johannesburg";
            break;
        case "ZM":
            $timezone = "Africa/Lusaka";
            break;
        case "ZW":
            $timezone = "Africa/Harare";
            break;
    }
    return $timezone;
}
class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function minifyHtml($buffer="")
	{
		
		$re = '%# Collapse whitespace everywhere but in blacklisted elements.
			(?>             # Match all whitespans other than single space.
			  [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
			| \s{2,}        # or two or more consecutive-any-whitespace.
			) # Note: The remaining regex consumes no text at all...
			(?=             # Ensure we are not in a blacklist tag.
			  [^<]*+        # Either zero or more non-"<" {normal*}
			  (?:           # Begin {(special normal*)*} construct
				<           # or a < starting a non-blacklist tag.
				(?!/?(?:textarea|pre|script)\b)
				[^<]*+      # more non-"<" {normal*}
			  )*+           # Finish "unrolling-the-loop"
			  (?:           # Begin alternation group.
				<           # Either a blacklist start tag.
				(?>textarea|pre|script)\b
			  | \z          # or end of file.
			  )             # End alternation group.
			)  # If we made it here, we are not in a blacklist tag.
			%Six';

		$new_buffer = preg_replace($re, " ", $buffer);

		// We are going to check if processing has working
		if ($new_buffer === null)
		{
			$new_buffer = $buffer;
		}
	return $new_buffer;
	}
	
	/*  */
	public function getStageId($tournament_stageName,$cName,$sfk='')
	{
		$date = date('Y-m-d 23:59:59') ;
		$this->load->model("Common_model");
		/* $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1'; */
		//$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'" ) ORDER BY `ts`.`startdate` desc limit 0,1';
		$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'"  AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'" ) ORDER BY `ts`.`startdate` desc limit 0,1';
		$res = $this->Common_model->direct_query($sql); 
		//echo $this->db->last_query(); exit;
		if(empty($res))
		{			
			/* $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1'; */
			//$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'") ORDER BY `ts`.`startdate` desc limit 0,1';
			$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'"  AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'") ORDER BY `ts`.`startdate` desc limit 0,1';
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
	}
	
	public function getStageId_language($tournament_stageName,$cName,$sfk='')
	{
		$date = date('Y-m-d 23:59:59') ;
		$this->load->model("Common_model");
		 $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1'; 
		
		$res = $this->Common_model->direct_query($sql); 
		if(empty($res))
		{			
			 $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` <= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` desc limit 0,1'; 
			
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
	}
	public function getNextStageId($tournament_stageName,$cName ,$sfk='')
	{
		$date = date('Y-m-d 00:00:00') ;
		$this->load->model("Common_model");
		/* $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1'; */
		$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'") ORDER BY `ts`.`startdate` ASC limit 0,1';
		$res = $this->Common_model->direct_query($sql); 
		if(empty($res))
		{			
			/* $sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1'; */
			$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT id from country where name="'.$cName.'") ORDER BY `ts`.`startdate` ASC limit 0,1';
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
		
	}
	public function getNextStageId_language($tournament_stageName,$cName ,$sfk='')
	{
		$date = date('Y-m-d 00:00:00') ;
		$this->load->model("Common_model");
		$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` INNER JOIN `language` AS `ls` ON `ls`.`objectFK` = `ts`.`id` and `ls`.`object`="tournament_stage" and `ls`.`language_typeFK`=31 WHERE `tt`.`sportFK` = "'.$sfk.'" and `ls`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1'; 
		
		$res = $this->Common_model->direct_query($sql); 
		if(empty($res))
		{			
			$sql = 'SELECT `ts`.`id` FROM `tournament_template` as `tt` INNER JOIN `tournament` AS `t` ON `t`.`tournament_templateFK` = `tt`.`id` INNER JOIN `tournament_stage` AS `ts` ON `t`.`id` = `ts`.`tournamentFK` WHERE `tt`.`sportFK` = "'.$sfk.'" and `ts`.`name` = "'.$tournament_stageName.'" AND `ts`.`startdate` >= "'.$date.'" AND `ts`.`countryFK` = (SELECT objectFK from language where name="'.$cName.'" and `language_typeFK` = 31 and `object` = "country") ORDER BY `ts`.`startdate` ASC limit 0,1'; 
			
			$res = $this->Common_model->direct_query($sql); 	
		}

		if(!empty($res))
		{
			return $res[0]->id;
		}else{
			return false;;
		}
		
	}
	public function getTtId($ttName,$sfk )
	{
		$date = date('Y-m-d 23:59:59') ;
		 $this->load->model("Common_model");
		$sql = 'SELECT id FROM `tournament_template` WHERE name="'.$ttName.'"  and sportFK="'.$sfk .'" ORDER BY id  Desc limit 0,1';
		$res = $this->Common_model->direct_query($sql);
		if(!empty($res))
		{
				return $res[0]->id;
		}else{
			return false;;
		}
	}
	/* This function is used to filter values  */
	public function filterval($val){
		$newVal = $this->db->escape_str(trim($val));
		return $newVal;
	}
	/*
	@Description : function to print data
	*/
	public function test($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		//exit;
	}
	/*
	@Descriptin : Function to print the last executed query
	*/
	public function qry()
	{
		 print_r($this->db->last_query());
		 //exit;
	}


	public function sortArrayByArray($sportid,$countryid,$tableName= 'leagueslist',$front='',$extra = array()) {
   $this->load->model("Common_model");
   $this->load->model("Common_games_model");
    if($countryid=='')
    {

  	$array= $data['leagues'] = $extra;
//echo $this->db->last_query(); exit;
        //  print_r($array);
   $sorted_leagues = $this->Common_model->get_where($tableName,array('game_id' =>$sportid));

    }
else{
       $array= $data['leagues'] = $this->Common_games_model->get_country_leagues($sportid, $countryid);

	   $sorted_leagues = $this->Common_model->get_where($tableName,array('game_id' =>$sportid, 'country_id'=>$countryid));
    }
		$arr =array();
		if(!empty($sorted_leagues))
		{
    	 $orderArray=  $sorted = json_decode($sorted_leagues[0]->league_data,true);


   $ordered = array();
    $remain = array();
    //print_r($orderArray);
    //exit;
    foreach ($array as $key => $val) {
       // print_r($val);
        if (array_key_exists($val->id, $orderArray) && $countryid!='') {
            $ordered[$orderArray[$val->id]] = $val;
      //echo "Yes";
      //print_r($val);
        }elseif(array_key_exists($val->stage_id, $orderArray) && $countryid==''){
         $ordered[$orderArray[$val->stage_id]] = $val;
        }else{
		$remain[] = $val;
		}
    }
	ksort($ordered);
    $arr = array_unique(array_merge($ordered,$remain), SORT_REGULAR);
	//print_r (array_unique(array_merge($ordered,$remain), SORT_REGULAR)); exit;
		//return $ordered + $array;
      //  print_r($arr);
		 return $arr;
		}
  return $array;
}


public function sortArrayByArrayRelated($sportid,$countryid,$tableName= 'leagueslist') {
   $this->load->model("Common_model");
   $this->load->model("Common_games_model");
$array= $data['leagues'] = $this->Common_games_model->get_country_leagues($sportid, $countryid);
//echo '<pre>';
//print_r($array); exit;
//echo $this->db->last_query(); exit;
       $sorted_leagues = $this->Common_model->get_where($tableName,array('game_id' =>$sportid, 'country_id'=>$countryid));
        $arr =array();
        if(!empty($sorted_leagues))
        {
         $orderArray=  $sorted = json_decode($sorted_leagues[0]->league_data,true);


   $ordered = array();
    $remain = array();
    foreach ($array as $key => $val) {
        if (array_key_exists($val->id, $orderArray)) {
            $ordered[$orderArray[$val->id]] = $val;

        }else{
        $remain[] = $val;
        }
    }
    ksort($ordered);
    $arr = array_unique(array_merge($ordered,$remain), SORT_REGULAR);
    //print_r (array_unique(array_merge($ordered,$remain), SORT_REGULAR)); exit;
        //return $ordered + $array;
         return $arr;
        }
  return $array;
}

public function get_myevents($sport)
{
  $this->load->model("Common_model");	
  $myevents = $this->Common_model->get_where('users_events',array('user_fk' =>$this->session->userdata('user_id'), 'sportFK'=>$sport));
  return $myevents;
}
public function get_myteams($sport)
{
  $this->load->model("Common_model");	
  $myevents = $this->Common_model->getfields_where_order('users_teams','alldata',array('user_fk' =>$this->session->userdata('user_id'), 'sportFK'=>$sport),'id DESC');
  return json_encode($myevents);
}

}

/* End of file  */
/* Location: ./application/core/ */