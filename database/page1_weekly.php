<?php
header('Content-Type: application/json');
include("config.php");

/*include("date.php");*/

$w1= $_POST['week1'];
$w2= $_POST['week2'];

$a="SELECT DAY(datex) no1, SUM(trans) as sum, WEEK(datex) minggu1
	FROM `tb_erin_summary_all`
	WHERE YEAR( datex ) = '2017'
	AND WEEK( datex ) = '".$w1."' 
	GROUP BY no1
	ORDER BY no1 ASC";

$query = $link->prepare($a);

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC); 
	
foreach($result as $row){
	$data[] = $row;
}

$b = "SELECT DAY(datex) no2, SUM(trans) as sum2, WEEK(datex) minggu2
	FROM `tb_erin_summary_all`
	WHERE YEAR( datex ) = '2017'
	AND WEEK( datex ) = '".$w2."' 
	GROUP BY no2
	ORDER BY no2 ASC";

$query2 = $link->prepare($b);

$query2->execute();
$result2 = $query2->fetchAll(PDO::FETCH_ASSOC); 
	
$i=0;
foreach($result2 as $row2){
	$data[$i] = array_merge($data[$i],$row2);
	$i++;
}

echo json_encode($data);

?>

