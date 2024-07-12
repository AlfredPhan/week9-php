<?php
if (isset($_POST['message'])) {
    $title = "Contact us";
    $message = $_POST['message'];

    ini_set("SMTP", "smtp.gre.ac.uk");
    ini_set("sendmail_from", "pt2311u@gre.ac.uk");

    $headers = "From: pt2311u@gre.ac.uk\r\n";
    $headers .= "Reply-To: pt2311u@gre.ac.uk\r\n";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";

    $subject = "Contact Form Submission";
    mail("pt2311u@gre.ac.uk", $subject, $message, $headers);
    
    $output = "Thank you for your message. We will get back to you shortly.";
} else {
    $title = "Contact us";
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>
