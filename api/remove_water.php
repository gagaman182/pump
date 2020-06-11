<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

	 $num = $_GET["num"];
	//  $user_remove = $_GET["user_remove"];
	//  $idcard_remove = $_GET["idcard_remove"];



	
	 
 	 $sql = "DELETE FROM p_water WHERE num = '".$num."' ";


$return_arr = array();

if ($conn->query($sql) === TRUE) {
	
		$row_array['message'] = "ลบข้อมูลสำเร็จ";
		array_push($return_arr,$row_array);
	 
        
        
	
} else {
	$row_array['message'] =  "ลบข้อมูลไม่สำเร็จ " ;
	array_push($return_arr,$row_array);
}


mysqli_close($conn);

echo json_encode($return_arr);









?>
