<h1>Message bien reçu !</h1>

<?php
	if(
	    (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	    || (!isset($_POST['message']) || empty($_POST['message']))
	    )
	{
	    echo('Il faut un email et un message valides pour soumettre le formulaire.');
	    return;
	}
?>


<div class="card">
	<div class="card-body">
		<h5 class="card-title">Rappel de vos informations</h5>
		<p class="card-text"><b>Email</b> : <?php echo $_POST['email']; ?> </p>
		<p class="card-text"><b>Message</b> : <?php echo $_POST['message']; ?> </p>
	</div>
</div>
