<?php
include_once("mysql.php");
include_once("variables.php");

    $getData = $_GET;

    if(!isset($getData['id']) && is_numeric($getData['id'])){
        echo ('il faut un identifiant de recette pour le supprimer !');
        return;
    }

    $retrieveRecipeStatement = $db-> prepare('DELETE FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute(['id' => $getData['id'],]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - recette supprimée</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet">
        <link href="Style.css" rel="stylesheet">
    </head>
<body>
    <h1>Recette supprimée !</h1>

    <a class="BackHomeBtn" href="index.php">Retourner à l'accueil</a>
</body>
</html>