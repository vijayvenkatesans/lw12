<?php
  include "database.php";
    $iid = rand(1,3);
    $query = "select image from bgs where iid=".$iid;
    $result = mysql_query($query);
    $img = mysql_fetch_array($result);
	echo 'data:image/jpeg;base64,'.base64_encode($img[0]);  
//echo "<img style=\"position:absolute;z-index:-1;\" id=\"background\" src=\"shells.jpg\" height=\"500px\" width=\"500px\">";

//echo "shells.jpg";
?>