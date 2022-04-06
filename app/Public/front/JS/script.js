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

/*............CLASS ACTIVE MENU........... */
//classe active sur barre de nav
let links = document.querySelector("#liste-nav").getElementsByTagName("a");

//Le script construit la liste de tous les liens contenus dans le sous-menu. Il compare l'URL du lien avec celui de la page courante, en location.href, et lorsque il est identique, lui attribue la classe "active".
    
for(let i=0; i<links.length; i++){
  if(links[i].href == location.href){
    links[0].classList.remove('active');
    links[i].classList.add('active');
  }
}

/*....................CARTE CONTACT.................... */
var lat = 47.6505928;
var lon = -2.9223622;
var map = null

function initMap(){    
    
  map = L.map('myMap').setView([lat, lon], 16);
    
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(map);

    var marker = L.marker([47.6505928, -2.9223622 ]).addTo(map);
    marker.binPopup("<p>Refuge 1000 et Une Pattes</p>");
  }
  window.onload = function(){
    initMap();
  }

  /*...........BOITE MODALE FICHE ANIMAL............... */
function example() {
  el = document.querySelector(".valid");
  // el.style.visibility = el.style.visibility == "visible" ? "hidden" : "visible";
  el.classList.add('hide');
}
  


        
