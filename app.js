document.getElementById("contactForm").addEventListener("submit", function(e)
{

	var erreur; 
	var Name = document.getElementById("Name"); 
	var Mail = document.getElementById("Mail"); 
	var Message = document.getElementById("Message");
	var Object = document.getElementById("Object"); 

	if (!Name.value)
	{
		erreur="Veuillez renseigner le nom"
	}

	if (!Mail.value)
	{
		erreur="Veuillez renseigner l'adresse e-mail"
	}

	if (!Message.value)
	{
		erreur="Veuillez renseigner le message"
	}

	if (!Object.value)
	{
		erreur="Veuillez renseigner l'objet"
	}

	if (erreur)
	{
		e.preventDefault(); 
		document.getElementById("erreur").innerHTML = erreur; 
		return false; 
	}
	 else
	 {
	 		alert('formulaire envoye');
	 }
}); 