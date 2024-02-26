<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
  </head>
  <body>
    <h1>Questions about @GREENSTATIONMONITORING</h1>
    <?php
      // import data from json file
      $url = './json/faq.json';
      $data = file_get_contents($url);
      $questions = json_decode($data, true);

      echo "<ul>";
      foreach ($questions as $key => $value) {
        echo "<li>" . $question . "</li>";
      } 
      echo "</ul>";
    ?>  
  </body>
</html>