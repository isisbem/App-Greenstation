document.addEventListener("DOMContentLoaded", function () {
  // Update dell'anno
  let year = document.querySelectorAll(".year");
  let date = new Date();
  let thisY = date.getFullYear();
  year.innerHTML = thisY;

  // stato, index
  const realTimeStates = document.querySelectorAll(".stato");
  let svg = document.querySelectorAll("svg.icon");
  svg.forEach(function (svgs, index) {
    svgs.classList.contains("text-green-600") 
    ? realTimeStates[index].innerHTML = 'Libera!'
    : realTimeStates[index].innerHTML = 'Occupata!';
  })
})