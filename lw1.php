<?php
session_start();
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Linux Wizard - LOGIN 2012</title>
  
  <script src="jquery.min.js"></script>
  
  
  
  
  <script type="text/javascript" charset="UTF-8">
  var imgsource;
  
 //function img(){
    $.get("backimage.php",function(result) {
	//alert(result);
	//eval(result);
	imgsource=result;
	//alert(imgsource);
	
	document.getElementById("background").src=imgsource;
	
	//document.body.style.backgroundColor="#000";
	//document.write('<img style="position:absolute;z-index:-1000;" id="background" src=\''+result+'\'height="500px" width="500px">');
	//document.write(result);
	});
 //}
  
  x=0;
  flag=0;
  
  function hideanswered(target) { 
    document.getElementById(target).style.visibility="hidden"; 
  }

  function testfn(str) {
    //  alert(str);
  }
  
  function hide(target,str,uid){
      question="question".concat(" ").concat(target);
   
   $.get("check.php?qno="+target+"&uid="+uid,function(flag) {
		
		//alert(flag); 
             if (flag==1) 
       { 
	   //alert(flag);
	   
          alert(question);
     var name=prompt(str,"");
  
      if (name != '') {
          //alert(value);
   //   location.href="validate.php?answer=" + name + "&qno=" + target; 
	 //window.open("validate_FLOP.php?answer=" + name + "&qno=" + target+"&uid="+uid,'_blank');
	  $.get("validate_FLOP.php?answer="+name+"&qno="+target+"&uid="+uid,function(result) {
		 
              if (result=='true')
               {
                              document.getElementById(target).style.visibility="hidden";
               }
                 else
	          alert('Wrong Answer');
	     

             });
      }	

  
   }     // first if condition
   });  
   
  
   }
  </script>
  
  </head>
  
  <img style="position:absolute;z-index:-1;" id="background" src="temp.jpg" height="500px" width="500px">
  
  <body>
  
  <div align="justify">
    <!--<a href="#" onclick="hide('id1');">hide 2 divs</a><br>
  -->
    
    <?php
  $uid=$_SESSION["uid"];
include "database.php";
 /* $username = "root";
  $password = "justtobesafe";
  $host = "localhost";
  $database = "test";
   
   
  
   //echo $testvar;
  // Make the connect to MySQL or die
  // and display an error.
  $link = mysql_connect($host, $username, $password);
  if (!$link) {
          die('Could not connect: ' . mysql_error());
  }
  // Select your database
  mysql_select_db ($database);
   //echo "Connection established "; */
  $i=1;
   $query = "select * from lw";
   $result = mysql_query($query,$link);
   
   //$vname1 = mysql_fetch_array($result1);
   //$_SESSION['qno']=$vname1[0];
   //$_SESSION['question']=$vname1[1];
   //$_SESSION['answer']=$vname1[2];
   //$_SESSION['options']=$vname1[3];
   
   while ( $vname = mysql_fetch_array($result) )
   {
      
   //$temp=$vname['question'];
  // echo $vname[0];
  // echo $vname[1];
   //echo $vname[2];
   //echo $vname[3];
  //echo $vname[4];
   
  // $identity="img" . "$i" ;
    //echo $identity;
    //$test = '<img src="data:image/jpeg;base64,' . base64_encode( $vname[5] ) . '" style="position:relative;left:0px;top:0px;z-index:1;" id='.$identity.' height="100px" width="100px" onclick="hide(id)" />';
  
     
   
    $qno='qno'.$i;
    $question='question'.$i;
    $options='options'.$i;
    $answer='answer'.$i;
  
  
  
   $_SESSION[$qno]=$vname[0];
   $_SESSION[$question]=$vname[1];
   $_SESSION[$options]=$vname[2];
   $_SESSION[$answer]=$vname[3];
   $q=$_SESSION[$question];
  //echo $q;
  
  $q=$q." ".$vname[2];
  $test = "hello";
  {
    echo '<img src="data:image/jpeg;base64,' . base64_encode( $vname[5] ) .'" style="position:relative;left:0px;top:0px;z-index:1;" id='.$i.' height="100px" width="100px" onclick="hide(id,\''.$q.'\',\''.$uid.'\')" />';
   
  }
  
  //hide(id,"'.$test.'")
  
   
  //print "<img src='data:image/jpeg;base64,' . base64_encode( $vname[5] ) .' style="position:relative;left:0px;top:0px;z-index:1;" id='.$identity.' height="100px" width="100px" onclick="hide(id)"	 />";
   
   
  // echo "<img src='apache_pb.gif' id='h1' onClick=hide(id,'$q')>";
   
   if ( $i%5==0)
   echo '<br>';
   
   //echo $test;
   $i++;
   }
    
   $query = "select * from user_ques where uid=".$uid;
   $result = mysql_query($query,$link);

  while ( $record = mysql_fetch_array($result) )
  {
    if($record["flag"]==1) {
      echo "<script>hideanswered(".$record["qid"]."); </script>";
    }
  }

  
  ?>
    <!--<form id="pagePhpVars" method="post">
  <input type="hidden" name="phpString1" id="phpString1" value='' />
  </form>
  -->
  </div>
  <div id="div1" style="position:relative; left:600px" >
      Your ID is : <br /> 
      <input type="text" value='<?php echo $uid;  ?>' disabled="disabled" />
    </div>
  </div>
  </body>
  </html>
