<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

   
     $num = $_GET["num"];
	 $time = strtotime($_GET["dateservice"]); //แปลงข้อความเป็นวันที่
$dateservice = date('Y-m-d',$time);//แปลง format
 $trap1 = $_GET["trap1"];
 $trap2 = $_GET["trap2"];
 $trap3 = $_GET["trap3"];
 $pondcolor1 = $_GET["pondcolor1"];
 $pondcolor2 = $_GET["pondcolor2"];
 $pumpfailed1_1 = $_GET["pumpfailed1_1"];
 $pumpfailed1_2 = $_GET["pumpfailed1_2"];
 $pumpfailed1_3 = $_GET["pumpfailed1_3"];
 $pumpfailed2_1 = $_GET["pumpfailed2_1"];
 $pumpfailed2_2 = $_GET["pumpfailed2_2"];
 $pumpfailed2_3 = $_GET["pumpfailed2_3"];

 $pumpadjuct1_1 = $_GET["pumpadjuct1_1"];
 $pumpadjuct1_2 = $_GET["pumpadjuct1_2"];
 $pumpadjuct1_3 = $_GET["pumpadjuct1_3"];
 $pumpadjuct2_1 = $_GET["pumpadjuct2_1"];
 $pumpadjuct2_2 = $_GET["pumpadjuct2_2"];
 $pumpadjuct2_3 = $_GET["pumpadjuct2_3"];

 $pondhight1 = $_GET["pondhight1"];
 $pondhight2 = $_GET["pondhight2"];
 $pumpsediment1_1 = $_GET["pumpsediment1_1"];
 $pumpsediment1_2 = $_GET["pumpsediment1_2"];
 $pumpsediment1_3 = $_GET["pumpsediment1_3"];
 $pumpsediment2_1 = $_GET["pumpsediment2_1"];
 $pumpsediment2_2 = $_GET["pumpsediment2_2"];
 $pumpsediment2_3 = $_GET["pumpsediment2_3"];

 $sediment1 = $_GET["sediment1"];
 $sediment2 = $_GET["sediment2"];
 $pumpcrolene1_1 = $_GET["pumpcrolene1_1"];
 $pumpcrolene1_2 = $_GET["pumpcrolene1_2"];
 $pumpcrolene1_3 = $_GET["pumpcrolene1_3"];
 $pumpcrolene2_1 = $_GET["pumpcrolene2_1"];
 $pumpcrolene2_2 = $_GET["pumpcrolene2_2"];
 $pumpcrolene2_3 = $_GET["pumpcrolene2_3"];
 $polymer1 = $_GET["polymer1"];
 $polymer2 = $_GET["polymer2"];
 $polymer3 = $_GET["polymer3"];

 $ppm1 = $_GET["ppm1"];
 $ppm2 = $_GET["ppm2"];
 $rolled1 = $_GET["rolled1"];
 $rolled2 = $_GET["rolled2"];
 $rolled3 = $_GET["rolled3"];
 $water1 = $_GET["water1"];
 $water2 = $_GET["water2"];
 $pumpexcess1 = $_GET["pumpexcess1"];
 $pumpexcess2 = $_GET["pumpexcess2"];
 $pumpexcess3 = $_GET["pumpexcess3"];
 $wastewater1 = $_GET["wastewater1"];
 $wastewater2 = $_GET["wastewater2"];
 $meter = $_GET["meter"];
 $meterfailed1 = $_GET["meterfailed1"];
 $aeration1_1 = $_GET["aeration1_1"];
 $aeration1_2 = $_GET["aeration1_2"];
 $aeration1_3 = $_GET["aeration1_3"];
 $meterfailed2 = $_GET["meterfailed2"];
 $aeration2_1 = $_GET["aeration2_1"];
 $aeration2_2 = $_GET["aeration2_2"];
 $aeration2_3 = $_GET["aeration2_3"];
 $pumping1 = $_GET["pumping1"];
 $pumpcondition1_1 = $_GET["pumpcondition1_1"];
 $pumpcondition1_2 = $_GET["pumpcondition1_2"];
 $pumpcondition1_3 = $_GET["pumpcondition1_3"];
 $pumping2 = $_GET["pumping2"];
 $pumpcondition2_1 = $_GET["pumpcondition2_1"];
 $pumpcondition2_2 = $_GET["pumpcondition2_2"];
 $pumpcondition2_3 = $_GET["pumpcondition2_3"];
 $pumping3 = $_GET["pumping3"];
 
 $cleantrap1_1 = $_GET["cleantrap1_1"];
 $cleantrap1_2 = $_GET["cleantrap1_2"];
 $cleantrap1_3 = $_GET["cleantrap1_3"];
 $rainning = $_GET["rainning"];
 $cleantrap2_1 = $_GET["cleantrap2_1"];
 $cleantrap2_2 = $_GET["cleantrap2_2"];
 $cleantrap2_3 = $_GET["cleantrap2_3"];
 $volume = $_GET["volume"];
 $storetrap1_1 = $_GET["storetrap1_1"];
 $storetrap1_2 = $_GET["storetrap1_2"];
 $storetrap1_3 = $_GET["storetrap1_3"];
 $storetrap2_1 = $_GET["storetrap2_1"];
 $storetrap2_2 = $_GET["storetrap2_2"];
 $storetrap2_3 = $_GET["storetrap2_3"];
 $chlorineintank1 = $_GET["chlorineintank1"];
 $garbage = $_GET["garbage"];
 $chlorineintank2 = $_GET["chlorineintank2"];
 $others = $_GET["others"];
 $woker = $_GET["woker"];


	 $return_arr = array();



 $sql = "UPDATE p_day SET dateservice='".$dateservice."' ,trap1 = '".$trap1."',trap2 = '".$trap2."' ,trap3 = '".$trap3."' ,pondcolor1 = '".$pondcolor1."' ,pondcolor2 = '".$pondcolor2."' ,
pumpfailed1_1 = '".$pumpfailed1_1."' ,pumpfailed1_2 = '".$pumpfailed1_2."',pumpfailed1_3 = '".$pumpfailed1_3."',pumpfailed2_1 = '".$pumpfailed2_1."',pumpfailed2_2 = '".$pumpfailed2_2."',pumpfailed2_3 = '".$pumpfailed2_3."',
pumpadjuct1_1 = '".$pumpadjuct1_1."',pumpadjuct1_2 = '".$pumpadjuct1_2."',pumpadjuct1_3 = '".$pumpadjuct1_3."',pumpadjuct2_1 = '".$pumpadjuct2_1."',pumpadjuct2_2 = '".$pumpadjuct2_2."',pumpadjuct2_3 = '".$pumpadjuct2_3."',
pondhight1 = '".$pondhight1."',pondhight2 = '".$pondhight2."',
pumpsediment1_1 = '".$pumpsediment1_1."',pumpsediment1_2 = '".$pumpsediment1_2."',pumpsediment1_3 = '".$pumpsediment1_3."',pumpsediment2_1 = '".$pumpsediment2_1."',pumpsediment2_2 = '".$pumpsediment2_2."',pumpsediment2_3 = '".$pumpsediment2_3."',
sediment1 = '".$sediment1."', sediment2 = '".$sediment2."', 
pumpcrolene1_1 = '".$pumpcrolene1_1."', pumpcrolene1_2 = '".$pumpcrolene1_2."', pumpcrolene1_3 = '".$pumpcrolene1_3."', pumpcrolene2_1 = '".$pumpcrolene2_1."',pumpcrolene2_2 = '".$pumpcrolene2_2."', pumpcrolene2_3 = '".$pumpcrolene2_3."', 
polymer1 = '".$polymer1."', polymer2 = '".$polymer2."', polymer3 = '".$polymer3."',
ppm1 = '".$ppm1."', ppm2 = '".$ppm2."',
rolled1 = '".$rolled1."', rolled2 = '".$rolled2."', rolled3 = '".$rolled3."', 
water1 = '".$water1."', water2 = '".$water2."', pumpexcess1 = '".$pumpexcess1."', pumpexcess2 = '".$pumpexcess2."',pumpexcess3 = '".$pumpexcess3."', 
wastewater1 = '".$wastewater1."', wastewater2 = '".$wastewater2."',
meter = '".$meter."', meterfailed1 = '".$meterfailed1."', aeration1_1 = '".$aeration1_1."',aeration1_2 = '".$aeration1_2."',aeration1_3 = '".$aeration1_3."',
meterfailed2 = '".$meterfailed2."',aeration2_1 = '".$aeration2_1."',aeration2_2 = '".$aeration2_2."',aeration2_3 = '".$aeration2_3."',
pumping1 = '".$pumping1."',pumpcondition1_1 = '".$pumpcondition1_1."',pumpcondition1_2 = '".$pumpcondition1_2."', pumpcondition1_3 = '".$pumpcondition1_3."',
pumping2 = '".$pumping2."', pumpcondition2_1 = '".$pumpcondition2_1."', pumpcondition2_2 = '".$pumpcondition2_2."', pumpcondition2_3 = '".$pumpcondition2_3."',pumping3 = '".$pumping3."', 
cleantrap1_1 = '".$cleantrap1_1."', cleantrap1_2 = '".$cleantrap1_2."', cleantrap1_3 = '".$cleantrap1_3."', 
rainning = '".$rainning."', cleantrap2_1 = '".$cleantrap2_1."',cleantrap2_2 = '".$cleantrap2_2."', cleantrap2_3 = '".$cleantrap2_3."',
volume = '".$volume."', storetrap1_1 = '".$storetrap1_1."', storetrap1_2 = '".$storetrap1_2."',storetrap1_3 = '".$storetrap1_3."',
storetrap2_1 = '".$storetrap2_1."', storetrap2_2 = '".$storetrap2_2."', storetrap2_3 = '".$storetrap2_3."',
chlorineintank1 = '".$chlorineintank1."', garbage = '".$garbage."',
chlorineintank2 = '".$chlorineintank2."',others = '".$others."',woker = '".$woker."'
WHERE num = '".$num."' ";
	
	if ($conn->query($sql) === TRUE) {
		$row_array['message'] = "แก้ไขข้อมูลสำเร็จ";
		array_push($return_arr,$row_array);
	 }else {
	$row_array['message'] =  "แก้ไขข้อมูลไม่สำเร็จ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);









?>
