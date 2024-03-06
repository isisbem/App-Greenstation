<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analisi - prese</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="w-full mx-auto max-w-[1024px] min-h-screen">
    <nav class="ml-0 mr-0 mt-0 min-h-[100px] w-full flex justify-between max-w-[1024px] mx-auto items-center">
      <div class="logo ml-2 md:ml-2">
        <img src="./public/icon.svg" alt="Logo" role="img">
      </div>
      <ul class="flex justify-end items-center gap-4 mr-2 md:mr-4">
        <li class="max-w-[250px]"><a href="index.php">Home</a></li>
        <li class="max-w-[250px]"><a href="analisi.php">Analisi</a></li>
        <li class="max-w-[250px]"><a href="about.php">Chi siamo</a></li>
      </ul>
    </nav>
    <h1>Grafico delle prese</h1>
    <?php
    require 'database.php';
    $sql = "SELECT * FROM dati";
    $result = $conn->query($sql);
    echo "<ul>";
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<li><span>presa n* </span>" . $row["id_presa"] . "</li>" . "<br />";
        echo "<li><span>corrente istantanea </span>" . $row["corrente_istantanea"] . "</li>" . "<br />";
        echo "<li><span>consumo totale </span>" . $row["consumo_totale"] . "</li>" . "<br />";
        echo "<li><span>prese occupate </span>" . $row["prese_occupate"] . "</li>" . "<br />";
      }
    }
    echo "</ul>";
    ?>
  </div>
</body>

</html>