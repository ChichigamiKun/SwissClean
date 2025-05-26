<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];

    // Validate inputs (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($message) || empty($tel)) {
        die("All fields are required.");
    }

    // Set recipient email address
    $to = "swisclean@outlook.com";

    // Set email subject
    $subject = "New Message from Contact Form";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: \n$email\n";
    $email_content .= "Telephone:\n$tel\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<p>Merci ! Votre message a été envoyé avec succés.</p>";
    } else {
        echo "<p>Oops! Quelque chose ne va pas bien, votre message n'a pas été envoyé.</p>";
    }

} else {
    // If the form is not submitted, redirect to the contact page or show an error message
    echo "<p>Nous sommes navrés, le formulaire n'a pas été soumis.</p>";
}

?>