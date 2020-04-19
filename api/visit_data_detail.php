<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

   $num = $_GET["num"];
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
case when wire_1 = 'true' then 'true' else '' end as wire_1,
case when wire_2 = 'true' then 'true' else '' end as wire_2,
case when wire_3 = 'true' then 'true' else '' end as wire_3,
case when wire_4 = 'true' then 'true' else '' end as wire_4,
case when wire_5 = 'true' then 'true' else '' end as wire_5,
wire_other,
case when service_1 = 'true' then 'true' else '' end as service_1,
case when service_2 = 'true' then 'true' else '' end as service_2,
case when service_3 = 'true' then 'true' else '' end as service_3,
case when service_4 = 'true' then 'true' else '' end as service_4,
case when service_5 = 'true' then 'true' else '' end as service_5,
case when service_6 = 'true' then 'true' else '' end as service_6,
service_other,
case when seal_1 = 'true' then 'true' else '' end as seal_1,
case when seal_2 = 'true' then 'true' else '' end as seal_2,
case when seal_3 = 'true' then 'true' else '' end as seal_3,
case when seal_4 = 'true' then 'true' else '' end as seal_4,
seal_other,
case when condition_1 = 'true' then 'true' else '' end as condition_1,
case when condition_2 = 'true' then 'true' else '' end as condition_2,
case when condition_3 = 'true' then 'true' else '' end as condition_3,
case when condition_4 = 'true' then 'true' else '' end as condition_4,
case when condition_5 = 'true' then 'true' else '' end as condition_5,
case when condition_6 = 'true' then 'true' else '' end as condition_6,

condition_other,
case when propeller_1 = 'true' then 'true' else '' end as propeller_1,
case when propeller_2 = 'true' then 'true' else '' end as propeller_2,
case when propeller_3 = 'true' then 'true' else '' end as propeller_3,
case when propeller_4 = 'true' then 'true' else '' end as propeller_4,
case when propeller_5 = 'true' then 'true' else '' end as propeller_5,
case when propeller_6 = 'true' then 'true' else '' end as propeller_6,

propeller_other,
case when snail_1 = 'true' then 'true' else '' end as snail_1,
case when snail_2 = 'true' then 'true' else '' end as snail_2,
case when snail_3 = 'true' then 'true' else '' end as snail_3,
case when snail_4 = 'true' then 'true' else '' end as snail_4,
case when snail_5 = 'true' then 'true' else '' end as snail_5,
case when snail_6 = 'true' then 'true' else '' end as snail_6,

snail_other,
case when oil_1 = 'true' then 'true' else '' end as oil_1,
case when oil_2 = 'true' then 'true' else '' end as oil_2,
case when oil_3 = 'true' then 'true' else '' end as oil_3,
case when oil_4 = 'true' then 'true' else '' end as oil_4,
case when oil_5 = 'true' then 'true' else '' end as oil_5,
oil_other,
case when jarabi_1 = 'true' then 'true' else '' end as jarabi_1,
case when jarabi_2 = 'true' then 'true' else '' end as jarabi_2,

jarabi_other,
case when clean_1 = 'true' then 'true' else '' end as clean_1,
case when clean_2 = 'true' then 'true' else '' end as clean_2,
case when clean_3 = 'true' then 'true' else '' end as clean_3,
case when clean_4 = 'true' then 'true' else '' end as clean_4,

clean_other,
case when arm_1 = 'true' then 'true' else '' end as arm_1,
case when arm_2 = 'true' then 'true' else '' end as arm_2,
case when arm_3 = 'true' then 'true' else '' end as arm_3,
case when arm_4 = 'true' then 'true' else '' end as arm_4,
case when arm_5 = 'true' then 'true' else '' end as arm_5,

arm_other,
case when system_1 = 'true' then 'true' else '' end as system_1,
case when system_2 = 'true' then 'true' else '' end as system_2,
case when system_3 = 'true' then 'true' else '' end as system_3,
case when system_4 = 'true' then 'true' else '' end as system_4,
case when system_5 = 'true' then 'true' else '' end as system_5,

system_other,
case when sump_1 = 'true' then 'true' else '' end as sump_1,
case when sump_2 = 'true' then 'true' else '' end as sump_2,
case when sump_3 = 'true' then 'true' else '' end as sump_3,
case when sump_4 = 'true' then 'true' else '' end as sump_4,
case when sump_5 = 'true' then 'true' else '' end as sump_5,
case when sump_6 = 'true' then 'true' else '' end as sump_6,
case when sump_7 = 'true' then 'true' else '' end as sump_7,
case when sump_8 = 'true' then 'true' else '' end as sump_8,
sump_other,
case when chlorine_1 = 'true' then 'true' else '' end as chlorine_1,
case when chlorine_2 = 'true' then 'true' else '' end as chlorine_2,
case when chlorine_3 = 'true' then 'true' else '' end as chlorine_3,
case when chlorine_4 = 'true' then 'true' else '' end as chlorine_4,
case when chlorine_5 = 'true' then 'true' else '' end as chlorine_5,

chlorine_other,
woker,
woker_approve,
woker_other





FROM
 p_visit
INNER JOIN p_pump_brand ON p_visit.pump_brand = p_pump_brand.id
INNER JOIN p_pump ON p_visit.pump = p_pump.id
inner join p_install_point on p_visit.install_point = p_install_point.id
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
