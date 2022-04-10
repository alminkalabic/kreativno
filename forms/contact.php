<?php
// require ReCaptcha class
require('recaptcha-master/src/autoload.php');

// configure
// an email address that will be in the From field of the email.
$from = 'prodaja@kreativno.ba';

// an email address that will receive the email with the output of the form
$sendTo = 'prodaja@kreativno.ba';

// subject of the email
$subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('velicina' => 'Veličina', 
                'boja' => 'Boja',
                'info_0' => 'Input 1',
                'info_1' => 'Input 2',
                'info_2' => 'Input 3',
                'info_3' => 'Input 4',
                'info_4' => 'Input 5',
                'ime_i_prezime' => 'Ime i Prezime', 
                'broj_telefona' => 'Telefon', 
                'adresa' => 'Adresa', 
                'grad' => 'Grad', 
                'postanski_broj' => 'Poštanski broj', 
                'poster' => 'Poster');

// message that will be displayed when everything is OK :)
$okMessage = '<span class="d-block h1">Hvala na kupovini!</span>Uspješno ste završili narudžbu, sumnjive porudžbe će biti provjerene pozivom na kontakt telefon.<span class="d-block mt-3 font-italic">Narčeni proizvod šaljemo u roku od 2-4 radna dana.</span>';

// If something goes wrong, we will display this message.
$errorMessage = '<span class="d-block h1">Greška!</span>Pokušajte ponovo kasnije.';

// ReCaptch Secret
$recaptchaSecret = '6Lf5XckZAAAAAJMkOtCSQkJXxQXM4kBVKbT7nNWV';

// let's do the sending

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try {
    if (!empty($_POST)) {

        // validate the ReCaptcha, if something is wrong, we throw an Exception,
        // i.e. code stops executing and goes to catch() block
        
        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha is not set.');
        }

        // do not forget to enter your secret key from https://www.google.com/recaptcha/admin
        
        $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
        
        // we validate the ReCaptcha field together with the user's IP address
        
        $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if (!$response->isSuccess()) {
            throw new \Exception('ReCaptcha was not validated.');
        }
        
        // everything went well, we can compose the message, as usually
        
        $emailText = "Nova narudžba \n=============================\n";

        foreach ($_POST as $key => $value) {
            // If the field exists in the $fields array, include it in the email
            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value\n";
            }
        }
    
        // All the neccessary headers for the email.
        $headers = array('Content-Type: text/plain; charset="UTF-8";',
            'From: ' . $from,
            'Reply-To: ' . $from,
            'Return-Path: ' . $from,
        );
        
        // Send email
        mail($sendTo, $subject, $emailText, implode("\n", $headers));

        $responseArray = array('type' => 'success', 'message' => $okMessage);
    }
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
} else {
    echo $responseArray['message'];
}
