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

    echo $id;
    echo $title;
    echo $recipe;
    
    $insertRecipeStatement = $db->prepare("UPDATE recipes SET title = :title, recipe = :recipe WHERE  recipe_id = :id");
    $insertRecipeStatement->execute([
        'title' => $title,
        'recipe' => $recipe,
        'id' => $id,
    ]);
?>