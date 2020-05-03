<?php
header('Access-Control-Allow-Origin: *');
include 'conn.php';



// $install_point = $_GET["install_point"];
$time = strtotime($_GET["dateservice"]); //แปลงข้อความเป็นวันที่
$dateservice = date('Y-m-d',$time);//แปลง format
$pumpadjuct1 = $_GET["pumpadjuct1"];
$pumpadjuct2 = $_GET["pumpadjuct2"];
$pumpadjuctdo1 = $_GET["pumpadjuctdo1"];
$pumpadjuctdo2 = $_GET["pumpadjuctdo2"];
$pumpadjucttemp1 = $_GET["pumpadjucttemp1"];
$pumpadjucttemp2 = $_GET["pumpadjucttemp2"];
$pumpadjuctv301 = $_GET["pumpadjuctv301"];
$pumpadjuctv302 = $_GET["pumpadjuctv302"];
$pumpadjuctchlorine1 = $_GET["pumpadjuctchlorine1"];
$pumpadjuctchlorine2 = $_GET["pumpadjuctchlorine2"];
$pumpadjuctother = $_GET["pumpadjuctother"];

$aeration1 = $_GET["aeration1"];
$aeration2 = $_GET["aeration2"];
$aerationdo1 = $_GET["aerationdo1"];
$aerationdo2 = $_GET["aerationdo2"];
$aerationtemp1 = $_GET["aerationtemp1"];
$aerationtemp2 = $_GET["aerationtemp2"];
$aerationtv301 = $_GET["aerationtv301"];
$aerationtv302 = $_GET["aerationtv302"];
$aerationchlorine1 = $_GET["aerationchlorine1"];
$aerationchlorine2 = $_GET["aerationchlorine2"];
$aerationother = $_GET["aerationother"];

$silt1 = $_GET["silt1"];
$silt2 = $_GET["silt2"];
$siltdo1 = $_GET["siltdo1"];
$siltdo2 = $_GET["siltdo2"];
$silttemp1 = $_GET["silttemp1"];
$silttemp2 = $_GET["silttemp2"];
$siltv301 = $_GET["siltv301"];
$siltv302 = $_GET["siltv302"];
$siltchlorine1 = $_GET["siltchlorine1"];
$siltchlorine2 = $_GET["siltchlorine2"];
$siltother = $_GET["siltother"];

$chlorine1 = $_GET["chlorine1"];
$chlorine2 = $_GET["chlorine2"];
$chlorinedo1 = $_GET["chlorinedo1"];
$chlorinedo2 = $_GET["chlorinedo2"];
$chlorinetemp1 = $_GET["chlorinetemp1"];
$chlorinetemp2 = $_GET["chlorinetemp2"];
$chlorinev301 = $_GET["chlorinev301"];
$chlorinev302 = $_GET["chlorinev302"];
$chlorinechlorine1 = $_GET["chlorinechlorine1"];
$chlorinechlorine2 = $_GET["chlorinechlorine2"];
$chlorineother = $_GET["chlorineother"];

$others = $_GET["others"];
$woker = $_GET["woker"];



	



        $strvisit  = "  INSERT INTO p_water(dateservice,
        pumpadjuct1,pumpadjuct2,pumpadjuctdo1,pumpadjuctdo2,pumpadjucttemp1,pumpadjucttemp2,pumpadjuctv301,pumpadjuctv302,pumpadjuctchlorine1,pumpadjuctchlorine2,pumpadjuctother,
        aeration1,aeration2,aerationdo1,aerationdo2,aerationtemp1,aerationtemp2,aerationtv301,aerationtv302,aerationchlorine1,aerationchlorine2,aerationother,
        silt1,silt2,siltdo1,siltdo2,silttemp1,silttemp2,siltv301,siltv302,siltchlorine1,siltchlorine2,siltother,
        chlorine1,chlorine2,chlorinedo1,chlorinedo2,chlorinetemp1,chlorinetemp2,chlorinev301,chlorinev302,chlorinechlorine1,chlorinechlorine2,chlorineother,
        others,woker) VALUES('".$dateservice."',
        '".$pumpadjuct1."','".$pumpadjuct2."','".$pumpadjuctdo1."','".$pumpadjuctdo2."','".$pumpadjucttemp1."','".$pumpadjucttemp2."','".$pumpadjuctv301."','".$pumpadjuctv302."','".$pumpadjuctchlorine1."','".$pumpadjuctchlorine2."','".$pumpadjuctother."',
        '".$aeration1."','".$aeration2."','".$aerationdo1."','".$aerationdo2."','".$aerationtemp1."','".$aerationtemp2."','".$aerationtv301."','".$aerationtv302."','".$aerationchlorine1."','".$aerationchlorine2."','".$aerationother."',
        '".$silt1."','".$silt2."','".$siltdo1."','".$siltdo2."','".$silttemp1."','".$silttemp2."','".$siltv301."','".$siltv302."','".$siltchlorine1."','".$siltchlorine2."','".$siltother."',
        '".$chlorine1."','".$chlorine2."','".$chlorinedo1."','".$chlorinedo2."','".$chlorinetemp1."','".$chlorinetemp2."','".$chlorinev301."','".$chlorinev302."','".$chlorinechlorine1."','".$chlorinechlorine2."','".$chlorineother."',
        '".$others."','".$woker."')";
        if ($conn->query($strvisit) === TRUE) {
            // echo "ระบบทำงานเสร็จสมบูรณ์";
            
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลสำเร็จ";
            array_push($return_message,$row_array);
        
        
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $return_message = array();
            $row_array['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
            array_push($return_message,$row_array);
            
        }



      
mysqli_close($conn);
	
echo json_encode($return_message);

?>