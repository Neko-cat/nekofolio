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
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/kakemono.jpg" data-toggle="lightbox" data-title="Conférence sur la COP21 organisée par Toute l'Europe" data-footer= "J'ai réalisé l'intégralité de la campagne graphique (kakémono, bannière, poster, pochette cartonnée...)"><img class="screen" src="img/cop21_min.jpg" alt="montagne"></a>
              <h3>Event orgnisé par Toute l'Europe</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/coverFB_elecbrit.jpg" data-toggle="lightbox" data-title="Bannière sur les élections britanniques"><img class="screen" src="img/cover_elecbrit_min.jpg" alt="montagne"></a>
              <h3>Elections britanniques</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
         </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/dataviz_terrorisme.jpg" data-toggle="lightbox" data-title="Datavisualisation sur le terrorisme en Europe"><img class="screen" src="img/dataviz_terrorisme_min.jpg" alt="montagne"></a>
              <h3>Datavisualisation terrorisme</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/grece.jpg" data-toggle="lightbox" data-title="Datavisualisation réalisée avant le référendum grec"><img class="screen" src="img/dataviz_grece_min.jpg" alt="montagne"></a>
              <h3>Datavisualisation Grèce</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/dataviz_numerique.jpg" data-toggle="lightbox" data-title="Datavisualisation sur l'Europe et le numérique"><img class="screen" src="img/dataviz_numerique_min.jpg" alt="montagne"></a>
              <h3>Datavisualisation Numérique</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-pao">
            <div class="wrapper-travaux">
              <a href="img/couv.jpg" data-toggle="lightbox" data-title="Illustration personnelle en low poly"><img class="screen" src="img/couv_min.jpg" alt="montagne"></a>
              <h3>Illustration low poly</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-web">
            <div class="wrapper-travaux">
              <a href="img/etoile.jpg" data-toggle="lightbox" data-title="Thème codé 'from scratch' avec underscore et migration du blog de dotclear vers Wordpress"><img class="screen" src="img/etoile_min.jpg" alt="montagne"></a>
              <h3>Refonte du blog Etoile</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 col-md-4 cadre cadre-web">
            <div class="wrapper-travaux">
              <a href="img/berlaymaster.jpg" data-toggle="lightbox" data-title="Jeu interactif sur les commissaires européens" data-footer= "Utilisation de jQuery et jQuery UI"><img class="screen" src="img/berlaymaster_min.jpg" alt="montagne"></a>
              <h3>Berlaymaster</h3>
              <div class="outils">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
                <img class="carre" src="img/outil.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="profil">
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
    
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/ekko-lightbox.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
