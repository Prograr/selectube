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