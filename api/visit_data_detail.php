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
wire_1,
wire_2,
wire_3,
wire_4,
wire_5,
wire_other,
service_1,
service_2,
service_3,
service_4,
service_5,
service_6,
service_other


FROM
 p_visit
INNER JOIN p_pump_brand ON p_visit.pump_brand = p_pump_brand.id
INNER JOIN p_pump ON p_visit.pump = p_pump.id

where num = '".$num."'
";


$return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {

    array_push($return_arr,$row);
   }
 }

 

mysqli_close($conn);

echo json_encode($return_arr);








?>
