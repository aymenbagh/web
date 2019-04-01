<!DOCTYPE html>
<html>
<head>
	<title>ratepage</title>
	<!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
	<link rel="stylesheet" type="text/css" href="">
	 <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="rate.css">
        <link rel="stylesheet" type="text/css" href="<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>


<div class="form">
	<div class="rating">
	<input type="radio" name="star" id="star1"> <label for="star1"> </label>
		<input type="radio" name="star" id="star1"> <label for="star1"> </label>
	<input type="radio" name="star" id="star1"> <label for="star1"> </label>
	<input type="radio" name="star" id="star1"> <label for="star1"> </label>
	<input type="radio" name="star" id="star1"> <label for="star1"> </label>
	<input type="radio" name="star" id="star1"> <label for="star1"> </label>

</div> 


<form method="GET" action="ajouter_personne2.php" novalidate="novalidate">

			<div class="input-group">
				 <input type="e-mail" name="Mail" required="required">
			 <span>E-mail </span>
			</div>


	 		<div class="input-group">
				 <input type="text" name="name" required="required">
			 <span> Name </span>
			</div>

			 	
			 	<div class="input-group">

				<textarea id="feedback" name="feedback" rows="5" cols="33"> </textarea>
					 <span> Feedback</span>
					</div>


					 <div class="input-group">
				<button type="submit" value="submit"> Envoyer </button>
				
			</div> 

</form>





</body>
</html>