// tools
document.addEventListener("DOMContentLoaded", function () {
  // Aggiornamento dell'anno(footer)
  let year = document.querySelectorAll(".year");
  let date = new Date();
  let thisY = date.getFullYear();
  year.forEach(function (element) {
    element.innerHTML = thisY;
  });
});