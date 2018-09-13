<?php
header('Content-Type: application/json');
include("config.php");
//include("date.php");

$t1= $_POST['tanggal'];
$t2= $_POST['tanggal2'];

//$t1= '2017-08-01';
//$t2= '2017-08-02';
/*if(!isset($_POST['tanggal']) or !isset($_POST['tanggal2'])){
	date_default_timezone_set('Asia/Jakarta');
	$datex = date("Y-m-d", strtotime("-1 days"));
	$datex2 = date("Y-m-d", strtotime("-2 days"));

	$t1 = $datex;
	$t2 = $datex2;
}*/

$a="SELECT datex as tanggal,hourx as jam1,sum(trans) as sum1 
				FROM tb_erin_summary_all
				WHERE datex ='".$t1."'  
				GROUP BY jam1";
$query = $link->prepare($a);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC); 
foreach($result as $row){
	$datas[] = $row;
}

$b = "SELECT datex as tanggal2, hourx as jam2, sum(trans) as sum2
				FROM tb_erin_summary_all
				WHERE datex = '".$t2."'
				GROUP BY jam2";
$query2 = $link->prepare($b);
$i=0;
$query2->execute();
$result2 = $query2->fetchAll(PDO::FETCH_ASSOC); 
foreach($result2 as $row2){
	$datas[$i] = array_merge($datas[$i],$row2);
	$i++;
}

$c="SELECT datex AS prem_tgl1, hourtext AS prem_jam1, sum(Total_Trx) AS prem_sum1 FROM `tb_reflex_splunk_summary_all` WHERE sourcetype = 'Reflex Premium' AND datex = '".$t1."' GROUP BY prem_jam1";
$query3 = $link->prepare($c);
$query3->execute();
$result3 = $query3->fetchAll(PDO::FETCH_ASSOC); 
$i=0;
foreach($result3 as $row3){
	$datas[$i] = array_merge($datas[$i],$row3);
	$i++;
}

$d = "SELECT datex AS prem_tgl2, hourtext AS prem_jam2, sum(Total_Trx) AS prem_sum2 FROM `tb_reflex_splunk_summary_all` WHERE sourcetype = 'Reflex Premium' AND datex = '".$t2."' GROUP BY prem_jam2";
$query4 = $link->prepare($d);
$i=0;
$query4->execute();
$result4 = $query4->fetchAll(PDO::FETCH_ASSOC); 
foreach($result4 as $row4){
	$datas[$i] = array_merge($datas[$i],$row4);
	$i++;
}

$e="SELECT datex AS massive_tgl1, hourtext AS massive_jam1, sum(Total_Trx) AS massive_sum1 FROM `tb_reflex_splunk_summary_all` WHERE sourcetype = 'Reflex Massive' AND datex = '".$t1."' GROUP BY massive_jam1";
$query5 = $link->prepare($e);
$query5->execute();
$result5 = $query5->fetchAll(PDO::FETCH_ASSOC); 
$i=0;
foreach($result5 as $row5){
	$datas[$i] = array_merge($datas[$i],$row5);
	$i++;
}

$f = "SELECT datex AS massive_tgl2, hourtext AS massive_jam2, sum(Total_Trx) AS massive_sum2 FROM `tb_reflex_splunk_summary_all` WHERE sourcetype = 'Reflex Massive' AND datex = '".$t2."' GROUP BY massive_jam2";
$query6 = $link->prepare($f);
$i=0;
$query6->execute();
$result6 = $query6->fetchAll(PDO::FETCH_ASSOC); 
foreach($result6 as $row6){
	$datas[$i] = array_merge($datas[$i],$row6);
	$i++;
}

echo json_encode($datas);
//echo json_encode(array("abc"=>'successfuly registered'));
?>

