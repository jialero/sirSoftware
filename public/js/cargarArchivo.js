/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var progressInterval;

function getProgress() {
    // Poll our controller action with the progress id
    var url = '/add/upload-progress?id=' + $('#progress_key').val();
    $.getJSON(url, function(data) {
        if (data.status && !data.status.done) {
            var value = Math.floor((data.status.current / data.status.total) * 100);
            showProgress(value, 'Uploading...');
        } else {
            showProgress(100, 'Complete!');
            clearInterval(progressInterval);
        }
    });
}

function startProgress() {
    showProgress(0, 'Starting upload...');
    progressInterval = setInterval(getProgress, 900);
}

function showProgress(amount, message) {
    $('#progress').show();
    $('#progress .bar').width(amount + '%');
    $('#progress > p').html(message);
    if (amount < 100) {
        $('#progress .progress')
            .addClass('progress-info active')
            .removeClass('progress-success');
    } else {
        $('#progress .progress')
            .removeClass('progress-info active')
            .addClass('progress-success');
    }
}

$(function() {
    // Register a 'submit' event listener on the form to perform the AJAX POST
    $('#upload-form').on('importar', function(e) {
        e.preventDefault();

        if ($('#subirArchivo').val() == '') {
            // No files selected, abort
            return;
        }

        // Perform the submit
        //$.fn.ajaxSubmit.debug = true;
        $(this).ajaxSubmit({
            beforeSubmit: function(arr, $form, options) {
                // Notify backend that submit is via ajax
                arr.push({ name: "isAjax", value: "1" });
            },
            success: function (response, statusText, xhr, $form) {
                clearInterval(progressInterval);
                showProgress(100, 'Complete!');

                // TODO: You'll need to do some custom logic here to handle a successful
                // form post, and when the form is invalid with validation errors.
                if (response.status) {
                    // TODO: Do something with a successful form post, like redirect
                    // window.location.replace(response.redirect);
                } else {
                    // Clear the file input, otherwise the same file gets re-uploaded
                    // http://stackoverflow.com/a/1043969
                    var fileInput = $('#subirArchivo');
                    fileInput.replaceWith( fileInput.val('').clone( true ) );

                    // TODO: Do something with these errors
                    // showErrors(response.formErrors);
                }
            },
            error: function(a, b, c) {
                // NOTE: This callback is *not* called when the form is invalid.
                // It is called when the browser is unable to initiate or complete the ajax submit.
                // You will need to handle validation errors in the 'success' callback.
                console.log(a, b, c);
            }
        });
        // Start the progress polling
        startProgress();
    });
}); 