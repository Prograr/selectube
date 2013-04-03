/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */


$(document).ready(function() {
    //Init bootstrap elements
    $('#boutons-accueil a').popover({'trigger': 'hover', 'placement': 'bottom'});
    $('#lien-video i').hover(function(){
        $(this).removeClass('icon-film').addClass('icon-eye-close');
    },function(){
        $(this).removeClass('icon-eye-close').addClass('icon-film');
    });
    $('#lien-site i').hover(function(){
        $(this).removeClass('icon-globe').addClass('icon-spinner icon-spin');
    },function(){
        $(this).removeClass('icon-spinner icon-spin').addClass('icon-globe');
    });
});