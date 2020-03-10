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




	

	



        $strvisit  = "  INSERT INTO p_visit(month,pump_brand,on_number,pump,id,install_point,dateservice) 
       VALUES('".$month."','".$pump_brand."','".$on_number."','".$pump."','".$id."','".$install_point."','".$dateservice."')";
        if ($conn->query($strvisit) === TRUE) {
            // echo "ระบบทำงานเสร็จสมบูรณ์";
            
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลบุคคลสำเร็จ";
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