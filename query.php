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
      /** 
          SELECT 
            id AS num_prese, 
            CAST(SUM(TIMEDIFF(data_ora_fine_carica, data_ora_inizio_carica) / 10000) AS DECIMAL(10,2)) AS durata_carica
          FROM 
            rilevamenti
          WHERE 
            data_ora_inizio_carica >= DATE_SUB(NOW(), INTERVAL 30 DAY)
          GROUP BY 
            data_ora_inizio_carica;
       */
    ?>
  </body>
</html>