<?php 
$host = 'localhost';
$user = 'root';
$psw = '';
$db_name = 'green_station';
$conn = new mysqli($host, $user, $psw, $db_name);
if(!$conn) {
  die("can't connect to server!");
}