<?php
require_once ("util.php");

$n = filter_input(INPUT_POST,'n');
$k = filter_input(INPUT_POST,'k');



if (!checkInput($n,$k)) {
    die("Error. Input incorrect");
}

$arr = createArray($n);

$position=simpleSearchNumber($arr,$k);
echo $position;




function checkInput($value1,$value2): bool
{
    $checker = new util();
    $regexPattern = '/\d/';
    if(!$checker->userInputFilter($value1,$value2,$regexPattern))return false;
    if($value2>$value1)return false;
    return true;
}

function createArray($length)
{
    $numericArr = array();
    for ($i = 0; $i < $length; $i++) {
        $numericArr[$i] = $i+1;

    }
    return sortArr($numericArr);
}

function simpleSearchNumber($arr, $number): int
{
    $result = -1;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $number) {
            $result = $i+1;
        }
    }
    return $result;
}


function sortArr($arr)
{
    $offset = 0;

    do {
        $isSort = true;
        for ($i = 0; $i < count($arr) - 1 - $offset; $i++) {
            $compare = compareString($arr[$i], $arr[$i + 1]);
            if ($compare >0) {

                $isSort = false;
                $tmp = $arr[$i + 1];
                $arr[$i + 1] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
        $offset++;
    } while (!$isSort);
    return $arr;
}



function compareString($str1, $str2): int
{
    $s1Length = iconv_strlen($str1,"utf-8");
    $s2Length=iconv_strlen($str2,"utf-8");

    for ($i = 0; $i < $s1Length&&$i<$s2Length; $i++) {
        if (substr($str1, $i, 1) == substr($str2, $i, 1)) {
            continue;
        } else {
            return substr($str1, $i, 1) - substr($str2, $i, 1);
        }
    }
    if ($s1Length < $s2Length || $s1Length > $s2Length) {
        return strlen($str1) - strlen($str2);
    } else {
        return 0;
    }
}
