<?php
$host = 'localhost';
$username = 'root';
$psw = '';
$myDB = 'green_station';

$mysqli = new mysqli($host, $username, $psw, $myDB);
if ($mysqli->connect_error) {
  die('Errore di connessione (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
  echo 'Connesso. ' . $mysqli->host_info . "\n";
}