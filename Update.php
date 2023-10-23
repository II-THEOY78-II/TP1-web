<?php
include_once("mysql.php");
include_once("variables.php");

    $getData = $_GET;

    if(!isset($getData['id']) && is_numeric($getData['id'])){
        echo ('il faut un identifiant de recette pour le modifier !');
        return;
    }

    $retrieveRecipeStatement = $db-> prepare('SELECT * FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute([
            'id' => $getData['id'],
        ]);

    $recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Ajouter une recette</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet"
        >
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="container">

        <?php include_once('header.php'); ?>
        
            <h1>Mettre à jour <?php echo ($recipe['title']); ?> </h1>
            <form action="postUpdate.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo $recipe['recipe_id'];?>">
            </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="<?php echo $recipe['title'];?>">
                    <div id="title-help" class="form-text">Choisissez un titre percuttant</div>
                </div>
                <div class="mb-3">
                    <label for="recipe" class="form-label">Descripton de la recette</label>
                    <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droit." id="recipe" name="recipe">
                        <?php echo $recipe['recipe']; ?>
                    </textarea>
                    <?php echo strip_tags($recipe['recipe']); ?>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <br />
        </div>

        <?php include_once('footer.php'); ?>
    </body>
</html>