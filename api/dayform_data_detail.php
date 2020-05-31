<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

  //  $num = '18';
   $num = $_GET["num"];
 $sql = "SELECT
num,
DATE_FORMAT(dateservice, '%d-%m-%Y') as dateservice_format,
case when trap1 = 'true' then 'true' else '' end as trap1,
case when trap2 = 'true' then 'true' else '' end as trap2,
case when trap3 = 'true' then 'true' else '' end as trap3,
pondcolor1,
pondcolor2,
case when pumpfailed1_1 = 'true' then 'true' else '' end as pumpfailed1_1,
case when pumpfailed1_2 = 'true' then 'true' else '' end as pumpfailed1_2,
case when pumpfailed1_3 = 'true' then 'true' else '' end as pumpfailed1_3,
case when pumpfailed2_1 = 'true' then 'true' else '' end as pumpfailed2_1,
case when pumpfailed2_2 = 'true' then 'true' else '' end as pumpfailed2_2,
case when pumpfailed2_3 = 'true' then 'true' else '' end as pumpfailed2_3,
case when pumpadjuct1_1 = 'true' then 'true' else '' end as pumpadjuct1_1,
case when pumpadjuct1_2 = 'true' then 'true' else '' end as pumpadjuct1_2,
case when pumpadjuct1_3 = 'true' then 'true' else '' end as pumpadjuct1_3,
case when pumpadjuct2_1 = 'true' then 'true' else '' end as pumpadjuct2_1,
case when pumpadjuct2_2 = 'true' then 'true' else '' end as pumpadjuct2_2,
case when pumpadjuct2_3 = 'true' then 'true' else '' end as pumpadjuct2_3,
pondhight1,
pondhight2,
case when pumpsediment1_1 = 'true' then 'true' else '' end as pumpsediment1_1,
case when pumpsediment1_2 = 'true' then 'true' else '' end as pumpsediment1_2,
case when pumpsediment1_3 = 'true' then 'true' else '' end as pumpsediment1_3,
case when pumpsediment2_1 = 'true' then 'true' else '' end as pumpsediment2_1,
case when pumpsediment2_2 = 'true' then 'true' else '' end as pumpsediment2_2,
case when pumpsediment2_3 = 'true' then 'true' else '' end as pumpsediment2_3,
sediment1,
sediment2,
case when pumpcrolene1_1 = 'true' then 'true' else '' end as pumpcrolene1_1,
case when pumpcrolene1_2 = 'true' then 'true' else '' end as pumpcrolene1_2,
case when pumpcrolene1_3 = 'true' then 'true' else '' end as pumpcrolene1_3,
case when pumpcrolene2_1 = 'true' then 'true' else '' end as pumpcrolene2_1,
case when pumpcrolene2_2 = 'true' then 'true' else '' end as pumpcrolene2_2,
case when pumpcrolene2_3 = 'true' then 'true' else '' end as pumpcrolene2_3,
case when polymer1 = 'true' then 'true' else '' end as polymer1,
case when polymer2 = 'true' then 'true' else '' end as polymer2,
case when polymer3 = 'true' then 'true' else '' end as polymer3,
ppm1,
ppm2,
case when rolled1 = 'true' then 'true' else '' end as rolled1,
case when rolled2 = 'true' then 'true' else '' end as rolled2,
case when rolled3 = 'true' then 'true' else '' end as rolled3,
water1,
water2,
case when pumpexcess1 = 'true' then 'true' else '' end as pumpexcess1,
case when pumpexcess2 = 'true' then 'true' else '' end as pumpexcess2,
case when pumpexcess3 = 'true' then 'true' else '' end as pumpexcess3,
wastewater1,
wastewater2,
meter,
meterfailed1,
case when aeration1_1 = 'true' then 'true' else '' end as aeration1_1,
case when aeration1_2 = 'true' then 'true' else '' end as aeration1_2,
case when aeration1_3 = 'true' then 'true' else '' end as aeration1_3,
meterfailed2,
case when aeration2_1 = 'true' then 'true' else '' end as aeration2_1,
case when aeration2_2 = 'true' then 'true' else '' end as aeration2_2,
case when aeration2_3 = 'true' then 'true' else '' end as aeration2_3,
pumping1,
case when pumpcondition1_1 = 'true' then 'true' else '' end as pumpcondition1_1,
case when pumpcondition1_2 = 'true' then 'true' else '' end as pumpcondition1_2,
case when pumpcondition1_3 = 'true' then 'true' else '' end as pumpcondition1_3,
pumping2,
case when pumpcondition2_1 = 'true' then 'true' else '' end as pumpcondition2_1,
case when pumpcondition2_2 = 'true' then 'true' else '' end as pumpcondition2_2,
case when pumpcondition2_3 = 'true' then 'true' else '' end as pumpcondition2_3,
pumping3,
case when cleantrap1_1 = 'true' then 'true' else '' end as cleantrap1_1,
case when cleantrap1_2 = 'true' then 'true' else '' end as cleantrap1_2,
case when cleantrap1_3 = 'true' then 'true' else '' end as cleantrap1_3,
rainning,
case when cleantrap2_1 = 'true' then 'true' else '' end as cleantrap2_1,
case when cleantrap2_2 = 'true' then 'true' else '' end as cleantrap2_2,
case when cleantrap2_3 = 'true' then 'true' else '' end as cleantrap2_3,
volume,
case when storetrap1_1 = 'true' then 'true' else '' end as storetrap1_1,
case when storetrap1_2 = 'true' then 'true' else '' end as storetrap1_2,
case when storetrap1_3 = 'true' then 'true' else '' end as storetrap1_3,
case when storetrap2_1 = 'true' then 'true' else '' end as storetrap2_1,
case when storetrap2_2 = 'true' then 'true' else '' end as storetrap2_2,
case when storetrap2_3 = 'true' then 'true' else '' end as storetrap2_3,
chlorineintank1,
garbage,
chlorineintank2,
others



FROM
 p_day
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
