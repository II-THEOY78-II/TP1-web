<?php
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
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
        'recipe' => '',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => true,
    ],
];

$users = [
        [
            'full_name' => 'Mickaël Andrieu',
            'email' => 'mickael.andrieu@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Mathieu Nebra',
            'email' => 'mathieu.nebra@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Laurène Castor',
            'email' => 'laurene.castor@exemple.com',
            'age' => 28,
        ],
    ];

?>

<?php

function isValidRecipe(array $recipe) : bool{
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

// foreach(getRecipes($recipes) as $recipe) {
//     echo $recipe['title'];
// }

function displayAuthor(string $authorEmail, array $users) : string {
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Affichage des recettes</title>
        <h1>Listes des recettes de cuisine</h1>
        <link rel="stylesheet" href="Style.css">
    </head>
    <body>
        <div class="Recipes">
        <?php
            foreach(getRecipes($recipes) as $recipe){
                        foreach($users as $user){
                            if($recipe['author'] == $user['email']){
                                echo '<h2>'. $recipe['title']. '</h2><br>';
                                echo '<p>'.displayAuthor($recipe['author'], $users) . '</p>';
                            }
                        }
                    //echo '<h2>' . $recipe['title'] .'</h2>' . '<p>' . $recipe['recipe'] .'<br>' . $recipe['author'] .'</p>';
            }
        ?>
        </div>
    </body>
</html>
