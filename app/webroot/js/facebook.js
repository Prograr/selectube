/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */

// Additional JS functions here
window.fbAsyncInit = function() {
    FB.init({
        appId: '448385471909603', // App ID
        channelUrl: '//selectube.org/channel.html', // Channel File
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true, // parse XFBML
        oauth: true
    });

    // Additional init code here
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            // connected
        } else if (response.status === 'not_authorized') {
            // not_authorized
            login();
        } else {
            // not_logged_in
            login();
        }
    });
};
function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
            testAPI();
        } else {
            // cancelled
        }
    });
}

function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
    });
}
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=448385471909603";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

jQuery(function($) {
    $('.facebookConnect').click(function() {
        var url = $(this).attr('href');
        FB.login(function(response) {
            console.log(response);
            if (response.authResponse){
                window.location = url;
            }
        }, {scope: 'email'});
        return false;
    });
});

function postToFeed(redirect,link,picture,name,caption,description) {

    // calling the API ...
    var obj = {
        method: 'feed',
        redirect_uri: redirect,
        link: link,
        picture: picture,
        name: name,
        caption: caption,
        description: description
    };

    function callback(response) {
        console.log(response['post_id']);
//        document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
    }

    FB.ui(obj, callback);
}
