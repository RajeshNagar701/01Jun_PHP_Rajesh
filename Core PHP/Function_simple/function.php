<?php

/*
$a=20;
$b=10;
echo $sum=$a+$b;
*/


// user defined function

/*
function ami()
{
	$a=10;
	$b=20;
	echo $sum=$a+$b."<br>";
}
ami();
*/


/*
//buil in function predifined function
$abc="Raj nagar";

echo strlen($abc);

*/

// Return in function

/*
function raj()
{
	$a=10;
	$b=20;
	return $sum=$a+$b."<br>";
}
echo raj();
*/

/*

function sum($a,$b)
{
	echo $sum=$a+$b."<br>";
}
sum(5,7);
sum(7,7);
sum(5,9);
sum(10,7);
*/

/*

function select($tbl)
{
	echo $sel="select * from $tbl<br>";
}
select('feedback');
select('customer');
select('contact');
select('blog');

*/

// default value in parameter

function sum($a=0,$b=0)
{
	echo $sum=$a+$b."<br>";
}

sum(7,8);
sum();
sum(5);

?>