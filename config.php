<?php

$host = "localhost";
$user = "jj";
$password = "1234";
$dbname = "projectB";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con){
  die ("Connection failed: ". mysqli_connect_error());
} 
