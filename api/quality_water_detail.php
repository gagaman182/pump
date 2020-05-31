<?php
	 header('Access-Control-Allow-Origin: *');
   
	 include 'conn.php';

    // $num = '19';
   $num = $_GET["num"];
 $sql = "SELECT *, DATE_FORMAT(dateservice, '%d-%m-%Y') as dateservice_format
FROM
p_water
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
