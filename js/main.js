document.addEventListener("DOMContentLoaded", function () {
  let year = document.querySelectorAll(".year"); 
  let date = new Date(); 
  let thisY = date.getFullYear(); 
  year.innerHTML = thisY; 
}) 