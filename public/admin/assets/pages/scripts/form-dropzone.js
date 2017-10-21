var FormDropzone = function () {


    return {
        //main function to initiate the module
        init: function () {
            var photo_counter = 0;
            Dropzone.options.mediaUpload = {
                dictDefaultMessage: "",
                parallelUploads: 10,
                maxFilesize: 2,
                addRemoveLinks: true,
                dictRemoveFile: 'Remove',
                dictFileTooBig: 'Image is bigger than 2MB',
                init: function() {
                    this.on("removedfile", function(file) {
                        $.ajax({
                            type: 'POST',
                            url: 'delete',
                            data: {id: file.name, _token: $('#csrf-token').val()},
                            dataType: 'html',
                            success: function(data){
                                var rep = JSON.parse(data);
                                if(rep.code == 200)
                                {
                                    photo_counter--;
                                    $("#photoCounter").text( "(" + photo_counter + ")");
                                }

                            }
                        });

                    } );
                },
                error: function(file, response) {
                    if($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                },
                success: function(file,done) {
                    photo_counter++;
                    $("#photoCounter").text( "(" + photo_counter + ")");
                }
            }
        }
    };
}();

jQuery(document).ready(function() {    
   FormDropzone.init();
});