document.addEventListener("DOMContentLoaded", function () {
  // Update dell'anno
  let year = document.querySelectorAll(".year");
  let date = new Date();
  let thisY = date.getFullYear();
  year.innerHTML = thisY;

  // Buttons
  const prenotaButtons = document.querySelectorAll(".prenota-btn");
  const realTimeStates = document.querySelectorAll(".stato");
  // per ogni button, aggiorno lo stato
  prenotaButtons.forEach(button => {
    button.addEventListener("click", function () {
      const parentDiv = button.closest(".w-full");
      const svgIcon = parentDiv.querySelector("svg");
      const index = parseInt(button.dataset.index);

      if (button.dataset.state === "prenota") {
        svgIcon.classList.remove("text-green-600");
        svgIcon.classList.add("text-red-500");
        realTimeStates[index].innerHTML = 'Prenotata!';
      } else {
        svgIcon.classList.remove("text-red-500");
        svgIcon.classList.add("text-green-600");
        realTimeStates[index].innerHTML = 'Libera!';
      }
    })
  })
})