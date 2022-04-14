let btn = document.getElementById("btn-tgl");
let div = document.getElementById("m-section");

btn.addEventListener("click", () => {
  if (div.style.display === "none") {
    div.style.display = "flex";
  } else {
    div.style.display = "none";
  }
});
