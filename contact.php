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
       include "index.php";
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
      include "index.php";
    }
    
