<?php

session_start();

include_once("mysql.php");
include_once("variables.php");
include_once('header.php');


	if (!isset($_POST['title']) || !isset($_POST['recipe']))
	{
	    echo('Il faut un titre et une recette pour soumettre le formulaire.');
	    return;
	}

	$title = $_POST['title'];
	$recipe = $_POST['recipe'];

	$insertRecipe = $db->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
    $insertRecipe->execute([
        'title' => $title,
        'recipe' => $recipe,
        'is_enabled' => 1,
        'author' => $_SESSION['email'],
    ]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Page d'accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet">
        <link href="Style.css" rel="stylesheet">
    </head>
<body>
    <h1>Recette crée !</h1>

    <a class="BackHomeBtn" href="index.php">Retourner à l'accueil</a>
</body>
</html>