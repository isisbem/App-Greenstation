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
    <h1 class="text-xl sm:text-2xl font-bold">Questions about @GREENSTATIONMONITORING</h1>
    <?php
    // import data from json file
    $url = './json/faq.json';
    $data = file_get_contents($url);
    $questions = json_decode($data, true);

    echo "<ul>";
    foreach ($questions as $key => $value) {
      echo "<li>" . $value["question"] . "</li>";
    }
    echo "</ul>";
    ?>
  </div>
</body>

</html>