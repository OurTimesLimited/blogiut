//fonction de vérification de la saisie des commentaires
function VerificationSaisie()
{
//si l'input pseudo est vide
if(document.getElementById("pseudo").value == "") {
		alert("Veuillez entrer votre pseudo");
    document.getElementById("pseudo").focus();
return false;
}
//si l'input email est vide
if(document.getElementById("email").value == "") {
		alert("Veuillez entrer votre email");
    document.getElementById("email").focus();
return false;
}
//si l'input texte_commentaire est vide
if(document.getElementById("texte_commentaire").value == "") {
		alert("Veuillez entrer votre commentaire");
    document.getElementById("texte_commentaire").focus();
return false;
}
}
