<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';


 $sql = "SELECT
 num,
 MONTH as month,
 place,
 p_pump_brand.id as p_pump_brand_id,
 p_pump_brand. name as p_pump_brand,
 on_number,
 p_pump.id as p_pump_id ,
 p_pump. name as p_pump,
 p_visit.id,
 install_point as install_point_id,
 p_install_point.name as install_point_name,
DATE_FORMAT(p_visit.dateservice, '%d-%m-%Y') as dateservice,
case when boss_approve = '1' then 'ตรวจสอบแล้ว' else '' end as boss_approve,
case when inspector_approve = '1' then 'ตรวจสอบแล้ว' else '' end as inspector_approve,
case when manage_approve = '1' then 'ตรวจสอบแล้ว' else '' end as manage_approve




FROM
 p_visit
INNER JOIN p_pump_brand ON p_visit.pump_brand = p_pump_brand.id
INNER JOIN p_pump ON p_visit.pump = p_pump.id
inner join p_install_point on p_visit.install_point = p_install_point.id


ORDER  by num DESC
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
