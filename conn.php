<?php
class Connect{
public $servername;
public $username;
public $pass;
public $dbname;
public  function getconnect()
{
$servername = "localhost";
 $username = "root";
 $pass = "";
 $dbname="id1021231_saamp";
 $conn=new mysqli($servername, $username, $pass,$dbname);
    if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
    } 
 return $conn;
}
}
?>