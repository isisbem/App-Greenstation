<!-- SFTP CONNECTION (data)-->
<?php include 'query.php'; ?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Green Station Monitoring | Pensilina Fotovoltaica</title>
  <link rel="stylesheet" href="./assets/tailwind.css">
  <link rel="stylesheet" href="./node_modules/tailwindcss/tailwind.css">
  <link rel="icon" href="./public/logoFinale.jpg">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-[80vh] sm:min-h-[90vh] md:min-h-screen bg-green-500 text-neutral-100">
  <div class="w-full mx-auto max-w-[1024px] min-h-[65vh] md:min-h-screen">
    <!-- Navigation -->
    <nav class="ml-0 mr-0 mt-0 min-h-[100px] w-full flex justify-between max-w-[1024px] mx-auto items-center">
      <div class="logo ml-2 md:ml-2 active:outline rounded-full z-90 active:scale-[1.0175] active:outline-2 active:outline-neutral-200 transition-outline">
        <a href="index.php" class="bg-none">
          <img src="./public/logoFinale.jpg" class="max-w-full block rounded-full " width="55" height="55" alt="Logo" role="img">
        </a>
      </div>
      <ul class="flex justify-end items-center gap-4 mr-2 md:mr-4">
        <li class="max-w-[250px]"><a href="index.php">Home</a></li>
        <li class="max-w-[250px]"><a href="analisi.php">Analisi</a></li>
        <li class="max-w-[250px]"><a href="about.php">Chi siamo</a></li>
        <li class="max-w-[250px]">
          <a href="https://www.instagram.com/greenstation_monitoring/" class="bg-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram text-white" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="#22c55e" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
              <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
              <path d="M16.5 7.5l0 .01" />
            </svg>
          </a>
        </li>
      </ul>
    </nav>
    <div class="container min-h-screen mt-12 mx-auto">
      <h1 class="w-full text-center font-bold font-sans text-2xl md:text-3xl lg:text-4xl mb-4">Pensilina fotovoltaica</h1>
      <!-- SFTP CONNECTION -->
      <?php 
        include 'database.php';
      ?>
      <div class="flex flex-col text-neutral-950 flex-col w-full max-w-[1124px] mx-auto lg:flex-nowrap justify-start items-center">
        <div class="flex flex-nowrap justify-center items-center flex-col lg:flex-row mt-2">
          <div class="flex flex-col md:flex-row gap-4 justify-center items-center mt-4 lg:mt-0 flex-wrap md:flex-nowrap">
          <?php
            // Array for labels for each socket
            $socketLabels = array("n°1", "n°2", "n°3", "n°4", "n°5", "n°6");
          ?>
          <?php foreach ($logData as $index => $status) { ?>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3 rounded-lg">
                <?php if ($status === 1) { ?>
                    <!-- SVG verde -->
                    <svg class='icon icon-tabler icon-tabler-bulb-filled text-green-600' fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox='0 0 24 24' width=44 xmlns=http://www.w3.org/2000/svg>
                      <path d='M0 0h24v24H0z' fill=none stroke=none />
                      <path d='M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z' fill=currentColor stroke-width=0 />
                      <path d='M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z' fill=currentColor stroke-width=0 />
                      <path d='M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z' fill=currentColor stroke-width=0 />
                      <path d='M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z' fill=currentColor stroke-width=0 />
                      <path d='M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z' fill=currentColor stroke-width=0 />
                      <path d='M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z' fill=currentColor stroke-width=0 />
                      <path d='M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z' fill=currentColor stroke-width=0 />
                    </svg>
                    <span class="stato my-2 text-black flex flex-col justify-center items-center gap-2 font-thin text-md sm:text-lg lg:text-xl" index="<?php echo $index; ?>"><?php echo "<p class='font-bold'>$socketLabels[$index]</p>" ?><p>Libera!</p></span>
                <?php } else { ?>
                    <!-- SVG rosso -->
                    <svg class='icon icon-tabler icon-tabler-bulb-filled text-red-600' fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox='0 0 24 24' width=44 xmlns=http://www.w3.org/2000/svg>
                      <path d='M0 0h24v24H0z' fill=none stroke=none />
                      <path d='M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z' fill=currentColor stroke-width=0 />
                      <path d='M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z' fill=currentColor stroke-width=0 />
                      <path d='M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z' fill=currentColor stroke-width=0 />
                      <path d='M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z' fill=currentColor stroke-width=0 />
                      <path d='M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z' fill=currentColor stroke-width=0 />
                      <path d='M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z' fill=currentColor stroke-width=0 />
                      <path d='M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z' fill=currentColor stroke-width=0 />
                    </svg>
                    <span class="stato my-2 text-black flex flex-col justify-center items-center gap-2 font-thin text-md sm:text-lg lg:text-xl" index="<?php echo $index; ?>"><?php echo "<p class='font-bold'>$socketLabels[$index]</p>" ?><p>Occupata!</p></span>
                <?php } ?>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>

      <!-- other things -->
      <h1 class="mt-12 mb-6 py-4 font-bold font-sans text-lg md:text-xl text-center">Questi dati sono aggiornati in tempo reale!</h1>
    </div>
    <?php include './components/footer.php'; ?>

  </div>
</body>
</html>