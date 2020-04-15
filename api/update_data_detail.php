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







	 $return_arr = array();



 $sql = "UPDATE p_visit SET month='".$month."' ,place = '".$place."',pump_brand = '".$pump_brand."' ,on_number = '".$on_number."' ,pump = '".$pump."' ,
 id = '".$id."' ,install_point = '".$install_point."' ,dateservice = '".$dateservice."',
 wire_1 = '".$wire_1."',wire_2 = '".$wire_2."',wire_3 = '".$wire_3."',wire_4 = '".$wire_4."',wire_5 = '".$wire_5."',wire_other = '".$wire_other."',
 service_1 = '".$service_1."',service_2 = '".$service_2."',service_3 = '".$service_3."',service_4 = '".$service_4."',service_5 = '".$service_5."',service_6 = '".$service_6."',service_other = '".$service_other."' WHERE num = '".$num."' ";




	
	if ($conn->query($sql) === TRUE) {
		$row_array['message'] = "แก้ไขข้อมูลบุคคลสำเร็จ";
		array_push($return_arr,$row_array);
	 }else {
	$row_array['message'] =  "แก้ไขข้อมูลบุคคลไม่สำเร็จ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);









?>
