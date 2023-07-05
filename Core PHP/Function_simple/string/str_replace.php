<?php
echo str_replace("Mitesh","Meet","Heloo Mitesh")."<br>";
echo str_ireplace("Mitesh","Meet","Heloo mitesh")."<br>";

$r=array("Hello","Hy","Pratik","Hello");  // replace word with araray and string
$i=print_r(str_replace("Hello","How",$r));
echo "Replacement:$i";
?>