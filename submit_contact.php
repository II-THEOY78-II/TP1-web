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
	if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0){
		if ($_FILES['screenshot']['size'] <= 1000000){
			$fileInfo = pathinfo($_FILES['screenshot']['name']);
			$extension = $fileInfo['extension'];
			$allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
			if (in_array($extension, $allowedExtensions)){
				move_uploaded_file($_FILES['screenshot']['tmp_name'],'uploads/' . basename($_FILES['screenshot']['name']));
				echo "L'envoi a bien été effectué !";
			}
		}
	}
?>


<div class="card">
	<div class="card-body">
		<h5 class="card-title">Rappel de vos informations</h5>
		<p class="card-text"><b>Email</b> : <?php echo strip_tags($_POST['email']); ?> </p>
		<p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['message']); ?> </p>
	</div>
</div>
