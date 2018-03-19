// Indique le nombre minimum de champs à compléter
var arr = Array(2);
for (var i = 0; i < arr.length; ++i) { arr[i] = false; }

// Désactiver le bouton submit chargement de la page contact
function auChargement(){
	document.getElementById("envoyer").disabled = true;
}

// Vérifier chaque champ et appliquer le style adapté
function checkFields(champ, indice)
{
   if(champ.value.length < 2 || champ.value.length > 30)
   {
      surligne(champ, true);
	  arr[indice]=false;
   }
   else
   {
	  surligne(champ, false);
      arr[indice]=true;
   }
   activesubmit();
}

// fonction pour modifier le style ok et ko 
function surligne(champ, erreur)
{
	if(erreur)
		champ.style.backgroundColor = "#cf3333";
		
	else
      champ.style.backgroundColor = "";
}

// Activation/désactivation du bouton confirmer et envoyer
function activesubmit(){
		var compt=0;
		for(i=0; i<=arr.length; i++)
		{
			if(arr[i]==false)
			compt++;
		}
		if(compt != 0)
		document.getElementById("envoyer").disabled = true;
		else  
		document.getElementById("envoyer").disabled = false;
}