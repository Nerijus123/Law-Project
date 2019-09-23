<?php
// print_r($_GET);

$klientoVardas = $_GET['name'];
$klientoEmail = $_GET['email'];
$klientoKlausimas = $_GET['comments'];

//Load Composer's autoloader
require 'libs/PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // papildomi PhpMailer nustatymia, jeigu neveikia su standartiniais

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $mail->Host = 'tls://smtp.gmail.com:587';
    $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                      // TCP port to connect to

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP

    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nerijuscustrans@gmail.com';                 // SMTP username
    $mail->Password = 'medis6969';                 // SMTP slaptazodis
  // -------iki cia -----------------


    //Recipients
    $mail->setFrom('nerijuscustrans@gmail.com', 'Prezidentas');
    $mail->addAddress('nerijuscustrans@gmail.com', 'Puslapiu kurejai');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo( $klientoEmail, $klietoVardas);


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'kliento klausimas';
    $mail->Body    = "<strong> $klientoKlausimas </strong>";
    $mail->AltBody = $klientoKlausimas;

    $mail->send();
    echo '<h3>Pavyko isiusti </h3>';

} catch (Exception $e) {
    echo 'Atleiskite napavyko issiusti. Mailer Error: ', $mail->ErrorInfo;
}
