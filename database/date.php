<?php
// FOR HOURLY

/*$t1= $_POST['tg1'];
$t2= $_POST['tg2'];*/


// FOR WEEKLY 

$date = date('2017-06-05');
// masukan untuk pembanding pertama
$tgl_1 = strtotime ('+6 day', strtotime ($date));
$tg_1 = date ('Y-m-d', $tgl_1);
// masukan untuk pembanding kedua
$date2 = date('2017-06-12');
$tgl_2 = strtotime ('+6 day', strtotime ($date2));
$tg_2 = date ('Y-m-d', $tgl_2);



//FOR MONTHLY

//Bulan pertama
$date_month1 = date('2017-01-01');

$tgl_11 = strtotime ('+6 day' , strtotime ($date_month1));
$tg_11 = date ('Y-m-d', $tgl_11);
$tanggal_11 = strtotime ('+1 day' , strtotime ($tg_11));
$t_11=date('Y-m-d', $tanggal_11);

$tgl_12 = strtotime ('+6 day' , strtotime ($t_11));
$tg_12 = date ('Y-m-d', $tgl_12);
$tanggal_12 = strtotime ('+1 day' , strtotime ($tg_12));
$t_12=date('Y-m-d', $tanggal_12);

$tgl_13 = strtotime ('+6 day' , strtotime ($t_12));
$tg_13 = date ('Y-m-d', $tgl_13);
$tanggal_13 = strtotime ('+1 day' , strtotime ($tg_13));
$t_13=date('Y-m-d', $tanggal_13);

$tgl_14 = strtotime ('+6 day' , strtotime ($t_13));
$tg_14 = date ('Y-m-d', $tgl_14);


//Bulan kedua
$date_month2 = date('2017-02-01');

$tgl_21 = strtotime ('+6 day' , strtotime ($date_month2));
$tg_21 = date ('Y-m-d', $tgl_21);
$tanggal_21 =  strtotime ('+1 day' , strtotime ($tg_21));
$t_21=date('Y-m-d', $tanggal_21);

$tgl_22 = strtotime ('+6 day' , strtotime ($t_21));
$tg_22 = date ('Y-m-d', $tgl_22);
$tanggal_22 =  strtotime ('+1 day' , strtotime ($tg_22));
$t_22=date('Y-m-d', $tanggal_22);

$tgl_23 = strtotime ('+6 day' , strtotime ($t_22));
$tg_23 = date ('Y-m-d', $tgl_23);
$tanggal_23 =  strtotime ('+1 day' , strtotime ($tg_23));
$t_23=date('Y-m-d', $tanggal_23);

$tgl_24 = strtotime ('+6 day' , strtotime ($tg_23));
$tg_24 = date ('Y-m-d', $tgl_24);


//Bulan ketiga
$date_month3 = date('2017-03-01');

$tgl_31 = strtotime ('+6 day' , strtotime ($date_month3));
$tg_31 = date ('Y-m-d', $tgl_31);
$tanggal_31 =  strtotime ('+1 day' , strtotime ($tg_31));
$t_31=date('Y-m-d', $tanggal_31);

$tgl_32 = strtotime ('+6 day' , strtotime ($t_31));
$tg_32 = date ('Y-m-d', $tgl_32);
$tanggal_32 =  strtotime ('+1 day' , strtotime ($tg_32));
$t_32=date('Y-m-d', $tanggal_32);

$tgl_33 = strtotime ('+6 day' , strtotime ($t_32));
$tg_33 = date ('Y-m-d', $tgl_33);
$tanggal_33 =  strtotime ('+1 day' , strtotime ($tg_33));
$t_33=date('Y-m-d', $tanggal_33);

$tgl_34 = strtotime ('+6 day' , strtotime ($t_33));
$tg_34 = date ('Y-m-d', $tgl_34);

//Bulan keempat
$date_month4 = date('2017-04-01');

$tgl_41 = strtotime ('+6 day' , strtotime ($date_month4));
$tg_41 = date ('Y-m-d', $tgl_41);
$tanggal_41 =  strtotime ('+1 day' , strtotime ($tg_41));
$t_41=date('Y-m-d', $tanggal_41);

$tgl_42 = strtotime ('+6 day' , strtotime ($t_41));
$tg_42 = date ('Y-m-d', $tgl_42);
$tanggal_42 =  strtotime ('+1 day' , strtotime ($tg_42));
$t_42=date('Y-m-d', $tanggal_42);

$tgl_43 = strtotime ('+6 day' , strtotime ($t_42));
$tg_43 = date ('Y-m-d', $tgl_43);
$tanggal_43 =  strtotime ('+1 day' , strtotime ($tg_43));
$t_43=date('Y-m-d', $tanggal_43);

$tgl_44 = strtotime ('+6 day' , strtotime ($t_43));
$tg_44 = date ('Y-m-d', $tgl_44);

//Bulan kelima
$date_month5 = date('2017-05-01');

$tgl_51 = strtotime ('+6 day' , strtotime ($date_month5));
$tg_51 = date ('Y-m-d', $tgl_51);
$tanggal_51 =  strtotime ('+1 day' , strtotime ($tg_51));
$t_51=date('Y-m-d', $tanggal_51);

$tgl_52 = strtotime ('+6 day' , strtotime ($t_51));
$tg_52 = date ('Y-m-d', $tgl_52);
$tanggal_52 =  strtotime ('+1 day' , strtotime ($tg_52));
$t_52=date('Y-m-d', $tanggal_52);

$tgl_53 = strtotime ('+6 day' , strtotime ($t_52));
$tg_53 = date ('Y-m-d', $tgl_53);
$tanggal_53 =  strtotime ('+1 day' , strtotime ($tg_53));
$t_53=date('Y-m-d', $tanggal_53);

$tgl_54 = strtotime ('+6 day' , strtotime ($t_53));
$tg_54 = date ('Y-m-d', $tgl_54);

//Bulan keenam
$date_month6 = date('2017-06-01');

$tgl_61 = strtotime ('+6 day' , strtotime ($date_month6));
$tg_61 = date ('Y-m-d', $tgl_61);
$tanggal_61 =  strtotime ('+1 day' , strtotime ($tg_61));
$t_61=date('Y-m-d', $tanggal_61);

$tgl_62 = strtotime ('+6 day' , strtotime ($t_61));
$tg_62 = date ('Y-m-d', $tgl_62);
$tanggal_62 =  strtotime ('+1 day' , strtotime ($tg_62));
$t_62=date('Y-m-d', $tanggal_62);

$tgl_63 = strtotime ('+6 day' , strtotime ($t_62));
$tg_63 = date ('Y-m-d', $tgl_63);
$tanggal_63 =  strtotime ('+1 day' , strtotime ($tg_63));
$t_63=date('Y-m-d', $tanggal_63);

$tgl_64 = strtotime ('+6 day' , strtotime ($t_63));
$tg_64 = date ('Y-m-d', $tgl_64);
?>