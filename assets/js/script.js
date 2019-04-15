
function validerFrm(){

var nom = document.getElementById('name').value;
var société = document.getElementById('company').value;
var num = document.getElementById('phone').value;
var mail = document.getElementById('mail').value;

var erreur = new Array();

if (nom == "") {
  erreur.push('Veuillez saisir votre nom');
}

if (société == "") {
  erreur.push('Veuillez saisir votre société');
}

if (num == "") {
  erreur.push('Veuillez saisir votre numéro de téléphonne');
}

if (mail == "") {
  erreur.push('Veuillez saisir votre numéro de téléphonne');
}

if (erreur.length != 0) {
  var message = "<ul>";

  for(var i = 0 ; i < erreur.length ; i++) {
    message += "<li>";
    message += erreur[i];
    message += "</li>"
  }

    message += "</ul>";

    document.write(message);
  }

  else {
    alert("Formulaire bien rempli");
  }
}
