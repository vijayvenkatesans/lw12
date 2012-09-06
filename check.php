<?php
session_start();
?>

<?php
include "database.php";
/*$username = "root";
  $password = "justtobesafe";
  $host = "localhost";
  $database = "test";
  
  // Make the connect to MySQL or die
  // and display an error.
  $link = mysql_connect($host, $username, $password);
  if (!$link) {
          die('Could not connect: ' . mysql_error());
  }
 
  // Select your database
  mysql_select_db ($database);*/
 $uid=$_GET["uid"];
 $qno=$_GET["qno"];
  //$uid=1000;
  //$qno=9;
  
//$query="insert into user_ques values('$uid','$qno','$answer',1)";
$query="select * from user_ques where uid='$uid' and qid='$qno'";
$result=mysql_query($query);
if(!$result)
echo 1;
$row = mysql_fetch_assoc($result);
if ($row['flag']!=-1)
echo 1;
else
echo -1;

?>
