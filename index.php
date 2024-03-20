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

    <div class="container min-h-screen mt-16 mx-auto">
      <h1 class="w-full text-center font-bold font-sans text-2xl lg:text-3xl">Pensilina fotovoltaica</h1>
      <div class="flex flex-col text-neutral-950 flex-col w-full max-w-[1124px] mx-auto lg:flex-nowrap justify-start items-center">
        <?php
        include 'database.php';
        // $sql = "SELECT * FROM dati";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //   while ($row = $result->fetch_assoc()) {
        //     echo "<div>" . $row["id_presa"] . "</div>";
        //   }
        // }
        ?>
        <div class="flex flex-nowrap justify-center items-center flex-col lg:flex-row mt-2">
          <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mt-4 lg:mt-0 flex-wrap sm:flex-nowrap">
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              1
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="0">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="0">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              2
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="1">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="1">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              3
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="2">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="2">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
          </div>
          <div class="flex mt-4 lg:mt-0 lg:ml-4 flex-col sm:flex-row gap-4 justify-center items-center flex-wrap sm:flex-nowrap">
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              4
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="3">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="3">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              5
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="4">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="4">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
            <div class="w-full max-w-[200px] border border-neutral-200 bg-neutral-50 shadow-md min-h-[200px] pb-2 px-1 min-w-[125px] flex flex-col justify-center items-center pt-3">
              6
              <svg class="icon icon-tabler icon-tabler-bulb-filled text-green-600"fill=none height=44 stroke=#fff stroke-linecap=round stroke-linejoin=round stroke-width=1.5 viewBox="0 0 24 24"width=44 xmlns=http://www.w3.org/2000/svg><path d="M0 0h24v24H0z"fill=none stroke=none /><path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"fill=currentColor stroke-width=0 /><path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"fill=currentColor stroke-width=0 /><path d="M4.893 4.893a1 1 0 0 1 1.32 -.083l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 0 -1.414z"fill=currentColor stroke-width=0 /><path d="M17.693 4.893a1 1 0 0 1 1.497 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7z"fill=currentColor stroke-width=0 /><path d="M14 18a1 1 0 0 1 1 1a3 3 0 0 1 -6 0a1 1 0 0 1 .883 -.993l.117 -.007h4z"fill=currentColor stroke-width=0 /><path d="M12 6a6 6 0 0 1 3.6 10.8a1 1 0 0 1 -.471 .192l-.129 .008h-6a1 1 0 0 1 -.6 -.2a6 6 0 0 1 3.6 -10.8z"fill=currentColor stroke-width=0 /></svg>
              <button type="button" class="prenota-btn my-2 border border-neutral-300 bg-green-600 text-neutral-100" data-state="prenota" data-index="5">PRENOTA</button>
              <button type="button" class="prenota-btn mb-2 border border-neutral-300 bg-red-600 text-neutral-100" data-state="disdici" data-index="5">DISDICI</button>
              <span class="stato mb-2 text-black font-thin text-md sm:text-lg">Libera!</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="w-full mx-0 mt-auto">
      <div>
        <h1>Green Station Monitoring &copy; | all rights reserved <span class="year"></span></h1>
      </div>
    </footer>
  </div>
  <script src="./js/main.js"></script>
</body>
</html>