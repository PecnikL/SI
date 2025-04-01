<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "lea.pecnik@gmail.si"; // zamenjaj s svojim pravim email naslovom
  $subject = "Novo sporočilo iz kontaktnega obrazca";

  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = strip_tags(trim($_POST["message"]));

  $body = "Ime: $name\nEmail: $email\n\nSporočilo:\n$message";

  $headers = "From: $name <$email>" . "\r\n" .
             "Reply-To: $email" . "\r\n" .
             "Content-Type: text/plain; charset=UTF-8";

  if (mail($to, $subject, $body, $headers)) {
    //header("Location: hvala.html"); // Lahko narediš "Hvala za sporočilo" stran
    echo "Hvala.";

    exit();
  } else {
    echo "Napaka pri pošiljanju.";
  }
}
?>