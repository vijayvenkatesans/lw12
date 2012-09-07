<?php
session_start();
?>
<?php
include "database.php";
/*$username = "root";
  $password = "justtobesafe";
  $host = "localhost";
  $database = "test";
  

  $link = mysql_connect($host, $username, $password);
  if (!$link) {
          die('Could not connect: ' . mysql_error());
        }
  //echo "connection established"; 
          mysql_select_db ($database);
  */
   
$answer=$_GET["answer"];
$qno=$_GET["qno"];
$uid=$_GET["uid"];




//if($answer!=1 && $answer!=2 && $answer!=3 && $answer!=4)
if($answer==''||$answer==NULL||$answer==null)	{
	$answer=0;
	echo "gaali";
}

$query="select * from lw where qno=".$qno;
$result=mysql_query($query);
$result=mysql_fetch_assoc($result);

if(strcmp($result["type"],"mcq")==0)
{  
	if(strcmp($answer,$result["ans"])==0)
      {
	$query="insert into user_ques values('$uid','$qno','$answer',1)";
	mysql_query($query);
	$query="update score set score=score+1 where uid='$uid'";
	mysql_query($query);
	echo "true";
      }
	else 
      {

	$query="insert into user_ques values('$uid','$qno','$answer',-1)";
	mysql_query($query);
	echo "false";

      }
}
if(strcmp($result["type"],"cmd")==0)
{  
 $delimiter="$@/";
 $answer=preg_replace('/\s\s+/', ' ',$answer);
 $array=explode($delimiter,$result["ans"]);
	if(in_array($answer,$array))
      {
	$query="insert into user_ques values('$uid','$qno','$answer',1)";
	mysql_query($query);
	$query="update score set score=score+1 where uid='$uid'";
	mysql_query($query);
	echo "true";
      }
	else 
      {
	//$query="insert into user_ques values('$uid','$qno','$answer',-1)";
	//mysql_query($query);
	echo "false";

      }
}

if(strcmp($result["type"],"exe")==0) 
{
// echo '<script> alert('.$answer.') </script>';
// echo "<br>".$answer;
$var= shell_exec($answer);
// echo "<br>".$var;
$var1=$result["ans"];
$var=trim($var);
$var1=trim($var1);
$var=rtrim($var," ");
//echo "<br>".$var;
// echo "<br>".$var1;


// echo "<br>".strlen($var);
// echo "<br>".strlen($var1);

// echo '<br>'.strcmp($var,$var1)	;
if(strcmp($var,$var1)==0)
{
$query="insert into user_ques values('".$uid."','".$qno."','".addslashes($answer)."',1)";
// echo $query;
mysql_query($query,$link);
$query="update score set score=score+1 where uid='$uid'";
mysql_query($query,$link);
echo "true";
}
else
{
//$query="insert into user_ques values('$uid','$qno','$answer',-1)";
//mysql_query($query);
	echo "false";


}

}
?>
