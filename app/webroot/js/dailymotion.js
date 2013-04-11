// This code loads the Dailymotion Javascript SDK asynchronously.
(function() {
    var e = document.createElement('script');
    e.async = true;
    e.src = document.location.protocol + '//api.dmcdn.net/all.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(e, s);
}());

// This function init the player once the SDK is loaded
window.dmAsyncInit = function()
{
    // PARAMS is a javascript object containing parameters to pass to the player if any (eg: {autoplay: 1})
    var player = DM.player("player", {video: "VIDEO_ID", width: "WIDTH", height: "HEIGHT", params: PARAMS});

    // 4. We can attach some events on the player (using standard DOM events)
    player.addEventListener("apiready", function(e)
    {
        e.target.play();
    });
};