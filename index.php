<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Green Station Monitoring | pensilina fotovoltaica</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">
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

    <div class="container min-h-screen mt-16 mx-auto">
      <h1>Pensilina fotovoltaica</h1>
      <div class="flex flex-wrap flex-col sm:flex-row w-full max-w-[1124px] mx-auto sm:flex-nowrap justify-start items-center">
        <?php
        // require 'database.php';
        // $sql = "SELECT * FROM dati";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //   while ($row = $result->fetch_assoc()) {
        //     echo "<div>" . $row["id_presa"] . "</div>";
        //   }
        // }
        ?>
        <div class="flex flex-col sm:flex-row gap-4 flex-wrap lg:flex-nowrap">
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">1</div>
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">2</div>
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">3</div>
        </div>
        <div class="flex sm:ml-[1rem] flex-col sm:flex-row gap-4 flex-wrap lg:flex-nowrap">
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">4</div>
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">5</div>
          <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">6</div>
        </div>
      </div>
    </div>

    <footer class="w-full mx-0 mt-auto">
      <div>
        <h1>Green Station Monitoring &copy; | all rights reserved <span class="year"></span></h1>
      </div>
    </footer>
  </div>
</body>
<script src="./js/main.js"></script>

</html>