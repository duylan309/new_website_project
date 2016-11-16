<?php
namespace Thue\Data\Lib;

class Util
{
    public static function numberOnly($string)
    {
        return trim(preg_replace('/[^0-9]/', '', $string));
    }

    public static function usernameValidation($username)
    {
        $username = trim($username);

        if (preg_match('/^[a-z0-9_]+$/', $username)) {
            return true;
        }

        return false;
    }

    public static function hashPassword($rawPassword)
    {
        return crypt($rawPassword, '$1$' . md5($rawPassword) . '$');
    }

    public static function phoneValidation($phone)
    {
        $phone = trim($phone);

        if (preg_match('/^([0-9\(\)\+\s\-]*)$/', $phone)) {
            return true;
        }

        return false;
    }

    public static function curlGet($url, $get = array(), $options = array())
    {
        $url = trim($url);
        if (is_array($get) && count($get)) {
            $url .= '?' . http_build_query($get);
        }

        $defaults = array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => false,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function slug($string, $separator = '-')
    {
        $string = self::ascii($string);
        $string = trim(preg_replace('/[^a-zA-Z0-9]/', ' ', $string));
        $string = trim(preg_replace('/[\s]+/', ' ', $string));
        $string = trim(preg_replace('/\s/', $separator, $string));

        if ($string != '') {
            return strtolower($string);
        } else {
            return 'n-a';
        }
    }

    public static function ascii($string)
    {
        $string = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $string);
        $string = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $string);
        $string = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $string);
        $string = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $string);
        $string = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $string);
        $string = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $string);
        $string = preg_replace('/(đ)/', 'd', $string);

        $string = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $string);
        $string = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $string);
        $string = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $string);
        $string = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $string);
        $string = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $string);
        $string = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $string);
        $string = preg_replace('/(Đ)/', 'D', $string);

        $string = trim($string);

        return $string;
    }

    public static function removeJunkSpace($string)
    {
        $words = array_filter(explode(' ', trim($string)));
        return trim(implode(' ', $words));
    }

    public static function upperFirstLetters($string)
    {
        $string = strip_tags($string);

        $string = preg_replace_callback('/(\w)\s+([\)\}])/u', function($matches) {
            return $matches[1] . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/([\(\{])\s+(\w)/u', function($matches) {
            return $matches[1] . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/(\w)([\(\{])/u', function($matches) {
            return $matches[1] . ' ' . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/([\)\}])(\w)/u', function($matches) {
            return $matches[1] . ' ' . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/(\w)([\/])/u', function($matches) {
            return $matches[1] . ' ' . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/([\/])(\w)/u', function($matches) {
            return $matches[1] . ' ' . $matches[2];
        }, trim($string));

        $string = preg_replace_callback('/([\;\!\?])\s+(\w)/u', function($matches) {
            return mb_strtoupper($matches[1] . ' ' . $matches[2], 'UTF-8');
        }, trim(mb_convert_case($string, MB_CASE_TITLE, 'UTF-8')));

        $string = preg_replace_callback('/([\.\;\!\?])(\w)/u', function($matches) {
            return mb_strtoupper($matches[1] . $matches[2], 'UTF-8');
        }, trim(mb_convert_case($string, MB_CASE_TITLE, 'UTF-8')));

        return $string;
    }
}
