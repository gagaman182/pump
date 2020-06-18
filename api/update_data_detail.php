<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

	 $num = $_GET["num"];
	 $month = $_GET["month"];
	 $place = $_GET["place"];
	 $pump_brand = $_GET["pump_brand"];
	 $on_number = $_GET["on_number"];
	 $pump = $_GET["pump"];
	 $id = $_GET["id"];
	 $install_point = $_GET["install_point"];
	 $time = strtotime($_GET["dateservice"]); //แปลงข้อความเป็นวันที่
	 $dateservice = date('Y-m-d',$time);//แปลง format
	 $wire_1= $_GET["wire_1"]; //impolde แปลง array เป็น string
	$wire_2=  $_GET["wire_2"];
	$wire_3=  $_GET["wire_3"];
	$wire_4=  $_GET["wire_4"];
	$wire_5=  $_GET["wire_5"];
	$wire_other= $_GET["wire_other"];
	$service_1=  $_GET["service_1"];
	$service_2=  $_GET["service_2"];	
	$service_3=  $_GET["service_3"];	
	$service_4=  $_GET["service_4"];	
	$service_5=  $_GET["service_5"];	
	$service_6=  $_GET["service_6"];	
	$service_other= $_GET["service_other"];
	$seal_1=  $_GET["seal_1"];	
$seal_2=  $_GET["seal_2"];	
$seal_3=  $_GET["seal_3"];	
$seal_4=  $_GET["seal_4"];	
$seal_other= $_GET["seal_other"];
$condition_1=  $_GET["condition_1"];	
$condition_2=  $_GET["condition_2"];
$condition_3=  $_GET["condition_3"];
$condition_4=  $_GET["condition_4"];
$condition_5=  $_GET["condition_5"];
$condition_6=  $_GET["condition_6"];
$condition_other= $_GET["condition_other"];
$propeller_1=  $_GET["propeller_1"];
$propeller_2=  $_GET["propeller_2"];
$propeller_3=  $_GET["propeller_3"];
$propeller_4=  $_GET["propeller_4"];
$propeller_5=  $_GET["propeller_5"];
$propeller_6=  $_GET["propeller_6"];
$propeller_other= $_GET["propeller_other"];
$snail_1=  $_GET["snail_1"];
$snail_2=  $_GET["snail_2"];
$snail_3=  $_GET["snail_3"];
$snail_4=  $_GET["snail_4"];
$snail_5=  $_GET["snail_5"];
$snail_6=  $_GET["snail_6"];
$snail_other= $_GET["snail_other"];
$oil_1=  $_GET["oil_1"];
$oil_2=  $_GET["oil_2"];
$oil_3=  $_GET["oil_3"];
$oil_4=  $_GET["oil_4"];
$oil_5=  $_GET["oil_5"];
$oil_other= $_GET["oil_other"];
$jarabi_1=  $_GET["jarabi_1"];
$jarabi_2=  $_GET["jarabi_2"];
$jarabi_other= $_GET["jarabi_other"];
$clean_1=  $_GET["clean_1"];
$clean_2=  $_GET["clean_2"];
$clean_3=  $_GET["clean_3"];
$clean_4=  $_GET["clean_4"];
$clean_other= $_GET["clean_other"];
$arm_1=  $_GET["arm_1"];
$arm_2=  $_GET["arm_2"];
$arm_3=  $_GET["arm_3"];
$arm_4=  $_GET["arm_4"];
$arm_5=  $_GET["arm_5"];
$arm_other= $_GET["arm_other"];
$system_1=  $_GET["system_1"];
$system_2=  $_GET["system_2"];
$system_3=  $_GET["system_3"];
$system_4=  $_GET["system_4"];
$system_5=  $_GET["system_5"];
$system_other= $_GET["system_other"];
$sump_1=  $_GET["sump_1"];
$sump_2=  $_GET["sump_2"];
$sump_3=  $_GET["sump_3"];
$sump_4=  $_GET["sump_4"];
$sump_5=  $_GET["sump_5"];
$sump_6=  $_GET["sump_6"];
$sump_7=  $_GET["sump_7"];
$sump_8=  $_GET["sump_8"];
$sump_other= $_GET["sump_other"];
$chlorine_1=  $_GET["chlorine_1"];
$chlorine_2=  $_GET["chlorine_2"];
$chlorine_3=  $_GET["chlorine_3"];
$chlorine_4=  $_GET["chlorine_4"];
$chlorine_5=  $_GET["chlorine_5"];
$chlorine_other= $_GET["chlorine_other"];
$woker= $_GET["woker"];
$woker_approve= $_GET["woker_approve"];
$woker_other= $_GET["woker_other"];
$boss_pump= $_GET["boss_pump"];
$boss_approve= $_GET["boss_approve"];
$boss_pump_other= $_GET["boss_pump_other"];
$inspector= $_GET["inspector"];
$inspector_approve= $_GET["inspector_approve"];
$inspector_other= $_GET["inspector_other"];
$manage= $_GET["manage"];
$manage_approve= $_GET["manage_approve"];
$manage_other= $_GET["manage_other"];




	 $return_arr = array();



 $sql = "UPDATE p_visit SET month='".$month."' ,place = '".$place."',pump_brand = '".$pump_brand."' ,on_number = '".$on_number."' ,pump = '".$pump."' ,
id = '".$id."' ,install_point = '".$install_point."' ,dateservice = '".$dateservice."',
wire_1 = '".$wire_1."',wire_2 = '".$wire_2."',wire_3 = '".$wire_3."',wire_4 = '".$wire_4."',wire_5 = '".$wire_5."',wire_other = '".$wire_other."',
service_1 = '".$service_1."',service_2 = '".$service_2."',service_3 = '".$service_3."',service_4 = '".$service_4."',service_5 = '".$service_5."',service_6 = '".$service_6."',service_other = '".$service_other."',
seal_1 = '".$seal_1."',seal_2 = '".$seal_2."',seal_3 = '".$seal_3."',seal_4 = '".$seal_4."',seal_other = '".$seal_other."',
condition_1 = '".$condition_1."', condition_2 = '".$condition_2."', condition_3 = '".$condition_3."', condition_4 = '".$condition_4."', condition_5 = '".$condition_5."', condition_6 = '".$condition_6."', condition_other = '".$condition_other."',
propeller_1 = '".$propeller_1."', propeller_2 = '".$propeller_2."', propeller_3 = '".$propeller_3."', propeller_4 = '".$propeller_4."', propeller_5 = '".$propeller_5."', propeller_6 = '".$propeller_6."', propeller_other = '".$propeller_other."',
snail_1 = '".$snail_1."', snail_2 = '".$snail_2."', snail_3 = '".$snail_3."', snail_4 = '".$snail_4."', snail_5 = '".$snail_5."', snail_6 = '".$snail_6."', snail_other = '".$snail_other."',
oil_1 = '".$oil_1."', oil_2 = '".$oil_2."', oil_3 = '".$oil_3."', oil_4 = '".$oil_4."', oil_5 = '".$oil_5."', oil_other = '".$oil_other."',
jarabi_1 = '".$jarabi_1."',jarabi_2 = '".$jarabi_2."',jarabi_other = '".$jarabi_other."',
clean_1 = '".$clean_1."',clean_2 = '".$clean_2."',clean_3 = '".$clean_3."',clean_4 = '".$clean_4."',clean_other = '".$clean_other."',
arm_1 = '".$arm_1."', arm_2 = '".$arm_2."', arm_3 = '".$arm_3."', arm_4 = '".$arm_4."', arm_5 = '".$arm_5."', arm_other = '".$arm_other."',
system_1 = '".$system_1."', system_2 = '".$system_2."', system_3 = '".$system_3."', system_4 = '".$system_4."', system_5 = '".$system_5."', system_other = '".$system_other."',
sump_1 = '".$sump_1."', sump_2 = '".$sump_2."', sump_3 = '".$sump_3."', sump_4 = '".$sump_4."', sump_5 = '".$sump_5."', sump_6 = '".$sump_6."', sump_7 = '".$sump_7."', sump_8 = '".$sump_8."', sump_other = '".$sump_other."',
chlorine_1 = '".$chlorine_1."', chlorine_2 = '".$chlorine_2."', chlorine_3 = '".$chlorine_3."', chlorine_4 = '".$chlorine_4."', chlorine_5 = '".$chlorine_5."', chlorine_other = '".$chlorine_other."',
woker = '".$woker."',woker_approve = '".$woker_approve."',woker_other = '".$woker_other."',
boss_pump = '".$boss_pump."',boss_approve = '".$boss_approve."',boss_pump_other = '".$boss_pump_other."',
inspector = '".$inspector."',inspector_approve = '".$inspector_approve."',inspector_other = '".$inspector_other."',
manage = '".$manage."',manage_approve = '".$manage_approve."',manage_other = '".$manage_other."'
WHERE num = '".$num."' ";




	
	if ($conn->query($sql) === TRUE) {
		$row_array['message'] = "แก้ไขข้อมูลบุคคลสำเร็จ";
		array_push($return_arr,$row_array);
	 }else {
	$row_array['message'] =  "แก้ไขข้อมูลไม่สำเร็จ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);









?>
