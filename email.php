    <?php


      $klientoVardas = $_POST['first'];
      $klientoUsername = $_POST['uid'];
      $klientoElPastas = $_POST['email'];

      require_once 'lib/PHPMailer-master/PHPMailerAutoload.php';

      $mail = new PHPMailer;

      $mail->SMTPDebug = 0;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'nerijuscustrans@gmail.com';                 // SMTP username
      $mail->Password = '';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('', 'Assistant');
      $mail->addAddress('', 'Assistant');     // Add a recipient
      // $mail->addAddress('ellen@example.com');               // Name is optional
      $mail->addReplyTo($klientoElPastas,  $klientoVardas);
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = "New account $klientoVardas";
      // $mail->Body    = '<h1>Apziurejau jusu parduotuve ir kilo klausimas</h1> <b>1) </b>';
      // $mail->AltBody = ' Apziurejau jusu parduotuve ir kilo klausimas \n : Kiek kainuoja ...';
      $mail->Body    = "Naujas klientas: <br /> vardas - $klientoVardas<br /> el. pastas - $klientoElPastas <br />";
      $mail->AltBody = $klientoVardas;

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }
