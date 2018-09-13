<?php
header('Content-Type: application/json');
include("config.php");
include("date.php");


/*$query = $link->prepare("SELECT MONTH(datex) nobln, MONTHNAME(datex) bulan, WEEK(datex) minggu, sum(trans) FROM `tb_erin_summary_all` where YEAR(datex)='2017' group by minggu ORDER BY minggu asc");
*/

$tahun = date("Y");
$tahunlalu = date("Y",strtotime("-1 year"));

$query = $link->prepare("SELECT WEEK(datex) minggu, sum(trans) jumlah FROM `tb_erin_summary_all` where YEAR(datex)='".$tahun."' group by minggu");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC); 
	
foreach($result as $row1){
		$data[$row1['minggu']] = $row1;			
}

for($i=1;$i<=53;$i++){
	if(empty($data[$i])){
		$data[$i]['minggu'] = $i;
		$data[$i]['jumlah'] = null;
	}
}

$query2 = $link->prepare("SELECT WEEK(datex) minggu2, sum(trans) jumlah2 FROM `tb_erin_summary_all` where YEAR(datex)='".$tahunlalu."' group by minggu2");
$query2->execute();
$result2 = $query2->fetchAll(PDO::FETCH_ASSOC); 
foreach($result2 as $row2){
	$data2[$row2['minggu2']] = $row2;			
}

for($i=1;$i<=53;$i++){
	if(empty($data2[$i])){
		$data2[$i]['minggu2'] = $i;
		$data2[$i]['jumlah2'] = null;
	}
	$data10[$i] = array_merge($data[$i],$data2[$i]);
}

$query3 = $link->prepare("SELECT  weekx as prem_week, trx as prem_trx FROM `tb_weekly_transaction` where application='Reflex Premium' AND yearx='".$tahun."'");
$query3->execute();
$result3 = $query3->fetchAll(PDO::FETCH_ASSOC); 
	
foreach($result3 as $row3){
		$data3[$row3['prem_week']] = $row3;
}

for($i=1;$i<=53;$i++){
	if(empty($data3[$i])){
		$data3[$i]['prem_week'] = $i;
		$data3[$i]['prem_trx'] = null;
	}
	$data10[$i] = array_merge($data10[$i],$data3[$i]);
}

$query4 = $link->prepare("SELECT  weekx as prem_week2, trx as prem_trx2 FROM `tb_weekly_transaction` where application='Reflex Premium' AND yearx='".$tahunlalu."'");
$query4->execute();
$result4 = $query4->fetchAll(PDO::FETCH_ASSOC); 
foreach($result4 as $row4){
	$data4[$row4['prem_week2']] = $row4;			
}

for($i=1;$i<=53;$i++){
	if(empty($data4[$i])){
		$data4[$i]['prem_week2'] = $i;
		$data4[$i]['prem_trx2'] = null;
	}
	$data10[$i] = array_merge($data10[$i],$data4[$i]);
}

$query5 = $link->prepare("SELECT  weekx as massive_week, trx as massive_trx FROM `tb_weekly_transaction` where application='Reflex Massive' AND yearx='".$tahun."'");
$query5->execute();
$result5 = $query5->fetchAll(PDO::FETCH_ASSOC); 
	
foreach($result5 as $row5){
		$data5[$row5['massive_week']] = $row5;
}

for($i=1;$i<=53;$i++){
	if(empty($data5[$i])){
		$data5[$i]['massive_week'] = $i;
		$data5[$i]['massive_trx'] = null;
	}
	$data10[$i] = array_merge($data10[$i],$data5[$i]);
}

$query6 = $link->prepare("SELECT  weekx as massive_week2, trx as massive_trx2 FROM `tb_weekly_transaction` where application='Reflex Massive' AND yearx='".$tahunlalu."'");
$query6->execute();
$result6 = $query6->fetchAll(PDO::FETCH_ASSOC); 
foreach($result6 as $row6){
	$data6[$row6['massive_week2']] = $row6;			
}

for($i=1;$i<=53;$i++){
	if(empty($data6[$i])){
		$data6[$i]['massive_week2'] = $i;
		$data6[$i]['massive_trx2'] = null;
	}
	$data10[$i] = array_merge($data10[$i],$data6[$i]);
}

print json_encode($data10);

?>

