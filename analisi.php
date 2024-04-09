<?php
  // datapoints dinamici
  // include 'database.php';
  // $sql = "SELECT * FROM gsm WHERE rilevamenti IS NOT NULL";
  $utilizzi = array();
  // foreach($query as $rilevamenti) { } 

  $dataPoints = array(
    // i numeri corrispondono all'utilizzo medio mensile della somma delle prese
    // variabile $utilizzi[1,2,3...]
    array("y" => 6, "label" => "January"),
    array("y" => 8, "label" => "February"),
    array("y" => 16, "label" => "March"),
    array("y" => 26, "label" => "April"),
    array("y" => 10, "label" => "May"),
    array("y" => 16, "label" => "June"),
    array("y" => 4, "label" => "July"),
    array("y" => 9, "label" => "August"),
    array("y" => 22, "label" => "September"),
    array("y" => 15, "label" => "October"),
    array("y" => 14, "label" => "November"),
    array("y" => 4, "label" => "Dicember"),
  );
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
        title: { text: "Utilizzo delle prese medio mensile da Gen-Dic 2024" },
        axisY: { title: "Utilizzo medio mensile" },
        data: [{
          type: "line",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
  </script>
</head>

<body class="min-h-screen bg-green-500 text-neutral-100">
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
    <div class="container min-h-screen mt-16 pl-8 mx-auto">
      <h1 class="w-full text-center font-bold font-sans text-2xl lg:text-3xl mb-8 mt-2">Grafico delle prese</h1>
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <?php
      // require 'database.php';
      // $sql = "SELECT * FROM dati";
      // $result = $conn->query($sql);
      // echo "<ul>";
        // if ($result->num_rows > 0) {
        //   while ($row = $result->fetch_assoc()) {
        //     echo "<li><span>presa n* </span>" . $row["id_presa"] . "</li>" . "<br />";
        //     echo "<li><span>corrente istantanea </span>" . $row["corrente_istantanea"] . "</li>" . "<br />";
        //     echo "<li><span>consumo totale </span>" . $row["consumo_totale"] . "</li>" . "<br />";
        //     echo "<li><span>prese occupate </span>" . $row["prese_occupate"] . "</li>" . "<br />";
        //   }
        // }
      // echo "</ul>";
      ?>
    </div>
  </div>
  <?php include './components/footer.php'; ?>
  <!-- link alla graph library -->
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>