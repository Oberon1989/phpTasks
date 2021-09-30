<?php
require_once ("util.php");
$util = new util();
$filepath=$_SERVER['DOCUMENT_ROOT'].'/articleText.txt';

$articlePreview=$util->readFileFromDisk($filepath);

$articlePreview=mb_substr($articlePreview,0, 200,"utf-8");

$arr = explode(" ",$articlePreview);
$strLinkText="";
$articleLink="article.php";
$articlePreview="";
$wordCount=count($arr);
for ($i=0;$i<count($arr);$i++)
{
    if($i<$wordCount-3)
    {
        $articlePreview.=$arr[$i]." ";
    }
    else{
        $strLinkText.=$arr[$i]." ";
    }

}

$strLinkText=trim($strLinkText);
$strLinkText.="...";
echo "<span>".$articlePreview."<a href='$articleLink'>$strLinkText</a></span>";
