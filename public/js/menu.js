const menu = document.querySelector('#menu');
const nav = document.querySelector('#compressed-nav');
const cancelMenu = document.querySelector('#cancelMenu');

cancelMenu.addEventListener('click', function(event) {
    event.preventDefault();
    nav.style = 'display: none;';
    menu.style = 'height: 18px; width: 26;'
})
// When menu shows, the icon shouldn't display to avoid reclicking
menu.addEventListener('click', function(){
    nav.style = 'display: flex;'
    menu.style = 'display: none;'
})

window.onclick = function(event){

    if (event.target.id !== 'menu' && nav.style.display === 'flex'){
        nav.style.display = 'none';
        // When menu closes, refix the style
        menu.style = 'height: 18px; width: 26px;'
    }

}