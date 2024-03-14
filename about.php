<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="container min-h-screen mt-16 pl-8 mx-auto">
      <h1 class="text-2xl sm:text-3xl font-bold">Questions about @GREENSTATIONMONITORING</h1>
      <?php
        // import data from json file
        $url = './json/faq.json';
        $data = file_get_contents($url);
        $questions = json_decode($data, true);
        // ciclo sulle domande prese dal json
        echo "<ul class='mt-6'>";
        foreach ($questions as $key => $value) {
          echo "<li class='mt-4'>" . "<h2 class='font-sans font-bold text-xl'>" . $value["question"] . "</h2>";
          echo "<p class='mt-2 mb-6 list-disc pl-4 text-lg'><span class='pr-2 font-bold'>▷</span>" . $value["answer"] . "</p>" . "</li>";
        }
        echo "</ul>";
      ?>
    </div>
  </div>
</body>
</html>