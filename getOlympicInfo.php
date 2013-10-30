<?php
header("Content-Type: text/html");
$con = mysqli_connect('localhost','johnfoxs_oly','******');
$con->set_charset('utf8');

if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"johnfoxs_olympics");

//request random row - it checks if Athlete is null or undefined
$sql="SELECT Athlete, Medal, Country, Event, Edition, Season FROM main_olympic_data WHERE Athlete IS NOT NULL and Athlete <> '' AND Event = 'FOOTBALL' ORDER BY RAND() LIMIT 1";

    $result = mysqli_query($con,$sql);
    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        $arr[] = $row; 
    }
 
//Put result set into JSON object
print (json_encode($arr));
mysqli_close($con);
?>