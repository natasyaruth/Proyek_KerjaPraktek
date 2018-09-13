<?php
header('Content-Type: application/json');
include("config.php");
/*include("date.php");*/

$t1= $_POST['tanggal'];
$t2= $_POST['tanggal2'];

$jumlahH1=$link->prepare(" 
	SELECT COALESCE((SUM(trans)),0) as TotalHour1, datex as tg1
		FROM tb_erin_summary_all 
		WHERE datex like '".$t1."'
		");

$jumlahH1->execute();
$result = $jumlahH1->fetchAll(PDO::FETCH_ASSOC); 

foreach($result as $row){
	$data[]= $row;
}

$jumlahH2=$link->prepare(" 
	SELECT COALESCE((SUM(trans)),0) as TotalHour2, datex as tg2
		FROM tb_erin_summary_all 
		WHERE datex like '".$t2."'
		");

$jumlahH2->execute();
$result2 = $jumlahH2->fetchAll(PDO::FETCH_ASSOC); 
		
$i=0;
foreach($result2 as $row2){
$data[$i] = array_merge($data[$i],$row2);
	$i++;
}

$rata_jam1=$link->prepare("
SELECT ROUND ((COALESCE((AVG(trans)),0)),2) as AverageHour1, datex as tg1
		FROM tb_erin_summary_all 
		WHERE datex like '".$t1."' 
		");

$rata_jam1->execute();
$result3 = $rata_jam1->fetchAll(PDO::FETCH_ASSOC); 
		
$j=0;
foreach($result3 as $row3){
$data[$j] = array_merge($data[$j],$row3);
	$j++;
}

$rata_jam2=$link->prepare("
SELECT ROUND ((COALESCE((AVG(trans)),0)),2) as AverageHour2, datex as tg2
		FROM tb_erin_summary_all 
		WHERE datex like '".$t2."'
		");

$rata_jam2->execute();
$result4 = $rata_jam2->fetchAll(PDO::FETCH_ASSOC); 
		
$k=0;
foreach($result4 as $row4){
$data[$k] = array_merge($data[$k],$row4);
	$k++;
}


$growthOrReduce = $link->prepare("
SELECT ROUND(((s1.sum1-s2.sum2)/s2.sum2 * 100),2) AS Percentage_Growth_Reduce
FROM
(Select SUM(trans) AS sum1 
 FROM tb_erin_summary_all 
 WHERE datex like '".$t1."')s1,
(Select SUM(trans) AS sum2
 FROM tb_erin_summary_all 
 WHERE datex like '".$t2."')s2 ");

$growthOrReduce->execute();
$result5 = $growthOrReduce->fetchAll(PDO::FETCH_ASSOC); 

$l=0;
foreach($result5 as $row5){
$data[$l] = array_merge($data[$l],$row5);
	$l++;
}

echo json_encode($data);
?>

