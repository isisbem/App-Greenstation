<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bring the data</title>
  </head>
  <body>
    <?php 
      echo "<h1>Bring the data from SFTP server</h1>";
      // foreach($data as $analisi => $values) { }
      /* 
        in locale si prendono i dati in SQL, mentre quando l'app 
        mentre quando si fa il deploy dell'app, si farà con un server WEB
        apache HTTP server -- all'indirizzo: https://soft-serv.it;
        I dati verranno caricati sul webserver in sftp dall'arduino, mentre con questa 
        app verranno presi i dati e raffigurati nelle 6 prese nell'interfaccia principale
        e nel grafico nella parte di analisi.
        SENSORI PRESE --> ARDUINO --> SERVER WEB --> APP(qua).
      */
      // query
      $sql = "SELECT id AS num_prese, CAST(SUM(TIMEDIFF(data_ora_fine_carica, data_ora_inizio_carica) / 10000) AS DECIMAL(10,2)) AS durata_carica FROM rilevamenti WHERE data_ora_inizio_carica >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY data_ora_inizio_carica;";
    ?>
  </body>
</html>