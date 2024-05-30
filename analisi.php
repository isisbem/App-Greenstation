<?php
include 'database.php';
// login + carico il file
if ($sftp->login('gsm', 'gsm2024')) {
  $remoteFileDest = '/var/www/html/gsm/readLog.txt';
  $fileContent = $sftp->get($remoteFileDest);
}

// Analizza il contenuto del file e conta gli utilizzi per ciascun mese (inizio)
function countUsagesPerMonth($fileContent)
{
  // Utilizzi per mese
  $usagesPerMonth = array();
  // Trova le righe con le date di inizio e fine (pattern js)
  $pattern = '/Inizio: (\d{4}-\d{2}-\d{2})/';
  preg_match_all($pattern, $fileContent, $matches);

  // Loop attraverso tutti i mesi dell'anno
  for ($month = 1; $month <= 12; $month++) {
    $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Nome del mese
    $usagesPerMonth[$monthName] = 0; // Inizializza il conteggio per il mese corrente
  }

  // Utilizzi per mese
  foreach ($matches[1] as $index => $date) {
    $monthName = date('F', strtotime($date)); // Nome del mese
    $usagesPerMonth[$monthName]++; // Incrementa il conteggio per il mese corrente
  }
  return $usagesPerMonth;
}

if ($fileContent !== false) { // se il file è letto
  // echo "File letto con successo!<br>";
  $usagesPerMonth = countUsagesPerMonth($fileContent);
  // Datapoints per il grafico
  $dataPoints = array();
  foreach ($usagesPerMonth as $month => $usage) {
    $dataPoints[] = array("y" => $usage, "label" => $month);
  }
} else {
  echo "Impossibile leggere il file.";
  // Inizializzato i $dataPoints a un array vuoto (o in caso di errore)
  $dataPoints = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analisi - prese</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Utilizzo delle prese medio mensile da Gen-Dic 2024"
        },
        axisY: {
          title: "Utilizzo medio mensile"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
  </script>
</head>

<body class="min-h-screen bg-green-500 text-neutral-100 overflow-x-hidden md:overflow-x-auto">
  <div class="w-full mx-auto max-w-[1024px] min-h-screen">
    <nav class="ml-0 mr-0 mt-0 min-h-[100px] w-full flex justify-between max-w-[1024px] mx-auto items-center">
      <div class="logo ml-2 md:ml-2">
        <a href="index.php">
          <img src="./public/logoFinale.jpg" class="max-w-full block rounded-full" width="55" height="55" alt="Logo" role="img">
        </a>
      </div>
      <ul class="flex justify-end items-center gap-4 mr-2 md:mr-4">
        <li class="max-w-[250px]"><a href="index.php">Home</a></li>
        <li class="max-w-[250px]"><a href="analisi.php">Analisi</a></li>
        <li class="max-w-[250px]"><a href="about.php">Chi siamo</a></li>
      </ul>
    </nav>
    <!-- main content -->
    <!-- HTML del corpo della pagina ... -->
    <div id="chartContainer" style="height: 370px; width: 100%; visibility: visible; padding-top: 24px; padding-left: 4px; padding-right: 2px;"></div>
  </div>
  <?php include './components/footer.php'; ?>
  <!-- link alla graph library -->
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <!-- Script per il grafico -->
  <script>
    window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Utilizzo delle prese medio mensile da Gen-Dic 2024"
        },
        axisY: {
          title: "Utilizzo medio mensile"
        },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
  </script>
</body>
</html>