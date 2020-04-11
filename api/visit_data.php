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
case when manage_approve = '1' then 'ตรวจสอบแล้ว' else '' end as manage_approve,
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
service_other,
seal_1,
seal_2,
seal_3,
seal_4,
seal_other,
condition_1,
condition_2,
condition_3,
condition_4,
condition_5,
condition_6,
condition_other,
propeller_1,
propeller_2,
propeller_3,
propeller_4,
propeller_5,
propeller_6,
propeller_other,
snail_1,
snail_2,
snail_3,
snail_4,
snail_5,
snail_6,
snail_other,
oil_1,
oil_2,
oil_3,
oil_4,
oil_5,
oil_other,
jarabi_1,
jarabi_2,
jarabi_other,
clean_1,
clean_2,
clean_3,
clean_4,
clean_other,
arm_1,
arm_2,
arm_3,
arm_4,
arm_5,
arm_other,
system_1,
system_2,
system_3,
system_4,
system_5,
system_other,
sump_1,
sump_2,
sump_3,
sump_4,
sump_5,
sump_6,
sump_7,
sump_8,
sump_other,
chlorine_1,
chlorine_2,
chlorine_3,
chlorine_4,
chlorine_5,
chlorine_other,
woker,
woker_approve,
woker_other



FROM
 p_visit
INNER JOIN p_pump_brand ON p_visit.pump_brand = p_pump_brand.id
INNER JOIN p_pump ON p_visit.pump = p_pump.id
inner join p_install_point on p_visit.install_point = p_install_point.id

group by num desc
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
