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

/* menu burger - gestion #sous-liste*/
let adopt = document.getElementById('adopt');
let sousListe = document.getElementById('sous-liste');

adopt.addEventListener('click', function(e){
 
  sousListe.classList.toggle('open')
});

/*............CLASS ACTIVE........... */
//classe active sur barre de nav
let links = document.querySelector("#liste-nav").getElementsByTagName("a");

//Le script construit la liste de tous les liens contenus dans le sous-menu. Il compare l'URL du lien avec celui de la page courante, en location.href, et lorsque il est identique, lui attribue la classe "active".
    
for(let i=0; i<links.length; i++){
  if(links[i].href == location.href){
    links[0].classList.remove('active');
    links[i].classList.add('active');
  }
}
