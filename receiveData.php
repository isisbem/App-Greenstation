<?php
/*
  Riceve i dati da Arduino e li scrive come log nella cartella processedLog.
*/

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   if (isset($_POST['timestamp']) && isset($_POST['data'])) {
//     // Prende i dati inviati da Arduino
//     $timestamp = $_POST['timestamp'];
//     $logData = $_POST['data'];
//     // Timestamp non deve contenere caratteri non validi per il nome del file
//     $timestamp = preg_replace("/[^a-zA-Z0-9\-_]/", "_", $timestamp);
//     // Crea percorso file log
//     $filename = "/var/www/html/gsm/processedLog/{$timestamp}.log";

//     // Scrivi i dati nel file log
//     if (file_put_contents($filename, $logData) !== false) {
//       echo "Dati ricevuti! {$timestamp}.log";
//     } else {
//       echo "Error: non è possibile scrivere dati nel file";
//     }
//   } else { // In mancanza di dati inviati da Arduino
//     echo "Error: Non sono stati ricevuti tutti i dati";
//   }
// } else {
//   echo "Error: richiesta non valida";
// }
?>