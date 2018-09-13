<?php
header('Content-Type: application/json');
include("config.php");
include("date.php");


$totalCurrentMonth=$link->prepare("
	SELECT  sum(trans) as TotalCurrentMonth 
	From tb_erin_summary_all
	Where week(datex) like '32'");
		
$totalCurrentMonth->execute();
$result = $totalCurrentMonth->fetchAll(PDO::FETCH_ASSOC); 


foreach($result as $row1){
	$data[]= $row1;
}


$totalLastMonth=$link->prepare("
	SELECT sum(trans) as TotalLastMonth 
	From tb_erin_summary_all
	Where week(datex) like '31'
									");

$totalLastMonth->execute();
$result2 = $totalLastMonth->fetchAll(PDO::FETCH_ASSOC); 

$i=0;
foreach($result2 as $row2){
$data[$i] = array_merge($data[$i],$row2);
	$i++;
}


$growthOrReduce = $link->prepare("SELECT ROUND(((s1.sum1-s2.sum2)/s2.sum2 * 100),2)AS Percentage_Growth_Reduce
FROM
(Select sum(trans) as sum1 From tb_erin_summary_all Where week(datex) like '32') s1,
(Select sum(trans) as sum2 From tb_erin_summary_all Where week(datex) like '31') s2
");

$growthOrReduce->execute();
$result3 = $growthOrReduce->fetchAll(PDO::FETCH_ASSOC); 

$j=0;
foreach($result3 as $row3){
$data[$j] = array_merge($data[$j],$row3);
	$j++;
}

print json_encode($data);

?>
	
