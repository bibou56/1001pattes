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