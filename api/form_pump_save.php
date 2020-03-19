<?php
header('Access-Control-Allow-Origin: *');
include 'conn.php';


$month = $_GET["month"];
$pump_brand = $_GET["pump_brand"];
$on_number = $_GET["on_number"];
$pump = $_GET["pump"];
$id = $_GET["id"];
$install_point = $_GET["install_point"];
$time = strtotime($_GET["dateservice"]); //แปลงข้อความเป็นวันที่
$dateservice = date('Y-m-d',$time);//แปลง format
$wire_1= implode($_GET["wire_1"]); //impolde แปลง array เป็น string
$wire_2= implode($_GET["wire_2"]);
$wire_3= implode($_GET["wire_3"]);
$wire_4= implode($_GET["wire_4"]);
$wire_5= implode($_GET["wire_5"]);
$wire_other= $_GET["wire_other"];
$service_1= implode($_GET["service_1"]);
$service_2= implode($_GET["service_2"]);	
$service_3= implode($_GET["service_3"]);	
$service_4= implode($_GET["service_4"]);	
$service_5= implode($_GET["service_5"]);	
$service_6= implode($_GET["service_6"]);	
$service_other= $_GET["service_other"];
$seal_1= implode($_GET["seal_1"]);	
$seal_2= implode($_GET["seal_2"]);	
$seal_3= implode($_GET["seal_3"]);	
$seal_4= implode($_GET["seal_4"]);	
$seal_other= $_GET["seal_other"];
$condition_1= implode($_GET["condition_1"]);	
$condition_2= implode($_GET["condition_2"]);
$condition_3= implode($_GET["condition_3"]);
$condition_4= implode($_GET["condition_4"]);
$condition_5= implode($_GET["condition_5"]);
$condition_6= implode($_GET["condition_6"]);
$condition_other= $_GET["condition_other"];

	



        $strvisit  = "  INSERT INTO p_visit(month,pump_brand,on_number,pump,id,install_point,dateservice,wire_1,wire_2,wire_3,wire_4,wire_5,wire_other,service_1,service_2,service_3,service_4,service_5,service_6,service_other,seal_1,seal_2,seal_3,seal_4,seal_other,condition_1,condition_2,condition_3,condition_4,condition_5,condition_6,condition_other) 
       VALUES('".$month."','".$pump_brand."','".$on_number."','".$pump."','".$id."','".$install_point."','".$dateservice."','".$wire_1."','".$wire_2."','".$wire_3."','".$wire_4."','".$wire_5."','".$wire_other."','".$service_1."','".$service_2."','".$service_3."','".$service_4."','".$service_5."','".$service_6."','".$service_other."','".$seal_1."','".$seal_2."','".$seal_3."','".$seal_4."','".$seal_other."','".$condition_1."','".$condition_2."','".$condition_3."','".$condition_4."','".$condition_5."','".$condition_6."','".$condition_other."')";
        if ($conn->query($strvisit) === TRUE) {
            // echo "ระบบทำงานเสร็จสมบูรณ์";
            
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลสำเร็จ";
            array_push($return_message,$row_array);
        
        
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลไม่สำเร็จหรือมีข้อมูลแล้ว";
            array_push($return_message,$row_array);
            
        }



      
mysqli_close($conn);
	
echo json_encode($return_message);

?>