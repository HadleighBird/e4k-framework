jQuery(document).ready( function($) {

    /**
     * Lets AJAX our Contact Form up
     */
    $(function() {

        var form = $( 'form.contact-form' )

        var formMessage = $( 'div.form-message' );
        var inputFields = $( 'input.required' );
        var textArea = $( 'textarea.required' );

        $( form ).submit( function( eve )
        {
            eve.preventDefault();
            eve.stopPropagation();

            // Store button field
            var submitButton = $( 'button.submit-btn' );

            // Disable button
            submitButton.attr( 'disabled', 'disabled' );
            submitButton.addClass( 'disabled' );

            // Serialize the form data
            var formData = $(form).serialize();
            console.log( formData );

            /**
             * Check to make sure the input fields and textarea
             * field aren't empty
             */
            $( inputFields ).each( function() {
                var val = $(this).val();
                $(this).toggleClass( 'error', val.length == 0 );
            });

            $( textArea ).each( function() {
                var val = $(this).val();
                $(this).toggleClass( 'error', val.length == 0 );
            });

            $.ajax({
                type: "POST",
                url: ajaxForm.ajaxurl,
                data: formData,
            })
            .done( function( response )
            {
                /**
                 * Make sure that the form message div has the success
                 * class and has removed the error class
                 */
                $( formMessage ).removeClass( 'error' );
                $( formMessage ).addClass( 'success' );
                $( formMessage ).removeClass( 'active' );

                /**
                 * Set the form message response
                 */
                $( formMessage ).text( response );

                /**
                 * Time to clear the input fields of the
                 * text
                 */
                $( inputFields ).val( '' );
                $( textArea ).val( '' );

                /**
                 * Remove disabled class and attribute
                 * off the submit button
                 */
                submitButton.removeAttr('disabled');
                submitButton.removeClass('disabled');
            })
            .fail( function( data )
            {
                /**
                 * Remove disabled class and attribute
                 * off the submit button
                 */
                submitButton.removeAttr('disabled');
                submitButton.removeClass('disabled');

                /**
                 * Make sure that the form message div has the success
                 * class and has removed the error class
                 */
                $( formMessage ).removeClass( 'success' );
                $( formMessage ).addClass( 'error' );

                /**
                 * Set the form message so the user can retry
                 */
                if ( data.responseText !== '' )
                {
                    $( formMessage ).text( data.responseText );
                }
                else
                {
                    $( formMessage ).text( 'Oops! An error occured and your message could not be sent.' );
                }
            })

        });

    });

});