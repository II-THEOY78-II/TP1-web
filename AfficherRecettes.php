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
