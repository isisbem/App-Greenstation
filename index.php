<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Green Station Monitoring | pensilina fotovoltaica</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <link rel="icon" href="./public/logoFinale.jpg">
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
    <div class="container min-h-screen mt-12 mx-auto">
      <h1 class="w-full text-center font-bold font-sans text-2xl md:text-3xl lg:text-4xl mb-4">Pensilina fotovoltaica</h1>
      <div class="flex flex-col text-neutral-950 flex-col w-full max-w-[1124px] mx-auto lg:flex-nowrap justify-start items-center">
        <?php
        // $ftp_server = "https://www.soft-serv.it/gsm/";
        // set up a connection or die
        // $ftp = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 
        ?>
        <div class="flex flex-nowrap justify-center items-center flex-col lg:flex-row mt-2">
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-4 lg:mt-0 flex-wrap sm:flex-nowrap">
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              1
              <?php 
                // determinare se una presa è occupata o meno
                // include 'database.php';
                // $conn = new mysqli("https://www.soft-serv.it/gsm", "gsm", "GsM!2024", "gsm", 22);
                $sql = "SELECT * FROM gsm WHERE Inizio IS NOT NULL AND Fine IS NOT NULL";
              ?>
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-red-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="0">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              2
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg> 
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="1">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              3
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="2">Libera!</span>
            </div>
          </div>
          <div class="flex mt-4 lg:mt-0 lg:ml-4 flex-col sm:flex-row gap-4 justify-center items-center flex-wrap sm:flex-nowrap">
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              4
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="3">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              5
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="4">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
              6
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg" index="5">Libera!</span>
            </div>
          </div>
        </div>
      </div>
      <!-- LOCAL TESTING -->
      <div class="flex justify-center items-center flex-row gap-2 mt-8 pt-2 mb-16 pb-4">
        <?php 
          /*
           * LOCAL TEST WITH LOCAL DB
          */
          include './data/db_conn_local.php';
          $sql = "SELECT * FROM rilevamenti";
          $result = $conn->query($sql);
          echo "<div class'flex justify-between w-full items-start flex-row gap-2'>";
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<div class='my-2 text-left flex flex-col justify-start items-start'>";
                echo "<span class='font-bold'>Numero presa: " . $row["id"] . "</span>";
                echo "<span class='pl-2'>Ora inizio presa" . $row["id"] . ": " . "<span class='font-mono font-thin'>" . $row["data_ora_inizio_carica"] . "</span>" . "</span>";
                echo "<span class='pl-2'>Ora fine presa" . $row["id"] . ": " . "<span class='font-mono font-thin'>" . $row["data_ora_inizio_carica"] . "</span>" . "</span>";
              echo "</div>"; 
            }
          }
        ?>
      </div>
    </div>
    <?php include './components/footer.php'; ?>
  </div>
  <script src="./js/main.js"></script>
</body>
</html>