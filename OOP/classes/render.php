<?php
class Render
{
  public static function listShopping($ingredient_list)
  {
    ksort($ingredient_list);
    return implode("<br />", array_keys($ingredient_list));
  }
  public static function listRecipes($titles)
  {
    asort($titles);
    $output = "";
    foreach ($titles as $key => $title) {
      if ($output != "") {
        $output .= "<br />";
      }
      $output .= "[$key] $title";
    }
    return $output;
  }
  public static function listIngredients($ingredients)
  {
    $output = "";
    foreach ($ingredients as $ing) {
      $output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
      $output .= "<br />";
    }
    return $output;
  }
  public static function displayRecipe($recipe)
  {
    $output = "";
    $output .= $recipe->getTitle() . " by " . $recipe->getSource();
    $output .= "<br /><br />";
    $output .= implode(", ",$recipe->getTags());
    $output .= "<br /><br />";
    $output .= self::listIngredients($recipe->getIngredient());
    $output .= "<br />";
    $output .=implode("<br />", $recipe->getInstructions());
    $output .= "<br /><br />";
    $output .= $recipe->getYield();
    return $output;
  }
}
