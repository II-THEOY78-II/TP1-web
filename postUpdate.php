<?php
    include_once("mysql.php");
    include_once("variables.php");

    if(!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['recipe'])) {
        echo ('Il manque des informations pour remettre l\'édition du formulaire.');
        return;
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $recipe = $_POST['recipe'];

    
    $insertRecipeStatement = $db->prepare("UPDATE recipes SET title = :title, recipe = :recipe WHERE  recipe_id = :id");
    $insertRecipeStatement->execute([
        'title' => $title,
        'recipe' => $recipe,
        'id' => $id,
    ]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Recette modifié</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet">
        <link href="Style.css" rel="stylesheet">
    </head>
<body>
	<h1>Recette modifié !</h1>

    <a class="BackHomeBtn" href="index.php">Retourner à l'accueil</a>
</body>
</html>