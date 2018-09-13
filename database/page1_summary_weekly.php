<?php
header('Content-Type: application/json');
include("config.php");
/*include("date.php");*/

$a = "SELECT sum( trans ) as TotalWeek1
FROM `tb_erin_summary_all`
WHERE YEAR( datex ) = '2017'
AND week( datex ) = '".$w1."'";

$jumlahW1=$link->prepare($a);
		
$jumlahW1->execute();
$result = $jumlahW1->fetchAll(PDO::FETCH_ASSOC); 


foreach($result as $row){
	$data[]= $row;
}

$b = "SELECT sum( trans ) as TotalWeek2
FROM `tb_erin_summary_all`
WHERE YEAR( datex ) = '2017'
AND week( datex ) = '".$w2."'";

$jumlahW2=$link->prepare($b);

$jumlahW2->execute();
$result2 = $jumlahW2->fetchAll(PDO::FETCH_ASSOC); 
		
$i=0;
foreach($result2 as $row2){
$data[$i] = array_merge($data[$i],$row2);
	$i++;
}

$c = "SELECT AVG( trans ) as AverageWeek1
FROM `tb_erin_summary_all`
WHERE YEAR( datex ) = '2017'
AND week( datex ) = '".$w1."'";

$rata_tgl1=$link->prepare($c);

$rata_tgl1->execute();
$result3 = $rata_tgl1->fetchAll(PDO::FETCH_ASSOC); 
		
$j=0;
foreach($result3 as $row3){
$data[$j] = array_merge($data[$j],$row3);
	$j++;
}

$d = "SELECT AVG( trans ) as AverageWeek2
FROM `tb_erin_summary_all`
WHERE YEAR( datex ) = '2017'
AND week( datex ) = '".$w2."'";

$rata_tgl2=$link->prepare($d);

$rata_tgl2->execute();
$result4 = $rata_tgl2->fetchAll(PDO::FETCH_ASSOC); 
		
$k=0;
foreach($result4 as $row4){
$data[$k] = array_merge($data[$k],$row4);
	$k++;
}

$e = "SELECT ROUND((((s1.sum-s2.sum)/s2.sum)*100),2) as growth_reduce
	  FROM
	  (SELECT sum( trans ) as sum
	   FROM `tb_erin_summary_all`
	   WHERE YEAR( datex ) = '2017'
	   AND week( datex ) = '".$w1."')s1,
	  (SELECT sum( trans ) as sum
	   FROM `tb_erin_summary_all`
	   WHERE YEAR( datex ) = '2017'
	   AND week( datex ) = '".$w2."')s2";

$growth_reduce=$link->prepare($e);

$growth_reduce->execute();
$result5 = $growth_reduce->fetchAll(PDO::FETCH_ASSOC);

$a=0;
foreach ($result5 as $row5) {
	$data[$a] = array_merge($data[$a],$row5);
	$a++;
}

print json_encode($data);

?>


