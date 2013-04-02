/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */

// Extracts Video ID's from a Youtube URL 
function getVideoId(url) {
//    var regexp1 = /[\\?&]v=([^&#]*)/;
//    var regexp2 = /youtu\.be\/(.*)(?=hd=1)/;
    if (url.match("youtube.com/")) {
        //http://www.youtube.com/watch?v=GItD10Joaa0
        var results = url.match("[\\?&]v=([^&#]*)");
        
        return (results === null) ? url : results[1];
        
    } else if (url.match("^http://youtu.be/.*")) {
        // http://youtu.be/5uxd-521uus?hd=1
        var results = url.match("^http://youtu.be/(.*)");

        return (results === null) ? url : results[1];
    }
    
    var regexp = /[\\?&]v=([^&#]*)/;
    regexp.exec(url);
    return RegExp.$1;
    
}

function getThumbnail(url, size) {
    if (url === null) {
        return "";
    }

    size = (size === null) ? "big" : size;
    var vid = getVideoId(url);

    if (size == "small") {
        return "http://img.youtube.com/vi/" + vid + "/2.jpg";
    } else {
        return "http://img.youtube.com/vi/" + vid + "/0.jpg";
    }
}

function getYouTubeInfo(video_id) {
    if (video_id.length > 11) {
        video_id = getVideoId(video_id);
    }
    var URL = 'http://gdata.youtube.com/feeds/api/videos/' + video_id + '?v=2&alt=jsonc';
    $.getJSON(URL,
            function(data, status, xhr) {
                parseresults(data.data);
            });
}

function parseresults(response) {
    var title = response.title;
    var description = response.description;
    $('#MusiqueTitre').val(title);
    $('#MusiqueDescription').val(description);
}

function getComments(commentsURL, startIndex) {
    $.ajax({
        url: commentsURL + '&start-index=' + startIndex,
        dataType: "jsonp",
        success: function(data) {
            $.each(data.feed.entry, function(key, val) {
                $('#comments').append('<br/>Author: ' + val.author[0].name.$t + ', Comment: ' + val.content.$t);
            });
            if ($(data.feed.entry).size() == 50) {
                getComments(commentsURL, startIndex + 50);
            }
        }
    });
}
