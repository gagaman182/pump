<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

     $num = $_GET["num"];
	 $month = $_GET["month"];
	 $place = $_GET["place"];
	 $pump_brand = $_GET["pump_brand"];
	//  $on_number = $_GET["on_number"];
	//  $pump = $_GET["pump"];
	//  $id = $_GET["id"];
	//  $install_point = $_GET["install_point"];
	//  $dateservice = $_GET["dateservice"];







	 $return_arr = array();



 $sql = "UPDATE p_visit SET month='".$month."' ,place = '".$place."',pump_brand = '".$pump_brand."'  WHERE num = '".$num."' ";




	
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
