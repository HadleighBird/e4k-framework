<?php
/**
 * This file contains the shortcode and the code
 * for the basic Contact Form
 *
 * Note: This will only work if "Enabled Basic Contact Form" is
 * enabled in the Global Setting
 */

$form_enabled = get_field( 'enable_form', 'options' );
$enable_captcha = get_field( 'enable_recaptcha', 'options' );

if ( $form_enabled ):

    if ( ! function_exists( 'theme_contact_shortcode' ) ):

        function theme_contact_shortcode() {
            /**
             * Implement the basic Contact Form fields
             */
            ?>
            <?php if ( get_field( 'enable_recaptcha', 'options' ) ): ?>
                <script src='https://www.google.com/recaptcha/api.js'></script>
            <?php endif; ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form contact-form">
                <div class="container">
                    <h2>Contact Us!</h2>
                    <div class="row">
                        <div class="form-message-wrap col-sm-12">
                            <div class="form-message"></div>
                        </div>
                        <div class="input-field col-md-6 col-sm-12">
                            <input type="text" name="your_name" id="your_name" class="required" placeholder="Your Name*" />
                        </div>
                        <div class="input-field col-md-6 col-sm-12">
                            <input type="email" name="your_email" id="your_email" class="required" placeholder="Your E-Mail*" />
                        </div>
                        <div class="input-field col-md-6 col-sm-12">
                            <input type="text" name="your_subject" id="your_subject" placeholder="Your Subject" />
                        </div>
                        <div class="input-field col-md-6 col-sm-12">
                            <input type="number" name="your_telephone" id="your_telephone" placeholder="Your Telephone" />
                        </div>
                        <div class="input-field col-sm-12">
                            <textarea name="your_message" id="your_message" class="required" placeholder="Your Message*"></textarea>
                        </div>
                        <div class="submit-info col-sm-12">
                            <?php if ( get_field( 'enable_recaptcha', 'options' ) ): ?>
                                <?php $site_key = get_field( 'site_key', 'options' ); ?>
                                <div class="g-recaptcha" data-sitekey="<?php echo $site_key ?>"></div>
                            <?php endif; ?>
                            <button type="submit" class="btn submit-btn">Send Message</button>
                            <input type="hidden" name="action" value="form_submission" />
                        </div>
                    </div>
                </div>
            </form>
            <?php
        }

        add_shortcode( 'theme_form', 'theme_contact_shortcode' );

    endif;

    if ( ! function_exists( 'theme_contact_form' ) ):

        function theme_contact_form() {
            /**
             * Check to make sure server request is a post
             */
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

                /* Check the form data fields and strip them down */
                $form_name = trim( $_POST['your_name'] );
                $form_name = strip_tags( $_POST['your_name'] );
                $form_name = htmlspecialchars( $_POST['your_name'] );

                $form_email = trim( $_POST['your_email'] );
                $form_email = strip_tags( $_POST['your_email'] );
                $form_email = htmlspecialchars( $_POST['your_email'] );

                $form_subject = trim( $_POST['your_subject'] );
                $form_subject = strip_tags( $_POST['your_subject'] );
                $form_subject = htmlspecialchars( $_POST['your_subject'] );

                $form_telephone = trim( $_POST['your_telephone'] );
                $form_telephone = strip_tags( $_POST['your_telephone'] );
                $form_telephone = htmlspecialchars( $_POST['your_telephone'] );

                $form_message = trim( $_POST['your_message'] );
                $form_message = strip_tags( $_POST['your_message'] );
                $form_message = htmlspecialchars( $_POST['your_message'] );

                /**
                 * Check to see if Google's reCaptcha is enabled if so
                 * add the nesscary code
                 */
                if ( $enable_captcha ) {
                    $secret_key = get_field( 'secret_key', 'options' );

                    $captcha;

                    if ( isset( $_POST['g-recaptcha-response'] ) )
                        $captcha = $_POST['g-recaptcha-response'];

                    if ( empty( $captcha ) ) {
                        http_response_code(400);
                        echo "Please check the reCaptcha form";
                        die;
                    }

                    $captcha_url = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR'] );
                    $response = json_decode( $captcha_url, true );
                }

                if ( empty( $form_name ) OR empty( $form_email ) OR empty( $form_message ) ) {
                    http_response_code(400);
                    echo "Please fill in the highlighted fields!";
                    die;
                }

                $company_email = get_field( 'company_email', 'options' );

                if ( $company_email ) {
                    $to = $company_email;
                } else {
                    $to = get_option( 'admin_email' );
                }

                $subject = $name . ' Sent a Message from ' . get_bloginfo( 'name' );
                $headers = [
                    'Content-Type: text/html; charset=UTF-8',
                    'From: ' . $name . '<' . $email . '>'
                ];

                /**
                 * Let's build the E-Mail out
                 * and then send it to the user
                 */
                $body = 'You have recieved a new Message from your Website' . bloginfo( 'name' );
                $body .= '<br /><br />';
                $body .= 'Here are the details:';
                $body .= '<br /><br />';
                $body .= '<span style="font-weight: bold">Name:</span> ' . $form_name;
                $body .= '<br />';
                $body .= '<span style="font-weight: bold">E-Mail:</span> ' . $form_email;
                $body .= '<br />';
                $body .= '<span style="font-weight: bold">Subject:</span> ' . $form_subject;
                $body .= '<br />';
                $body .= '<span style="font-weight: bold">Message:</span>';
                $body .= '<br /><br />';
                $body .= $form_message;
                $body .= '<br /><br />';
                $body .= 'This message was sent from <span style="font-weight: bold">' . get_bloginfo( 'name' ) . '</span> on the <span style="font-weight: bold">' . date( 'dS M Y' ) . '</span';
                $body .= '<br />';
                $body .= '<span style="font-size: 75%; font-style: italic;">Please be careful when clicking links within this E-Mail as the link may contain malicious code.</span>';

                if ( wp_mail( $to , $subject, $body, $headers ) )
                {
                    http_response_code(200);
                    echo "Thank You! Your E-Mail has been sent. Please allow up to 24 hours for a response";
                    exit;
                }
                else
                {
                    http_response_code(500);
                    echo " Oooppss... It seems there is an Internal Server Error! Our engineers have been informed and are now working on a fix. Please try again later. ";

                    $headers_error = [
                        'Content-Type: text/html; charset=UTF-8',
                        'From: ' . bloginfo( 'name' ) . ' <weberror@e4k.co>'
                    ];

                    $body_error = 'There seems to be an error with the contact form on ' . bloginfo( 'name' );
                    $body_error .= '<br /><br />';
                    $body_error .= 'Please take a look immediately at ' . site_url();
                    wp_mail( 'stephen@e4k.co', 'E-Mail Error', $body_error, $headers_error );
                    die;
                }
            }
        }

        add_action( 'wp_ajax_form_submission', 'theme_contact_form' );
        add_action( 'wp_ajax_nopriv_form_submission', 'theme_contact_form' );

    endif;

endif;