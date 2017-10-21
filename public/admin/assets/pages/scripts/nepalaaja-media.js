var current_page = parseInt(0);
var s_current_page = parseInt(0);
tinymce.init({
    selector: '#post-content',
    height: 500,
    relative_urls: false,
    remove_script_host : false,
    convert_urls : true,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | custom_media',

    setup: function(editor) {
        editor.addButton('custom_media', {
            icon: 'image',
            tooltip: "Insert Image",
            onclick: function(evt){
                evt.stopPropagation();
                $('#mce-media').modal('show');
                imgSrc = '';
                // $('#mce-media').on('shown.bs.modal', function(event) {
                var counter = 0;
                    $('#mce-media').on('click', '.mce-media-insert', function(e){
                        e.preventDefault();
                        if( counter < 1 ){
                            var req = $('#mce-media').find("div[class='thumbnail selected']").find('img');
                            var imagessource = [];
                            $(req).each(function (datakey, datavalue) {
                                src =  $(datavalue).attr('src');
                                imagessource.push(src);
                            });
                            var img_url = imagessource[0];
                            var new_url = img_url.split('?')[0];
                            var new_url_2 = img_url.replace('img/','');
                            var imgSrc = '<img src="'+new_url_2+'">';
                            $(this).closest('.modal-content').find('.close').trigger('click');

                            tinymce.activeEditor.execCommand('mceInsertContent', false, imgSrc);
                            $("#mce-media").on('hidden.bs.modal', function () {
                                $(this).find('.modal-body select[class="image-picker"]').html('<option></option>');
                            });
                            counter++;
                        }

                    });
                // });

            },//insertImage
            //onpostrender: monitorNodeChange
        });
    }
});

removeImage();

$('#ajax-media').on('shown.bs.modal', function(event) {
    $('.image-picker').empty();
    getPhotos(function(photosObj){
        displayPhotos(photosObj);
        insertMedia();
    }, '#ajax-media');
});

$('#mce-media').on('shown.bs.modal', function(event) {
    $('.image-picker').empty();
    getPhotos(function(photosObj){
        displayPhotos(photosObj);
    }, '#mce-media');
});

$('.media-search').on('keyup', '[name="s"]', function(){
    var key = $(this).val();
    getSearchedPhotos(function(photosObj){
        displaySearchedPhotos(photosObj);
        insertMedia();
        insertMediaMce();
    }, key);
});

//    prevent search form submit
$('.media-search').find('form').attr('onsubmit','return false;');

$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (evt) {
    console.log(evt.target);
    var target = $(evt.target).attr('href');
    if( target == '#selectImage' ){
        $('#ajax-media').find('#load-more').attr('page-num', '1');
        $('.image-picker').empty();
        getPhotos(function(photosObj){
            displayPhotos(photosObj);
            insertMedia();
        }, '#ajax-media');
    }
    if( target == '#selectImage1' ){
        $('#mce-media').find('#load-more').attr('page-num', '1');
        $('.image-picker').empty();
        getPhotos(function(photosObj){
            displayPhotos(photosObj);
            insertMediaMce();
        }, '#mce-media');
    }
});

function getPhotos(callback, selector) {
    var currentPage = $(selector).find('#load-more').attr('page-num');
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: '/admin/media/lists', // this is a variable that holds my route url
        data:{
            'page': currentPage, // you might need to init that var on top of page (= 0)
        }
    }).done(function( response ) {
        var photosObj = $.parseJSON(response.photos);
        if( $(selector).find('#load-more').hasClass('loaded-content') ){
            window.current_page = photosObj.current_page;
        }

        // hide the [load more] button when all pages are loaded
        if(currentPage == photosObj.last_page || photosObj.last_page <= 1){
            $(selector).find('#load-more').hide();
        }
        callback(photosObj);
    }).fail(function( response ) {
        console.log( "Error: " + response );
    });
}

function getSearchedPhotos(callback, key) {
    if( key == null || key == undefined ){
        key = '';
    }
    var searchedPage = window.s_current_page;
    if( key.length == 0){
        searchedPage = window.current_page;
    }
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: '/admin/media/lists', // this is a variable that holds my route url
        data:{
            'page': searchedPage + 1, // you might need to init that var on top of page (= 0)
            's': key
        }
    }).done(function( response ) {
        var photosObj = $.parseJSON(response.photos);
        searchedPage = photosObj.s_current_page;

        // hide the [load more] button when all pages are loaded
        if(searchedPage == photosObj.last_page || photosObj.last_page <= 1){
            $('#load-more').hide();
        }
        if(searchedPage != photosObj.last_page && photosObj.last_page > 1){
            $('#load-more').show();
        }
        callback(photosObj);
    }).fail(function( response ) {
        console.log( "Error: " + response );
    });
}



function displayPhotos(photosObj)
{
    var options = '<option value=""></option>';
    $.each(photosObj.data, function(key, value){
        options = options + '<option class="thumbnail" data-img-src="'+value.thumb_url+'" data-img-alt="'+value.original_name+'" value="'+value.id+'" data-id="'+value.id+'">'+value.original_name+'</option>';
    });

    $('.media-popup').find('.image-picker').append(options);
    $(".image-picker").imagepicker({show_label: true,limit: 1});
}

function displaySearchedPhotos(photosObj){
    var options = '';
    $.each(photosObj.data, function(key, value){
        options = options + '<option class="thumbnail" data-img-src="'+value.thumb_url+'" data-img-alt="'+value.original_name+'" value="'+value.id+'" data-id="'+value.id+'">'+value.original_name+'</option>';
    });
    $('.media-popup').find('.image-picker').empty();
    $('.media-popup').find('.image-picker').append(options);
    $(".image-picker").imagepicker();
}

// listener to the [load more] button
$('.loadmore-images').on('click', function(e){
//        alert('clicked');
    e.preventDefault();
    var parent = $(this).closest('.modal').attr('id');
    var parent_id = '#'+parent;
    var pageId = parseInt($(this).attr('page-num'));
    $(this).attr('page-num', pageId+1);
    getPhotos(function(photosObj){
        displayPhotos(photosObj);
    }, parent_id);
});

//    insert media to the media place holder
function insertMedia(){
    $('#ajax-media').on('click', '.media-insert', function(e){
        var img_id = $(".image-picker").val();
        var img_url = $('.media-popup').find('.selected').find('img').attr('src');
        $('.featured-image-preview').find('img').attr('src', img_url);
        $('.featured-image-preview').find('[name="featured_image"]').val(img_id);
        $(this).closest('.modal-content').find('.close').trigger('click');

        if( !$('.featured-image-preview').hasClass('not-empty') ){
            $('.featured-image-preview').addClass('not-empty');
            $('.featured-image-preview').find('.featured-img-new').text('Change Image');
            $('.featured-image-preview').find('.featured-img-remove').removeClass('hide');
        }
    });

}

function insertMediaMce(){
    $('#mce-media').on('click', '.mce-media-insert', function(e){
        console.log('inserted from insertMediaMce()');
        var img_url = $('.media-popup').find('.selected').find('img').attr('src');
        var imgSrc = '<img scr="'+img_url+'" style="max-width: 750px; max-height: 300px;">';
        return imgSrc;
    });

}

function removeImage(){
    $('.featured-image-preview').on('click', '.featured-img-remove', function(e){
        $('.featured-image-preview').removeClass('not-empty');
        $('.featured-image-preview').find('img').attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image');
        $('.featured-image-preview').find('[name="featured_image"]').val('');
        $('.featured-image-preview').find('.featured-img-new').text('Select Image');
        $(this).addClass('hide');
    });
}