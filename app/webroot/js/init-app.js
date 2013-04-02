/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */


$(document).ready(function() {
    
    //Init bootstrap elements
    $('.dropdown-toggle').dropdown();

    $('.bouton-home').popover({'trigger': 'hover', 'placement': 'right'});
    $('.typeahead').typeahead();
});