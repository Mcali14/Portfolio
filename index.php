<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio VIGLIERI Alistair</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

</head>
<body>

  <header class="container-fluid header">
      <div class="container">
        <a href="index.html" class="logo">Mon portfolio</a>
        <nav class="menu">
          <nav class="menu">
            <a href="#about">A propos </a>
            <a href="#portfolio">Portfolio</a>
            <a href="#Contact">Contact</a>
            <a href="#Infos">Infos perso</a>
          </nav>
        </nav>
      </div>
  </header>
  <section class="container-fluid banner">
        <div class="ban">
          <img src="img/web.png" alt="bannière du site"/>
        </div>
        <div class="inner-banner">
          <h1>Bienvenue sur mon portfolio</h1>
          <button type="button" class="btn btn-primary">Contactez-moi&nbsp;!</button>
          <a href="cv/ALISTAIR_VIGLIERI.pdf" download="ALISTAIR_VIGLIERI.pdf"><button type="button" class="btn btn-danger">Télécharger mon cv !</button></a>
        </div>
    </section>
    <section class="container-fluid about">
        <div class="container">
          <h2 id="about">A propos de moi&nbsp;!</h2>
          <hr class="separateur">
          <div class="row">
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
              <h2>Compétences</h2>

              <ul>
                <li>Maîtriser les bases du développement front-end (HTML,  CSS et Javascript)</li>
                <li>Analyser  des échanges communautaires en ligne </li>
                <li>Améliorer le positionnement d'un site web </li>
                <li>Administrer et gérer un site sous Wordpress </li>
                <li>Communiquer et prospecter via des outils en ligne </li>
                <li>Mettre en place des campagn_es publicitaires</li>
                <li>Communiquer en ligne</li>
              </ul>
            </article>

            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
              <h2>Savoir</h2>
              <ul>
                <li>Techniques d’animations web </li>
                <li>Référencement web et Référencement naturel (SEO) </li>
                <li>Rédaction d'un contenu web</li>
                <li>Web marketing et Marketing des réseaux sociaux</li>
                <li>Community management </li>
                <li>Gérer un site web</li>
              </ul>
            </article>

            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
              <h2>Savoir faire</h2>

              <ul>
                <li>Communiquer en ligne</li>
                <li>Techniques d’animations web </li>
                <li>Référencement web et Référencement naturel (SEO) </li>
                <li>Rédaction d'un contenu web</li>
                <li>Web marketing et Marketing des réseaux sociaux</li>
                <li>Community management </li>
                <li>Gérer un site web</li>
              </ul>
            </article>
          </div>
        </div>
    </section>
    <section class="container-fluid portfolio">
        <div class="container">
          <h2 id="portfolio">Mon portfolio</h2>
          <hr class="separateur">

            <ul>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
              <li>
                  <a href="#"><img src="img/e-commerce.jpg" alt="Site e-commerce"/></a>
              </li>
            </ul>

        </div>
    </section>
<?php
if(!isset($nom)) $nom ='';
if(!isset($company)) $company ='';
if(!isset($mail)) $mail ='';
if(!isset($tel)) $tel ='';
 ?>

 <?php

 try {
     $pdo = new PDO('mysql:host=localhost;dbname=portfolio',
         'root',
         '',
         array(
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
         ));
 }
 catch (PDOException $e) {
     echo "Erreur de connexion : " . $e->getMessage();
 }

 if (isset($_POST['maurice'])) {
     $nom = isset($_POST['name']) ? $_POST['name'] : "";
     $company = isset($_POST['company']) ? $_POST['company'] : "";
     $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
     $tel = isset($_POST['phone']) ? $_POST['phone'] : "";
     $erreurs = array();

      if (!(mb_strlen($nom) >= 2 && ctype_alpha($nom)))
     array_push($erreurs, 'Veuillez saisir votre nom');
     if (!(mb_strlen($company) >= 2 && ctype_alpha($company)))
     array_push($erreurs, 'Veuillez saisir votre société');
     if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
     array_push($erreurs, "Veuillez saisir une adresse mail valide.");
     if (!(mb_strlen($nom) >= 2))
    array_push($erreurs, 'Veuillez saisir votre message');

    if (count($erreurs) > 0) {
        $message = "<ul>";
        $i = 0;
        while ($i < count($erreurs)) {
            $message .= "<li>" . $erreurs[$i] . "</li>";
            $i++;
        }
        $message .= "</ul>";
        echo $message;
      }

       else {
         $sql = "SELECT COUNT(*) FROM t_contact WHERE mail='". $mail . "'";
         $nombreOccurences = $pdo->query($sql)->fetchColumn();
         if($nombreOccurences == 0) {
           $sql ="INSERT INTO t_contact (nom, société, mail, num, message)
           VALUES ('" . $nom ."', '" . $company ."', '" . $mail ."', '" . $tel ."', '" . $message ."')";
           $query = $pdo->prepare($sql);
           $query->bindvalue('nom', $nom, PDO::PARAM_STR);
           $query->bindvalue('société', $company, PDO::PARAM_STR);
           $query->bindvalue('mail', $mail, PDO::PARAM_STR);
           $query->bindvalue('num', $tel, PDO::PARAM_STR);
           $query->bindvalue('message', $message, PDO::PARAM_STR);
         }
         else {
           echo "erreur dans l'insertion";
         }

       }
     }

     else {
       $message = "Votre message a bien été envoyé";
     }

     ?>
    <section class="get-in-touch">
      <?php
        if(isset($message) && $message != ""){
        echo $resultat;}
        else {
          echo "erreur dans l'envoi du message";
        }
       ?>

      <h1 id="Contact" class="title">Get in touch</h1>
      <hr class="separateur">
    <form class="contact-form row" action="contact.php" method="post" onsubmit="validerFrm()">
        <div class="form-field col-lg-6">
            <input id="name" class="input-text js-input" type="text" name="name" value="<?= $nom ?>">
            <label class="label" for="name">Nom</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="mail" class="input-text js-input" type="email" value="<?= $company ?>">
            <label class="label" for="mail">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="company" class="input-text js-input" type="text" value="<?= $mail ?>">
          <label class="label" for="company">Société</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="phone" class="input-text js-input" type="tel" value="<?= $tel ?>">
          <label class="label" for="phone">Téléphone</label>
        </div>
        <div class="form-field col-lg-12">
          <label class="label " for="message">Message</label>
          <textarea id="message" class="input-text js-input" name="user_message"></textarea>
        </div>
        <div class="form-field col-lg-12">
          <input class="submit-btn" type="submit" value="submit">
        </div>
        <input type="hidden" name="maurice">
    </form>
  </section>

  <footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <p class="footer-info-text">
                           Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
                        </p>
                        <div class="footer-social-link">
                            <h3 id="Infos">Réseaux sociaux</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/?lang=fr">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/alistair-viglieri-6a3293180/">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?hl=fr">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social link -->
                    </div>
                    <!-- End Footer info -->
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Alistair VIGLIERI</h3>
                                    <p>5 avenue de la porte des champs</p>
                                    <p>76000 ROUEN</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>06 06 66 42 44</h3>
                                    <p>Give us a call</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Informations</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3>Personnels</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                            </div>
                            <!-- End footer widget -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Copyright © 2019, All Right Reserved Seobin</span>
                    </div>
                    <!-- End Col -->
                    <!-- End col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
</footer>
</body>

</html>
