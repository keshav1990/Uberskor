<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if(! function_exists('change_acent'))
{
	function change_acent($str)
	{
$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ğ', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'İ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ı', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ğ', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', '', '', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
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
        'Ğ' => 'D', 'Ñ' => 'N',
        'Ò' => 'O', 'Ó' => 'O',
        'Ô' => 'O', 'Õ' => 'O',
        'Ö' => 'O', 'Ù' => 'U',
        'Ú' => 'U', 'Û' => 'U',
        'Ü' => 'U', 'İ' => 'Y',
        'Ş' => 'TH','ß' => 's',
        'à' => 'a', 'á' => 'a',
        'â' => 'a', 'ã' => 'a',
        'ä' => 'a', 'å' => 'a',
        'æ' => 'ae','ç' => 'c',
        'è' => 'e', 'é' => 'e',
        'ê' => 'e', 'ë' => 'e',
        'ì' => 'i', 'í' => 'i',
        'î' => 'i', 'ï' => 'i',
        'ğ' => 'd', 'ñ' => 'n',
        'ò' => 'o', 'ó' => 'o',
        'ô' => 'o', 'õ' => 'o',
        'ö' => 'o', 'ø' => 'o',
        'ù' => 'u', 'ú' => 'u',
        'û' => 'u', 'ü' => 'u',
        'ı' => 'y', 'ş' => 'th',
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
        'Ğ' => 'D', 'd' => 'd',
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
        'z' => 'z', '' => 'Z',
        '' => 'z', '?' => 's',
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
       $str = remove_accents($str);
       //$str = change_acent($str);
       return trim(stripslashes($str));
       exit;
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