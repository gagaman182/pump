<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

     $num = $_GET["num"];
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
	 



	 $return_arr = array();



	 $sql = "UPDATE p_water SET dateservice='".$dateservice."' ,pumpadjuct1 = '".$pumpadjuct1."',pumpadjuct2 = '".$pumpadjuct2."' ,pumpadjuctdo1 = '".$pumpadjuctdo1."' ,pumpadjuctdo2 = '".$pumpadjuctdo2."' ,
	 pumpadjucttemp1 = '".$pumpadjucttemp1."' , pumpadjucttemp2 = '".$pumpadjucttemp2."' ,pumpadjuctv301 = '".$pumpadjuctv301."',pumpadjuctv302 = '".$pumpadjuctv302."',
	 pumpadjuctchlorine1 = '".$pumpadjuctchlorine1."',pumpadjuctchlorine2 = '".$pumpadjuctchlorine2."',pumpadjuctother = '".$pumpadjuctother."',
	 aeration1 = '".$aeration1."',aeration2 = '".$aeration2."',aerationdo1 = '".$aerationdo1."',aerationdo2 = '".$aerationdo2."',aerationtemp1 = '".$aerationtemp1."',aerationtemp2 = '".$aerationtemp2."',
     aerationtv301 = '".$aerationtv301."',aerationtv302 = '".$aerationtv302."',
	 aerationchlorine1 = '".$aerationchlorine1."',aerationchlorine2 = '".$aerationchlorine2."',aerationother = '".$aerationother."',
	 silt1 = '".$silt1."',silt2 = '".$silt2."',siltdo1 = '".$siltdo1."',siltdo2 = '".$siltdo2."', 
	 silttemp1 = '".$silttemp1."', silttemp2 = '".$silttemp2."', siltv301 = '".$siltv301."', siltv302 = '".$siltv302."', siltchlorine1 = '".$siltchlorine1."',
	
	 siltchlorine2 = '".$siltchlorine2."', siltother = '".$siltother."', 
	 chlorine1 = '".$chlorine1."', chlorine2 = '".$chlorine2."', chlorinedo1 = '".$chlorinedo1."',
	 chlorinedo2 = '".$chlorinedo2."', chlorinetemp1 = '".$chlorinetemp1."',
	 chlorinetemp2 = '".$chlorinetemp2."', chlorinev301 = '".$chlorinev301."', chlorinev302 = '".$chlorinev302."', 
	 chlorinechlorine1 = '".$chlorinechlorine1."', chlorinechlorine2 = '".$chlorinechlorine2."', chlorineother = '".$chlorineother."', others = '".$others."',woker = '".$woker."'
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
