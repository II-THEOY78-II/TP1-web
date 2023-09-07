<?php
$recipes = [
    [
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : des flageolets ! ',
    'author' => 'john.doe@exemple.com',
    'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
];

?>

<?php

function isValidRecipe(array $recipe) : bool {
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } 
    else {
        $isEnabled = false;
    }
    return $isEnabled;
}

function getRecipes(array $recipes) : array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

foreach(getRecipes($recipes) as $recipe) {
    echo $recipe['title'] ..
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Affichage des recettes</title>
        <h1>Affichage des recettes</h1>
        <link rel="stylesheet" href="Style.css">
    </head>
    <body>
        <div class="Recipes">
        <?php
            foreach($recipes as $recipe){
                if($recipe['is_enabled'] == true){
                    echo '<h2>' . $recipe['title'] .'</h2>' . '<p>' . $recipe['recipe'] .'<br>' . $recipe['author'] .'</p>';
                }
            }
        ?>
        </div>
    </body>
</html>
