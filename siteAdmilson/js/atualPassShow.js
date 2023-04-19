const passwordAtual = document.getElementById("atual-pass");
const iconAtual = document.getElementById("icon-atual");

function showHideAtual() {
  if (passwordAtual.type === "password") {
    passwordAtual.setAttribute("type", "text");
    iconAtual.classList.add("hide");
  } else {
    passwordAtual.setAttribute("type", "password");
    iconAtual.classList.remove("hide");
  }
}
