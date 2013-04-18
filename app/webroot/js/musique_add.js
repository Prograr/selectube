/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */


$(document).ready(function() {
    $("#fieldset-infos-musique").hide();
    $("#getYoutubeInfos").click(function() {
//        console.log(getVideoId($("#inputUrlYoutube").val()));

        if (getVideoId($("#inputUrlYoutube").val()) !== '') { //Url valide
            var url = $("#inputUrlYoutube").val();
            getYouTubeInfo(url);
            $("#fieldset-infos-musique").fadeIn("slow");
            $("#miniatureYoutube").attr('src', getThumbnail(url, 'small'));
            $('#divMiniatureYoutube').fadeIn();
            notification("Vidéo Youtube trouvée", "Vous pouvez remplir les informations supplémentaires et valider.", 'success');
        }
    });

    // Workaround for bug in mouse item selection
    $.fn.typeahead.Constructor.prototype.blur = function() {
        var that = this;
        setTimeout(function() {
            that.hide();
        }, 250);
    };

    $('#MusiqueCategorie').typeahead({
        source: function(query, process) {
            return $.get('categories/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        }
    });

    $('#MusiqueArtiste').typeahead({
        source: function(query, process) {
            return $.get('artistes/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        }
    });

    $('#MusiqueAlbum').typeahead({
        source: function(query, process) {
            return $.get('albums/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        }
    });


});