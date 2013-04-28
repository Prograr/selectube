/* 
 * Créé par Florian Ajir
 * Contact: florianajir@gmail.com
 */

function getYoutubeInfos(){
    var url = $("#inputUrlYoutube").val();
    if ( url !== ''){
        if (getVideoId(url) !== '') { //Url valide
            getYouTubeInfo(url);
            $("#fieldset-infos-musique").fadeIn("slow");
            $("#miniatureYoutube").attr('src', getThumbnail(url, 'small'));
            $('#divMiniatureYoutube').fadeIn();
            notification("Vidéo Youtube trouvée", "Vous pouvez remplir les informations supplémentaires et valider.", 'success');
        }
    }
}

$(document).ready(function() {
    
    // Workaround for bug in mouse item selection
    $.fn.typeahead.Constructor.prototype.blur = function() {
        var that = this;
        setTimeout(function() {
            that.hide();
        }, 250);
    };
    
    $("#fieldset-infos-musique").hide();
    
    /*
     * Requête infos youtube
     */
    $("#getYoutubeInfos").click(getYoutubeInfos);
    
    $('#MusiquePartagerForm').submit(function(){
        getYoutubeInfos();
        return false;
    });
    
    /*
     * CATEGORIE LIEE
     */
    
    //Initialisations
    var categoryTitles = new Array();
    var categoryIds = new Object();
    var categoryId = 1;
    var newCategoryId = 1;
    $.getJSON( '/categories/listeAllJson', null,
        function ( jsonData )
        {
            $.each( jsonData, function ( index, category )
            {
                categoryTitles.push( category.title );
                categoryIds[category.title] = category.id;
            } );
        } );
    
    //Autocomplete nom de categorie
    $('#MusiqueCategorie').typeahead({
        source: function(query, process) {
            if (query !== '')
            return $.get('/categories/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            categoryId = categoryIds[item];
            $('#MusiqueCategorieId').val(categoryId);
            if (categoryId !== newCategoryId){
                $('#icon-edit-categorie i').attr('class', 'icon-lock');
                $('#icon-edit-categorie').addClass('disabled');
            }else{
                $('#icon-edit-categorie i').attr('class', 'icon-edit');
                $('#icon-edit-categorie').removeClass('disabled');
            }
            return item;
        }
    }).keyup(function(){ //Frappe clavier
        $('#icon-edit-categorie').removeClass('disabled');
        categoryId = newCategoryId;
        var that = this;
        if ($(this).val() !== ""){
            $.ajax({
                url: "/categories/existRest/"+ $(that).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                    if (newCategoryId === 1)
                        $('#icon-edit-categorie i').attr('class', 'icon-plus-sign');
                    else
                        $('#icon-edit-categorie i').attr('class', 'icon-edit');
                }else{
                    categoryId = exist;
                    if (categoryIds[$(that).val()] !== newCategoryId){
                        $('#icon-edit-categorie i').attr('class', 'icon-lock');
                        $('#icon-edit-categorie').addClass('disabled');
                    }else{
                        $('#icon-edit-categorie i').attr('class', 'icon-edit');
                    }
                }
            });
        }else{
            if (newCategoryId === 1)
                $('#icon-edit-categorie i').attr('class', 'icon-plus-sign');
            else
                $('#icon-edit-categorie i').attr('class', 'icon-edit');
        }
        $('#MusiqueCategorieId').val(categoryId);
    });

    //Modale Catégorie détails
    $('#icon-edit-categorie').click(function(e){
        //Interdit l'édition de catégorie existante
        if ($('#icon-edit-categorie').hasClass('disabled')) return false;
        
        if(categoryId !== 1) //Pour plus tard (si admin)
            $('#CategorieId').val(categoryId);
        
        $('#CategorieTitre').val($('#MusiqueCategorie').val());
    });
    
    //Autocomplete titre catégorie parente (Modale)
    $('#CategorieParentTitre').typeahead({
        items: 3,
        source: function(query, process) {
            if (query !== '')
                return $.get('/categories/listeJson', {query: query}, function(data) {
                    return process(JSON.parse(data));
                });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            if (item !== $('#CategorieTitre').val()){
                $('#CategorieParentId').val(categoryIds[item]);
                return item;
            }else{
                return $('#CategorieParentTitre').val();
            }
        }
    }).keyup(function(){
        if ($(this).val() !== ""){
            $.ajax({
                url: "/categories/existRest/"+ $(this).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                        $('#icon-exist-parentcategorie').attr('class', 'icon-remove-circle');
                }else{
                        $('#icon-exist-parentcategorie').attr('class', 'icon-ok-circle');
                }
            });
        }else{
            $('#icon-exist-parentcategorie i').removeAttr('class');
        }
    });
    
    $('#CategorieTitre').keyup(function(e){
        $.ajax({
            url: "/categories/existRest/"+ $(this).val()
        }).done(function( exist ) {
            if (exist === 'false'){
                    $('#icon-exist-categorie').attr('class', 'icon-remove-circle');
            }else{
                    $('#icon-exist-categorie').attr('class', 'icon-ok-circle');
            }
        });
    });
    
    //Envoi formulaire modale nouvelle catégorie
    $('#CategorieEditRestForm').submit(function(e){
        var edit = $.post("/categories/editRest", $(this).serialize());
        edit.done(function(id){
            if (id !== 'KO') {
                $('#CategorieId').val(id);
                categoryTitles.push( $('#CategorieTitre').val() );
                categoryIds[$('#CategorieTitre').val()] = id;
                categoryId = id;
                newCategoryId = id;
                $('#icon-edit-categorie i').attr('class', 'icon-edit');
                $('#MusiqueCategorieId').val(categoryId);
            }
        });
        $('#MusiqueCategorie').val($('#CategorieTitre').val());
        $('#categorieModal').modal('hide');
        e.preventDefault();
        return false;
    });
    
    
    /****************************************************/
    
    /*
     * ARTISTE LIE
     */
    
    //Initialisations
    var artisteNames = new Array();
    var artisteIds = new Object();
    var artisteId = 1;
    var newArtisteId = 1;
    $.getJSON( '/artistes/listeAllJson', null,
        function ( jsonData )
        {
            $.each( jsonData, function ( index, artiste )
            {
                artisteNames.push( artiste.name );
                artisteIds[artiste.name] = artiste.id;
            } );
        } );
    
    //Autocomplete nom d'artiste
    $('#MusiqueArtiste').typeahead({
        source: function(query, process) {
            if (query !== '')
            return $.get('/artistes/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            artisteId = artisteIds[item];
            $('#MusiqueArtisteId').val(artisteId);
            if (artisteId !== newArtisteId){
                $('#icon-edit-artiste i').attr('class', 'icon-lock');
                $('#icon-edit-artiste').addClass('disabled');
            }else{
                $('#icon-edit-artiste i').attr('class', 'icon-edit');
                $('#icon-edit-artiste').removeClass('disabled');
            }
            return item;
        }
    }).keyup(function(){ //Frappe clavier
        $('#icon-edit-artiste').removeClass('disabled');
        artisteId = newArtisteId;
        if ($(this).val() !== ""){
            var that = this;
            $.ajax({
                url: "/artistes/existRest/"+ $(that).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                    if (newArtisteId === 1)
                        $('#icon-edit-artiste i').attr('class', 'icon-plus-sign');
                    else
                        $('#icon-edit-artiste i').attr('class', 'icon-edit');
                }else{
                    artisteId = exist;
                    if (artisteIds[$(that).val()] !== newArtisteId){
                        $('#icon-edit-artiste i').attr('class', 'icon-lock');
                        $('#icon-edit-artiste').addClass('disabled');
                    }else{
                        $('#icon-edit-artiste i').attr('class', 'icon-edit');
                    }
                }
            });
        }else{
            if (newArtisteId === 1)
                $('#icon-edit-artiste i').attr('class', 'icon-plus-sign');
            else
                $('#icon-edit-artiste i').attr('class', 'icon-edit');
        }
        $('#MusiqueArtisteId').val(artisteId);
    });

    //Modale Artiste détails
    $('#icon-edit-artiste').click(function(e){
        //Interdit l'édition d'un artiste existant
        if ($('#icon-edit-artiste').hasClass('disabled')) return false;

        if(artisteId !== 1) //Pour plus tard (si admin)
            $('#ArtisteId').val(artisteId);
        
        $('#ArtisteNom').val($('#MusiqueArtiste').val());
        $('#ArtisteCategorie').val($('#MusiqueCategorie').val());
        $('#ArtisteCategorieId').val($('#MusiqueCategorieId').val());
    });
    
    $('#ArtisteNom').keyup(function(e){
        $.ajax({
             url: "/artistes/existRest/"+ $(this).val()
        }).done(function( exist ) {
            if (exist === 'false'){
                $('#icon-exist-artiste').attr('class', 'icon-remove-circle');
            }else{
                $('#icon-exist-artiste').attr('class', 'icon-ok-circle');
            }
        });
        
    });
    //Autocomplete titre catégorie parente (Modale)
    $('#ArtisteCategorie').typeahead({
        source: function(query, process) {
            if (query !== '')
                return $.get('/categories/listeJson', {query: query}, function(data) {
                    return process(JSON.parse(data));
                });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            $('#ArtisteCategorieId').val(artisteIds[item]);
            $('#icon-exist-categorie-artiste').attr('class', 'icon-ok-circle');
            return item;
        }
    }).keyup(function(){
        if ($(this).val() !== ""){
            $.ajax({
                url: "/artistes/existRest/"+ $(this).val()
            }).done(function( exist ) {
               if (exist === 'false'){
                    $('#icon-exist-categorie-artiste').attr('class', 'icon-remove-circle');
                }else{
                    $('#icon-exist-categorie-artiste').attr('class', 'icon-ok-circle');
                }
            });
        }else{
            $('#icon-exist-categorie-artiste').removeAttr('class');
        }
    });
    
    //Envoi formulaire modale nouvelle catégorie
    $('#ArtisteEditRestForm').submit(function(e){
        var edit = $.post("/artistes/editRest", $(this).serialize());
        edit.done(function(id){
            if (id !== 'KO') {
                $('#ArtisteId').val(id);
                artisteNames.push( $('#ArtisteNom').val() );
                artisteIds[$('#ArtisteNom').val()] = id;
                artisteId = id;
                newArtisteId = id;
                $('#icon-edit-artiste i').attr('class', 'icon-edit');
                $('#MusiqueArtisteId').val(artisteId);
            }
        });
        $('#MusiqueArtiste').val($('#ArtisteNom').val());
        $('#artisteModal').modal('hide');
        e.preventDefault();
        return false;
    });
    
    
    /****************************************************/
    
    /*
     * ALBUM LIE
     */
    
    //Initialisations
    var albumTitles = new Array();
    var albumIds = new Object();
    var albumId = 1;
    var newAlbumId = 1;
    $.getJSON( '/albums/listeAllJson', null,
        function ( jsonData )
        {
            $.each( jsonData, function ( index, album )
            {
                albumTitles.push( album.titre );
                albumIds[album.titre] = album.id;
            } );
        } );
    
    //Autocomplete nom d'album
    $('#MusiqueAlbum').typeahead({
        source: function(query, process) {
            if (query !== '')
            return $.get('/albums/listeJson', {query: query}, function(data) {
                return process(JSON.parse(data));
            });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            albumId = albumIds[item];
            $('#MusiqueAlbumId').val(albumId);
            if (albumId !== newAlbumId){
                $('#icon-edit-album i').attr('class', 'icon-lock');
                $('#icon-edit-album').addClass('disabled');
            }else{
                $('#icon-edit-album i').attr('class', 'icon-edit');
                $('#icon-edit-album').removeClass('disabled');
            }
            return item;
        }
    }).keyup(function(){ //Frappe clavier
        $('#icon-edit-album').removeClass('disabled');
        albumId = newAlbumId;
        if ($(this).val() !== ""){
            var that = this;
            $.ajax({
                url: "/albums/existRest/"+ $(that).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                    if (newAlbumId === 1)
                        $('#icon-edit-album i').attr('class', 'icon-plus-sign');
                    else
                        $('#icon-edit-album i').attr('class', 'icon-edit');
                }else{
                    albumId = exist;
                    if (albumIds[$(that).val()] !== newAlbumId){
                        $('#icon-edit-album i').attr('class', 'icon-lock');
                        $('#icon-edit-album').addClass('disabled');
                    }else{
                        $('#icon-edit-album i').attr('class', 'icon-edit');
                    }
                }
            });
            
            
        }else{
            if (newAlbumId === 1)
                $('#icon-edit-album i').attr('class', 'icon-plus-sign');
            else
                $('#icon-edit-album i').attr('class', 'icon-edit');
        }
        $('#MusiqueAlbumId').val(albumId);
    });

    //Modale Album détails
    $('#icon-edit-album').click(function(e){
        //Interdit l'édition d'un album existant
        if ($('#icon-edit-album').hasClass('disabled')) return false;
        
        if(albumId !== 1) //Pour plus tard (si admin)
            $('#AlbumId').val(albumId);

        $('#AlbumTitre').val($('#MusiqueAlbum').val());
        $('#AlbumCategorie').val($('#MusiqueCategorie').val());
        $('#AlbumCategorieId').val($('#MusiqueCategorieId').val());
        $('#AlbumArtiste').val($('#MusiqueArtiste').val());
        $('#AlbumArtisteId').val($('#MusiqueArtisteId').val());
    });
    
    $('#AlbumTitre').keyup(function(e){
        $.ajax({
            url: "/albums/existRest/"+ $(this).val()
        }).done(function( exist ) {
            if (exist === 'false'){
                $('#icon-exist-album').attr('class', 'icon-remove-circle');
            }else{
                $('#icon-exist-album').attr('class', 'icon-ok-circle');
            }
        });
    });
    
    //Autocomplete titre catégorie parente (Modale)
    $('#AlbumCategorie').typeahead({
        source: function(query, process) {
            if (query !== '')
                return $.get('/categories/listeJson', {query: query}, function(data) {
                    return process(JSON.parse(data));
                });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            $('#AlbumCategorieId').val(categoryIds[item]);
            $('#icon-exist-categorie-album').attr('class', 'icon-ok-circle');
            return item;
        }
    }).keyup(function(){
        if ($(this).val() !== ""){
            $.ajax({
                url: "/albums/existRest/"+ $(this).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                        $('#icon-exist-categorie-album').attr('class', 'icon-remove-circle');
                }else{
                        $('#icon-exist-categorie-album').attr('class', 'icon-ok-circle');
                }
            });
        }else{
            $('#icon-exist-categorie-album').removeAttr('class');
        }
    });
    
    //Autocomplete nom artiste parente (Modale)
    $('#AlbumArtiste').typeahead({
        source: function(query, process) {
            if (query !== '')
                return $.get('/artistes/listeJson', {query: query}, function(data) {
                    return process(JSON.parse(data));
                });
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp( '(' + this.query + ')', 'gi' );
            return item.replace( regex, "<strong>$1</strong>" );
        },
        updater: function(item) {
            $('#AlbumArtisteId').val(artisteIds[item]);
            $('#icon-exist-artiste-album').attr('class', 'icon-ok-circle');
            return item;
        }
    }).keyup(function(){
        if ($(this).val() !== ""){
            
            $.ajax({
                url: "/albums/existRest/"+ $(this).val()
            }).done(function( exist ) {
                if (exist === 'false'){
                        $('#icon-exist-artiste-album').attr('class', 'icon-remove-circle');
                }else{
                        $('#icon-exist-artiste-album').attr('class', 'icon-ok-circle');
                }
            });
        }else{
            $('#icon-exist-artiste-album').removeAttr('class');
        }
    });
    
    //Envoi formulaire modale nouvelle catégorie
    $('#AlbumEditRestForm').submit(function(e){
        var edit = $.post("/albums/editRest", $(this).serialize());
        edit.done(function(id){
            if (id !== 'KO') {
                $('#AlbumId').val(id);
                albumTitles.push( $('#AlbumTitre').val() );
                albumIds[$('#AlbumTitre').val()] = id;
                albumId = id;
                newAlbumId = id;
                $('#icon-edit-album i').attr('class', 'icon-edit');
                $('#MusiqueAlbumId').val(albumId);
            }
        });
        $('#MusiqueAlbum').val($('#AlbumTitre').val());
        $('#albumModal').modal('hide');
        e.preventDefault();
        return false;
    });
    
});