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
            $("#miniatureYoutube").attr('src', getThumbnail(url, 'small') );
            $('#divMiniatureYoutube').fadeIn();
            notification("Vidéo Youtube trouvée", "Vous pouvez remplir les informations supplémentaires et valider.", 'success');
        }
    });

});