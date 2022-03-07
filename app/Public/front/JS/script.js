/*...........BOITE MODALE............... */
// function example() {
//   el = document.getElementById("example");
//   el.style.visibility = el.style.visibility == "visible" ? "hidden" : "visible";
// }

/* ..........MENU BURGER HEADER............. */

/* menu burger - gestion #liste-nav */
let link = document.getElementById('link');
let burger = document.getElementById('burger');
let listeNav = document.getElementById('liste-nav');

link.addEventListener('click', function(e){
  e.preventDefault()
  burger.classList.toggle('open')
  listeNav.classList.toggle('open')
});

/* menu burger - gestion #sous-miste*/
let adopt = document.getElementById('adopt');
let sousListe = document.getElementById('sous-liste');

adopt.addEventListener('click', function(e){
  e.preventDefault()
  sousListe.classList.toggle('open')
});