<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mon site de recettes - contactez-moi</title>
		<link rel="stylesheet" href="/TP1-web/Style.css">
	</head>
	<body>
		<?php include('header.php'); ?>

		<h3>Mon site de recettes</h3>


		<form>
			<h1>
				Contactez moi
			</h1>
			<div id="group">
				<ul>
					<li>
						<label for="mail">Email</label><br>
						<input type="email" id="mail" name="user_mail"><br><br>
					</li>
					<li>
						<label for="msg">Votre message</label><br>
						<textarea type="message" id="msg" name="user_message"></textarea>
					</li>
					<div class="button">
  						<button type="submit">Envoyer</button>
  					</div>
				</ul>
			</div>
		</form>


	</body>
</html>