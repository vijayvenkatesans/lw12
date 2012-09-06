<?php
	session_start();

	$username = "root";
  	$password = "justtobesafe";
  	$host = "localhost";
  	$database = "test";
  

  	$link = mysql_connect($host, $username, $password);
  	if (!$link) {
          die('Could not connect: ' . mysql_error());
    }
    mysql_select_db ($database);
?>
