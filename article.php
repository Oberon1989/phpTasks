<?php
require_once ("util.php");
$util = new util();
$articleText=$util->readFileFromDisk("articleText.txt");
echo "<span>$articleText</span>";