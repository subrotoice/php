<?php
include("classes/recipe.php");
include("classes/render.php");
include("classes/recipecollection.php");
include("inc/allrecipes.php");

// Creating a Collection
$cookbook = new RecipeCollection("Treehous Rechipee");
$cookbook->addRecipe($lemon_chicken); // $lemon_chicken is a object, so it contain array of object here $cookbook->recipes[] array of object
$cookbook->addRecipe($granola_muffins);  // here addRecipe means recipe array property te ekta object add houa 
$cookbook->addRecipe($belgian_waffles);
$cookbook->addRecipe($pepper_casserole);
$cookbook->addRecipe($lasagna);
$cookbook->addRecipe($dried_mushroom_ragout);
$cookbook->addRecipe($rabbit_catalan);
$cookbook->addRecipe($grilled_salmon_with_fennel);
$cookbook->addRecipe($pistachio_duck);
$cookbook->addRecipe($chili_pork);
$cookbook->addRecipe($crab_cakes);
$cookbook->addRecipe($beef_medallions);
$cookbook->addRecipe($silver_dollar_cakes);
$cookbook->addRecipe($french_toast);
$cookbook->addRecipe($corn_beef_hash);
$cookbook->addRecipe($granola);
$cookbook->addRecipe($scones);

$breakfast = new RecipeCollection("Favorite Breakfast");
foreach ($cookbook->filterByTag("breakfast") as $recipe) {
  $breakfast->addRecipe($recipe);
}

$week1 = new RecipeCollection("meal Plan: Week 1");
$week1->addRecipe($cookbook->filterById(2));  // return full object, mean object no 3 if start with 0
$week1->addRecipe($cookbook->filterById(3));
$week1->addRecipe($cookbook->filterById(6));
$week1->addRecipe($cookbook->filterById(16));

// echo Render::listRecipes($week1->getRecipeTitle());
// echo Render::listRecipes($cookbook->getRecipeTitle());
echo "<br /><br /> Shopping List <br />";
echo Render::listShopping($week1->getCombinedIngredients());
// echo Render::listShopping($breakfast->getCombinedIngredients());
// echo Render::listRecipes($breakfast->getRecipeTitle());
// echo Render::displayRecipe($cookbook->filterById(2));
