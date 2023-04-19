function nav(classe) {
  let list = document.getElementById("menu-icon").classList.toggle(classe);

  document.getElementById("navbar").classList.add("active");

  if (list == false) {
    document.getElementById("menu-icon").classList.toggle("fa-bars");
    document.getElementById("navbar").classList.remove("active");
  }

  window.onscroll = () => {
    document.getElementById("menu-icon").classList.toggle("fa-bars");
    document.getElementById("navbar").classList.remove("active");
  };
}
