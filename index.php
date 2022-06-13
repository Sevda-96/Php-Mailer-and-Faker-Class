<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__.'/vendor/autoload.php';

$faker = \Faker\Factory::create('tr_TR');

/* faker kütüphanesi ile sizin için sahte veriler üreten bir PHP kütüphanesidir.
echo $faker->firstName()."\n";
echo $faker -> lastName()."\n";
echo $faker -> phoneNumber()."\n"; 
echo $faker -> address(); */

 
if(isset($_POST['submit'])){
      
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'youremail@gmail.com';                     //SMTP username your gmail account
    $mail->Password   = '*';                               //SMTP password // your app password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet    = PHPMailer::CHARSET_UTF8; //turkce karaktere problemini ortadan kaldirir. Türkçe karakter destekler.
    //Recipients
    $mail->setFrom('noreply@gmail.com', 'gmail.com');
    $mail->addAddress($_POST['email'],$_POST['isim']);     //Add a recipient 
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('reply@gmail.com', 'Cevap Adresi');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['isim'];
    $mail->Body    = 'Sayın '.$_POST['isim'].' mailiniz bize ulaştı.En kısa sürede size dönüş yapacağız. </b>'.$faker->text(200); //faker ile metin mesaj oluştur.
    $mail->AltBody = 'Sayın '.$_POST['isim'].' mailiniz bize ulaştı.En kısa sürede size dönüş yapacağız. </b>'.$faker->text(200);  //faker ile metin mesaj oluştur.

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Mailer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <br/>
    <div class="container">
      <div class="row">
        <div class="md-12">
        <h1>Hello, world!</h1>
        <form action="" method="post">
          <input  type="text" name="isim" value="<?=$faker->firstName().' '.$faker->lastName()?>" > <!-- faker kütüphanesi ile rastgele isim yazdıracak.-->
          <input  type="email" name="email" value="youremail@gmail.com" >
          <button type="submit" name="submit" class="btn btn-primary">Gönder</button>
        </form>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>