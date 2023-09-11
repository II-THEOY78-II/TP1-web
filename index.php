<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon site de recettes - page d'acceuil</title>
        <link rel="stylesheet" href="Style.css">
    </head>
 
    <body>    
        <?php include('/php/header.php'); ?>

        <h1>Mon site de recettes</h1>
        
        <?php 
            include_once('/php/variables.php');
            include_once('/php/function.php');
        ?>
    
    <div class="Recipes">
        <?php
            foreach(getRecipes($recipes) as $recipe){
                        foreach($users as $user){
                            if($recipe['author'] == $user['email']){
                                echo '<h2>'. $recipe['title']. '</h2><br>';
                                echo '<p>'.displayAuthor($recipe['author'], $users) . '</p>';
                            }
                        }
            }
        ?>
        </div>
    
    <?php include_once('/php/footer.php'); ?>
    
    </body>
</html>