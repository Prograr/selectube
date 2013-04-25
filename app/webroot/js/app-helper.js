/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */

function notification(title, text, type) {
    $.pnotify({
        title: title,
        text: text,
        type: type,
        styling: 'bootstrap'
    });
}

function redirect(params) {
    
    var defaults = { title:'Redirection', text:'Vous allez être redirigé...', type:'notice', delais: 2000 }; 
    $.extend(defaults, params); 
    
    $.pnotify({
        title: title,
        text: text,
        type: type,
        styling: 'bootstrap'
    });
    
    setTimeout(function() {
        window.location.href = url;
    }, delais);
}