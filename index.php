<?php include_once('mysql.php'); ?>
<!-- Si tout va bien, on peut continuer -->

<?php
    // On récupère tout le contenu de la table recipes
    $sqlQuery = 'SELECT * FROM recipes';
    $recipesStatement = $db->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site de recettes - Page d'accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet">
        <link href="Style.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="container">
        <?php include_once('header.php'); ?>
                <!-- inclusion de l'entête du site -->
            <?php include_once('header.php'); ?>

            <h1>Site de recettes</h1>

            <!-- inclusion des variables et fonctions -->
            <?php
                include_once('variables.php');
                include_once('functions.php');
            ?>
            <!-- Inclusion du formulaire de connexion -->
            <?php include_once('login.php'); ?>
            

            <?php if(isset($loggedUser)): ?>
                <?php foreach(getRecipes($recipes) as $recipe) : ?>
                    <article>
                        <h3><?php echo $recipe['title']; ?> </h3>
                        <div><?php echo $recipe['recipe']; ?> </div>
                        <i><?php echo displayAuthor($recipe['author'], $users); ?> </i>
                        <?php if($_SESSION['email'] === $recipe['author']){
                            echo '<br> <a class="EditBtn" href="Update.php?id='.$recipe['recipe_id'].'">Modifier</a>';
                            echo '<a class="EditBtn" href="Delete.php?id='.$recipe['recipe_id'].'">Delete</a>';
                        };
                        ?>
                    </article>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    
        <!-- inclusion du bas de page du site -->
        <?php include_once('footer.php'); ?>
    </body>
</html>