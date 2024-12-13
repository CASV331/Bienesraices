document.addEventListener("DOMContentLoaded", function () {
  eventlisteners();

  darkMode();
});

function eventlisteners() {
  const mobilMenu = document.querySelector(".mobile-menu");

  mobilMenu.addEventListener("click", navegacionRespon);
}

function navegacionRespon() {
  const navegacion = document.querySelector(".navegacion");
  const lines = document.querySelectorAll(".line");

  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
    lines.forEach((line, i) => {
      line.classList.remove(`line-active-${i + 1}`);
    });
    return;
  }
  navegacion.classList.add("mostrar");
  lines.forEach((line, i) => {
    line.classList.add(`line-active-${i + 1}`);
  });
}

function darkMode() {
  const botonDM = document.querySelector(".dark-mode");

  const prefiereDarkmode = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefiereDarkmode.matches) {
    document.body.classList.add("dark-mode-body");
  }

  prefiereDarkmode.addEventListener("change", function () {
    if (prefiereDarkmode.matches) {
      document.body.classList.add("dark-mode-body");
    }
  });
  botonDM.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode-body");
  });
}
