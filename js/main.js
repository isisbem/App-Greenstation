// Gestione stato dinamico delle prese
document.addEventListener("DOMContentLoaded", function () {
  // Funzione per aggiornare lo stato delle prese
  function updateStates() {
    const realTimeStates = document.querySelectorAll(".stato");
    let svg = document.querySelectorAll("svg.icon");
    svg.forEach(function (svgs, index) {
      if (svgs.classList.contains("text-green-600")) realTimeStates[index].innerHTML = 'Libera!';
      else realTimeStates[index].innerHTML = 'Occupata!';
    });
  }
  // Aggiornamento iniziale dello stato delle prese
  updateStates();

  // Aggiornamento prese ogni (5000ms = 5s secondi)
  setInterval(function () {
    updateStates();
  }, 5000);

  // Aggiornamento dell'anno(footer)
  let year = document.querySelectorAll(".year");
  let date = new Date();
  let thisY = date.getFullYear();
  year.forEach(function (element) {
    element.innerHTML = thisY;
  });
});