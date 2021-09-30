<?php

class util
{
    function userInputFilter($value1, $value2,$regexPattern)
    {
        if(!isset($value1)&&!isset($value2))
        {
            return false;
        }
        $resultN = preg_match($regexPattern,$value1);
        $resultK=preg_match($regexPattern,$value2);
        return $resultN!=0&$resultN!=false&&$resultK!=0&&$resultK!=false;
    }

    function readFileFromDisk($filepath): bool|string
    {
       return file_get_contents($filepath);
    }
}