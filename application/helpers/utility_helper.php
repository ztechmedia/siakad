<?php

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    die();
    echo "</pre>";
}

function cryptoRandSecure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) {
        return $min;
    }
    // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function genUnique($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[cryptoRandSecure(0, $max - 1)];
    }

    return $token;
}

function getPost()
{
    $ci = &get_instance();
    $posts = $ci->input->post();
    $form = [];
    foreach ($posts as $post => $value) {
        $form[$post] = $value;
    }
    return $form;
}

function arrayDeleteByValue($array, $value) {
    $newArray = [];
    foreach($array as $arr){
        if($arr !== $value) {
            $newArray[] = $arr;
        }
    }
    return $newArray;
}

function arraySearchKey($array, $data, $column) {
    $arrayKey = null;
    foreach ($array as $key => $value) {
        if($value[$column] === $data) {
            $arrayKey = $key;
            break;
        }
    }
    return $arrayKey;
}

function stringMax($string, $max) {
    $stringLength = strlen($string);
    $result = substr($string, 0, $max);
    if($stringLength > $max) {
        return $result."...";
    }else{
        return $string;
    }
}

function toDateTime($date)
{
    return date_format($date, "d/m/Y H:i:s");
}


function max_length($string, $max) {
    $stringLength = strlen($string);
    $result = substr($string, 0, $max);
    if($stringLength > $max) {
        return $result."...";
    }else{
        return $string;
    }
}

function mToMonth($m)
{
    $month = [
        "1" => "Januari", 
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    ];

    return $month[$m];
}

function revDate($date) {
    $date = explode("-", $date);
    return "$date[2]-$date[1]-$date[0]";
}
function dayName($number)
{
    $days = [
        "1" => "Senin",
        "2" => "Selasa",
        "3" => "Rabu",
        "4" => "Kamis",
        "5" => "Jumat",
        "6" => "Sabtu",
    ];
    
    return $days[$number];
}