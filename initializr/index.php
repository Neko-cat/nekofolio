<?php 

  require 'gump.class.php';
  require 'PHPMailerAutoload.php';

  $gump = new GUMP();

  $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

  $gump->validation_rules(array(
      'mail'  => 'required|valid_email',
      'name' => 'required|max_len,50',
      'objet' => 'required|max_len,100',
      'msg'   => 'required|max_len,1666|min_len,6',
  ));

  $gump->filter_rules(array(
      'mail'  => 'trim|sanitize_email',
      'name' => 'trim|sanitize_string',
      'objet' => 'trim|sanitize_string',
      'msg'   => 'trim|sanitize_string',
  ));

  $validated_data = $gump->run($_POST);

  if($validated_data === false) {
      // echo $gump->get_readable_errors(true);
  } else {
    // Form is valid we send the mail !
    // https://github.com/PHPMailer/PHPMailer#a-simple-example

    $mail = new PHPMailer;

    $mail->isMail();

    $mail->From = $_POST['mail'];
    $mail->FromName = $_POST['name'];
    $mail->addAddress('mathilde.couvreur@gmail.com', 'Mathilde Couvreur');
    $mail->addCC('contact@nekochan.io', 'Neko');
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Nekofolio - ' . $_POST['objet'];
    $mail->Body    = $_POST['msg'];
    $mail->AltBody = $_POST['msg'];

    if(!$mail->send()) {
        echo 'Votre message ne s\'est pas envoyé';
        echo 'Erreur : ' . $mail->ErrorInfo;
    } else {
        echo 'Votre message s\'est bien envoyé !';
    }
  }

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="true">
      <p>Votre message est bien envoyé.</p>
    </div>
    <div class="false">
      <p>Votre message n'a pas été envoyé :(</p>
    </div>
    <div class="home-screen">
      <img src="img/bg.jpg" alt="">
    </div>
    <div class="container">
      <div class="travaux">
        <h2>Travaux</h2>
        <hr>
        <nav>
          <ul>
            <li class="all">All</li>
            <li class="web">Web</li>
            <li class="pao">Graphisme</li>
            <li class="photo">Photo</li>
          </ul>
        </nav>
        <div class="row">
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-web">
            <div class="wrapper-travaux">
              <img class="screen" src="img/photo.jpg" alt="montagne">
              <h3>Titre de l'objet</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <img class="screen" src="img/photo.jpg" alt="montagne">
              <h3>Titre de l'objet</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
         </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-photo">
            <div class="wrapper-travaux">
              <img class="screen" src="img/photo.jpg" alt="montagne">
              <h3>Titre de l'objet</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <img class="screen" src="img/photo.jpg" alt="montagne">
              <h3>Titre de l'objet</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="profil clear">
        <h2>About</h2>
        <hr>
        <div class="profil-passion">
          <p>Passions</p>
          <div class="wrapper-passion">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
          </div>
        </div>
        <div class="profil-techno">
          <p>Technologies</p>
          <div class="wrapper-techno">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
            <img class="carre" src="img/outil.jpg" alt="">
          </div>
        </div>
      </div> 
      <div class="contact">
        <h2>Contact</h2>
        <hr>
        <form method="post" action="index.php" id="contactForm">
          <p><input type="text" name="mail" placeholder="E-mail..." id="mail" /></p>
          <p><input type="text" name="name" placeholder="Nom..." id="name" /></p>
          <p><input type="text" name="objet" placeholder="Sujet..." id="objet" /></p>
          <p><textarea name="msg" placeholder="Votre message..." id="msg" ></textarea></p>
          <p><input type="submit" value="Envoyer" /></p>
        </form>
      </div>

      <footer>
        
      </footer>
    </div> <!-- /container --> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
