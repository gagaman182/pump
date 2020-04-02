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
$propeller_1= implode($_GET["propeller_1"]);
$propeller_2= implode($_GET["propeller_2"]);
$propeller_3= implode($_GET["propeller_3"]);
$propeller_4= implode($_GET["propeller_4"]);
$propeller_5= implode($_GET["propeller_5"]);
$propeller_6= implode($_GET["propeller_6"]);
$propeller_other= $_GET["propeller_other"];
$snail_1= implode($_GET["snail_1"]);
$snail_2= implode($_GET["snail_2"]);
$snail_3= implode($_GET["snail_3"]);
$snail_4= implode($_GET["snail_4"]);
$snail_5= implode($_GET["snail_5"]);
$snail_6= implode($_GET["snail_6"]);
$snail_other= $_GET["snail_other"];
$oil_1= implode($_GET["oil_1"]);
$oil_2= implode($_GET["oil_2"]);
$oil_3= implode($_GET["oil_3"]);
$oil_4= implode($_GET["oil_4"]);
$oil_5= implode($_GET["oil_5"]);
$oil_other= $_GET["oil_other"];
$jarabi_1= implode($_GET["jarabi_1"]);
$jarabi_2= implode($_GET["jarabi_2"]);
$jarabi_other= $_GET["jarabi_other"];
$clean_1= implode($_GET["clean_1"]);
$clean_2= implode($_GET["clean_2"]);
$clean_3= implode($_GET["clean_3"]);
$clean_4= implode($_GET["clean_4"]);
$clean_other= $_GET["clean_other"];
$arm_1= implode($_GET["arm_1"]);
$arm_2= implode($_GET["arm_2"]);
$arm_3= implode($_GET["arm_3"]);
$arm_4= implode($_GET["arm_4"]);
$arm_5= implode($_GET["arm_5"]);
$arm_other= $_GET["arm_other"];
$system_1= implode($_GET["system_1"]);
$system_2= implode($_GET["system_2"]);
$system_3= implode($_GET["system_3"]);
$system_4= implode($_GET["system_4"]);
$system_5= implode($_GET["system_5"]);
$system_other= $_GET["system_other"];
$sump_1= implode($_GET["sump_1"]);
$sump_2= implode($_GET["sump_2"]);
$sump_3= implode($_GET["sump_3"]);
$sump_4= implode($_GET["sump_4"]);
$sump_5= implode($_GET["sump_5"]);
$sump_6= implode($_GET["sump_6"]);
$sump_7= implode($_GET["sump_7"]);
$sump_8= implode($_GET["sump_8"]);
$sump_other= $_GET["sump_other"];
$chlorine_1= implode($_GET["chlorine_1"]);
$chlorine_2= implode($_GET["chlorine_2"]);
$chlorine_3= implode($_GET["chlorine_3"]);
$chlorine_4= implode($_GET["chlorine_4"]);
$chlorine_5= implode($_GET["chlorine_5"]);
$chlorine_other= $_GET["chlorine_other"];
$woker= $_GET["woker"];
$woker_approve= $_GET["woker_approve"];
$woker_other= $_GET["woker_other"];


	



        $strvisit  = "  INSERT INTO p_visit(month,pump_brand,on_number,pump,id,install_point,dateservice,
        wire_1,wire_2,wire_3,wire_4,wire_5,wire_other,
        service_1,service_2,service_3,service_4,service_5,service_6,service_other,
        seal_1,seal_2,seal_3,seal_4,seal_other,
        condition_1,condition_2,condition_3,condition_4,condition_5,condition_6,condition_other,
        propeller_1,propeller_2,propeller_3,propeller_4,propeller_5,propeller_6,propeller_other,
        snail_1,snail_2,snail_3,snail_4,snail_5,snail_6,snail_other,
        oil_1, oil_2, oil_3, oil_4, oil_5,oil_other,
        jarabi_1,jarabi_2,jarabi_other,
        clean_1,clean_2,clean_3,clean_4,clean_other,
        arm_1, arm_2, arm_3, arm_4, arm_5,arm_other,
        system_1, system_2, system_3, system_4, system_5, system_other,
        sump_1,sump_2,sump_3,sump_4,sump_5,sump_6,sump_7,sump_8,sump_other,
        chlorine_1,chlorine_2,chlorine_3,chlorine_4,chlorine_5,chlorine_other,
        woker,woker_approve,woker_other

        ) 
       VALUES('".$month."','".$pump_brand."','".$on_number."','".$pump."','".$id."','".$install_point."','".$dateservice."',
       '".$wire_1."','".$wire_2."','".$wire_3."','".$wire_4."','".$wire_5."','".$wire_other."',
       '".$service_1."','".$service_2."','".$service_3."','".$service_4."','".$service_5."','".$service_6."','".$service_other."',
       '".$seal_1."','".$seal_2."','".$seal_3."','".$seal_4."','".$seal_other."',
       '".$condition_1."','".$condition_2."','".$condition_3."','".$condition_4."','".$condition_5."','".$condition_6."','".$condition_other."',
       '".$propeller_1."','".$propeller_2."','".$propeller_3."','".$propeller_4."','".$propeller_5."','".$propeller_6."','".$propeller_other."',
       '".$snail_1."','".$snail_2."','".$snail_3."','".$snail_4."','".$snail_5."','".$snail_6."','".$snail_other."',
       '".$oil_1."','".$oil_2."','".$oil_3."','".$oil_4."','".$oil_5."','".$oil_other."',
       '".$jarabi_1."', '".$jarabi_2."', '".$jarabi_other."',
       '".$clean_1."','".$clean_2."','".$clean_3."','".$clean_4."','".$clean_other."',
       '".$arm_1."',  '".$arm_2."',  '".$arm_3."',  '".$arm_4."',  '".$arm_5."',  '".$arm_other."',
       '".$system_1."','".$system_2."','".$system_3."','".$system_4."','".$system_5."','".$system_other."',
       '".$sump_1."','".$sump_2."','".$sump_3."','".$sump_4."','".$sump_5."','".$sump_6."','".$sump_7."','".$sump_8."','".$sump_other."',
       '".$chlorine_1."','".$chlorine_2."','".$chlorine_3."','".$chlorine_4."','".$chlorine_5."','".$chlorine_other."',
       '".$worker."','".$woker_approve."','".$woker_other."'
       )";
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