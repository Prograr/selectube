/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */


$(document).ready(function(){
    $('.restricted').append("<i class='icon-lock pull-right'></i>");
    $('a.restricted').attr('href', "#");
    $('a.restricted').attr('data-toggle', "modal");
    $('a.restricted').attr('data-target', "#restrictedModal");
});