$(function() {

    window.verifyRecaptchaCallback = function(response) {
        $('input[data-recaptcha]').val(response).trigger('change');
    }

    window.expiredRecaptchaCallback = function() {
        $('input[data-recaptcha]').val("").trigger('change');
    }

    $('#kreativno-form').validator();

    $('#kreativno-form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            $.ajax({
                type: "POST",
                url: '//kreativno.ba/wp-content/themes/kreativno/forms/contact.php',
                data: $(this).serialize() + '&poster=' + $(location).attr('href'),
                success: function(data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    if (messageAlert && messageText) {
                        $('#finalModal').find('.messages').html(messageText);
                        $('#finalModal').modal('show');
                        $('#kreativno-form')[0].reset();
                        grecaptcha.reset();
                    }
                }
            });
            return false;
        }
    })
});