/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */


$(document).ready(function() {
    
    //Init bootstrap elements
    $('.dropdown-toggle').dropdown();

    //Ajouter le titre de la page courante dans le fil d'ariane
    $('.breadcrumb .active').append(" : "+$('#content h2:first-child').text());
    jQuery.ajaxSetup({
        beforeSend: function() {
           $('#ajax-loading-top i').show();
        },
        complete: function(){
           $('#ajax-loading-top i').hide();
        },
        success: function() {}
      });
    $('#ajax-loading-top i').hide();
});