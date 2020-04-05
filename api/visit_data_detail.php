<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

	 $num = $_GET["num"];

 $sql = "SELECT
 num,
 MONTH as month,
 place,
 p_pump_brand. name as p_pump_brand,
 on_number,
 p_pump. name as p_pump,
 p_visit.id,
DATE_FORMAT(p_visit.dateservice, '%d-%m-%Y') as dateservice,
case when wire_1 = '1' THEN 1 else ' 'END as wire_1,
case when wire_2 = '1' THEN 1 else ' 'END as wire_2,
case when wire_2 = '1' THEN 1 else ' 'END as wire_3,
case when wire_4 = '1' THEN 1 else ' 'END as wire_4,
case when wire_5 = '1' THEN 1 else ' 'END as wire_5,
wire_other


FROM
 p_visit
INNER JOIN p_pump_brand ON p_visit.pump_brand = p_pump_brand.id
INNER JOIN p_pump ON p_visit.pump = p_pump.id

where num = '".$num."'
";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
	$row_array['num'] = $row['num'];
	$row_array['month'] = $row['month'];
	$row_array['place'] = $row['place'];
	$row_array['p_pump_brand'] = $row['p_pump_brand'];
	$row_array['on_number'] = $row['on_number'];
	$row_array['p_pump'] = $row['p_pump'];
	$row_array['id'] = $row['id'];
	$row_array['dateservice'] = $row['dateservice'];
	$row_array['wire_1'] = $row['wire_1'];
	$row_array['wire_2'] = $row['wire_2'];
	$row_array['wire_3'] = $row['wire_3'];
	$row_array['wire_4'] = $row['wire_4'];
	$row_array['wire_5'] = $row['wire_5'];
	$row_array['wire_other'] = $row['wire_other'];
	

	

	
	
	
    array_push($return_arr,$row_array);
   }
 }

 

mysqli_close($conn);

echo json_encode($return_arr);








?>
