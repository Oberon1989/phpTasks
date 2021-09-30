<?php
require_once("util.php");

$n = filter_input(INPUT_POST,'n',);
$m = filter_input(INPUT_POST,'m');

if(!checkUserInput($n,$m))
{
    die("Input incorrect");
}

echo calculateCommits($n,$m);

function calculateCommits($errors,$warnings):int
{

    $total =-1;

    if($warnings%2==1)
    {
        $total+=(int)($warnings/2)+1;
        $errors+=(int)($warnings/2)+1;
    }
    else
    {
        $total+=$warnings/2;
        $errors+=$warnings/2;
    }
    if($errors%2==0)
    {
        $total+=(int)$errors/2;
    }
    else
    {
        $total+=(int)($errors/2)+6;
    }
    return $total;
}

function checkUserInput($value1,$value2):bool
{
    $checker = new util();
    $regexPattern = '/\d/';
    if(!$checker->userInputFilter($value1,$value2,$regexPattern))return false;
    if($value1<0)return false;
    if($value2<0||$value2>1000)return false;
    return true;
}