<?php
/*
CREATED and 
DEVELOPED BY Mahmoud Mostafa
*/
//website setting
@session_start();
if(!isset($_SESSION['apply']))$_SESSION['apply']=0;
//mysql server login information

$mysqlHost = "localhost";
$mysqlUser = "root";
$mysqlPass = "goldd85";
$project_db = "ibiidi";
$con = mysqli_connect($mysqlHost,$mysqlUser,$mysqlPass, $project_db) or die("Couldn't connect to mysql server");
//mysql_select_db($project_db,$con) or die("Could't connect to database");

mysqli_query($con,"SET NAMES utf8");
?>

