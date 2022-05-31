// Сразу создаём переменные
let navbar = document.getElementById("navbar").classList;
let active_class = "navbar_scrolled";

/**
 * Слушаем событие прокрутки
 */
window.addEventListener("scroll", (e) => {
  if (scrollY > 500) navbar.add(active_class);
  else navbar.remove(active_class);
});
